@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">Solicitar Prestamo <i class="bi bi-bank"></i></h1>
        </section>
        <section class="background-section background-section-2">
            <!-- Contenido de la segunda sección de fondo -->
        </section>
        <div class="content-container ">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('alert'))
                <div class="alert alert-warning">
                    {{ session('alert') }}
                </div>
            @endif
            <form action="{{ route('loan.store') }}" method="POST">
                @csrf
                <label for="amount" class="form-label">
                    <h3>Monto</h3>
                </label>
                <input type="range" class="form-range mb-3" id="amount" min="100" max="{{ $amount }}"
                    step="1.00">
                <label for="term">
                    <h3>Plazo de pago</h3>
                </label>
                <input type="range" class="form-range" id="term" name="term" min="1" max="3"
                    step="1" required>

                <input type="number" id="flat_commission" name="flat_commission" step="0.01" hidden>
                <input type="number" id="gross_amount" name="gross_amount" step="0.01" hidden>
                <input type="number" id="net_amount" name="net_amount" step="0.01" hidden>
                <div class="text-end fw-bold">
                    Monto solicitado:&nbsp;<span id="gross">0.00</span>
                </div>
                <div class="text-end fw-bold">
                    Plazo de pago:&nbsp;<span id="month">1</span>&nbsp;Mes(es)
                </div>
                <div class="text-end">
                    Comisión Flat (3%):&nbsp;<span id="flat">0.00</span>
                </div>
                <div class="text-end">
                    Interés Mensual (<span id="monthly_interest">1</span>%):&nbsp;<span id="interest_amount">0.00</span>
                </div>
                <div class="text-end fw-bold">
                    Total a pagar:&nbsp;<span id="net">0.00</span>
                </div>
                <div class="mt-5">
                    <div class="d-grid gap-2 d-md-flex justify-content-center">

                        <input type="submit" value="Solicitar" class="btn btn-primary btn-sm w-100">
                    </div>
                </div>


                @if ($errors->any())
                    <div class="alert alert-danger my-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </form>

        </div>
    </div>
@endsection
