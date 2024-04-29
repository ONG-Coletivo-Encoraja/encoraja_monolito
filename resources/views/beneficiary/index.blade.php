@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')


<div>
    <h1>Página de Eventos</h1>
    <br>
    <br>
    <br>
    <table border="1">
        <thead>
            <th> ID </th>
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
            <th> Preço </th>
            <th> Inscrição </th>
        </thead>
        <tbody>
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
                        <form action="/beneficiary/create/{{ $event->id }}" method="GET">
                            @csrf
                            @method('GET')
                            {{--! <input type="number" name="id" placeholder="Código do usuário"> !--}}
                            <button class="btn" type="submit">Se Inscrever</button>
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection