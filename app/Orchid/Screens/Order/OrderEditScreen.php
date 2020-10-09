<?php

namespace App\Orchid\Screens\Order;

use App\Models\Order;
use App\Orchid\Layouts\Order\OrderEditLayout;
use App\Orchid\Layouts\Order\StatusEditLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class OrderEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'OrderEditScreen';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'OrderEditScreen';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Order $order): array
    {
        return [
            'order' => $order,
            'order-status' => $order->status->value,
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [
            Button::make(__('Update offer'))
                ->icon('pencil')
                ->method('update'),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            OrderEditLayout::class,
            StatusEditLayout::class,
        ];
    }

    public function update(Order $order, Request $request)
    {
        $order->fill($request->input('order', []))
            ->setAttribute('status', $request->input('order-status', $order->status))
            ->save();

        Alert::info(_('Order saved'));

        return redirect()->route('platform.order.list');
    }
}
