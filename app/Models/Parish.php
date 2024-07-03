<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Parish extends Model {

	public function township()
    {
        return $this->belongsTo(Township::class);
    }

    public function addresses() : HasMany {
        return $this->hasMany(Address::class);
    }

}
