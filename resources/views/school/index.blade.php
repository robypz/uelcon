@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">Colegios</h1>
            <div class="content-text m-4">
            </div>
        </section>
        <section class="background-section background-section-2">

        </section>
        <div class="content-container-home ">
            <div class="text-end">
                <a href="{{route('school.create')}}" type="buttom" class="btn btn-primary">Agregar <i class="bi bi-plus"></i></a>
            </div>
            <div class="container mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre y Apellido</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schools as $school)
                            <tr>
                                <th scope="row">{{ $school->id }}</th>
                                <td>{{ $school->school }}</td>
                                <td>
                                    <a href="{{ route('school.show', $school) }}" class="btn btn-ver"><i
                                            class="bi bi-file-text"></i></a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>


            </div>


        </div>
    </div>
@endsection
