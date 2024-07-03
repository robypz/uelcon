<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserService;
use App\Models\Loan;
use Illuminate\Http\Request;

class ClientLoanController extends Controller
{
    public function index()
    {
        $loans = auth()->user()->loans()->paginate(12);
        return view('client.loan.index', compact('loans'));
    }

    public function show(Loan $loan)
    {
        if (UserService::checkIfModelBelongsToUser($loan)) {
            return view('client.loan.show', compact('loan'));
        }
    }
}
