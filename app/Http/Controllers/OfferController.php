<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::all();

        return Inertia::render('Offer/Index', [
            'offers' => $offers,
        ]);
    }
}
