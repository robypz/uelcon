<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeeRequest;
use App\Models\Fee;
use App\Models\Loan;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Statement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SebastianBergmann\Diff\Diff;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Loan $loan)
    {
        if (UserService::checkIfModelBelongsToUser($loan) && ($loan->statement->status == 'disbursed' | $loan->statement->status == 'expired')) {

            $diff = Carbon::parse($loan->disbursement_date)->diffInDays(Carbon::now());

            if ($diff<30) {
                $interest = 1;
            }
            elseif ($diff>30 && $diff <60) {
                $interest = 2;
            }
            else {
                $interest = 3;
            }

            $paymentMethods = PaymentMethod::all('id', 'payment_method');
            return view('fee.create', compact('loan', 'paymentMethods','interest'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeeRequest $request)
    {
        $statement = Statement::where('status', 'processing')->first();

        $fee = new Fee;
        $fee->loan_id = $request->loan_id;
        $fee->gross_amount = $request->gross_amount;
        $fee->interest_amount = $request->interest_amount;
        $fee->net_amount = $request->net_amount;
        $fee->statement_id = $statement->id;
        $fee->save();
        $fee->payment()->save($this->payFee($request));

        return redirect()->route('client.loan.show', $request->loan_id)->with('success', '¡Cuota pagada con exito!');
    }

    private function payFee(FeeRequest $request): Payment
    {
        $paymentMethod = PaymentMethod::find($request->payment_method_id);
        $statement = Statement::where('status', 'processing')->first();

        if ($paymentMethod->payment_method == 'Zelle') {
            $data =  $this->zelle($request);
        } elseif ($paymentMethod->payment_method == 'Efectivo') {
            $data = $this->cash($request);
        }

        $payment = new Payment;
        $payment->payment_method_id = $request->payment_method_id;
        $payment->details = $data;
        $payment->statement_id = $statement->id;
        return $payment;
    }

    private function zelle(FeeRequest $request)
    {
        return [
            'email' => $request->email,
            'transaction_id' => $request->transaction_id,
        ];
    }

    private function cash(FeeRequest $request)
    {
        return [
            'cash_image' => $request->file('cash_image')->store('', 'public'),
        ];
    }

    public function reject(Fee $fee)
    {
        if ($fee->statement->status == 'processing') {
            $statement = Statement::where('status', 'rejected')->first();

            $fee->statement_id = $statement->id;
            $fee->save();

            $fee->payment->statement_id = $statement->id;
            $fee->payment->save();

            return redirect(route('loan.show', $fee->loan_id))->with('danger', '¡Cuota rechazada!');
        }
    }

    public function successful(Fee $fee)
    {
        if ($fee->statement->status == 'processing') {
            $statement = Statement::where('status', 'successful')->first();

            $fee->statement_id = $statement->id;
            $fee->save();

            $fee->payment->statement_id = $statement->id;
            $fee->payment->save();

            $fee->loan->debt -= $fee->net_amount;
            $fee->loan->save();

            if ($fee->loan->debt == 0) {
                $statement = $statement = Statement::where('status', 'paid')->first();
                $fee->loan->statement_id = $statement->id;
                $fee->loan->save();
                $this->comparePaymentDateWithExpirationDate($fee->loan->expiration_date, $fee->payment->created_at,$fee->loan);
            }

            return redirect(route('loan.show', $fee->loan_id))->with('success', '¡Cuota aceptada!');
        }
    }

    private function comparePaymentDateWithExpirationDate($expirationDate, $paymentDate,$loan)
    {
        $expirationDate = Carbon::parse($expirationDate);
        $paymentDate = Carbon::parse($paymentDate);

        $days = $paymentDate->diffInDays($expirationDate);

        if ($days > 60) {
            UserService::setLevel('Diamante',$loan->user_id);
        } elseif ($days > 30) {
            UserService::setLevel('Oro',$loan->user_id);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Fee $fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fee $fee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, fee $fee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fee $fee)
    {
        //
    }
}
