<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromView;

class LoanExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public $loans;

    public function __construct(Builder $query)
    {
        $this->loans = $query->get();
    }

    public function view(): View
    {
        return view('exports.loans', [
            'loans' => $this->loans
        ]);
    }
}
