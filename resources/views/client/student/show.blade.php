@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">Datos del Estudiante</h1>
            <div class="content-text m-4">
                <p class="text-center ">Lorem ipsum dolor sit amres animi numquam, hic quidem voluptatum, aliquam amet
                <p class="text-center ">Lorem iphic quidem voluptatum, aliquam amet
                    quas? Laboriosam.</p>
            </div>
        </section>
        <section class="background-section background-section-2">
            <!-- Contenido de la segunda sección de fondo -->
        </section>
        <div class="content-container-home ">
            <!-- Contenido principal -->
            <div class="">
                <div>
                    <div class="content ">
                                <div class="row">
                                    <h3 class="mb-2">Datos personales</h3>
                                    <hr class="mb-4">
                                    <div class="col-4">
                                        <div class="form-outline mb-4">
                                            <label class="mb-2" for="">Nombre</label>
                                            <br>
                                            {{ $student->name }}
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-outline mb-4">
                                            <label class="mb-2" for="">Apellido</label>
                                            <br>
                                            {{ $student->birthday }}

                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-outline mb-4">
                                            <label class="mb-2" for="">Apellido</label>
                                            <br>
                                            {{ $student->surname }}

                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label class="mb-2" for="">Escuela</label>
                                        <br>
                                        {{$student->section->grade->school->school}}                                    </div>
                                    <div class="col-4">
                                        <div class="form-outline mb-4">
                                            <label class="mb-2" for="">Grado</label>
                                            <br>
                                            {{$student->section->grade->grade}}
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-outline mb-4">
                                            <label class="mb-2" for="">Sección</label>
                                            <br>
                                            {{$student->section->section}}
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <div class="d-grid gap-2 d-md-flex justify-content-center">
                                            <a href="{{route('client.student.edit',$student)}}" class="btn btn-warning w-100">Editar</a>
                                            <a href="{{route('client.student.destroy',$student)}}" class="btn btn-danger w-100">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
