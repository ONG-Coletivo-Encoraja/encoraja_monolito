@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

<h1 class="tittle1">Lista de usuários</h1>

<div class="users-list">
    <div class="col-md-6">
        <form action="/adm" method="GET"  class="input-group mb-3">
            <input type="text" class="form-control" id="search" name="search" placeholder="Procure um usuário">
            <button type="input" class="btn-search rounded">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill=" #f89051" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
            </button>
        </form>
    </div>
    <table border="1" class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de nascimento</th>
            <th>Tipo de usuário</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->date_birthday}}</td>
                <td>
                    @foreach($user->permissions as $permission)
                        {{$permission->type}}
                    @endforeach
                </td>
                <td class="actions-form">
                    <form action="/adm/{{ $user->id }}/edit" method="GET">
                        @csrf
                        @method('GET')
                        <button class="btn" type="submit">Editar</button>
                    </form>
                    <form action="/adm/{{ $user->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn" type="submit" onclick="return confirmDelete()">Apagar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>  

@endsection
