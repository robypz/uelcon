@extends('layouts.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-lg-5 col-md-12 d-none d-lg-block">
                <div class="bg-primary-subtle fixed-side img-login-banner">
                    <img class="" src="{{ Vite::asset('resources/images/collage.png') }}">
                </div>
            </div>
            <div class="col-lg-7 col-md-10 p-4">
                <div class="img-login mb-1">
                    <img src="{{ Vite::asset('resources/images/imagotipo.svg') }}">
                </div>
                <div class="box">
                    <div class="formulario-box mb-4  ">
                        <form method="POST" action="{{ route('register') }}">
                            <h2 class="text-center mb-2 ">Registro</h2>
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="">Usuario</label>
                                        <input type="text" class="form-control" id="name" placeholder="Usuario"
                                            name="name">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Correo Electronico</label>
                                        <input type="email" class="form-control" id="name" placeholder="Correo "
                                            name="email">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="">Contraseña</label>
                                            <div class="input-wrapper">
                                                <input type="password" class="form-control" placeholder="Contraseña"
                                                    name="password">
                                                <span class="input-icon">
                                                    <i class="input-icon password-toggle-1 bi bi-eye"></i>
                                                    <!-- Aquí puedes usar el icono de l ojito -->
                                                </span>
                                            </div>
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Confirmar Contraseña</label>
                                        <div class="input-wrapper">
                                            <input type="password" class="form-control" id="password"
                                                placeholder=" Confirmar Contraseña" name="password_confirmation">
                                            <span class="input-icon">
                                                <i class=" input-icon password-toggle-2 bi bi-eye"></i>
                                                <!-- Aquí puedes usar el icono de l ojito -->
                                            </span>
                                        </div>
                                        @error('password_confirmation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="btn-container">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                            <div class="row">
                                <div class="col-8 mt-2">
                                    <p> ¿Ya tienes cuenta? </p>
                                </div>
                                <div class="col-4 mt-2">
                                    <a class="mt-2 " href="{{ route('login') }}">Inicia Sesion</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
