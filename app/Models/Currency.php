<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'currency',
        'iso-4217',
        'symbol',
    ];

    function currency() : HasMany {
        return $this->hasMany(PaymentMethod::class);
    }
}
