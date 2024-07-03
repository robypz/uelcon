<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::paginate(15);
        return view('school.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $school = new School();
        return view('school.create', compact('school'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoolRequest $request)
    {
        $school = new School;
        $school->school = $request->school;
        $school->save();

        return redirect()->route('school.show', ['school' => $school])->with('success', 'School created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        return  view('school.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        return  view('school.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        $school->update($request->all());
        return redirect()->route('schools.show',$school)->with('success','School updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        $school->delete();
       return redirect()->route('schools.index')
                        ->with('success','School deleted successfully');
    }
}
