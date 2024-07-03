@extends('layouts.auth')

@section('content')
    <div class="content-login">
        <div class="mb-4">
            <h2>Recuperar Contraseña</h2>
        </div>
        <form>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="form2Example1" placeholder=" Confirmar Correo Electronico" class="formbold-form-input" />
            </div>

            <!-- Submit button -->
            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Verificar</button>
            </div>
        </form>
    </div>
@endsection
