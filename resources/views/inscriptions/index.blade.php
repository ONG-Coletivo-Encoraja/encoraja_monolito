@extends('layouts.main')

@section('title', 'Inscrições')
@section('content')

<div>
    <h1>Inscrições</h1>
    <br>
    <div class="col-md-6">
        <form action="/inscriptions" method="GET">
            <input type="text" id="search" name="search" placeholder="Procure um usuário ou evento">
            <button type="submit">Pesquisar</button>
        </form>
    </div>
    <br><br>
    <table border="1">
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
                <td>
                    {{-- <form action="{{ route('inscriptions.edit', $inscription->id) }}" method="GET">
                        @csrf
                        <button class="btn" type="submit">Editar</button>
                    </form> --}}
                    <form action="/inscriptions/{{ $inscription->id }}/edit" method="GET">
                        @csrf
                        @method('GET')
                        <button class="btn" type="submit">Editar</button>
                    </form>
                    {{-- Add delete form here --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
