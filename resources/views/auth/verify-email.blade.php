@extends('layouts.app')

@section('content')
    <div>
        <section class="background-section background-section-1 ">
            <!-- Contenido de la primera sección de fondo -->
            <h1 class="text-center pt-5">Verificacion de correo</h1>
        </section>
        <section class="background-section background-section-2">
            <!-- Contenido de la segunda sección de fondo -->
        </section>
        <div class="content-container ">

            <p class="text-center"> Se ha enviado un link de verificación a la dirección de correo electrónico que has proporcionado</p>
            <div>
                <form action="{{route('verification.send')}}" method="POST">
                    @csrf
                    <div class="btn-container">

                        <button type="submit" class="btn btn-primary w-100">
                            Enviar otro link de verificación
                        </button>
                    </div>
                </form>
            </div>
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 alert alert-success mt-4 font-medium text-sm text-green-600">
                    Se ha enviado un nuevo link de tu correo electrónico.
                </div>
            @endif

        </div>
    </div>
@endsection
