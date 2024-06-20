@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

<h1 class="tittle">Opções de beneficiário</h1>

<div class="options-home-admin">
    {{-- <a href="/beneficiary/create" class="option-home-admin rounded">Se cadastre aqui</a> --}}

    <a href="/beneficiary" class="option-home-admin rounded">Opções de Eventos</a>

    <a href="/beneficiary/inscriptions" class="option-home-admin rounded">Minhas inscrições</a>
</div>

@endsection

