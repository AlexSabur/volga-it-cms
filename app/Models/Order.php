<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Orchid\Screen\AsSource;

class Order extends Model
{
    use HasFactory;
    use AsSource;

    protected $guard = ['id'];

    protected $casts = [
        'status' => OrderStatus::class
    ];

    protected $dates = [
        'sent_at',
        'paid_in',
        'received_in',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function offers(): BelongsToMany
    {
        return $this->belongsToMany(Offer::class, OfferOrder::class)->withPivot([
            'count'
        ]);
    }
}
