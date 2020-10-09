<?php

namespace App\Orchid\Screens;

use App\Models\Offer;
use App\Orchid\Layouts\Offer\OfferEditLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class OfferEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'OfferEditScreen';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'OfferEditScreen';

    public bool $exists = false;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Offer $offer): array
    {
        $this->exists = $offer->exists;

        return [
            'offer' => $offer,
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
            Button::make(__('Create offer'))
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->exists),
            
            Button::make(__('Update offer'))
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee($this->exists),
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
            OfferEditLayout::class,
        ];
    }

    public function createOrUpdate(Offer $offer, Request $request)
    {
        $offer->fill($request->input('offer'))->save();

        $offer->attachment()->syncWithoutDetaching(
            $request->input('offer.attachment', [])
        );
    
        Alert::info(_('Offer saved'));

        return redirect()->route('platform.offer.list');
    }
}
