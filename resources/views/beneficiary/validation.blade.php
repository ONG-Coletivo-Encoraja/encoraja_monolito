@extends('layouts.main')

@section('title', 'Inscrições')
@section('content')

{{--! Exibir o codigo do usuario para prosseguir com as inscricoes !--}}
<h2 class="tittle">Cadastro realizado com sucesso!</h2>
<div class="codigo-beneficiario">
    <p>Seu código de usuário é:<strong> {{ $id }}</strong></p>
</div>
@endsection