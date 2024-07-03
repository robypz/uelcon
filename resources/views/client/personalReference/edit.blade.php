@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">Datos de referencias personales</h1>
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
                <form action="{{ route('client.personalReference.update', $personalReference) }}" method="POST">
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
                                        name="name" value="{{ $personalReference->name }}" />
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-outline mb-4">
                                    <label class="mb-2" for="">Apellido</label>

                                    <input type="text" id="form2Example1" placeholder="Apellido" class="form-control"
                                        name="surname" value="{{ $personalReference->surname }}" />
                                    @error('surname')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="mb-2" for="">Tipo Representante</label>
                                <select class="form-select form-select-md mb-3 form-control"
                                    placeholder="Tipo de Representante" aria-label=".form-select-lg example"
                                    name="personalReference_type_id"
                                    value="{{ $personalReference->personalReference_type_id }}">
                                    @foreach ($personalReferenceTypes as $personalReferenceType)
                                        @if ($personalReferenceType->id == $personalReference->personalReference_type_id)
                                            <option value="{{ $personalReferenceType->id }}" selected>
                                                {{ $personalReferenceType->personalReference_type }}
                                            </option>
                                        @else
                                            <option value="{{ $personalReferenceType->id }}">
                                                {{ $personalReferenceType->personalReference_type }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <div class="form-outline mb-4">
                                    <label class="mb-2" for="">Cédula de Identidad</label>
                                    <input type="text" id="form2Example1" placeholder="Cedula" maxlength="9"
                                        class="form-control" name="dni" value="{{ $personalReference->dni }}" />
                                    @error('dni')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-outline mb-4">
                                    <label class="mb-2" for="">Número telefónico</label>
                                    <input type="text" id="form2Example1" placeholder="Telefono" class="form-control"
                                        name="phone" maxlength="15" value="{{ $personalReference->phone->phone }}" />
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-outline mb-4">
                                    <label class="mb-2" for="">Correo Electronico</label>
                                    <input type="mail" id="form2Example1" placeholder="Correo Electronico"
                                        class="form-control" name="email"
                                        value="{{ $personalReference->email->email }}" />
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <h3 class="mb-2">Dirección</h3>
                            <hr class="mb-4">
                            <div class="col-4">
                                <label class="mb-2" for="">Estado</label>
                                <select class="form-select form-select-md mb-3 form-control" placeholder="Estado"
                                    aria-label=".form-select-lg example" id="state_id" name="state_id"
                                    value="{{ $personalReference->address->city ? $personalReference->address->city->state_id : $personalReference->address->parish->township->state_id }}">
                                    <option>seleccione</option>
                                    @foreach ($states as $state)
                                        @if ($state->id == ($personalReference->address->city ? $personalReference->address->city->state_id : null))
                                            <option value="{{ $state->id }}" selected>{{ $state->state }}</option>
                                        @elseif (
                                            $state->id ==
                                                ($personalReference->address->parish ? $personalReference->address->parish->township->state_id : null))
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
                                    value="{{ $personalReference->address->parish ? $personalReference->address->parish->township_id : null }}"
                                    {{ $personalReference->address->parish ? '' : 'disabled' }}>
                                    @if ($personalReference->address->parish)
                                        <option value="{{ $personalReference->address->parish->township->id }}" selected>
                                            {{ $personalReference->address->parish->township->township }}</option>
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
                                    value="{{ $personalReference->address->parish ? $personalReference->address->parish->id : '' }}"
                                    {{ $personalReference->address->parish ? '' : 'disabled' }}>
                                    @if ($personalReference->address->parish)
                                        <option value="{{ $personalReference->address->parish->id }}" selected>
                                            {{ $personalReference->address->parish->parish }}</option>
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
                                    value = "{{ $personalReference->address->city ? $personalReference->address->city->id : null }}"
                                    {{ $personalReference->address->city ? '' : 'disabled' }}>
                                    @if ($personalReference->address->city)
                                        <option value="{{ $personalReference->address->city->id }}" selected>
                                            {{ $personalReference->address->city->city }}</option>
                                    @endif
                                </select>
                                @error('city_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class="mb-2" for="">Dirección Exacta</label>

                                <div class="form-floating">
                                    <textarea class="form-control" id="floatingTextarea" name="address">{{ $personalReference->address->address }}</textarea>
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
                                        value="{{ $personalReference->address->reference_place }}" />
                                </div>
                                @error('reference_place')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <div class="d-grid gap-2 d-md-flex justify-content-center">
                                    <a href="{{ route('client.personalReference.show', $personalReference) }}"
                                        type="button" class="btn btn-danger btn-sm w-100">Cancelar</a>
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
