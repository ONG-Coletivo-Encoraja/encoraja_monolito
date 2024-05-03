@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

<h1 class="tittle1">Lista de Voluntários</h1>

<div class="users-list">
    <table border="1" class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de nascimento</th>
            <th>Tipo de usuário</th>
        </thead>
        <tbody>
            @foreach($users as $voluntary)
            <tr>
                <td>{{$voluntary->id}}</td>
                <td>{{$voluntary->name}}</td>
                <td>{{$voluntary->email}}</td>
                <td>{{$voluntary->date_birthday}}</td>
                <td>
                    @foreach($voluntary->permissions as $permission)
                        {{$permission->type}}
                    @endforeach
                </td>
                <td>
                    <form action="/voluntary/{{ $voluntary->id }}/edit" method="GET">
                        @csrf
                        @method('GET')
                        <button class="btn" type="submit">Editar</button>
                    </form>
                    <form action="/voluntary/{{ $voluntary->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn" type="submit" onclick="return confirmDeleteUser()">Apagar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
