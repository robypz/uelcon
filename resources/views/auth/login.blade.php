@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col-lg-5 col-md-12 d-none d-lg-block">
            <div class="bg-primary-subtle fixed-side img-login-banner">
                <img class="" src="{{ Vite::asset('resources/images/collage.png') }}">
            </div>
        </div>
        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
            <div class="img-login mt-2 mb-2">
                <img src="{{ Vite::asset('resources/images/imagotipo.svg') }}">
            </div>
            <div class="box">
                <div class="formulario-box">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email input -->
                        <h2 class="text-center mb-4 ">Inicio de Sesión</h2>
                        <div class="form-outline mb-4">
                            <label class="mb-2">Correo Electronico</label>
                            <input type="email" id="form2Example1" placeholder="Correo Electronico" class="form-control"
                                name="email" />
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <div class="input-wrapper">
                                <label class="mb-2">Contraseña</label>
                                <div class="input-wrapper">
                                    <input type="password" class="form-control" placeholder="Contraseña" name="password">
                                    <span class="input-icon">
                                        <i class="input-icon password-toggle-1 bi bi-eye"></i> <!-- Aquí puedes usar el icono de l ojito -->
                                    </span>
                                </div>
                            </div>

                            <a href="{{route('password.request')}}">¿Olvidaste tu Contraseña?</a>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Submit button -->
                        <div class="btn-container">
                            <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
                        </div>
                        <div class="row">
                            <div class="col-8 mt-2">
                                <p> ¿Aun no estas registrado? </p>
                            </div>
                            <div class="col-4 mt-2">
                                <a class="mt-2 " href="{{route('register')}}">Registrate</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
