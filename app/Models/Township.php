<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Township extends Model {

    public function state()
    {
        return $this->belongsTo(State::class);
    }

	public function parishes()
    {
        return $this->hasMany(Parish::class);
    }

}
