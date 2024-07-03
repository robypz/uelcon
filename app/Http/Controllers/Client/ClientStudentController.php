<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserService;
use App\Http\Requests\StudentRequest;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class ClientStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = auth()->user()->students;
        return view('client.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        if (UserService::checkIfModelBelongsToUser($student)) {
            return view('client.student.show', compact('student'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        if (UserService::checkIfModelBelongsToUser($student)) {
            $schools = School::all();
            return view('client.student.edit', compact('student','schools'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, Student $student)
    {
        $student->name = $request->name;
        $student->surname = $request->surname;
        $student->section_id = $request->section_id;
        $student->save();

        return redirect()->route('client.student.show', $student)->with('success','Estudiante actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if (UserService::checkIfModelBelongsToUser($student)) {
            $student->delete();
            return redirect()->route('client.student.index')->with('success','Estudiante eliminado con éxito');
        }
    }
}
