{{--!@extends('layouts.main')
@section('title', 'Encoraja')
@section('content')


@if(request()->segment(2) == 'admin')
    <details>
        <summary>Cadastrar usuários</summary>
        <a href="/adm/create">Cadastrar administrador</a><br>
        <a href="">Cadastrar voluntário</a><br>
        <a href="/beneficiary/create">Cadastrar beneficiario</a><br>
    </details>
    <br><br><br>
    <a href="/adm">Visualisar todos os usuários</a>
    <br><br><br>
    <a href="/events">Opções de Eventos</a>
    <br><br><br>
    <a href="/inscriptions">Opções de inscrições</a>

@elseif(request()->segment(2) == 'beneficiary')
    <details>
        <summary>Cadastrar usuário</summary>
        <a href="/beneficiary/create">Se Cadastrar</a><br>
    </details>
    <br><br><br>
    <a href="/beneficiary/event_details">Opções de Eventos</a>
    <br><br><br>
    <a href="/inscriptions">Opções de inscrições</a>
@endif

@endsection
!--}}