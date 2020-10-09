<?php

namespace App\Orchid\Layouts\Offer;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;

class OfferEditLayout extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): array
    {
        return [
            Group::make([
                Input::make('offer.title')
                    ->title('Имя товара')
                    ->required(),

                Input::make('offer.price')
                    ->title('цена'),
            ]),

            // Quill::make('offer.body')
            //     ->title('Описание'),

            Upload::make('offer.attachment')
                ->title('Фотографии')
                ->horizontal()
        ];
    }
}
