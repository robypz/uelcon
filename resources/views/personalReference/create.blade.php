@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">Referencia personal</h1>
        </section>
        <section class="background-section background-section-2">
            <!-- Contenido de la segunda sección de fondo -->
        </section>
        <div class="content-container ">
            <!-- Contenido principal -->
            <div class="">
                <div class="content ">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{ route('personalReference.store') }}" method="POST">
                        @csrf

                        <div class="formbold-form-step-1 active">
                            <br>
                            <h3 class="mb-2">Datos Personales</h3>
                            <hr class="mb-4">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-outline mb-4">
                                        <label class="mb-2" for="">Nombre</label>
                                        <input type="text" id="form2Example1" placeholder="Nombre" class="form-control"
                                            name="name" value="{{ old('name') }}" />
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-outline mb-4">
                                        <label class="mb-2" for="">Apellido</label>
                                        <input type="text" id="form2Example1" placeholder="Apellido" class="form-control"
                                            name="surname" value="{{ old('surname') }}" />
                                        @error('surname')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label class="mb-2">Tipo de Representante</label>
                                    <select class="form-select form-select-md mb-3 form-control"
                                        placeholder="Tipo de Representante" aria-label=".form-select-lg example"
                                        name="personal_reference_type_id" value="{{ old('personal_reference_type_id') }}">
                                        @foreach ($personalReferenceTypes as $personalReferenceType)
                                            <option value="{{ $personalReferenceType->id }}">
                                                {{ $personalReferenceType->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('personal_reference_type_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <div class="form-outline mb-4">
                                        <label class="mb-2" for="">Cédula de identidad</label>
                                        <input type="text" id="form2Example1" placeholder="Cedula" maxlength="9"
                                            class="form-control" name="dni" value="{{ old('dni') }}" />
                                        @error('dni')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-outline mb-4">
                                        <label class="mb-2" for=""> Número telefónico</label>
                                        <input type="text" id="form2Example1" placeholder="Telefono" class="form-control"
                                            name="phone" maxlength="15" value="{{ old('phone') }}" />
                                        @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-outline mb-4">
                                        <label class="mb-2" for="">Correo electrónico</label>
                                        <input type="mail" id="form2Example1" placeholder="Correo Electronico"
                                            class="form-control" name="email" value="{{ old('email') }}" />
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <h3 class="mb-2">Ubicación</h3>
                                <hr class="mb-4">

                                <div class="col-4">
                                    <label class="mb-2" for="">Estado</label>
                                    <select class="form-select form-select-md mb-3 form-control" placeholder="Estado"
                                        aria-label=".form-select-lg example" id="state_id" name="state_id"
                                        value="{{ old('state_id') }}">
                                        <option>seleccione</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->state }}</option>
                                        @endforeach
                                    </select>
                                    @error('state_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label class="mb-2" for="">Municipio</label>
                                    <select class="form-select form-select-md mb-3 form-control" placeholder="Municipio"
                                        aria-label=".form-select-lg example" id="township_id"
                                        value="{{ old('township_id') }}" name="township_id" disabled=true>
                                    </select>
                                    @error('township_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label class="mb-2" for="">Parroquia</label>

                                    <select class="form-select form-select-md mb-3 form-control" placeholder="Parroquia"
                                        aria-label=".form-select-lg example" id="parish_id"
                                        value="{{ old('parish_id') }}" name="parish_id" disabled=true>
                                    </select>
                                    @error('parish_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label class="mb-2" for="">Ciudad</label>

                                    <select class="form-select form-select-md mb-3 form-control" placeholder="Ciudad"
                                        aria-label=".form-select-lg example" id="city_id" value="{{ old('city_id') }}"
                                        name="city_id" disabled=true>
                                    </select>
                                    @error('city_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label class="mb-2" for="">Dirección Exacta</label>

                                    <div class="form-floating">
                                        <textarea class="form-control" id="floatingTextarea" name="address" value="{{ old('address') }}"></textarea>
                                        <label for="floatingTextarea">Direccion Exacta</label>
                                    </div>
                                    @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <div class="form-outline mb-4">
                                        <label class="mb-2" for="">Punto de referencia</label>
                                        <input type="text" id="form2Example1" placeholder="Punto Referencia"
                                            class="form-control" name="reference_place"
                                            value="{{ old('reference_place') }}" />
                                    </div>
                                    @error('reference_place')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <div class="d-grid gap-2 d-md-flex justify-content-center">
                                        <button type="button" class="btn btn-dark btn-sm w-100">Cancelar</button>
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
