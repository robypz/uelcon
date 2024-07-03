<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(20);

        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $schools = School::all();

        return view('student.create', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $student = new Student;
        $student->birthday = $request->birthday;
        $student->name = $request->name;
        $student->surname = $request->surname;
        $student->section_id = $request->section_id;
        $student->user_id = auth()->user()->id;
        $student->save();

        return redirect()->route('home');
    }

    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
