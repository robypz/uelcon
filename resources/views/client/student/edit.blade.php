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
                <form action="{{ route('client.student.update',$student) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="formbold-form-step-1 active">
                        <h3>Datos Personales</h3>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-outline mb-4">
                                    <label class="mb-2" for="">Nombre</label>
                                    <input type="text" id="form2Example1" placeholder="Nombre" class="form-control"
                                        name="name" value="{{$student->name}}" />
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-outline mb-4">
                                    <label class="mb-2" for="">Apellido</label>
                                    <input type="text" id="form2Example1" placeholder="Apellido" class="form-control"
                                        name="surname" value="{{$student->surname}}" />
                                    @error('surname')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <label class="mb-2" for="">Escuela</label>
                                    <select class="form-select" aria-label="Default select example" id="school_id" name="school_id" value="{{$student->section->grade->school_id}}">
                                    <option selected>School</option>
                                    @foreach ($schools as $school)
                                        @if ($school->id == $student->section->grade->school_id)
                                        <option value="{{ $school->id }}" selected>{{ $school->school }}</option>
                                        @else
                                        <option value="{{ $school->id }}">{{ $school->school }}</option>
                                        @endif
                                    @endforeach
                                    @error('school_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </select>

                            </div>
                            <div class="col-3">
                                <label class="mb-2" for="">Grado</label>

                                <select class="form-select" aria-label="Default select example" id="grade_id"
                                    name="grade_id">
                                    <option value="{{ $student->section->grade_id }}" selected>{{ $student->section->grade->grade }}</option>
                                </select>
                                @error('grade_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-3">
                                <label class="mb-2" for="">Sección</label>

                                <select class="form-select" aria-label="Default select example" id="section_id"
                                    name="section_id">
                                    <option value="{{ $student->section->id }}" selected>{{ $student->section->section }}</option>
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

        </div>
    </div>
@endsection
