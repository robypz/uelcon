@extends('layouts.app')

@section('content')
    <div>
        <div class="container min-vh-100 d-flex justify-content-center align-items-center py-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-black text-center">Agregar Método de Pago</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('paymentMethod.create')}}" method="post">
                        @csrf
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control mb-3">
                        <label for="image">Imagen</label>
                        <input type="file" name="image" class="form-control mb-3">
                        <label for="conversion">Conversion</label>
                        <select name="conversion" id="conversion" class="form-select mb-3">
                            <option value="">USD</option>
                            <option value="">USD/Bs.</option>
                        </select>
                        <button type="submit" class="btn btn-primary mx-auto mt-0 d-block">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
