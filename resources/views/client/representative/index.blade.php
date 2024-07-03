@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">Representante</h1>
            <div class="content-text m-4">
            </div>
        </section>
        <section class="background-section background-section-2">
            <!-- Contenido de la segunda sección de fondo -->
        </section>
        <div class="content-container ">
            <div class="container mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">APELLIDO</th>
                            <th scope="col">CEDULA</th>
                            <th scope="col">OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <th scope="row">{{ $representative->id }}</th>
                            <td>{{ $representative->name }}</td>
                            <td>{{ $representative->surname }}</td>
                            <td>{{ $representative->dni }}</td>
                            <td>
                                <a href="{{ route('client.representative.show', $representative) }}" class="btn btn-ver"><i
                                        class="bi bi-file-text"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
@endsection
