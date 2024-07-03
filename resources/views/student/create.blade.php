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
            <div class="content ">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('student.store') }}" method="POST">
                    @csrf

                    <div class="formbold-form-step-1 active">
                        <h3 class="mb-2">Datos Estudiante</h3   >
                        <hr class="mb-4">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-outline mb-4">
                                    <label class="mb-2" for="">Nombre</label>

                                    <input type="text" id="form2Example1" placeholder="Nombre" class="form-control"
                                        name="name" />
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-outline mb-4">
                                    <label class="mb-2" for="">Apellido</label>
                                    <input type="text" id="form2Example1" placeholder="Apellido" class="form-control"
                                        name="surname" />
                                    @error('surname')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-outline mb-4">
                                    <label class="mb-2" for="birthday">Fecha de nacimiento</label>
                                    <input type="date" id="form2Example1" id="birthday" placeholder="Fecha de nacimiento" class="form-control"
                                        name="birthday"/>
                                    @error('birthday')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="mb-2" for="">Escuela</label>
                                <select class="form-select" aria-label="Default select example" id="school_id" name="school_id">
                                    <option selected>School</option>
                                    @foreach ($schools as $school)
                                        <option value="{{ $school->id }}">{{ $school->school }}</option>
                                    @endforeach
                                    @error('school_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </select>

                            </div>
                            <div class="col-4">
                                <label class="mb-2" for="">Grado</label>
                                <select class="form-select" aria-label="Default select example" id="grade_id" disabled
                                    name="grade_id">
                                    <option selected>Grado</option>
                                </select>
                                @error('grade_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-4">
                                <label class="mb-2" for="">Seccion</label>
                                <select class="form-select" aria-label="Default select example" id="section_id" disabled
                                    name="section_id">
                                    <option selected>Seccion</option>
                                </select>
                                @error('section_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-5">
                                <div class="d-grid gap-2 d-md-flex justify-content-center">
                                    <button type="button" class="btn btn-danger btn-sm w-100">Cancelar</button>
                                    <button type="submit" class="btn btn-success btn-sm w-100">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
