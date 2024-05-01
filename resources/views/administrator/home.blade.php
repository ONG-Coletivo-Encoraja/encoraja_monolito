@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

<h1 class="tittle">Opções de administrador</h1>

<div class="options-home-admin">
    <details class="option-home-admin rounded">
        <summary style="list-style: none;">Cadastrar usuários</summary>
        <a href="/adm/create" class="detail-option">Cadastrar administrador</a><br>
        <a href="/voluntary/create" class="detail-option">Cadastrar voluntário</a><br>
        <a href="/beneficiary/create" class="detail-option">Cadastrar beneficiario</a><br>
    </details>

    <a href="/adm" class="option-home-admin rounded">Visualisar todos os usuários</a>

    <a href="/events" class="option-home-admin rounded">Opções de Eventos</a>

    <a href="/inscriptions" class="option-home-admin rounded">Opções de inscrições</a>
</div>

@endsection