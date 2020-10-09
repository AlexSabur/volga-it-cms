<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\CreateRequest;
use App\Models\Offer;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Order/Index', [
            'orders' => $request->user()->orders,
        ]);
    }

    public function view(Request $request, Order $order)
    {
        abort_unless($request->user()->id == $order->user_id, 404);

        $order->load('offers');

        return Inertia::render('Order/View', [
            'order' => $order,
        ]);
    }

    public function create(CreateRequest $request)
    {
        $offersAttach = collect($request->input('offers'))
            ->mapWithKeys(fn ($item) => [
                $item['id'] => [
                    'count' => $item['count']
                ]
            ]);

        /** @var Order $order */
        $order = $request->user()->orders()->create([
            'address' => $request->address,
            'price' => $request->offersSum()
        ]);

        $request->user()->update([
            'balance' => $request->user()->balance - $request->offersSum()
        ]);

        $order->offers()->attach($offersAttach);


        return Inertia::render('Order/Index', [
            'orders' => $request->user()->orders,
        ]);
    }
}
