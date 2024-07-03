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
                    <h3 class="p-4"> Recuperar Contraseña</h3>
                    @if (session('status'))
                    <div class="mb-4 alert alert-success font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif


                <form action="{{ route('password.email') }}" method="post">
                    @csrf
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                    <div class="btn-container">
                        <button type="submit" class="btn btn-primary w-100 mt-4">Enviar link</button>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
@endsection
