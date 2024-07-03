<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PersonalReferenceType extends Model
{
    use HasFactory;

    public function personalReferences() : HasMany {
        return $this->hasMany(PersonalReference::class);
    }

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;
}
