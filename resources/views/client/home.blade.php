@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">Inicio</h1>
            <div class="content-text m-2">
                <p class="text-center lead">Bienvenido,
                    <b>{{ auth()->user()->representative->name }}&nbsp;{{ auth()->user()->representative->surname }}</b>
                </p>
            </div>
        </section>
        <section class="background-section background-section-2">
            <!-- Contenido de la segunda sección de fondo -->
        </section>
        <div class="content-container">
            <div class="container">
                <div class="row">
                    @if ($level)
                        <div class="col-12 col-sm-6 col-md-4 mb-4">
                            <!-- Modifica aquí para que sean 2 cards en dispositivos pequeños -->
                            <a href="#" class="card-link text-decoration-none">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="row flex-row justify-content-center d-md-row">
                                            <div class="col-12 col-md-8 d-flex align-items-center">
                                                <div>
                                                    <p><b>Nivel Actual:</b> {{ $level->name }}</p>
                                                    <p><b>Bonus:</b> {{ $level->increase }}%</p>
                                                    <p><b>Monto máximo:</b>{{ $amount }}$</p>
                                                </div>

                                            </div>
                                            <div
                                                class="col col-6 col-md-4 d-flex justify-content-center align-items-center">
                                                @if ($level->name == 'Diamante')
                                                    <img src="{{ Vite::asset('resources/images/rango-diamante.svg') }}"
                                                        alt="" srcset="">
                                                @else
                                                    <img src="{{ Vite::asset('resources/images/rango-oro.svg') }}"
                                                        alt="" srcset="">
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif

                    <div class="col-3 col-md-4  mb-4"> <!-- Modifica aquí para que sean 2 cards en dispositivos pequeños -->
                        <a href="{{ route('loan.create') }}" class="card-link text-decoration-none">
                            <div class="card h-100">
                                <div class="card-body text-center d-flex align-items-center justify-content-center">
                                    <div>
                                        <i class="bi bi-send-fill"></i>
                                        <h5 class="card-title mt-2">Solicitar Prestamo</h5>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3 col-md-4  mb-4"> <!-- Modifica aquí para que sean 2 cards en dispositivos pequeños -->
                        <a href="{{ route('client.loan.index') }}" class="card-link text-decoration-none">
                            <div class="card h-100">
                                <div class="card-body text-center d-flex align-items-center justify-content-center">
                                    <div>
                                        <i class="bi bi-wallet-fill"></i>
                                        <h5 class="card-title mt-2">Mis Prestamos</h5>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3 col-md-4  mb-4"> <!-- Modifica aquí para que sean 2 cards en dispositivos pequeños -->
                        <a href="{{ route('client.representative.index') }}" class="card-link text-decoration-none">
                            <div class="card h-100">
                                <div class="card-body text-center d-flex align-items-center justify-content-center">
                                    <div>
                                        <i class="bi bi-person-vcard-fill"></i>
                                        <h5 class="card-title mt-2">Representante</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3 col-md-4  mb-4"> <!-- Modifica aquí para que sean 2 cards en dispositivos pequeños -->
                        <a href="{{ route('client.student.index') }}" class="card-link text-decoration-none">
                            <div class="card h-100">
                                <div class="card-body text-center d-flex align-items-center justify-content-center">
                                    <div>
                                        <i class="bi bi-backpack-fill"></i>
                                        <h5 class="card-title mt-2">Estudiante</h5>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3 col-md-4  mb-4"> <!-- Modifica aquí para que sean 2 cards en dispositivos pequeños -->
                        <a href="{{ route('client.personalReference.index') }}" class="card-link text-decoration-none">
                            <div class="card h-100">
                                <div class="card-body text-center d-flex align-items-center justify-content-center">
                                    <div>
                                        <i class="bi bi-file-earmark-person-fill"></i>
                                        <h5 class="card-title mt-2">Referencias Personales</h5>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Cuadro de texto para mostrar datos en dispositivos pequeños -->
            <div class="container d-md-none">
                <h2 class="text-center">Actividad Reciente</h2> <!-- Oculta en dispositivos de tamaño mediano o superior -->
                @if ($loan)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Prestamo</h5>
                            <p><b>ID:&nbsp;</b>{{ $loan->id }}</p>
                            <p><b>Deuda:&nbsp;</b>{{ $loan->debt }}</p>
                            <p><b>Estatus:&nbsp;</b>{{ $loan->statement->status }}</p>
                            <div class="text-end">
                                <a href="{{ route('fee.create', $loan) }}" class="btn btn-primary">Abonar</a>
                            </div>
                        </div>
                    </div>
                @endif

            </div>

            <!-- Tabla para mostrar datos en dispositivos medianos o superiores -->
            <div class="container d-none d-md-block"> <!-- Oculta en dispositivos pequeños -->
                <h2 class="text-center">Actividad Reciente</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID PRESTAMO</th>
                            <th scope="col">DEUDA</th>
                            <th scope="col">ESTATUS</th>
                            <th scope="col">OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($loan)
                            <tr>
                                <td>{{ $loan->id }}</td>
                                <td>{{ $loan->debt }}</td>
                                <td>{{ $loan->statement->status }}</td>
                                <td><a href="{{ route('fee.create', $loan) }}" class="btn btn-primary">Abonar</a></td>

                            </tr>
                        @endif


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
