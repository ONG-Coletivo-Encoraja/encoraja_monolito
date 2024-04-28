@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')


<div>
    <h1>Página de Eventos</h1>
    <table>
        <thead>
            <th> Nome </th>
            <th> Email <th>
        </thead>
        <tbod>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
        </tr>
        <td>
            <form action="/beneficiary/{{ $user->id }}/edit" method="GET">
            @csrf
            @method('GET')
            <button class="btn" type="">Meus Dados</button>
            </form>
        </td>
        </tbod>
    </table>

    <br>
    <br>
    <br>
    <table border="1">
        <thead>
            <th border="1"> ID </th>
            <th> Nome </th>
            <th> Descrição </th>
            <th> Data </th>
            <th> Horário </th>
            <th> Modalidade </th>
            <th> Tipo </th>
            <th> Público alvo </th>
            <th> Vagas </th>
            <th> Vagas sociais </th>
            <th> Vagas normais </th>
            <th> Materiais </th>
            <th> Áreas de interesse </th>
            <th> Price </th>
            <th> Inscrição </th>
        </thead>
        <tbod>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->id }}</td>
                <td>{{ $event->name }}</td>
                <td>{{ $event->description }}</td>
                <td>{{ $event->date }}</td>
                <td>{{ $event->time }}</td>
                <td>{{ $event->modality }}</td>
                <td>{{ $event->type }}</td>
                <td>{{ $event->target_audience }}</td>
                <td>{{ $event->vacancies }}</td>
                <td>{{ $event->social_vacancies }}</td>
                <td>{{ $event->regular_vacancies }}</td>
                <td>{{ $event->material }}</td>
                <td>{{ $event->interest_area }}</td>
                <td>{{ $event->price }}</td>
                <td>
                        <form action="/beneficiary/{{ $event->id }}/events" method="GET">
                            @csrf
                            @method('GET')
                            <button class="btn" type="button">Se inscrever</button>
                        </form>
                        {{--!} <form action="/beneficiary/{{ $event->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn" type="submit" onclick="return confirmDelete()">Apagar</button>
                        </form> --}}
                </td>
            </tr>
            @endforeach
        </tbod>
    </table>
</div>
@endsection


