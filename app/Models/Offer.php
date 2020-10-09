<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Screen\AsSource;

class Offer extends Model
{
    use HasFactory;
    use AsSource;
    use Attachable;

    protected $guarded = ['id'];

    protected $appends = [
        'thumb_url'
    ];

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, OfferOrder::class)->withPivot([
            'count'
        ]);
    }

    /**
     * @return Attachment|null
     */
    public function getThumbAttribute()
    {
        return $this->attachment->first();
    }

    public function getThumbUrlAttribute()
    {
        return optional($this->thumb)->url;
    }
}
