<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prestamo Aprobado</title>
    <style>
        .options{
            display: flex;
            justify-content: center;
        }

        .btn{
            margin: 0px auto;
        }
    </style>
</head>

<body>
    <h1>Prestamo Aprobado</h1>
    <p>Hola, tu prestamo ha sido aprobado.</p>
    <p>Aqui tienes los terminos del contrato, leélos</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet cum impedit deleniti quibusdam distinctio vero.
        Possimus quas, asperiores nihil aut officiis quibusdam assumenda voluptates eos soluta sed, eum, tempora
        doloribus.</p>

    <div>
        <a href="{{route('contract.confirm',$loan->contract)}}">
            <button class="btn">Confirmar contrato</button>
        </a>
    </div>
</body>

</html>
