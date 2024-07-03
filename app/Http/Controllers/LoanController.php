<?php

namespace App\Http\Controllers;

use App\Exports\LoanExport;
use App\Http\Requests\LoanRequest;
use App\Jobs\ExpireLoan;
use App\Models\Contract;
use App\Models\Loan;
use App\Models\Statement;
use App\Notifications\LoanApprovedNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $statements = Statement::where('status', 'approved')->orWhere('status', 'disbursed')->orWhere('status', 'rejected')->orWhere('status', 'expired')->orWhere('status', 'paid')->orWhere('status', 'processing')->get();

        $query = Loan::query();

        if (filled($request->id)) {
            $query->ofId($request->id);
        }
        if (filled($request->dni)) {
            $query->ofRepresentativeDni($request->dni);
        }
        if (filled($request->startDate) && filled($request->endDate)) {
            $query->ofCreatedAtBetween($request->startDate, $request->endDate);
        }

        if (filled($request->statement)) {
            $query->ofStatement($request->statement);
        }

        $loans = $query->orderBy('created_at','desc')->paginate(12);
        return view('loan.index', compact('loans', 'statements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userService = new UserService;

        $amount = $userService->getMaximumLoanAmount();

        return view('loan.create', compact('amount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoanRequest $request)
    {

        $statement = Statement::where('status', 'processing')->first();

        $loan = new Loan;
        $loan->user_id = auth()->user()->id;
        $loan->gross_amount = $request->gross_amount;
        $loan->debt = $request->net_amount;
        $loan->term = $request->term;
        $loan->flat_commission = $request->flat_commission;
        $loan->net_amount = $request->net_amount;
        $loan->statement_id = $statement->id;
        $loan->save();

        return redirect(route('client.loan.show',$loan))->with('success', 'Prestamo solicitado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        return view('loan.show', compact('loan'));
    }

    public function approve(Loan $loan)
    {
        $approved = Statement::where('status', 'approved')->first();
        $processing = Statement::where('status', 'processing')->first();

        if ($loan->statement_id == $processing->id) {
            $loan->statement_id = $approved->id;
            $loan->approval_date = Carbon::now();
            $loan->save();

        }

        $contract = new Contract;
        $loan->contract()->save($contract);

        $loan->user->notify(new LoanApprovedNotification($loan));

        return redirect(route('loan.show', $loan))->with('success', '¡Prestamo aprobado!');
    }

    public function decline(Loan $loan)
    {
        $processing = Statement::where('status', 'processing')->first();
        $declined = Statement::where('status', 'declined')->first();

        if ($loan->statement_id == $processing->id) {
            $loan->statement_id = $declined->id;
            $loan->save();
        }

        return redirect(route('loan.show', $loan))->with('danger', '¡Prestamo rechazado!');
    }

    public function disburse(Loan $loan)
    {
        $disbursed = Statement::where('status', 'disbursed')->first();
        $approved = Statement::where('status', 'approved')->first();
        if ($loan->statement_id == $approved->id && $loan->contract->confirmed) {
            $loan->statement_id = $disbursed->id;
            $loan->disbursement_date = Carbon::now();
            $loan->expiration_date = Carbon::now()->addMonths(3);
            $loan->save();
            ExpireLoan::dispatch($loan)->delay(now()->addMonth(3));
        }

        return redirect(route('loan.show', $loan))->with('success', 'Prestamo desembolsado correctamente');
    }

    /*public function payLoan(Loan $loan)
    {
        $status = Statement::where('status', 'paid')->first();
        $loan->statement_id = $status->id;
        $loan->save();

        return redirect(route('loan.show', compact('loan')))->with('success', 'Prestamo pagado correctamente');
    }*/

    public function expire(Loan $loan)
    {
        $disbursed = Statement::where('status', 'disbursed')->first();
        $expired = Statement::where('status', 'expired')->first();

        if ($loan->statement_id == $disbursed->id) {
            $loan->statement_id = $expired->id;
            $loan->save();
        }
    }

    public function report(Request $request)  {
        $statements = Statement::where('status', 'approved')->orWhere('status', 'disbursed')->orWhere('status', 'rejected')->orWhere('status', 'expired')->orWhere('status', 'paid')->orWhere('status', 'processing')->get();

        $query = Loan::query();

        if (filled($request->id)) {
            $query->ofId($request->id);
        }
        if (filled($request->dni)) {
            $query->ofRepresentativeDni($request->dni);
        }
        if (filled($request->startDate) && filled($request->endDate)) {
            $query->ofCreatedAtBetween($request->startDate, $request->endDate);
        }

        if (filled($request->statement)) {
            $query->ofStatement($request->statement);
        }
        $loans = $query->paginate(12);
        return view('loan.report',compact('loans','statements'));
    }

    public function export(Request $request)
    {
        $query = Loan::query();

        if (filled($request->id)) {
            $query->ofId($request->id);
        }
        if (filled($request->dni)) {
            $query->ofRepresentativeDni($request->dni);
        }
        if (filled($request->startDate) && filled($request->endDate)) {
            $query->ofCreatedAtBetween($request->startDate, $request->endDate);
        }

        if (filled($request->statement)) {
            $query->ofStatement($request->statement);
        }
        return Excel::download(new LoanExport($query), 'invoices.xlsx');
    }
}
