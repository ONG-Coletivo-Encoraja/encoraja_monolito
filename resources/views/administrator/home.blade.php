@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

<details>
    <summary>Cadastrar usuários</summary>
    <a href="/adm/create">Cadastrar administrador</a><br>
    <a href="">Cadastrar voluntário</a><br>
    <a href="">Cadastrar beneficiario</a><br>
</details>
<br><br><br>
<a href="/adm">Visualisar todos os usuários</a>
<br><br><br>
<a href="/events">Opções de Eventos</a>
<br><br><br>
<a href="">Opções de inscrições</a>

@endsection