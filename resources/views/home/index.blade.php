@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

<h1 class="tittle">Escolha um tipo de usuário</h1>

<div class="options-user">
    <a href="/home-admin" class="choose-user rounded">Administrador</a>

    <a href="/home-voluntary" class="choose-user rounded">Voluntário</a>

    <a href="/home-beneficiary" class="choose-user rounded">Beneficiário</a>
</div>

@endsection