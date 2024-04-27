@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

{{--! organizar isso aqui ele não pode ver a lista de usuários !--}}
<div>
    <h1>Lista de usuários</h1>
    <br>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de nascimento</th>
            <th>Tipo de usuário</th>
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
                <td>
                    <form action="/beneficiary/{{ $user->id }}/edit" method="GET">
                        @csrf
                        @method('GET')
                        <button class="btn" type="submit">Editar</button>
                    </form>
                    <form action="/beneficiary/{{ $user->id }}" method="POST">
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
