<?php
namespace App\Models;

use App\Models\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model {

	public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function addresses() : HasMany {
        return $this->hasMany(Address::class);
    }

}
