<?php

namespace App\Services;

use App\Models\Level;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UserService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function fullProfile(): bool
    {
        $representatives = auth()->user()->representative()->count();
        $personalReferencesFamily = auth()->user()->personalReferences()->whereHas('personalReferenceType', function (Builder $query) {
            $query->where('name', 'Familiar');
        })->count();
        $personalReferencesFriends = auth()->user()->personalReferences()->whereHas('personalReferenceType', function (Builder $query) {
            $query->where('name', 'Amigo dentro del colegio');
        })->count();
        $students = auth()->user()->students()->count();

        if ($representatives >= 1 && $personalReferencesFamily == 2 && $personalReferencesFriends == 2 && $students >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkIfUserHasUnpaidLoans()
    {
        $unpaidLoans = auth()->user()->loans()->whereHas('statement', function (Builder $query) {
            $query->where('status', '!=', 'paid');
        })->first();

        if ($unpaidLoans) {
            return true;
        } else {
            return false;
        }
    }

    public  function loanLimit()
    {
        if (auth()->user()->loans()->count() > 0) {
            return $this->loanAmountLimit();
        } else {
            return 400.00;
        }
    }

    public function levelIncrease()
    {
        $level = auth()->user()->level;

        $increase = $level->increase;

        return $increase;
    }

    public function loanAmountLimit()
    {
        $latestLoan = auth()->user()->loans()->whereHas('statement', function (Builder $query) {
            $query->where('status', 'paid');
        })->latest()->first();

        if ($latestLoan) {
            $latestLoanAmount = $latestLoan->gross_amount;
        } else {
            $latestLoanAmount = 0;
        }



        if (auth()->user()->level()->count() > 0) {
            $increase = $this->levelIncrease();
        } else {
            $increase = 0;
        }



        $loanAmountLimit = $latestLoanAmount + ($latestLoanAmount * ($increase / 100));

        return $loanAmountLimit;
    }

    public function getMaximumLoanAmount()
    {

        if (auth()->user()->loans()->whereHas('statement', function (Builder $query) {
            $query->where('status', 'paid');
        })->count() > 0) {
            return $this->loanAmountLimit();
        } else {
            return 400.00;
        }
    }

    public static function checkIfModelBelongsToUser(Model $model)
    {
        if ($model->user_id == auth()->user()->id) {
            return true;
        } else {
            return redirect()->route('client.home')->with('alert', '¡Resurco no encontrado!');
        }
    }

    public static function setLevel($level, $user)
    {
        $level = Level::where('name', $level)->first();

        $user = User::find($user);
        $user->level()->associate($level);
        $user->save();
    }

    public static function checkPersonalReferenceType($type)
    {
        return auth()->user()->personalReferences()->where('personal_reference_type_id', $type)->count();
    }
}
