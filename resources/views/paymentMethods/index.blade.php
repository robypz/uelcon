@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">MÉTODOS DE PAGO</h1>
        </section>
        <section class="background-section background-section-2">
            <!-- Contenido de la segunda sección de fondo -->
        </section>
        <div class="content-container ">
            <!-- Cuadro de texto para mostrar datos en dispositivos pequeños -->
            <div class="container d-lg-none"> <!-- Oculta en dispositivos de tamaño mediano o superior -->

                @foreach ($paymentMethods as $paymentMethod)
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">ID: {{ $paymentMethod->id }}</h5>
                                    <p class="card-text">MÉTODO DE PAGO: {{ $paymentMethod->payment_method }}</p>
                                    <p class="card-text">MONEDA: {{ $paymentMethod->currency->currency }}</p>
                                    <a href="{{ route('paymentMethod.show', $paymentMethod) }}" class="btn btn-ver">Ver detalles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

            <!-- Tabla para mostrar datos en dispositivos medianos o superiores -->
            <div class="container d-none d-lg-block"> <!-- Oculta en dispositivos pequeños -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">MÉTODO DE PAGO</th>
                            <th scope="col">MONEDA</th>
                            <th scope="col">Optiones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paymentMethods as $paymentMethod)
                            <tr>
                                <th scope="row">{{ $paymentMethod->id }}</th>
                                <td>{{ $paymentMethod->payment_method }}</td>
                                <td>{{ $paymentMethod->currency->currency }}</td>
                                <td><a href="{{ route('paymentMethod.show', $paymentMethod) }}" class="btn btn-ver btn-sm"><i
                                            class="bi bi-eye-fill"></i></a></td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>

            {{ $paymentMethods->links() }}
        </div>
    </div>
@endsection
