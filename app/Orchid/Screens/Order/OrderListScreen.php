<?php

namespace App\Orchid\Screens\Order;

use App\Models\Order;
use App\Orchid\Layouts\Order\OrderListLayout;
use App\Orchid\Layouts\Order\StatusEditLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class OrderListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Заявки';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = '';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'orders' => Order::withCount('offers')
                ->paginate()
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            OrderListLayout::class,

            Layout::modal('oneAsyncModal', [
                StatusEditLayout::class,
            ])->async('asyncGetOrderStatus'),
        ];
    }

    public function asyncGetOrderStatus(Order $order): array
    {
        return [
            'order-status' => $order->status,
        ];
    }


    public function saveOrder(Order $order, Request $request)
    {
        $order->setAttribute('status', $request->input('order-status'))
            ->save();

        Toast::info(__('Order was saved.'));
    }

}
