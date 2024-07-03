<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class PersonalReference extends Model
{
    use HasFactory;


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

    public function user(): BelongsTo
    {
        return  $this->belongsTo(User::class);
    }

    public function personalReferenceType(): BelongsTo
    {
        return  $this->belongsTo(PersonalReferenceType::class);
    }
}
