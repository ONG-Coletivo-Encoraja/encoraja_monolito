@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

<h1 class="tittle">Escolha um tipo de usuário</h1>

<div class="options-user">
    @can('viewAdmin', $user)
        <a href="/home-admin" class="choose-user rounded">Administrador</a>
    @endcan

    @can('viewVoluntary', $user)
        <a href="/home-voluntary" class="choose-user rounded">Voluntário</a>
    @endcan

    @can('viewBeneficiary', $user)
        <a href="/home-beneficiary" class="choose-user rounded">Beneficiário</a>
    @endcan
</div>

@endsection
