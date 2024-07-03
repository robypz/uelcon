<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Statement;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }

    public function successfullPayment(Payment $payment)
    {
        $status = Statement::where('status', 'successful')->first();
        $payment->statement_id = $status->id;
        $payment->save();

        return redirect(route(null, compact('payment')))->with('success', 'Pago exitoso');
    }

    public function refusePayment(Payment $payment)
    {
        $status = Statement::where('status', 'refused')->first();
        $payment->statement_id = $status->id;
        $payment->save();

        return redirect(route(null, compact('payment')))->with('danger', 'Pago rechazado');
    }
}
