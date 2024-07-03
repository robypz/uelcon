@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">Referencias Personales</h1>
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
                            <th scope="col">Nombre y Apellido</th>
                            <th scope="col">CEDULA</th>
                            <th scope="col">TIPO</th>
                            <th scope="col">OPCIONES</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personalReferences as $personalReference)
                            <tr>
                                <th scope="row">{{ $personalReference->id }}</th>
                                <td>{{ $personalReference->name }}&nbsp;{{ $personalReference->surname }}</td>
                                <td>{{ $personalReference->dni }}</td>
                                <td>{{ $personalReference->personalReferenceType->name }}</td>
                                <td>
                                    <a href="{{ route('client.personalReference.show', $personalReference) }}"
                                        class="btn btn-ver"><i class="bi bi-file-text"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>


        </div>
    </div>
@endsection
