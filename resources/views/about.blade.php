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
        <section class="blue-section">
            <div class="container">
                <h2>¿Listo para asegurar la educación de tus hijos?</h2>
                <p>Consigue de forma rápida y sencilla el apoyo financiero que necesitas.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-center">
                    <button type="submit" style="width: 40%" class="btn btn-secondary w-100">Regístrate</button>
                </div>
            </div>
        </section>

        <!-- Pie de página -->
        <footer class="footer" style="background-color: #005ec3; color: #fff; padding: 20px 0; text-align: center;">
            <div class="container">
                <div class="row">
                    <div class="col-4" style="display: flex; flex-direction: column; justify-content: center;">
                        <small>Impulsado por: <br> La Bolsa Descentralizada de Valores de Venezuela</small>
                    </div>
                    <div class="col-4" style="display: flex; justify-content: center; align-items: center;">
                        <a class="navbar-brand" href="#">
                            <img class="logo-nav" width="1400" height="1400"
                                src="{{ Vite::asset('resources/images/bdve-logo-claro.png') }}" alt="Logo de la empresa">
                        </a>
                    </div>
                    <div class="col-4" style="display: flex; flex-direction: column; justify-content: center;">
                        <small>© 2025 Uelcon. Todos los derechos reservados.</small>
                    </div>
                </div>
            </div>
        </footer>

    </div>
@endsection
