@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

<div>
    <h1>Página de Eventos</h1>
    <br>
    <a href="/events/create">Criar evento</a>
    <br>
    <br>
    <div class="col-md-6">
        <form action="/events" method="GET">
            <input type="text" id="search" name="search" placeholder="Procure um evento">
            <button type="input">Pesquisar</button>
        </form>
    </div>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Modalidade</th>
            <th>Status</th>
            <th>Tipo</th>
            <th>Público alvo</th>
            <th>Vagas</th>
            <th>Vagas sociais</th>
            <th>Vagas normais</th>
            <th>Materiais</th>
            <th>Áreas de interesse</th>
            <th>Price</th>
            <th>Ações</th>
        </thead>
        <tbod>
            @foreach($events as $event)
            <tr>
                <td>{{$event->id}}</td>
                <td>{{$event->name}}</td>
                <td>{{$event->description}}</td>
                <td>{{$event->date}}</td>
                <td>{{$event->time}}</td>
                <td>{{$event->modality}}</td>
                <td>{{$event->status}}</td>
                <td>{{$event->type}}</td>
                <td>{{$event->target_audience}}</td>
                <td>{{$event->vacancies}}</td>
                <td>{{$event->social_vacancies}}</td>
                <td>{{$event->regular_vacancies}}</td>
                <td>{{$event->material}}</td>
                <td>{{$event->interest_area}}</td>
                <td>{{$event->price}}</td>
                <td>
                    <form action="/events/{{ $event->id }}/edit" method="GET">
                        @csrf
                        @method('GET')
                        <button class="btn" type="submit">Editar</button>
                    </form>
                    <form action="/events/{{ $event->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn" type="submit" onclick="return confirmDelete()">Apagar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbod>
    </table>
</div>
@endsection