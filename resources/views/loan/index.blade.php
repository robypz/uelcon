@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">Prestamos</h1>
        </section>
        <section class="background-section background-section-2">
            <!-- Contenido de la segunda sección de fondo -->
        </section>
        <div class="content-container ">
            {{-- filtros --}}
            <div class="container-fluid my-3">
                <form action="{{ route('loan.index') }}" method="get">
                    <div class="row">
                        <div class="col-2">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" name="id" id="id" value="{{ old('id') }}"
                                class="form-control">
                        </div>
                        <div class="col-2">
                            <label for="dni" class="form-label">Cedula</label>
                            <input type="text" name="dni" id="dni" class="form-control">
                        </div>
                        <div class="col-2">
                            <label for="statement" class="form-label">Status</label>
                            <select name="statement" id="statement" class="form-select">
                                <option value="" selected>Seleccione</option>
                                @foreach ($statements as $statement)
                                    <option value="{{ $statement->id }}">{{ $statement->status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <label class="mb-2" for="startDate">Desde</label>
                            <input type="date" name="startDate" id="startDate" class="form-control">
                        </div>
                        <div class="col-2">
                            <label class="mb-2" for="endDate">Hasta</label>
                            <input type="date" name="endDate" id="endDate" class="form-control">
                        </div>
                        <div class="col-2">
                            <input type="submit" value="Buscar" class="btn btn-primary">

                        </div>
                    </div>





                </form>
            </div>
            <!-- Cuadro de texto para mostrar datos en dispositivos pequeños -->
            <div class="container d-lg-none"> <!-- Oculta en dispositivos de tamaño mediano o superior -->

                @foreach ($loans as $loan)
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">ID Préstamo: {{ $loan->id }}</h5>

                                    <p class="card-text">{{ $loan->user->representative->name }}
                                        {{ $loan->user->representative->surname }}</p>
                                    <p class="card-text">Cédula: {{ $loan->user->representative->dni }}</p>

                                    <p class="card-text">Comisión Flat: {{ $loan->flat_commission }}</p>
                                    <p class="card-text">Monto Bruto: {{ $loan->gross_amount }}</p>
                                    <p class="card-text">Monto Neto: {{ $loan->net_amount }}</p>
                                    <p class="card-text">Estado: {{ $loan->statement->status }}</p>
                                    <a href="{{ route('loan.show', $loan) }}" class="btn btn-ver">Ver detalles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

            <!-- Tabla para mostrar datos en dispositivos medianos o superiores -->
            <div class="container d-none d-lg-block"> <!-- Oculta en dispositivos pequeños -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID PRESTAMO</th>
                            <th scope="col">NOMBRE Y APELLIDO</th>
                            <th scope="col">CEDULA</th>
                            <th scope="col">COMISION FLAT</th>
                            <th scope="col">MONTO BRUTO</th>
                            <th scope="col">MONTO NETO</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">Optiones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loans as $loan)
                            <tr>
                                <th scope="row">{{ $loan->id }}</th>

                                <td>{{ $loan->user->representative->name }}&nbsp;{{ $loan->user->representative->surname }}
                                </td>
                                <td>{{ $loan->user->representative->dni }}</td>
                                <td>{{ $loan->flat_commission }}</td>
                                <td>{{ $loan->gross_amount }}</td>
                                <td>{{ $loan->net_amount }}</td>
                                <td>{{ $loan->statement->status }}</td>
                                <td><a href="{{ route('loan.show', $loan) }}" class="btn btn-ver btn-sm"><i
                                            class="bi bi-eye-fill"></i></a></td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>

            {{ $loans->links() }}
        </div>
    </div>
@endsection
