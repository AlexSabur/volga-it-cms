<?php

namespace App\Orchid\Layouts\Order;

use App\Models\Order;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Persona;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class OrderListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'orders';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::set('id', 'id'),

            TD::set('user_id', 'User')->render(function (Order $order) {
                return new Persona($order->user->presenter());
            }),

            TD::set('price', 'цена')->render(function (Order $order) {
                return "$order->price ₽";
            }),,

            // TD::set('price' , 'цена'),

            TD::set('id', 'ID')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Order $order) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            Link::make(__('Edit'))
                                ->route('platform.order.edit', $order->id)
                                ->icon('pencil'),

                            // Button::make(__('Delete'))
                            //     ->method('remove')
                            //     ->confirm(__('Are you sure you want to delete the order?'))
                            //     ->parameters([
                            //         'id' => $order->id,
                            //     ])
                            //     ->icon('trash'),
                        ]);
                }),
        ];
    }
}
