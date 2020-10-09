<?php

namespace App\Orchid\Screens;

use App\Models\Offer;
use App\Orchid\Layouts\Offer\OfferListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class OfferListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Товары';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Список товаров сайта';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'offers' => Offer::paginate(),
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
            Link::make(_('Create new offer'))
                ->icon('pencil')
                ->route('platform.offer.edit'),
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
            OfferListLayout::class,
        ];
    }

    public function remove(Request $request)
    {
        Offer::findOrFail($request->get('id'))
            ->delete();

        Toast::info(__('Offer was removed'));
    }
}
