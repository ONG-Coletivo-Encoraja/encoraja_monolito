@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

<div>
    <h1>Meu perfil</h1>
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
                        <button class="btn" type="submit" onclick="return confirmDelete()">Apagar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
