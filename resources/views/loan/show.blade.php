@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">Detalles de Prestamo</h1>
        </section>
        <section class="background-section background-section-2">
            <!-- Contenido de la segunda sección de fondo -->
        </section>
        <div class="content-container ">
            <div class="content">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('danger'))
                    <div class="alert alert-danger">
                        {{ session('danger') }}
                    </div>
                @endif
                <div class="row">
                    <h3>Prestamo</h3>
                    <hr>
                    <div class="col-3">
                        <label class="mb-2" for="">Monto bruto:</label>
                        <p>{{ $loan->gross_amount }}</p>
                    </div>
                    <div class="col-3">
                        <label class="mb-2" for="">Monto neto:</label>
                        <p>{{ $loan->net_amount }}</p>
                    </div>
                    <div class="col-3">
                        <label class="mb-2" for="">Comision flat:</label>
                        <p>{{ $loan->flat_commission }}</p>
                    </div>
                    <div class="col-3">
                        <label class="mb-2" for="">Estatus:</label>
                        @switch($loan->statement->status)
                            @case('paid')
                                <span class="badge rounded-pill text-bg-success">pagado</span>
                            @break

                            @case('disbursed')
                                <span class="badge rounded-pill text-bg-info">Desembolsado</span>
                            @break

                            @case('rejected')
                                <span class="badge rounded-pill text-bg-danger">Rechazado</span>
                            @break

                            @case('approved')
                                <span class="badge rounded-pill text-bg-success">Aprovado</span>
                            @break

                            @case('processing')
                                <span class="badge rounded-pill text-bg-dark">Procesando</span>
                            @break

                            @case('expired')
                                <span class="badge rounded-pill text-bg-warning">Expirado</span>
                            @break

                            @default
                            @break
                        @endswitch
                    </div>
                    <div class="col-3">
                        <label class="mb-2" for="">Deuda: </label>
                        <p>{{ $loan->debt }}</p>
                    </div>
                    <div class="col-3">
                        <label class="mb-2" for="">Plazo:</label>
                        <p>{{ $loan->term }}</p>
                    </div>
                    <div class="col-3">
                        <label class="mb-2" for="">Fecha Desembolso:</label>

                        <p> {{ $loan->updated_at }}</p>
                    </div>
                </div>
                @if ($loan->contract)
                    <div class="row">
                        <h3>Contrato</h3>
                        <hr>
                        <div class="col-3">
                            <label class="mb-2" for="">Numero de contrato: </label>
                            <p>{{ $loan->contract->id }}</p>
                        </div>
                        @if ($loan->contract->confirmed)
                            <div class="col-3">
                                <label class="mb-2" for="">Estatus: </label>
                                <p class="badge rounded-pill text-bg-success">Confirmado</p>
                            </div>
                            <div class="col-3">
                                <label class="mb-2" for="">Fecha de confirmación: </label>
                                <p>{{ $loan->contract->confirmation_date }}</p>
                            </div>
                            <div class="col-3">
                                <p>Descargar:</p>
                                <a class="btn btn-outline-primary rounded-pill"><i class="bi bi-download"></i></a>
                            </div>
                        @else
                            <div class="col-3">
                                <label class="mb-2" for="">Estatus: </label>
                                <p class="badge rounded-pill text-bg-warning">Pendiente por confirmación</p>
                            </div>
                            <div class="col-3">
                                <p>Leer:</p>
                                <a class="btn btn-outline-primary rounded-pill"><i class="bi bi-eyeglasses"></i></a>
                            </div>
                        @endif


                    </div>
                @endif
                <div class="row">
                    <h3>Representante</h3>
                    <hr>

                    <div class="col-3">
                        <label class="mb-2" for="">Nombre y Apellido:</label>
                        <p>{{ $loan->user->representative->name }}&nbsp;{{ $loan->user->representative->surname }}</p>
                    </div>
                    <div class="col-3">
                        <label class="mb-2" for="">Cedula:</label>
                        <p>{{ $loan->user->representative->dni }}</p>
                    </div>
                    <div class="col-3">
                        <label class="mb-2" for="">Correo Electronico:</label>
                        <p>{{ $loan->user->representative->email->email }}</p>
                    </div>
                    <div class="col-3">
                        <label class="mb-2" for="">Telefono:</label>
                        <p>{{ $loan->user->representative->phone->phone }}</p>
                    </div>
                    <div class="col-3">
                        <label class="mb-2" for="">Direccion completa:</label>
                        <p>{{ $loan->user->representative->address->address }},
                            {{ $loan->user->representative->address->city
                                ? $loan->user->representative->address->city->city . ',' . $loan->user->representative->address->city->state->state
                                : $loan->user->representative->address->parish->parish .
                                    ', ' .
                                    $loan->user->representative->address->parish->township->township .
                                    ', ' .
                                    $loan->user->representative->address->parish->township->state->state }}.
                        </p>
                    </div>
                    @foreach ($loan->user->representative->socialMedia as $socialMedia)
                        <div class="col-3">
                            <label for="">{{ $socialMedia->name }}:</label>
                            <p> {{ $socialMedia->pivot->nick }} </p>

                        </div>
                    @endforeach

                </div>
                <div class="row">
                    <h3>Estudiante</h3>
                    <hr>
                    @foreach ($loan->user->students as $student)
                        <div class="col-3">
                            <label class="mb-2" for="">Nombre y Apellido:</label>
                            <p>{{ $student->name }}&nbsp;{{ $student->surname }}</p>
                        </div>
                        <div class="col-3">
                            <label class="mb-2" for="">Colegio :</label>
                            <p> {{ $student->section->grade->school->school }}</p>
                        </div>
                        <div class="col-3">
                            <label class="mb-2" for="">Grado :</label>
                            <p>{{ $student->section->grade->grade }}</p>
                        </div>
                        <div class="col-3">
                            <label class="mb-2" for="">Sección :</label>
                            <p>{{ $student->section->section }}</p>
                        </div>
                    @endforeach

                </div>


                <h2>Referencias Personales</h2>
                <hr>
                @foreach ($loan->user->personalReferences as $personalReference)
                    <div class="row">
                        <div class="col-3">
                            <label class="mb-2" for="">Nombre y Apellido:</label>
                            <p>{{ $personalReference->name }}&nbsp;{{ $personalReference->surname }}</p>
                        </div>
                        <div class="col-3">
                            <label class="mb-2" for="">Cedula : </label>
                            <p>{{ $personalReference->dni }}</p>
                        </div>
                        <div class="col-3">
                            <label class="mb-2" for="">Correo Electronico :</label>
                            <p>{{ $personalReference->email->email }}</p>
                        </div>
                        <div class="col-3">
                            <label class="mb-2" for="">Telefono :</label>
                            <p>{{ $personalReference->phone->phone }}</p>
                        </div>
                        <div class="col-6">
                            <label class="mb-2" for="">Dirección Completa :</label>

                            <p>{{ $personalReference->address->address }},
                                {{ $personalReference->address->city
                                    ? $personalReference->address->city->city . ',' . $personalReference->address->city->state->state
                                    : $personalReference->address->parish->parish .
                                        ', ' .
                                        $personalReference->address->parish->township->township .
                                        ', ' .
                                        $personalReference->address->parish->township->state->state }}.
                            </p>
                        </div>
                    </div>
                @endforeach

                @if ($loan->fees()->count() > 0)
                    <h2>Cuotas</h2>
                    @foreach ($loan->fees as $fee)
                        <div class="row">
                            <div class="col">
                                <label class="mb-2">ID</label>
                                <p>{{ $fee->id }}</p>
                            </div>
                            <div class="col">
                                <label class="mb-2">Estatus :</label>
                                <p>{{ $fee->statement->status }}</p>
                            </div>
                            <div class="col">
                                <label class="mb-2"> Monto Abonado:</label>
                                <p> {{ $fee->gross_amount }}</p>
                            </div>
                            <div class="col">
                                <label class="mb-2">Interés(3%) : </label>
                                <p>{{ $fee->interest_amount }}</p>
                            </div>
                            <div class="col">
                                <label class="mb-2">Monto pagado:</label>
                                <p> {{ $fee->net_amount }}</p>
                            </div>
                            <div class="col">
                                <label class="mb-2">Método de pago: </label>
                                <p>{{ $fee->payment->paymentMethod->payment_method }}</p>
                            </div>
                            <div class="col">
                                @if ($fee->payment->paymentMethod->payment_method == 'Zelle')
                                    <label class="mb-2">Correo:</label>
                                    <p>{{ $fee->payment->details['email'] }}</p>
                                    <label class="mb-2">ID de transacción:</label>
                                    <p>{{ $fee->payment->details['transaction_id'] }}</p>
                                @elseif ($fee->payment->paymentMethod->payment_method == 'Efectivo')
                                    <label class="mb-2">Imagen de efectivo:</label>
                                    <img src="{{ asset('storage/' . $fee->payment->details['cash_image']) }}"
                                        alt="" srcset="" width="64px">
                                @endif
                            </div>
                            <div class="col">
                                <label class="mb-2">Estatus del pago: </label>
                                <p>{{ $fee->payment->statement->status }}</p>
                            </div>
                            <div class="col d-flex align-items-center justify-content-center">
                                @if ($fee->statement->status == 'processing')
                                    <a href="{{ route('fee.successful', $fee) }}"
                                        class="btn btn-success w-100">Aceptar</a>
                                    <a href="{{ route('fee.reject', $fee) }}" class="btn btn-danger w-100">Rechazar</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif



                <div class="row">
                    <div class="col-12">
                        @switch($loan->statement->status)
                            @case('processing')
                                @role('admin|root')
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <a href="{{ route('loan.approve', $loan) }}" type="button"
                                            class="btn btn-success w-100">Aprobar</a>
                                        <a href="{{ route('loan.decline', $loan) }}" type="button"
                                            class="btn btn-danger w-100">Rechazar</a>
                                    </div>
                                @endrole
                            @break

                            @case('approved')
                                @role('admin|root')
                                    @if ($loan->contract->confirmed)
                                        <div class="col d-flex align-items-center justify-content-center">
                                            <a href="{{ route('loan.disburse', $loan) }}" type="button"
                                                class="btn btn-success w-100">Desembolsar</a>
                                        </div>
                                    @else
                                        <p class="alert alert-warning">Contrato pendiente por confirmación</p>
                                    @endif
                                @endrole
                            @break

                            @case('paid')
                                @role('admin|root')
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <a href="" type="button" class="btn btn-info w-100">Emitir Reporte</a>
                                    </div>
                                @endrole
                            @break

                            @case('expired')
                                @role('client')
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <a type="button" class="btn btn-success w-100">Abonar</a>
                                    </div>
                                @endrole
                            @break

                            @default
                        @endswitch

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
