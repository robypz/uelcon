<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalReferenceRequest;
use App\Models\Address;
use App\Models\Email;
use App\Models\PersonalReference;
use App\Models\PersonalReferenceType;
use App\Models\Phone;
use App\Models\State;
use Illuminate\Http\Request;

class PersonalReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personalReferences = PersonalReference::paginate(20);

        return view('personalReference.index',compact('personalReferences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $personalReferenceTypes = PersonalReferenceType::all();
        $states = State::all();
        return view('personalReference.create', compact('personalReferenceTypes', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonalReferenceRequest $request)
    {

        $personalReference = new PersonalReference;
        $personalReference->name = $request->name;
        $personalReference->surname = $request->surname;
        $personalReference->dni = $request->dni;
        $personalReference->personal_reference_type_id = $request->personal_reference_type_id;
        $personalReference->user_id = auth()->user()->id;
        $personalReference->save();

        $address = new Address;
        $address->address = $request->address;
        $address->city_id = $request->city_id;
        $address->parish_id = $request->parish_id;
        $address->reference_place = $request->reference_place;
        $personalReference->address()->save($address);

        $phone = new Phone;
        $phone->phone = $request->phone;
        $personalReference->phone()->save($phone);

        $email = new Email;
        $email->email = $request->email;
        $personalReference->email()->save($email);

        return redirect()->route('client.home')->with('success', 'Referencia personal agregada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(PersonalReference $personalReference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PersonalReference $personalReference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PersonalReference $personalReference)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PersonalReference $personalReference)
    {
        //
    }
}
