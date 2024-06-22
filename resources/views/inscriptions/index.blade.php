@extends('layouts.main')

@section('title', 'Inscrições')
@section('content')

<h1 class="tittle1">Inscrições</h1>

<div class="users-list">
    <br>
    <div class="col-md-6">
        <form action="/inscriptions" method="GET" class="input-group mb-3">
            <input type="text" class="form-control" id="search" name="search" placeholder="Procure um usuário ou evento">
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
            <th>Inscrito</th>
            <th>Evento</th>
            <th>Status</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach($inscriptions as $inscription)
            <tr>
                <td>{{$inscription->id}}</td>
                <td>{{$inscription->user->name}}</td>
                <td>{{$inscription->event->name}}</td>
                <td>{{$inscription->status}}</td>
                <td class="actions-form">
                    @can('viewAdmin', $user)
                        <form action="/inscriptions/{{ $inscription->id }}/edit" method="GET">
                            @csrf
                            @method('GET')
                            <button class="btn" type="submit">Editar</button>
                        </form>
                    @endcan
                    @can('viewBeneficiary', $user)
                        <form action="/beneficiary/cancel/{{ $inscription->id }}" method="GET">
                            @csrf
                            <button class="btn" type="submit" onclick="confirmDelete()">Cancelar Inscrição</button>
                        </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
