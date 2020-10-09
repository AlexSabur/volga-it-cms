<?php

use App\Enums\OrderStatus;

return [
    'enum' => __('The value you have provided is not a valid enum instance.'),
    'enum_value' => __('The value you have entered is invalid.'),
    'enum_key' => __('The key you have entered is invalid.'),

    OrderStatus::class => [
        OrderStatus::Treatment => 'Обработка',
        OrderStatus::Sent => 'Отправлен',
        OrderStatus::Received => 'Получен',
        OrderStatus::Canceled => 'Отменён',
    ],

];
