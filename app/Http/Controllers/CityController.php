<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCityByState($state)
    {
        $cities = City::select('id','city')->where('state_id', $state)->get();

        return response()->json($cities, 200);
    }
}
