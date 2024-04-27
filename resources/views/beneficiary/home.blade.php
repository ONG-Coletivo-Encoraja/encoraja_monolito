@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

{{--adicionar somente o que ele pode ver e direcionar para os filtros certos--}}
<details>
    <summary>Cadastrar usuário</summary>
    <a href="/beneficiary/create">Se Cadastrar</a><br>
</details>
<br><br><br>

<a href="/events">Opções de Eventos</a>
<br><br><br>
<a href="/inscriptions/beneficiary">Opções de inscrições</a>

@endsection


