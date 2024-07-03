<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Representative extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function representativeType(): BelongsTo
    {
        return $this->belongsTo(RepresentativeType::class);
    }

    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function phone(): MorphOne
    {
        return $this->morphOne(Phone::class, 'phoneable');
    }

    public function email(): MorphOne
    {
        return $this->morphOne(Email::class, 'emailable');
    }

    public function socialMedia(): BelongsToMany
    {
        return $this->belongsToMany(SocialMedia::class)->withPivot('nick');
    }
}
