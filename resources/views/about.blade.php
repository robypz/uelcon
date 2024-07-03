@extends('layouts.auth')

@section('content')
    <div class="">
        <div class="row flex-row justify-content-center align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class=" mt-5 p-md-5 p-2">
                    <div class="container m-md-5 m-2">
                        <br>
                        <h1 class="mt-5 fw-bold text-center text-lg-start">¡Somos uelcon!</h1>
                        <p class="mt-3 lead text-start">
                            Una compañía financiera digital enfocada en mejorar el acceso a créditos educativos. Nuestro
                            objetivo es brindar una alternativa para que solicitar un préstamo escolar sea más simple y
                            alcanzable para todos los padres.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-xs-12">
                <div class="mt-5 p-2 p-md-5 mb-2 banner-inicio text-center">
                    <img src="{{ Vite::asset('resources/images/photo2.jpg') }}" class="w-100 rounded-3">
                </div>

            </div>

        </div>
        <div class="row flex-row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class=" mt-3 p-md-3 p-2">
                    <div class="container m-md-5 m-2">
                        <br>
                        <h1 class="mt-5 text-center fw-bold">¿Qué hacemos?</h1>
                        <p class="my-3 lead text-center">
                            En <b class="uelcon"> uelcon </b> , nos dedicamos a simplificar el proceso de obtención de préstamos escolares. Ofrecemos
                            un servicio sumamente flexible para satisfacer las necesidades financieras de los padres y
                            garantizar que la educación de sus hijos no sea una preocupación.Queremos ayudarte para seguir
                            garantizando que tus hijos sigan recibiendo una educación de
                            calidad
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <div class="row flex-row justify-content-center bg-primary">
            <div class="col-lg-8 col-md-12">
                <div class=" mt-5 p-md-5 p-2">
                    <div class="container m-md-5 m-2">
                        <br>
                        <h1 class="mt-5 text-center text-white fw-bold">Nuestro impulso</h1>
                        <p class="my-3 lead text-center text-white">
                            En uelcon, nuestro impulso es el
inmenso esfuerzo de aquellos padres
que, como tú, están comprometidos en
brindar la mejor educación posible a
sus hijos.
Por esa razón nos esforzamos en
ofrecerte un acceso rápido y sencillo a
créditos escolares, garantizándote una
experiencia transparente y satisfactoria.
En uelcon sabemos lo difícil que resulta
en el entorno socio
-económico actual,
obtener los recursos necesarios para la
educación de tu hijo, por ese motivo
queremos convertirnos en tu aliado con
tasas y condiciones justas, que te
permitan apalancarte cuando lo
necesites.
Confiamos en ti
.
                    </div>
                </div>
            </div>

        </div>
        <div class="row flex-row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class=" mt-5 p-md-5 p-2">
                    <div class="">
                        <img src="{{ Vite::asset('resources/images/photo_4.jpg') }}" class="w-100 rounded-3">
                    </div>
                    <div>
                        <p class="fs-3 fw-bold text-center mt-5">Con Uelcon la educación de tu hijo <br> está a tu alcance.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
