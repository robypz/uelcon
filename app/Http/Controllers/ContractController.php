<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    function confirm(Contract $contract) {
        if (UserService::checkIfModelBelongsToUser($contract->loan)) {
            $contract->confirmed = true;
            $contract->confirmation_date = Carbon::now();
            $contract->save();

            return redirect(route('client.loan.show',$contract->loan))->with('success','¡Contrato aceptado de manera exitosa!');
        }
        else {
            return redirect('home');
        }

    }
}
