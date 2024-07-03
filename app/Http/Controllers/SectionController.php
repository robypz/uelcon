<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function getSectionsByGrade($grade)
    {
        $sections = Section::where('grade_id', $grade)->get();
        return response()->json($sections, 200);
    }

    function create(Grade $grade) {

        return view('section.create',compact('grade'));
    }

    function store(Request $request) {
        $section = new Section;
        $section->section = $request->section;
        $section->grade_id = $request->grade_id;
        $section->save();

        return view('section.show',compact('section'));
    }

    //show section
    function show(Section $section) {
        return view('section.show',compact('section'));
    }

    function edit(Section $section) {
        return view('section.edit',compact('section'));
    }

    function update(Section $section,Request $request) {
        $section->section = $request->section;
        $section->save();

        return view('section.show',compact('section'));
    }
}
