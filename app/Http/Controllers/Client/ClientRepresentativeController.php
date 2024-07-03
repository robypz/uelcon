<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserService;
use App\Http\Requests\RepresentativeRequest;
use App\Models\Representative;
use App\Models\RepresentativeType;
use App\Models\SocialMedia;
use App\Models\State;


class ClientRepresentativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $representative = auth()->user()->representative;
        return view('client.representative.index', compact('representative'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Representative $representative)
    {
        if (UserService::checkIfModelBelongsToUser($representative)) {
            return view('client.representative.show', compact('representative'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Representative $representative)
    {

        if (UserService::checkIfModelBelongsToUser($representative)) {
            $representativeTypes = RepresentativeType::all('id', 'representative_type');
            $socialMedias = SocialMedia::all('id', 'name');
            $states = State::all('id', 'state');
            return view('client.representative.edit', compact('representative', 'representativeTypes', 'socialMedias', 'states'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RepresentativeRequest $request, Representative $representative)
    {
        if (UserService::checkIfModelBelongsToUser($representative)) {
            $representative->name = $request->name;
            $representative->surname = $request->surname;
            $representative->dni = $request->dni;
            $representative->representative_type_id = $request->representative_type_id;
            $representative->save();

            $representative->address->address = $request->address;
            $representative->address->city_id = $request->city_id;
            $representative->address->parish_id = $request->parish_id;
            $representative->address->reference_place = $request->reference_place;
            $representative->address()->save($representative->address);

            $representative->phone->phone = $request->phone;
            $representative->phone()->save($representative->phone);

            $representative->email->email = $request->email;
            $representative->email()->save($representative->email);

            foreach ($request->socialMedias as $socialMedia) {
                $representative->socialMedia()->updateExistingPivot($socialMedia['id'], ['nick' => $socialMedia['nick']]);
            }



            return redirect()->route('client.representative.show', $representative)->with('success', 'Representante actualizado con éxito');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Representative $representative)
    {
        if (UserService::checkIfModelBelongsToUser($representative)) {
            $representative->delete();
            return redirect()->route('client.representative.index')->with('success', '¡Representante eliminado con éxito!');
        }
    }
}
