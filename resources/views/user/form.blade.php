@extends('layouts.app')

@section('content')
    <div>
        <div class="content ">
            <!-- Author: FormBold Team -->
            <!-- Learn More: https://formbold.com -->
            <div class="formbold-form-wrapper">
                {{-- <form action="https://formbold.com/s/FORM_ID" method="POST"> --}}
                <div class="formbold-steps">
                    <ul>
                        <li class="formbold-step-menu1 active">
                            <span>1</span>
                            Datos Personales
                        </li>
                        <li class="formbold-step-menu2">
                            <span>2</span>
                            Referencias Personales
                        </li>
                        <li class="formbold-step-menu3">
                            <span>3</span>
                            Confirm
                        </li>
                    </ul>
                </div>

                <div class="formbold-form-step-1 active">

                    <h4>Datos Madre</h4>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-outline mb-4">
                                <input type="text" id="form2Example1" placeholder="Nombre" class="formbold-form-input"
                                    name="email" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-outline mb-4">
                                <input type="text" id="form2Example1" placeholder="Apellido" class="formbold-form-input"
                                    name="email" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-outline mb-4">
                                <input type="number" id="form2Example1" placeholder="Cedula" class="formbold-form-input"
                                    name="email" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-outline mb-4">
                                <input type="number" id="form2Example1" placeholder="Telefono 1"
                                    class="formbold-form-input" name="email" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-outline mb-4">
                                <input type="number" id="form2Example1" placeholder="Telefono 2"
                                    class="formbold-form-input" name="email" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-outline mb-4">
                                <input type="mail" id="form2Example1" placeholder="Correo Electronico"
                                    class="formbold-form-input" name="email" />
                            </div>
                        </div>
                        {{-- redes sociales --}}
                        <div class="col-4">
                            <div class="form-outline mb-4">
                                <input type="text" id="form2Example1" placeholder="Tik tok" class="formbold-form-input"
                                    name="email" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-outline mb-4">
                                <input type="text" id="form2Example1" placeholder="Facebook" class="formbold-form-input"
                                    name="email" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-outline mb-4">
                                <input type="text" id="form2Example1" placeholder="Instagram" class="formbold-form-input"
                                    name="email" />
                            </div>
                        </div>
                        <div class="col-4">
                            <select class="form-select form-select-md mb-3 formbold-form-input" placeholder="Estado"
                                aria-label=".form-select-lg example">
                                <option selected>Estado</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="form-select form-select-md mb-3 formbold-form-input" placeholder="Municipio"
                                aria-label=".form-select-lg example">
                                <option selected>Municipio</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="form-select form-select-md mb-3 formbold-form-input" placeholder="Estado"
                                aria-label=".form-select-lg example">
                                <option selected>Parroquia</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="form-select form-select-md mb-3 formbold-form-input" placeholder="Estado"
                                aria-label=".form-select-lg example">
                                <option selected>Ciudad</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <div class="form-floating">
                                <textarea class="form-control" id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">Direccion Exacta</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-outline mb-4">
                                <input type="text" id="form2Example1" placeholder="Punto Referencia"
                                    class="formbold-form-input" name="email" />
                            </div>
                        </div>


                    </div>
                    <h4>Datos Padre</h4>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-outline mb-4">
                                <input type="text" id="form2Example1" placeholder="Nombre" class="formbold-form-input"
                                    name="email" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-outline mb-4">
                                <input type="text" id="form2Example1" placeholder="Apellido" class="formbold-form-input"
                                    name="email" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-outline mb-4">
                                <input type="number" id="form2Example1" placeholder="Cedula" class="formbold-form-input"
                                    name="email" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-outline mb-4">
                                <input type="number" id="form2Example1" placeholder="Telefono 1"
                                    class="formbold-form-input" name="email" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-outline mb-4">
                                <input type="number" id="form2Example1" placeholder="Telefono 2"
                                    class="formbold-form-input" name="email" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-outline mb-4">
                                <input type="mail" id="form2Example1" placeholder="Correo Electronico"
                                    class="formbold-form-input" name="email" />
                            </div>
                        </div>
                        {{-- redes sociales --}}
                        <div class="col-4">
                            <div class="form-outline mb-4">
                                <input type="text" id="form2Example1" placeholder="Tik tok" class="formbold-form-input"
                                    name="email" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-outline mb-4">
                                <input type="text" id="form2Example1" placeholder="Facebook" class="formbold-form-input"
                                    name="email" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-outline mb-4">
                                <input type="text" id="form2Example1" placeholder="Instagram" class="formbold-form-input"
                                    name="email" />
                            </div>
                        </div>
                        <div class="col-4">
                            <select class="form-select form-select-md mb-3 formbold-form-input" placeholder="Estado"
                                aria-label=".form-select-lg example">
                                <option selected>Estado</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="form-select form-select-md mb-3 formbold-form-input" placeholder="Municipio"
                                aria-label=".form-select-lg example">
                                <option selected>Municipio</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="form-select form-select-md mb-3 formbold-form-input" placeholder="Estado"
                                aria-label=".form-select-lg example">
                                <option selected>Parroquia</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="form-select form-select-md mb-3 formbold-form-input" placeholder="Estado"
                                aria-label=".form-select-lg example">
                                <option selected>Ciudad</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <div class="form-floating">
                                <textarea class="form-control" id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">Direccion Exacta</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-outline mb-4">
                                <input type="text" id="form2Example1" placeholder="Punto Referencia"
                                    class="formbold-form-input" name="email" />
                            </div>
                        </div>


                    </div>


                </div>

                <div class="formbold-form-step-2">
                    <div>
                        <textarea rows="6" name="message" id="message" placeholder="Type your message" class="formbold-form-input"></textarea>
                    </div>
                </div>

                <div class="formbold-form-step-3">
                    <div class="formbold-form-confirm">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                        </p>

                        <div>
                            <button class="formbold-confirm-btn active">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="11" cy="11" r="10.5" fill="white" stroke="#DDE3EC" />
                                    <g clip-path="url(#clip0_1667_1314)">
                                        <path
                                            d="M9.83343 12.8509L15.1954 7.48828L16.0208 8.31311L9.83343 14.5005L6.12109 10.7882L6.94593 9.96336L9.83343 12.8509Z"
                                            fill="#536387" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1667_1314">
                                            <rect width="14" height="14" fill="white"
                                                transform="translate(4 4)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                Yes! I want it.
                            </button>

                            <button class="formbold-confirm-btn">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="11" cy="11" r="10.5" fill="white" stroke="#DDE3EC" />
                                    <g clip-path="url(#clip0_1667_1314)">
                                        <path
                                            d="M9.83343 12.8509L15.1954 7.48828L16.0208 8.31311L9.83343 14.5005L6.12109 10.7882L6.94593 9.96336L9.83343 12.8509Z"
                                            fill="#536387" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1667_1314">
                                            <rect width="14" height="14" fill="white"
                                                transform="translate(4 4)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                No! I don’t want it.
                            </button>
                        </div>
                    </div>
                </div>

                <div class="formbold-form-btn-wrapper">
                    <button class="formbold-back-btn">
                        Back
                    </button>

                    <button class="formbold-btn">
                        Next Step
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1675_1807)">
                                <path
                                    d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z"
                                    fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_1675_1807">
                                    <rect width="16" height="16" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                </div>
                </form>
            </div>
        </div>




    </div>
@endsection
