@extends('layouts.main')

@section('title', 'Inscrições')
@section('content')


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
                        @foreach($inscription->users as $user)
                            {{$user->name}}
                        @endforeach
                    </td>
                    <td>
                        @foreach($inscription->events as $event)
                            {{$event->name}}
                        @endforeach
                    </td>
                    <td>
                        {{$inscription->status}}
                    </td>
                        <td>
                            <form action="/beneficiary/{{ $inscription->id }}" method="GET">
                                @csrf
                                @method('GET')
                                <button class="btn" type="submit">Editar</button>
                            </form>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
