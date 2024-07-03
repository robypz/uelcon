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
            <!-- Cuadro de texto para mostrar datos en dispositivos pequeños -->
            <div class="container d-lg-none"> <!-- Oculta en dispositivos de tamaño mediano o superior -->
                @foreach ($loans as $loan)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Datos</h5>
                            <div class="row">

                                <div class="col-3">
                                    <label class="mb-2" for="">ID PRESTAMO </label>
                                    <p>{{ $loan->id }}</p>
                                </div>

                                    <div class="col-3">
                                        <label class="mb-2" for="">NOMBRE Y APELLIDO</label>
                                        <p>{{ $loan->user->representative->name }}&nbsp;{{ $loan->user->representative->surname }}</p>

                                    </div>
                                    <div class="col-3">
                                        <label class="mb-2" for="">CEDULA</label>
                                        <p>{{ $loan->user->representative->dni }}</p>
                                    </div>


                                <div class="col-3">
                                    <label class="mb-2" for="">COMISION FLAT</label>
                                    <p>{{ $loan->flat_commission }}</p>

                                </div>
                                <div class="col-3">
                                    <label class="mb-2" for="">MONTO BRUTO</label>
                                    <p>{{ $loan->gross_amount }}</p>

                                </div>
                                <div class="col-3">
                                    <label class="mb-2" for="">MONTO NETO</label>
                                    <p>{{ $loan->net_amount }}</p>

                                </div>
                                <div class="col-3">
                                    <label class="mb-2" for="">STATUS</label>
                                    <p>{{ $loan->statement->status }}</p>

                                </div>
                                <div class="col-3">
                                    <label class="mb-2" for="">OPCIONES</label>
                                    <a href="{{ route('client.loan.show', $loan) }}" class="btn btn-ver btn-sm"><i
                                            class="bi bi-eye-fill"></i></a>

                                </div>
                            </div>


                            <!-- Agrega aquí los mismos datos que aparecen en la tabla -->
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
                                    <td>{{ $loan->user->representative->name }}&nbsp;{{ $loan->user->representative->surname }}</td>
                                    <td>{{ $loan->user->representative->dni }}</td>
                                <td>{{ $loan->flat_commission }}</td>
                                <td>{{ $loan->gross_amount }}</td>
                                <td>{{ $loan->net_amount }}</td>
                                <td>{{ $loan->statement->status }}</td>
                                <td><a href="{{ route('client.loan.show', $loan) }}" class="btn btn-ver btn-sm"><i
                                            class="bi bi-eye-fill"></i></a></td>
                            </tr>
                        @endforeach



                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
                {{$loans->links()}}
            </div>
        </div>
    </div>
@endsection
