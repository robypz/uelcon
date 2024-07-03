@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">Estudiantes</h1>
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
                    <th scope="col">Nombre y Apellido</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <th scope="row">{{$student->id}}</th>
                    <td>{{$student->name}}&nbsp;{{$student->surname}}</td>
                    <td>
                        <a href="{{route('client.student.show',$student)}}" class="btn btn-ver"><i class="bi bi-file-text"></i></a>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>


            </div>


        </div>
    </div>
@endsection
