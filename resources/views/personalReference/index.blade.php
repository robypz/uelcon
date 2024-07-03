@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">Referencias Personales</h1>
            <div class="content-text m-4">
            </div>
        </section>
        <section class="background-section background-section-2">
            <!-- Contenido de la segunda sección de fondo -->
        </section>
        <div class="content-container-home ">
            <div class="container mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">REPRESENTANTE</th>
                            <th scope="col">NOMBRE Y APELLIDO</th>
                            <th scope="col">CEDULA</th>
                            <th scope="col">OPCIONES</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personalReferences as $personalReference)
                            <tr>
                                <th scope="row">{{ $personalReference->id }}</th>
                                <td>{{$personalReference->user->representative->name}}&nbsp;{{$personalReference->user->representative->surname}}</td>
                                <td>{{ $personalReference->name }}&nbsp;{{ $personalReference->surname }}</td>
                                <td>{{ $personalReference->dni }}</td>
                                <td>
                                    <a href="{{ route('client.personalReference.show', $personalReference) }}"
                                        class="btn btn-ver"><i class="bi bi-file-text"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        {{ $personalReferences->links() }}
                    </tfoot>
                </table>

            </div>


        </div>
    </div>
@endsection
