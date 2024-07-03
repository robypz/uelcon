<?php

namespace App\Http\Controllers;

use App\Models\Parish;
use Illuminate\Http\Request;

class ParishController extends Controller
{
    public function getParishByTownship($townsip)
    {
        $parish = Parish::select('id','parish')->where('township_id', $townsip)->get();

        return response()->json($parish, 200);
    }
}
