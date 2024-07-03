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
            <div class="content ">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <form action="{{ route('client.representative.update', $representative) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="formbold-form-step-1 active">
                        <h3 class="mb-2">Datos personales</h3>
                        <hr class="mb-4">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-outline mb-4">
                                    <label class="mb-2" for="">Nombre</label>
                                    <input type="text" id="form2Example1" placeholder="Nombre" class="form-control"
                                        name="name" value="{{ $representative->name }}" />
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-outline mb-4">
                                    <label class="mb-2" for="">Apellido</label>

                                    <input type="text" id="form2Example1" placeholder="Apellido" class="form-control"
                                        name="surname" value="{{ $representative->surname }}" />
                                    @error('surname')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="mb-2" for="">Tipo Representante</label>
                                <select class="form-select form-select-md mb-3 form-control"
                                    placeholder="Tipo de Representante" aria-label=".form-select-lg example"
                                    name="representative_type_id" value="{{ $representative->representative_type_id }}">
                                    @foreach ($representativeTypes as $representativeType)
                                        @if ($representativeType->id == $representative->representative_type_id)
                                            <option value="{{ $representativeType->id }}" selected>
                                                {{ $representativeType->representative_type }}
                                            </option>
                                        @else
                                            <option value="{{ $representativeType->id }}">
                                                {{ $representativeType->representative_type }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <div class="form-outline mb-4">
                                    <label class="mb-2" for="">Cédula de Identidad</label>
                                    <input type="text" id="form2Example1" placeholder="Cedula" maxlength="9"
                                        class="form-control" name="dni" value="{{ $representative->dni }}" />
                                    @error('dni')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-outline mb-4">
                                    <label class="mb-2" for="">Número telefónico</label>
                                    <input type="text" id="form2Example1" placeholder="Telefono" class="form-control"
                                        name="phone" maxlength="15" value="{{ $representative->phone->phone }}" />
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-outline mb-4">
                                    <label class="mb-2" for="">Correo Electronico</label>
                                    <input type="mail" id="form2Example1" placeholder="Correo Electronico"
                                        class="form-control" name="email" value="{{ $representative->email->email }}" />
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <h3 class="mb-2">Redes Sociales</h3>
                            <hr class="mb-4">
                            {{-- redes sociales --}}
                            @foreach ($socialMedias as $socialMedia)
                                @foreach ($representative->socialMedia as $representativeSocialMedia)
                                    @if ($socialMedia->id == $representativeSocialMedia->id)
                                        <div class="col-4">
                                            <input type="text" name="socialMedias[{{ $socialMedia->id }}][id]"
                                                value="{{ $socialMedia->id }}" hidden>
                                            <div class="form-outline mb-4">
                                                <label class="mb-2"
                                                    for="social_media_{{ $socialMedia->id }}">{{ $socialMedia->name }}</label>
                                                <input type="text" id="form2Example1"
                                                    placeholder="{{ $socialMedia->name }}" class="form-control"
                                                    name="socialMedias[{{ $socialMedia->id }}][nick]"
                                                    value="{{ $representativeSocialMedia->pivot->nick }}" />
                                                @error('socialMedias.' . $socialMedia->id . '.nick')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                            <h3 class="mb-2">Dirección</h3>
                            <hr class="mb-4">
                            <div class="col-4">
                                <label class="mb-2" for="">Estado</label>
                                <select class="form-select form-select-md mb-3 form-control" placeholder="Estado"
                                    aria-label=".form-select-lg example" id="state_id" name="state_id"
                                    value="{{ $representative->address->city ? $representative->address->city->state_id : $representative->address->parish->township->state_id }}">
                                    <option>seleccione</option>
                                    @foreach ($states as $state)
                                        @if ($state->id == ($representative->address->city ? $representative->address->city->state_id : null))
                                            <option value="{{ $state->id }}" selected>{{ $state->state }}</option>
                                        @elseif ($state->id == ($representative->address->parish ? $representative->address->parish->township->state_id : null))
                                            <option value="{{ $state->id }}" selected>{{ $state->state }}</option>
                                        @else
                                            <option value="{{ $state->id }}">{{ $state->state }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('state_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class="mb-2" for="">Municipio</label>

                                <select class="form-select form-select-md mb-3 form-control" placeholder="Municipio"
                                    aria-label=".form-select-lg example" id="township_id" name="township_id"
                                    value="{{ $representative->address->parish ? $representative->address->parish->township_id : null }}"
                                    {{ $representative->address->parish ? '' : 'disabled' }}>
                                    @if ($representative->address->parish)
                                        <option value="{{ $representative->address->parish->township->id }}" selected>
                                            {{ $representative->address->parish->township->township }}</option>
                                    @endif
                                </select>
                                @error('township_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class="mb-2" for="">Parroquia</label>

                                <select class="form-select form-select-md mb-3 form-control" placeholder="Parroquia"
                                    aria-label=".form-select-lg example" id="parish_id" name="parish_id"
                                    value="{{ $representative->address->parish ? $representative->address->parish->id : '' }}"
                                    {{ $representative->address->parish ? '' : 'disabled' }}>
                                    @if ($representative->address->parish)
                                        <option value="{{ $representative->address->parish->id }}" selected>
                                            {{ $representative->address->parish->parish }}</option>
                                    @endif
                                </select>
                                @error('parish_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class="mb-2" for="">Ciudad</label>

                                <select class="form-select form-select-md mb-3 form-control" placeholder="Ciudad"
                                    aria-label=".form-select-lg example" id="city_id" name="city_id"
                                    value = "{{ $representative->address->city ? $representative->address->city->id : null }}"
                                    {{ $representative->address->city ? '' : 'disabled' }}>
                                    @if ($representative->address->city)
                                        <option value="{{ $representative->address->city->id }}" selected>
                                            {{ $representative->address->city->city }}</option>
                                    @endif
                                </select>
                                @error('city_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class="mb-2" for="">Dirección Exacta</label>

                                <div class="form-floating">
                                    <textarea class="form-control" id="floatingTextarea" name="address">{{ $representative->address->address }}</textarea>
                                    <label for="floatingTextarea">Direccion Exacta</label>
                                </div>
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-outline mb-4">
                                    <label class="mb-2" for="">Punto de Referencia</label>

                                    <input type="text" id="form2Example1" placeholder="Punto Referencia"
                                        class="form-control" name="reference_place"
                                        value="{{ $representative->address->reference_place }}" />
                                </div>
                                @error('reference_place')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <div class="d-grid gap-2 d-md-flex justify-content-center">
                                    <a href="{{ route('client.representative.show', $representative) }}" type="button"
                                        class="btn btn-danger btn-sm w-100">Cancelar</a>
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
