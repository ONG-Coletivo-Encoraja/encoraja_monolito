@extends('layouts.main')

@section('title', 'Inscrições')
@section('content')

{{--! Exibir o codigo do usuario para prosseguir com as inscricoes !--}}
<h2>Cadastro realizado com sucesso!</h2>
<p>Seu código de usuário é: {{ $key_user }}</p>