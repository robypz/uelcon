<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserService;
use App\Http\Requests\PersonalReferenceRequest;
use App\Models\PersonalReference;
use App\Models\PersonalReferenceType;
use App\Models\State;

class ClientPersonalReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personalReferences = auth()->user()->personalReferences;
        return view('client.personalReference.index', compact('personalReferences'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PersonalReference $personalReference)
    {
        if (UserService::checkIfModelBelongsToUser($personalReference)) {
            return view('client.personalReference.show', compact('personalReference'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PersonalReference $personalReference)
    {
        if (UserService::checkIfModelBelongsToUser($personalReference)) {
            $personalReferenceTypes = PersonalReferenceType::all();
            $states = State::all();
            return view('client.personalReference.edit', compact('personalReference','personalReferenceTypes','states'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonalReferenceRequest $request, PersonalReference $personalReference)
    {
        if (UserService::checkIfModelBelongsToUser($personalReference)) {
            $personalReference->name = $request->name;
            $personalReference->surname = $request->surname;
            $personalReference->dni = $request->dni;
            $personalReference->personal_reference_type_id = $request->personal_reference_type_id;
            $personalReference->save();

            $personalReference->address->address = $request->address;
            $personalReference->address->city_id = $request->city_id;
            $personalReference->address->parish_id = $request->parish_id;
            $personalReference->address->reference_place = $request->reference_place;
            $personalReference->address()->save($personalReference->address);

            $personalReference->phone->phone = $request->phone;
            $personalReference->phone()->save($personalReference->phone);

            $personalReference->email->email = $request->email;
            $personalReference->email()->save($personalReference->email);

            return redirect()->route('client.personalReference.show', $personalReference)->with('success', '¡Referencia personal actualizada con exito!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PersonalReference $personalReference)
    {
        if (UserService::checkIfModelBelongsToUser($personalReference)) {
            return redirect(route('client.PersonalReference.index'))->with('success', '¡Referencia personal eliminada con exito!');
        }
    }
}
