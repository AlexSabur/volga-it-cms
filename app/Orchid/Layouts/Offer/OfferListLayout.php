<?php

namespace App\Orchid\Layouts\Offer;

use App\Models\Offer;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class OfferListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'offers';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [

            TD::set('title', 'Имя товара'),
            TD::set('price', 'Цена')->render(function (Offer $offer) {
                return "$offer->price ₽";
            }),
            TD::set('id', 'ID')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Offer $offer) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            Link::make(__('Edit'))
                                ->route('platform.offer.edit', $offer->id)
                                ->icon('pencil'),

                            // Button::make(__('Delete'))
                            //     ->method('remove')
                            //     ->confirm(__('Are you sure you want to delete the ooffer?'))
                            //     ->parameters([
                            //         'id' => $offer->id,
                            //     ])
                            //     ->icon('trash'),
                        ]);
                }),
        ];
    }
}
