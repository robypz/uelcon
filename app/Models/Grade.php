<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grade extends Model
{
    use HasFactory;

    function sections() : HasMany {
        return $this->hasMany(Section::class);
    }

    function school() : BelongsTo {
        return $this->belongsTo(School::class);
    }
}
