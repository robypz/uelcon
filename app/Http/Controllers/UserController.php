<?php

namespace App\Http\Controllers;

use App\Models\Representative;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate('25');
        return view('user.index', compact('users'));
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
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;

        $user->password = Hash::make($request->password);

        $user->save();
    }

    public function editRole(User $user)
    {
        $roles = Role::all()->pluck('name');

        return view('user.editRole', compact('user','roles'));
    }

    public function updateRole(Request $request, User $user)
    {
        $user->syncRoles([$request->role]);
        $user->save();

        return redirect(route('user.index'))->with('');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function representatives() {
        $representatives = Representative::where('user_id',auth()->user()->id)->get();
        return view('client.representatives',compact('representatives'));
    }
}
