<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\View\View;
class HomeController extends Controller
{
    public function home()
    {
        if (auth()->user()->hasRole('root')) {
            return redirect()->route('root.home');
        }
        elseif (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.home');
        }
        elseif (auth()->user()->hasRole('client')) {
            return redirect()->route('client.home');
        }

    }

    public function client()
    {
        $loan = auth()->user()->loans()->whereHas('statement', function (Builder $query){
            $query->where('status','disbursed');
        })->first();

        $level = auth()->user()->level()->first();

        $userService = new UserService;

        $amount = $userService->getMaximumLoanAmount();

        return view('client.home',compact('loan','level','amount'));
    }

    public function root()
    {
        $users = User::whereHas('roles',function (Builder $query) {
            $query->where('name','admin');
        })->get();

        return view('root.home',compact('users'));
    }

    public function admin()
    {
        $loans = Loan::whereHas('statement', function (Builder $query){
            $query->where('status','processing')->orWhere('status','approved');
        })->get();

        return view('admin.home',compact('loans'));
    }

    public function completeProfile(): View
    {
        $representatives = auth()->user()->representative()->count();
        $personalReferences = auth()->user()->personalReferences()->count();
        $students = auth()->user()->students()->count();
        return view('client.completeProfile', compact('representatives', 'personalReferences', 'students'));
    }
}
