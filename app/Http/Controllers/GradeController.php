<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\School;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function getGradesBySchool($school)
    {
        $grades = Grade::where('school_id', $school)->get();
        return response()->json($grades, 200);
    }

    function show(Grade $grade)  {
        return view('grade.show',compact('grade'));
    }

    function create(School $school)  {
        return view('grade.create',compact('school'));
    }

    function store(Request $request)  {
        $grade = new Grade;
        $grade->name = $request->name;
        $grade->school_id = $request->school_id;
        $grade->save();
        return view('grade.show',compact('grade'));
    }
}
