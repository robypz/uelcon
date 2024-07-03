<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RepresentativeType extends Model
{
    use HasFactory;

    public function FunctionName() : HasMany {
        return $this->hasMany(Representative::class);
    }

    protected $fillable = [
        'representative_type',
    ];
}
