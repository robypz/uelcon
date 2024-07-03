@extends('layouts.app')

@section('content')
    <div class="pt-5">
        <div class="container mt-5">
            <table class="table">
                <thead>
                    <th>
                        ID
                    </th>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Correo
                    </th>
                    <th>
                        Rol
                    </th>

                    <th>
                        Opciones
                    </th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                @foreach ($user->roles as $role)
                                    {{ $role->name }}
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('user.editRole', $user) }}" class="btn btn-primary"><i
                                        class="bi bi-universal-access"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    {{ $users->links() }}
                </tfoot>
            </table>
        </div>
    </div>
@endsection
