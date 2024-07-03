<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ Vite::asset('resources/images/imagotipo.svg') }}" type="image/x-icon">



    <!-- Scripts -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand me-0" href="{{ route('home') }}">
                <img class="logo-nav" src="{{ Vite::asset('resources/images/imagotipolateral.svg') }}"
                    alt="Logo de la empresa">
            </a>
            <button class="navbar-toggler me-0 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Inicio</a>
                    </li>
                    @role('admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('loan.index') }}">Prestamos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Colegios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('representative.index') }}">Representantes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('personalReference.index') }}">Referencias Personales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.index') }}">Estudiante</a>
                        </li>
                    @endrole
                    @role('client')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('client.loan.index') }}">Prestamos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('client.representative.index') }}">Representantes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('client.personalReference.index') }}">Referencias
                                Personales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('client.student.index') }}">Estudiante</a>
                        </li>
                    @endrole
                    @role('root')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('loan.index') }}">Prestamos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.index') }}">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('paymentMethod.index') }}">Metodos de Pago</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('currency.index')}}">Moneda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('school.index') }}">Colegios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('representative.index') }}">Representantes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('personalReference.index') }}">Referencias Personales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.index') }}">Estudiante</a>
                        </li>
                    @endrole
                    @auth
                        <li class="nav-item">
                            <a class="nav-link bg-primary capsula p-2 fs-6" href="#"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Cerrar
                                Sesión&nbsp;<i class="bi bi-box-arrow-right"></i></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <br>
    <br>
    <br>

    <main class="container-fluid">
        @yield('content')
    </main>
</body>

</html>
