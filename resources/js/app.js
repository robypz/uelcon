import axios from 'axios';
import './bootstrap';
import 'bootstrap';

import.meta.glob([
    '../images/**',
]);
/*import { Dropdown, Collapse, initMDB } from "mdb-ui-kit";

initMDB({ Dropdown, Collapse })

const stepMenuOne = document.querySelector('.formbold-step-menu1')
const stepMenuTwo = document.querySelector('.formbold-step-menu2')
const stepMenuThree = document.querySelector('.formbold-step-menu3')

const stepOne = document.querySelector('.formbold-form-step-1')
const stepTwo = document.querySelector('.formbold-form-step-2')
const stepThree = document.querySelector('.formbold-form-step-3')

const formSubmitBtn = document.querySelector('.formbold-btn')
const formBackBtn = document.querySelector('.formbold-back-btn')

formSubmitBtn.addEventListener("click", function (event) {
    event.preventDefault()
    if (stepMenuOne.className == 'formbold-step-menu1 active') {
        event.preventDefault()

        stepMenuOne.classList.remove('active')
        stepMenuTwo.classList.add('active')

        stepOne.classList.remove('active')
        stepTwo.classList.add('active')

        formBackBtn.classList.add('active')
        formBackBtn.addEventListener("click", function (event) {
            event.preventDefault()

            stepMenuOne.classList.add('active')
            stepMenuTwo.classList.remove('active')

            stepOne.classList.add('active')
            stepTwo.classList.remove('active')

            formBackBtn.classList.remove('active')

        })

    } else if (stepMenuTwo.className == 'formbold-step-menu2 active') {
        event.preventDefault()

        stepMenuTwo.classList.remove('active')
        stepMenuThree.classList.add('active')

        stepTwo.classList.remove('active')
        stepThree.classList.add('active')

        formBackBtn.classList.remove('active')
        formSubmitBtn.textContent = 'Submit'
    } else if (stepMenuThree.className == 'formbold-step-menu3 active') {
        document.querySelector('form').submit()
    }
})*/



const state = document.getElementById('state_id')
if (state) {
    const township = document.getElementById('township_id')
    const parish = document.getElementById('parish_id')
    const city = document.getElementById('city_id')
    state.addEventListener('change', function () {

        parish.innerHTML = null;
        parish.disabled = true;
        parish.value = null;

        axios.get('/township/' + state.value).then(function (response) {
            var townships = response.data;
            var townshipOptions = "<option>seleccione</option>";
            for (const element in townships) {
                townshipOptions += "<option value='" + townships[element].id + "'>" + townships[element].township + "</option>";
            }

            township.disabled = false;
            township.innerHTML = townshipOptions;
            township.addEventListener('change', function () {
                axios.get('/parish/' + township.value).then(function (reponse) {
                    var parishes = reponse.data;
                    var parishOptions = "<option>seleccione</option>";
                    for (const element in parishes) {
                        parishOptions += "<option value='" + parishes[element].id + "'>" + parishes[element].parish + "</option>";
                    }
                    parish.disabled = false;
                    parish.innerHTML = parishOptions;
                });
            })

        });

        axios.get('/city/' + state.value).then(function (response) {
            var cities = response.data;
            var cityOptions = "<option>seleccione</option>";
            for (const element in cities) {
                cityOptions += "<option value='" + cities[element].id + "'>" + cities[element].city + "</option>";
            }

            city.disabled = false;
            city.innerHTML = cityOptions;
        });
    })

    city.addEventListener('change', function () {
        township.disabled = true;
        township.innerHTML = null;
        township.value = null;

        parish.innerHTML = null;
        parish.disabled = true;
        parish.value = null;
    });

    township.addEventListener('change', function () {
        city.disabled = true;
        city.innerHTML = null;
        city.value = null;
    });
}


const school = document.getElementById('school_id');
if (school) {
    const grade = document.getElementById('grade_id');
    const section = document.getElementById('section_id');
    school.addEventListener('change', function () {

        section.innerHTML = null;
        section.disabled = true;
        section.value = null;

        axios.get('/grade/school/' + school.value).then(function (response) {
            var grades = response.data;
            var gradeOptions = "<option>seleccione</option>";
            for (const element in grades) {
                gradeOptions += "<option value='" + grades[element].id + "'>" + grades[element].grade + "</option>";
            }

            grade.disabled = false;
            grade.innerHTML = gradeOptions;
            grade.addEventListener('change', function () {
                axios.get('/section/grade/' + grade.value).then(function (reponse) {
                    var sections = reponse.data;
                    var sectionOptions = "<option>seleccione</option>";
                    for (const element in sections) {
                        sectionOptions += "<option value='" + sections[element].id + "'>" + sections[element].section + "</option>";
                    }
                    section.disabled = false;
                    section.innerHTML = sectionOptions;
                });
            })

        });


    })


}

const passwordField1 = document.querySelector('input[name="password"]');
const passwordField2 = document.querySelector('input[name="password_confirmation"]');
const eyeButton1 = document.querySelector('.password-toggle-1');
const eyeButton2 = document.querySelector('.password-toggle-2');

if (eyeButton1) {
    eyeButton1.addEventListener('click', () => {
        togglePasswordField(passwordField1);
    });
}

if (eyeButton2) {
    eyeButton2.addEventListener('click', () => {
        togglePasswordField(passwordField2);
    });
}



function togglePasswordField(field) {
    if (field.type === 'password') {
        field.type = 'text';
    } else {
        field.type = 'password';
    }
}




// Obtener elementos del DOM solo una vez fuera de los eventos para mejorar el rendimiento
const amount = document.getElementById('amount');
const term = document.getElementById('term');
const gross_amount = document.getElementById('gross_amount');
const flat_commission = document.getElementById('flat_commission');
const interest_amount = document.getElementById('interest_amount');
const monthly_interest = document.getElementById('monthly_interest');
const net_amount = document.getElementById('net_amount');
const gross = document.getElementById('gross');
const flat = document.getElementById('flat');
const net = document.getElementById('net');

// Función para calcular y actualizar los valores
function calculateAndUpdateValues() {
    let value = parseFloat(amount.value);
    let flat_value = value * 0.03;
    let net_value = value + flat_value;
    monthly_interest.innerHTML = parseInt(term.value);
    let interest = value * (parseFloat(monthly_interest.innerHTML) / 100);

    gross.innerHTML = value.toFixed(2);
    flat.innerHTML = flat_value.toFixed(2);
    interest_amount.innerHTML = interest.toFixed(2);
    net.innerHTML = (net_value + interest).toFixed(2);

    gross_amount.value = value.toFixed(2);
    flat_commission.value = flat_value.toFixed(2);
    net_amount.value = (net_value + interest).toFixed(2);
}

// Eventos para escuchar cambios en los campos de entrada
amount.addEventListener('input', calculateAndUpdateValues);
term.addEventListener('input', calculateAndUpdateValues);

// Inicializar valores al cargar la página
document.addEventListener('DOMContentLoaded', calculateAndUpdateValues);
