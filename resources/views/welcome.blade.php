@extends('layouts.auth')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class=" p-md-2 mt-2 ">
                    <div class="container">
                        <br>
                        <h1 class="uelcon-h1">Tú te esfuerzas, nosotros te apoyamos</h1>
                        <p class="lead">
                            <b class="uelcon"> uelcon </b> te da el respaldo financiero para que puedas seguir brindando a
                            tus hijos las mejores oportunidades académicas <b>¡Confiamos en ti!</b>
                        </p>
                        <a href="{{ route('register') }}">
                            <div class="btn btn-primary mt-2 w-100">Regístrate</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="p-2 p-md-5 mb-2 banner-inicio text-center">
                    <img src="{{ Vite::asset('resources/images/banner-inicio.png') }}" class="w-100 rounded-3">
                </div>
            </div>
        </div>
        <section>
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center">
                    <div class="col text-center">
                        <img src="{{ Vite::asset('resources/images/sin_anticipos.svg') }}" class="icon" alt="...">
                        <p class="textos-icons">Sin anticipo</p>
                    </div>
                    <div class="col text-center">
                        <img src="{{ Vite::asset('resources/images/tasas_justas.svg') }}" class="icon" alt="...">
                        <p class="textos-icons">Tasas justas</p>
                    </div>
                    <div class="col text-center">
                        <img src="{{ Vite::asset('resources/images/online.svg') }}" class="icon" alt="...">
                        <p class="textos-icons">100% Online</p>
                    </div>
                </div>
            </div>
        </section>
        {{-- calculadora --}}
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="">
                    <div class="container ">
                        <h1 class="uelcon-h1 m-2">¿Cuánto necesitas para la educación de tus hijos?</h1>
                        <p class="lead mt-4 mb-5">
                            <b class="uelcon"> uelcon </b>puedes estimar de manera rápida y sencilla el monto de tu préstamo escolar.
                            <br><b> ¡Confíamos en ti!</b>
                        </p>
                        {{-- <a href="{{ route('register') }}">
                            <div class="btn btn-primary mt-2 w-100">Regístrate</div>
                        </a> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 bg-primary">
                <div class="p-2 p-md-5 mb-2 banner-inicio text-center">
                    <div class="content-container ">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('alert'))
                            <div class="alert alert-warning">
                                {{ session('alert') }}
                            </div>
                        @endif
                        <form action="{{ route('loan.store') }}" method="POST">
                            @csrf
                            <label for="amount" class="form-label">
                                <h3>Monto</h3>
                            </label>
                            <input type="range" name="amount" class="form-range mb-3" id="amount" min="100"
                                max="400" value="100" step="1.00">
                            <label for="term">
                                <h3>Plazo de pago</h3>
                            </label>
                            <input type="range" class="form-range" id="term" name="term" min="1"
                                max="3" step="1" value="1" required>

                            <input type="number" id="flat_commission" name="flat_commission" step="0.01" hidden>
                            <input type="number" id="gross_amount" name="gross_amount" step="0.01" hidden>
                            <input type="number" id="net_amount" name="net_amount" step="0.01" hidden>
                            <div class="text-end fw-bold">
                                Monto solicitado:&nbsp;<span id="gross">0.00</span>
                            </div>
                            <div class="text-end fw-bold">
                                Plazo de pago:&nbsp;<span id="month">1</span>&nbsp;Mes(es)
                            </div>
                            <div class="text-end">
                                Comisión Flat (3%):&nbsp;<span id="flat">0.00</span>
                            </div>
                            <div class="text-end">
                                Interés Mensual (<span id="monthly_interest">1</span>%):&nbsp;<span
                                    id="interest_amount">0.00</span>
                            </div>
                            <div class="text-end fw-bold">
                                Total a pagar:&nbsp;<span id="net">0.00</span>
                            </div>
                            <div class="mt-5">
                                <div class="d-grid gap-2 d-md-flex justify-content-center">

                                    <input type="submit" value="Solicitar" class="btn btn-primary btn-sm w-100">
                                </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger my-3">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- carousel --}}
        <h1 class="text-center mt-5">Solicita tu crédito en tres simples pasos</h1>
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active text-center" data-bs-interval="10000">
                    <h2 class="text-center">Paso 1 : Completa tu registro y datos</h2>
                    <img src="{{ Vite::asset('resources/images/banner_uno.png') }}" class="d-block my-0 mx-auto"
                        alt="...">
                    <div class="carousel-caption d-none d-md-block text-center">
                    </div>
                </div>
                <div class="carousel-item text-center" data-bs-interval="2000">
                    <h2 class="text-center">Paso 2 : Calcula tu préstamo</h2>
                    <img src="{{ Vite::asset('resources/images/banner_dos.png') }}" class="d-block my-0 mx-auto"
                        alt="...">
                    <div class="carousel-caption d-none d-md-block">

                    </div>
                </div>
                <div class="carousel-item text-center">
                    <h2 class="text-center">Paso 3 : Obtén tu préstamo inmediato</h2>
                    <img src="{{ Vite::asset('resources/images/banner_tres.png') }}" class="d-block my-0 mx-auto"
                        alt="...">
                    <div class="carousel-caption d-none d-md-block">

                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>

        {{-- herramientas --}}
        <div class="green-section">
            <h1 class="text-center m-4">Somos la herramienta financiera perfecta para ti</h1>
            <div class="herramientas">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3 herramienta1">
                        <div class="caja d-flex flex-column justify-content-between">
                            <div class="icono text-center">
                                <img src="{{ Vite::asset('resources/images/lupa.svg') }}" class="blueicons"
                                    alt="...">
                            </div>
                            <div class="contenido">
                                <h2>No revisamos tu historial</h2>
                                <p>Te apoyamos sin revisar tu pasado, para mejorar tu futuro.</p>
                                <br>
                                <p><a data-bs-toggle="modal" data-bs-target="#historial">Leer más</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 herramienta2">
                        <div class="caja d-flex flex-column justify-content-between">
                            <div class="icono text-center">
                                <img src="{{ Vite::asset('resources/images/corazon.svg') }}" class="blueicons"
                                    alt="...">
                            </div>
                            <div class="contenido">
                                <h2>Política cero acoso</h2>
                                <p>Siéntete seguro. Los datos de tu solicitud jamás serán utilizados para cobrarte de forma
                                    agresiva.</p>
                                <p><a data-bs-toggle="modal" data-bs-target="#acoso">Leer más</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 herramienta3">
                        <div class="caja d-flex flex-column justify-content-between">
                            <div class="icono text-center">
                                <img src="{{ Vite::asset('resources/images/beneficios.svg') }}" class="blueicons"
                                    alt="...">
                            </div>
                            <div class="contenido">
                                <h2>Beneficios extra</h2>
                                <p>Pagar a tiempo e invitar amigos tiene grandes recompensas en nuestra app</p>
                                <br>
                                <p><a data-bs-toggle="modal" data-bs-target="#beneficios">Leer más</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 herramienta3">
                        <div class="caja d-flex flex-column justify-content-between">
                            <div class="icono text-center">
                                <img src="{{ Vite::asset('resources/images/balanza.svg') }}" class="blueicons"
                                    alt="...">
                            </div>
                            <div class="contenido">
                                <h2>Tasas Justas</h2>
                                <p>Nuestros intereses son los más bajos del mercado, apegados a la legislación vigente</p>
                                <br>
                                <p><a data-bs-toggle="modal" data-bs-target="#tasas">Leer más</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- preguntas frecuentes --}}
        <div class="section">
            <div class="acordeon m-4">
                <h1 class="text-center uelcon-h1 pb-4">Preguntas Frecuentes</h1>
                <div class="accordion" id="accordionExample">
                    <div class="row">
                        <div class="col-4">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        ¿Pueden rechazar mi solicitud?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Sí, puede ocurrir ya que el proceso de evaluación es automático y utiliza la
                                        información
                                        de tu teléfono celular junto con los datos que nos proporcionaste. Sigue utilizando
                                        tu
                                        teléfono con normalidad, esto nos ayudará a conocerte mejor y evaluar futuros
                                        préstamos.
                                        No existe una razón específica por la que tu solicitud sea rechazada, evaluamos
                                        miles de
                                        datos, por lo que son varios factores que pueden influir en que esto pueda ocurrir.
                                        Esto no tiene que ver con que tengas un mal historial o que creamos que seas un(a)
                                        mal(a) pagador(a).
                                        Una vez que pase el tiempo de espera, podrás realizar una nueva solicitud.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        ¿Cómo puedo realizar una nueva solicitud?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Puedes realizar una nueva solicitud una vez que haya pasado el tiempo de espera
                                        recomendado. Te sugerimos mantener actualizados tus datos y seguir utilizando
                                        tu teléfono celular con normalidad para mejorar tu evaluación.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        ¿Qué pasa si tengo un mal historial crediticio?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Nuestra evaluación no se basa únicamente en tu historial crediticio. Utilizamos
                                        múltiples factores para evaluar tu solicitud, por lo que tener un mal historial no
                                        necesariamente resultará en una solicitud rechazada.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="accordion-item mt-5">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        ¿Cuánto tiempo tarda la evaluación de mi solicitud?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        La evaluación de tu solicitud se realiza de manera rápida y eficiente. En la mayoría
                                        de los casos, recibirás una respuesta en menos de 20 minutos.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="accordion-item mt-5">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                        ¿Qué información necesito proporcionar?
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Deberás proporcionar información básica como tus datos personales, los datos de tu
                                        hijo y algunos detalles sobre tu situación financiera actual. Esta información nos
                                        ayudará a evaluar tu solicitud de manera más precisa.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="accordion-item mt-5">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        ¿Cómo puedo mejorar mi evaluación para futuras solicitudes?
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Para mejorar tu evaluación en futuras solicitudes, te recomendamos mantener
                                        actualizados
                                        tus datos, utilizar tu teléfono celular de manera regular y mantener un buen
                                        comportamiento
                                        financiero. Estos factores nos ayudarán a conocerte mejor y ofrecerte mejores
                                        opciones
                                        en el futuro.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-center m-5">
                    <button type="submit" style="width: 40%" class="btn btn-secondary w-100">Ver más</button>
                </div>
            </div>
        </div>
        {{-- asegurar la educacion de tus hijos? --}}
        <section class="blue-section">
            <div class="container" style="">
                <img src="{{ Vite::asset('resources/images/impulsando.svg') }}" class="impulsando">
                <div class="d-grid gap-2 d-md-flex justify-content-center">
                    <button type="submit" style="width: 40%" class="btn btn-secondary w-100">Regístrate</button>
                </div>
            </div>
        </section>
        {{-- modales --}}

        <!-- Modal -->
        <div class="modal fade" id="historial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">No revisamos tu historial</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            No indagamos en tu
                            historial, ni en las causas
                            por las cuales estas
                            utilizando nuestros
                            servicios, lo único que
                            sabemos es, que es para
                            la educación de tus hijos
                            y con eso nos basta.
                            <br>
                            <br>
                            Los Padres que se
                            esfuerzan por dar la
                            mejor educación a sus
                            hijos, necesariamente
                            son padres
                            responsables.
                            <br>
                            <br>
                            <b>Confiamos en ti.</b>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="acoso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Política cero acoso</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            El servicio que prestamos
                            es de acompañamiento y
                            de respaldo, nuestros
                            métodos de cobranzas se
                            apegan estrictamente a
                            la normativa legal vigente
                            en Venezuela.
                            <br>
                            <br>
                            Nuestra operatividad
                            depende de tu pago
                            oportuno, por eso
                            siempre podrás dirigirte a
                            nosotros si existe algún
                            inconveniente, recuerda
                            que mientras cumplas
                            con tus pagos, podremos
                            financiar a más padres y
                            estudiantes en tu misma
                            situación.
                            <br>
                            <br>
                            <b>Confiamos en ti.</b>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="beneficios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Beneficios extra</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Valoramos tu esfuerzo y por
                            esa razón, creamos un plan
                            de incentivos para aquellos
                            Padres que cumplan con
                            sus pagos e intereses, antes
                            de los dos (2) meses.
                            <br>
                            <br>
                            Antes del primer (1) mes,
                            obtendrán inmediatamente
                            un aumento en tu límite de
                            crédito del diez por ciento
                            (10%).
                            <br>
                            <br>
                            Antes del segundo (2) mes,
                            obtendrán inmediatamente
                            un aumento en tu límite de
                            crédito del cinco por ciento
                            (5%).
                            <br>
                            <br>
                            <b>Confiamos en ti.</b>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="tasas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tasas Justas</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Sin anticipos ni garantías,
                            nuestras tasas de interés
                            son las más bajas del
                            mercado, uno por ciento
                            mensual (1%).
                            <br><br>
                            Tampoco cobramos
                            intereses sobre intereses,
                            anatocismos, ni intereses
                            compuestos, durante la
                            vigencia del contrato.
                            Nuestro único interés es
                            apoyarte y obtener un
                            rendimiento justo.
                            <br>
                            <br>
                            <b>Confiamos en ti.</b>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
