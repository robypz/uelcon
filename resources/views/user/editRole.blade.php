@extends('layouts.app')

@section('content')
    <div>
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="card">
                <div class="card-header text-center ">
                    Editar Rol
                </div>
                <div class="card-body">
                    <p>ID:&nbsp;{{ $user->id }}</p>
                    <p>Nombre:&nbsp;{{ $user->name }}</p>
                    <p>Correo:&nbsp;{{ $user->email }}</p>
                    <form action="{{route('user.updateRole',$user)}}" method="POST">
                        @csrf
                        <label for="role" class="form-label">Rol</label>
                        <select name="role" id="role" class="form-select">
                            @foreach ($roles as $role)
                                @role($role)
                                    <option value="{{ $role }}" selected>{{ $role }}</option>
                                @else
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endrole
                            @endforeach
                        </select>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
