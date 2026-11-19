<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Eatery extends Model
{
    protected $fillable = [
        'district_id',
        'name',
        'slug',
        'address',
        'price_range',
        'specialty',
        'is_open',
    ];

    protected $casts = [
        'is_open' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function permit(): HasOne
    {
        return $this->hasOne(Permit::class);
    }

    public function dishes(): HasMany
    {
        return $this->hasMany(Dish::class);
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
