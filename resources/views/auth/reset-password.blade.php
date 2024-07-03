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
                    <h3 class="text-center mt-4">Reiniciar contraseña</h3>

                    <form action="{{route('password.update')}}" method="POST">
                        @csrf
                        <label class="mb-2" for="email">Email</label>
                        <input class="form-control" type="email" id="email" name="email">
                        <label class="mb-2" for="password">Contraseña</label>
                        <input class="form-control" type="password" id="password" name="password">
                        <label class="mb-2" for="password_confirmation">Confirmar contraseña</label>
                        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
                        <input class="form-control" type="text" name="token" hidden value="{{$request->token}}">
                        <div class="btn-container">
                            <button type="submit" class="btn btn-primary mt-4 w-100">Actualizar contraseña</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
