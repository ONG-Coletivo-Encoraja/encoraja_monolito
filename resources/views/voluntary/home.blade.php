@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

<h1 class="tittle">Opções de voluntário</h1>

<div class="options-home-admin">
    <a href="/voluntary/create" class="option-home-admin rounded">Efetuar cadastro</a>

    <a href="/voluntary/events" class="option-home-admin rounded">Opções de Eventos</a>

    <a href="/voluntary/formEvent" class="option-home-admin rounded">Sugerir Eventos</a>

    <a href="/voluntary/inscriptions" class="option-home-admin rounded">Visualisar inscrições</a>
</div>

@endsection
