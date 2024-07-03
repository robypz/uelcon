<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SocialMedia extends Model
{
    use HasFactory;

    public function representatives(): BelongsToMany
    {
        return $this->belongsToMany(Representative::class);
    }
}
