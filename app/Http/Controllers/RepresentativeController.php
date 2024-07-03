<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepresentativeRequest;
use App\Models\Address;
use App\Models\Email;
use App\Models\Phone;
use App\Models\Representative;
use App\Models\RepresentativeType;
use App\Models\SocialMedia;
use App\Models\State;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RepresentativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $representatives = Representative::paginate(20);

        return view('representative.index',compact('representatives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $representativeTypes = RepresentativeType::all();
        $states = State::all();
        $socialMedias = SocialMedia::all();
        return view('representative.create', compact('representativeTypes', 'states', 'socialMedias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RepresentativeRequest $request): RedirectResponse
    {
        $representative = new Representative;
        $representative->name = $request->name;
        $representative->surname = $request->surname;
        $representative->dni = $request->dni;
        $representative->representative_type_id = $request->representative_type_id;
        $representative->user_id = auth()->user()->id;
        $representative->save();

        $address = new Address;
        $address->address = $request->address;
        $address->city_id = $request->city_id;
        $address->parish_id = $request->parish_id;
        $address->reference_place = $request->reference_place;
        $representative->address()->save($address);

        $phone = new Phone;
        $phone->phone = $request->phone;
        $representative->phone()->save($phone);

        $email = new Email;
        $email->email = $request->email;
        $representative->email()->save($email);

        foreach ($request->socialMedias as $socialMedia) {
            $representative->socialMedia()->attach($socialMedia['id'], ['nick' => $socialMedia['nick']]);
        }

        return redirect()->route('home')->with('success', 'Representante agregado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
