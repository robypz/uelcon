@extends('layouts.app')
@section('content')


<div>
    <div class="container py-4">
        <table class="table rounded-3">
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
                        @foreach ($loan->user->representatives as $representative)
                            <td>{{ $representative->name }}&nbsp;{{ $representative->surname }}</td>
                            <td>{{ $representative->dni }}</td>
                        @endforeach
                        <td>{{ $loan->flat_commission }}</td>
                        <td>{{ $loan->gross_amount }}</td>
                        <td>{{ $loan->net_amount }}</td>
                        <td>{{ $loan->statement->status }}</td>
                        <td><a href="{{ route('loan.show', ['loan' => $loan]) }}" class="btn btn-primary btn-sm"><i
                                    class="bi bi-eye-fill"></i></a></td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>
</div>
@endsection
