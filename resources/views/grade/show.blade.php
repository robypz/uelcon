@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">Grado</h1>
            <div class="content-text m-4 text-end">
            </div>
        </section>
        <section class="background-section background-section-2">
            <!-- Contenido de la segunda sección de fondo -->
        </section>
        <div class="content-container ">
            <!-- Contenido principal -->
            <div class="">
                <div>
                    <div class="content ">
                        <div class="row">

                            <hr class="mb-4">
                            <div class="col">
                                <div class="form-outline mb-4">
                                    <label class="mb-2" for="">Nombre</label>
                                    <br>
                                    {{ $grade->grade }}
                                </div>
                            </div>

                        </div>
                        <div>
                            <h3 class="mb-2">Grados</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">SECCION</th>
                                        <th scope="col">OPCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grade->sections as $section)
                                        <tr>
                                            <th scope="row">{{ $section->id }}</th>
                                            <td>{{ $section->section }}</td>
                                            <td>
                                                <a href="{{ route('section.show', $section) }}" class="btn btn-ver"><i
                                                        class="bi bi-file-text"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        <div class="mt-5">
                            <div class="d-grid gap-2 d-md-flex justify-content-center">
                                <a href="{{ route('grade.show', $grade) }}" class="btn btn-dark w-100">Atras</a>
                                <a href="{{ route('grade.edit', $grade) }}" class="btn btn-warning w-100">Editar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
