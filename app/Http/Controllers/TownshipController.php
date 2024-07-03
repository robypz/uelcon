<?php

namespace App\Http\Controllers;

use App\Models\Township;
use Illuminate\Http\Request;

class TownshipController extends Controller
{
    public function getTownshipsByState($state)
    {
        $townships = Township::select('id','township')->where('state_id', $state)->get();

        return response()->json($townships, 200);
    }
}
