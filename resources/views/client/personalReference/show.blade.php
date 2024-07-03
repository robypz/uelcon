@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">Datos de referencia personal</h1>
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

                        <form action="{{ route('personalReference.store') }}" method="POST">
                            @csrf
                            <div class="formbold-form-step-1 active ">
                                <div class="row">
                                    <h3 class="mb-2">Datos personales</h3>
                                    <hr class="mb-4">
                                    <div class="col-4">
                                        <div class="form-outline mb-4">
                                            <label class="mb-2" for="">Nombre</label>
                                            <br>
                                            {{ $personalReference->name }}
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-outline mb-4">
                                            <label class="mb-2" for="">Apellido</label>
                                            <br>
                                            {{ $personalReference->surname }}

                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label class="mb-2" for="">Tipo de Representante</label>
                                        <br>
                                        {{ $personalReference->personalReferenceType->personalReference_type }}
                                    </div>
                                    <div class="col-4">
                                        <div class="form-outline mb-4">
                                            <label class="mb-2" for="">Cédula de identidad </label>
                                            <br>
                                            {{ $personalReference->dni }}
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-outline mb-4">
                                            <label class="mb-2" for="">Número telefónico</label>
                                            <br>
                                            {{ $personalReference->phone->phone }}
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-outline mb-4">
                                            <label class="mb-2" for="">Correo electrónico</label>
                                            <br>
                                            {{ $personalReference->email->email }}
                                        </div>
                                    </div>
                                    {{-- <h3 class="mb-2">Redes sociales</h3>
                                    <hr class="mb-4">
                                    redes sociales
                                    @foreach ($socialMedias as $socialMedia)
                                        <div class="col-4">
                                            <input type="text" name="socialMedias[{{ $socialMedia->id }}][id]"
                                                value="{{ $socialMedia->id }}" hidden>
                                            <div class="form-outline mb-4">
                                                <label class="mb-2"
                                                    for="social_media_{{ $socialMedia->id }}">{{ $socialMedia->name }}</label>
                                                <input type="text" id="social_media_{{ $socialMedia->id }}"
                                                    placeholder="{{ $socialMedia->name }}" class="form-control"
                                                    name="socialMedias[{{ $socialMedia->id }}][nick]"
                                                    value="{{ old('socialMedias.' . $socialMedia->id . '.nick') }}" />
                                                @error('socialMedias.' . $socialMedia->id . '.nick')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach --}}
                                    <h3 class="mb-2">Ubicación</h3>
                                    <hr class="mb-4">
                                    <div class="col-4">
                                        <label class="mb-2" for="">Estado</label>
                                        <br>
                                        {{ $personalReference->address->parish ? $personalReference->address->parish->township->state->state : $personalReference->address->city->state->state }}
                                    </div>
                                    <div class="col-4">
                                        <label class="mb-2" for="">Municipio</label>
                                        <br>
                                        {{ $personalReference->address->parish ? $personalReference->address->parish->township->township : null }}
                                    </div>
                                    <div class="col-4">
                                        <label class="mb-2" for="">Parroquia</label>
                                        <br>
                                        {{ $personalReference->address->parish ? $personalReference->address->parish : null }}

                                    </div>
                                    <div class="col-4 mt-2">
                                        <label class="mb-2" for="">Ciudad</label>
                                        <br>
                                        {{ $personalReference->address->city ? $personalReference->address->city->city : null }}
                                    </div>
                                    <div class="col-4 mt-2">
                                        <label class="mb-2" for="">Dirección Exacta</label>
                                        <br>
                                        {{ $personalReference->address->address }}
                                    </div>
                                    <div class="col-4">
                                        <div class="form-outline mb-4 mt-2">
                                            <label class="mb-2" for="">Punto de Referencia</label> <br>
                                            {{ $personalReference->address->reference_place }}
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <div class="d-grid gap-2 d-md-flex justify-content-center">
                                            <a href="{{ route('client.personalReference.edit', $personalReference) }}"
                                                class="btn btn-warning w-100">Editar</a>
                                            <a href="{{ route('client.personalReference.destroy', $personalReference) }}"
                                                class="btn btn-danger w-100">Eliminar</a>
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
