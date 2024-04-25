@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

<div class="header">
    @if(session('name'))
        <p>Bem-vindo, {{ session('name') }}</p>
    @endif
</div>

<div class="content">
    @yield('content')
</div>

{{--adicionar somente o que ele pode ver e direcionar para os filtros certos--}}
<details>
    <summary>Cadastrar usuário</summary>
    <a href="/beneficiary/create">Se Cadastrar</a><br>
</details>
<br><br><br>

<a href="/events">Opções de Eventos</a>
<br><br><br>
<a href="/inscriptions">Opções de inscrições</a>
<br><br><br>
<a href="">Meus dados</a>

@endsection


