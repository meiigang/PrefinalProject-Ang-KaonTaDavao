<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dish extends Model
{
    protected $fillable = [
        'eatery_id',
        'name',
        'price',
        'is_bestseller',
    ];

    protected $casts = [
        'is_bestseller' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function eatery(): BelongsTo
    {
        return $this->belongsTo(Eatery::class);
    }
}
