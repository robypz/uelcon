@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">Escuela</h1>
            <div class="content-text m-4">
            </div>
        </section>
        <section class="background-section background-section-2">
            <!-- Contenido de la segunda sección de fondo -->
        </section>
        <div class="content-container ">
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
                <form action="{{ route('client.student.update', $school) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="formbold-form-step-1 active">
                        <h3>Datos de la escuela</h3>
                        <div class="row">
                            <div class="col">
                                <div class="form-outline mb-4">
                                    <label class="mb-2" for="">Nombre</label>
                                    <input type="text" id="form2Example1" placeholder="Nombre" class="form-control"
                                        name="school" value="{{ $school->school }}" />
                                    @error('school')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-5">
                                <div class="d-grid gap-2 d-md-flex justify-content-center">
                                    <a href="{{route('school.index')}}" type="button" class="btn btn-dark btn-sm w-100">Cancelar</a>
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
