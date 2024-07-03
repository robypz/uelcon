@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">ABONAR PRESTAMO</h1>
        </section>
        <section class="background-section background-section-2">
            <!-- Contenido de la segunda sección de fondo -->
        </section>
        <div class="content-container ">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('fee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" hidden name="loan_id">
            <label for="amount" class="form-label">Monto</label>
            <input type="text" name="loan_id" value="{{ $loan->id }}" hidden>
            <input class="form-control mb-3" id="amount" type="number" name="amount" step="0.01" min="0.01"
                placeholder="{{ $loan->debt + ($loan->debt*($interest/100)) }}" max="{{ $loan->debt + ($loan->debt*($interest/100)) }}" min="0.01">
            <input type="number" name="gross_amount" step="0.01" min="0" max="{{ $loan->debt + ($loan->debt*($interest/100)) }}"
                id="gross_amount" class="form-control mb-3" >
            <input type="number" name="interest_amount" step="0.01" min="0" max="{{ $loan->debt * $interest }}"
                id="interest_amount" class="form-control mb-3" >
            <input type="number" name="net_amount" step="0.01" min="0"
                max="{{ $loan->debt + ( $loan->debt * ($interest/100)) }}" id="net_amount" class="form-control mb-3">

            <label for="">Método de pago</label>
            @foreach ($paymentMethods as $paymentMethod)
                <div class="form-check">
                    <input class="form-check-input payment-method" type="radio" name="payment_method_id"
                        id="payment-{{ $paymentMethod->id }}" value="{{ $paymentMethod->id }}">
                    <label class="form-check-label" for="payment-{{ $paymentMethod->id }}">
                        {{ $paymentMethod->payment_method }}
                    </label>
                </div>
            @endforeach
            @foreach ($paymentMethods as $paymentMethod)
                @if ($paymentMethod->payment_method == 'Zelle')
                    <div class="payment-form d-none" id="payment-form-{{ $paymentMethod->id }}">
                        <label for="zelle-email" class="form-label">Correo</label>
                        <input type="email" name="email" id="zelle-email" class="form-control mb-3">
                        <label for="transaciontion_id" class="form-label">Código de Transacción</label>
                        <input type="text" name="transaction_id" id="transaciontion_id"
                            class="form-control mb-3">
                    </div>
                @endif
                @if ($paymentMethod->payment_method == 'Efectivo')
                    <div class="payment-form d-none" id="payment-form-{{ $paymentMethod->id }}">
                        <label for="zelle-email" class="form-label">Imagen Efectivo</label>
                        <input type="file" name="cash_image" id="cash_image" class="form-control mb-3">

                    </div>
                @endif
            @endforeach
            <div class="text-end mb-3">
                <div>Interes({{$interest}}%):&nbsp;<span id="interest"></span>&nbsp;USD</div>
                <div>Monto total del pago:&nbsp;<span id="net"></span>&nbsp;USD</div>
            </div>
            <input type="submit" value="Abonar" class="btn btn-primary d-block my-0 mx-auto w-100">
        </form>

        </div>
        <script>
            const amount = document.getElementById('amount');
            const gross_amount = document.getElementById('gross_amount');
            const interest_amount = document.getElementById('interest_amount');
            const net_amount = document.getElementById('net_amount');
            amount.addEventListener('input', () => {
                var value = parseFloat(amount.value);
                var interest = {{$loan->debt}} * {{$interest/100}} ;
                var net = value - interest;
                document.getElementById('interest').innerHTML = interest.toFixed(2);
                document.getElementById('net').innerHTML = net.toFixed(2);

                gross_amount.value = value.toFixed(2);
                interest_amount.value = interest.toFixed(2);
                net_amount.value = net.toFixed(2);
            });

            const payment_methods = document.querySelectorAll('.payment-method');

            payment_methods.forEach(function(payment_method) {
                payment_method.addEventListener('change', function(event) {
                    var other_forms = document.getElementsByClassName('payment-form');
                    for (var i = 0; i < other_forms.length; i++) {
                        other_forms[i].classList.add('d-none');
                    }
                    const payment_form = document.getElementById('payment-form-' + payment_method.value);
                    if (payment_form) {
                        payment_form.classList.remove('d-none');

                    }
                });
            });
        </script>

    </div>
@endsection
