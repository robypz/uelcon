@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">Datos del Representante</h1>
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
                        <div class="formbold-form-step-1 active ">
                            <div class="row">
                                <h3 class="mb-2">Datos personales</h3>
                                <hr class="mb-4">
                                <div class="col-4">
                                    <div class="form-outline mb-4">
                                        <label class="mb-2" for="">Nombre</label>
                                        <br>
                                        {{ $representative->name }}
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-outline mb-4">
                                        <label class="mb-2" for="">Apellido</label>
                                        <br>
                                        {{ $representative->surname }}

                                    </div>
                                </div>
                                <div class="col-4">
                                    <label class="mb-2" for="">Tipo de Representante</label>
                                    <br>
                                    {{ $representative->representativeType->representative_type }}
                                </div>
                                <div class="col-4">
                                    <div class="form-outline mb-4">
                                        <label class="mb-2" for="">Cédula de identidad </label>
                                        <br>
                                        {{ $representative->dni }}
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-outline mb-4">
                                        <label class="mb-2" for="">Número telefónico</label>
                                        <br>
                                        {{ $representative->phone->phone }}
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-outline mb-4">
                                        <label class="mb-2" for="">Correo electrónico</label>
                                        <br>
                                        {{ $representative->email->email }}
                                    </div>
                                </div>
                                <h3 class="mb-2">Redes sociales</h3>
                                    <hr class="mb-4">
                                    @foreach ($representative->socialMedia as $socialMedia)
                                        <div class="col-4">
                                            <div class="form-outline mb-4">
                                                <label class="mb-2"
                                                    for="social_media_{{ $socialMedia->id }}">{{ $socialMedia->name }}</label>
                                                <p>{{$socialMedia->pivot->nick}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <h3 class="mb-2">Ubicación</h3>
                                    <hr class="mb-4">
                                    <div class="col-4">
                                        <label class="mb-2" for="">Estado</label>
                                        <br>
                                        {{ $representative->address->parish ? $representative->address->parish->township->state->state : $representative->address->city->state->state }}
                                    </div>
                                    <div class="col-4">
                                        <label class="mb-2" for="">Municipio</label>
                                        <br>
                                        {{ $representative->address->parish ? $representative->address->parish->township->township : null }}
                                    </div>
                                    <div class="col-4">
                                        <label class="mb-2" for="">Parroquia</label>
                                        <br>
                                        {{ $representative->address->parish ? $representative->address->parish : null }}

                                </div>
                                <div class="col-4 mt-2">
                                    <label class="mb-2" for="">Ciudad</label>
                                    <br>
                                    {{ $representative->address->city ? $representative->address->city->city : null }}
                                </div>
                                <div class="col-4 mt-2">
                                    <label class="mb-2" for="">Dirección Exacta</label>
                                    <br>
                                    {{ $representative->address->address }}
                                </div>
                                <div class="col-4">
                                    <div class="form-outline mb-4 mt-2">
                                        <label class="mb-2" for="">Punto de Referencia</label> <br>
                                        {{ $representative->address->reference_place }}
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <div class="d-grid gap-2 d-md-flex justify-content-center">
                                        <a href="{{ route('client.representative.edit', $representative) }}"
                                            class="btn btn-warning w-100">Editar</a>
                                        <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal"
                                            data-bs-target="#confirm-destroy">Eliminar</button>

                                        <div class="modal fade" id="confirm-destroy" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Esta seguro de eliminar este registro?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-dark"
                                                            data-bs-dismiss="modal">Cancelar</button>
                                                        <form
                                                            action="{{ route('client.representative.destroy', $representative) }}"
                                                            id="delete" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-primary">Confirmar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
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
