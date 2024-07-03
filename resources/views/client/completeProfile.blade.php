@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">Completar perfil</h1>
        </section>
        <section class="background-section background-section-2">
            <!-- Contenido de la segunda sección de fondo -->
        </section>
        <div class="content-container">
            <!-- Contenido principal -->
            <div class=" ">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <ul class="list-unstyled">
                    @if ($representatives >= 1)
                        <div class="alert alert-success">
                            Datos Personales Completados con exito
                        </div>
                    @else
                        <li class="li-home">
                            <div class="link-container">
                                <a class="" href="{{ route('representative.create') }}">
                                    Representantes ({{ $representatives }} de 1)
                                </a>
                                <i class="bi bi-pencil-square"></i>
                            </div>
                        </li>
                    @endif
                    @if ($students >= 1)
                        <div class="alert alert-success">
                            Estudiante cargado con exito
                        </div>
                    @else
                        <li class="li-home">
                            <div class="link-container">
                                <a href="{{ route('student.create') }}">
                                    Estudiantes({{ $students }} de 1)
                                </a>
                                <i class="bi bi-pencil-square"></i>
                            </div>
                        </li>
                    @endif
                    @if ($personalReferences >= 4)
                        <div class="alert alert-success">
                            Referencias personales cargadas con exito
                        </div>
                    @else
                        <li class="li-home">
                            <div class="link-container">
                                <a class="" href="{{ route('personalReference.create') }}">
                                    Personales({{ $personalReferences }} de 4)
                                </a>
                                <i class="bi bi-pencil-square"></i>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
