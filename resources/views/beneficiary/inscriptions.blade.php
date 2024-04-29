@extends('layouts.main')

@section('title', 'Inscrições')
@section('content')

<form action="/beneficiary/inscriptions" method="GET">
    <input type="text" id="search" name="search" placeholder="Digite o código do usuário ">
    <button type="input">Pesquisar</button>
</form>

    <div>
        <h1>Inscrições</h1>
        <br>
        <table border="1">
            <thead>
                <th>ID</th>
                <th>Inscrito</th>
                <th>Evento</th>
                <th>Status</th>
            </thead>
            <tbody>
                @foreach($inscriptions as $inscription)
                <tr>
                    <td>{{$inscription->id}}</td>
                    <td>
                        {{-- @foreach($inscription->users as $user)
                            {{$user->name}}
                        @endforeach --}}
                        {{$inscription->user_id}}
                    </td>
                    <td>
                        {{-- @foreach($inscription->events as $event)
                            {{$event->name}}
                        @endforeach --}}
                        {{$inscription->event_id}}
                    </td>
                    <td>
                        {{$inscription->status}}
                    </td>
                        <td>
                            <form action="/beneficiary/cancel/{{ $inscription->id }}" method="GET">
                                @csrf
                                <button class="btn" type="submit" onclick="confirmDelete()">Cancelar Inscrição</button>
                            </form>
                        </td>
                </tr>                
                @endforeach
            </tbody>
        </table>
    </div>
@endsection