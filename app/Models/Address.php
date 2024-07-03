<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{

    use HasFactory;

    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }

    public function city() : BelongsTo {
        return $this->belongsTo(City::class);
    }

    public function parish() : BelongsTo {
        return $this->belongsTo(Parish::class);
    }
}
