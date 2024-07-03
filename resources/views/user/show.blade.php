@extends('layouts.app')

@section('content')
    <div>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h2>Detalles de Usuario</h2>
                </div>
                <div class="card-body">
                    <p>ID:{{ $user->id }}</p>
                    <p>Nombre:{{ $user->name }}</p>
                    <p>Correo:{{ $user->email }}</p>


                </div>
            </div>
        </div>
    </div>
@endsection
