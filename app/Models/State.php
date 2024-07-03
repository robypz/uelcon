<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model {


    public function townships()
    {
        return $this->hasMany(Township::class);
    }

}
