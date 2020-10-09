<?php

namespace App\Orchid\Layouts\Order;

use App\Enums\OrderStatus;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class StatusEditLayout extends Rows
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
            Select::make('order-status')
                ->title('Статус')
                ->required()
                ->options(OrderStatus::asSelectArray())
        ];
    }
}
