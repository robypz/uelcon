@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">Home</h1>
        </section>
        <section class="background-section background-section-2">
            <!-- Contenido de la segunda sección de fondo -->
        </section>
        <div class="content-container ">
            <div class="container">
                <div class="row">
                    <div class="col-3 mb-4"> <!-- Modifica aquí para que sean 2 cards en dispositivos pequeños -->
                        <a href="{{ route('loan.index') }}" class="card-link">
                            <div class="card">
                                <div class="card-body text-center">
                                    <i class="bi bi-wallet-fill"></i>
                                    <h5 class="card-title mt-2">Prestamos</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3 mb-4"> <!-- Modifica aquí para que sean 2 cards en dispositivos pequeños -->
                        <a href="{{ route('paymentMethod.index') }}" class="card-link">
                            <div class="card">
                                <div class="card-body text-center">
                                    <i class="bi bi-file-earmark-person-fill"></i>
                                    <h5 class="card-title mt-2">Referencias Personales</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3 mb-4"> <!-- Modifica aquí para que sean 2 cards en dispositivos pequeños -->
                        <a href="{{ route('client.representative.index') }}" class="card-link">
                            <div class="card">
                                <div class="card-body text-center">
                                    <i class="bi bi-person-vcard-fill"></i>
                                    <h5 class="card-title mt-2">Representante</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3 mb-4"> <!-- Modifica aquí para que sean 2 cards en dispositivos pequeños -->
                        <a href="{{ route('client.student.index') }}" class="card-link">
                            <div class="card">
                                <div class="card-body text-center">
                                    <i class="bi bi-backpack-fill"></i>
                                    <h5 class="card-title mt-2">Estudiante</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Cuadro de texto para mostrar datos en dispositivos pequeños -->
            <div class="container d-md-none"> <!-- Oculta en dispositivos de tamaño mediano o superior -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datos</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.</p>
                        <!-- Agrega aquí los mismos datos que aparecen en la tabla -->
                    </div>
                </div>
            </div>

            <!-- Tabla para mostrar datos en dispositivos medianos o superiores -->
            <div class="container d-none d-md-block"> <!-- Oculta en dispositivos pequeños -->
                <h2 class="mt-3 text-center">Actividad Reciente</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Monto</th>
                            <th scope="col">ESTATUS</th>
                            <th scope="col">OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loans as $loan)
                            <tr>
                                <td>{{ $loan->id }}</td>
                                <td>{{ $loan->gross_amount }}</td>
                                <td>{{ $loan->statement->status }}</td>
                                <td><a href="{{ route('loan.show', $loan) }}" class="btn btn-primary">Ver</a></td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
