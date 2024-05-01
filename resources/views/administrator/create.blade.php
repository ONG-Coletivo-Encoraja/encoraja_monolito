@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

<div class="register-admin-form rounded">
    <form class="row g-3" action="/adm" method="POST">
        @csrf
        <div class="col-md-6">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="col-md-6">
            <label for="date_birthday" class="form-label">Data de nascimento</label>
            <input type="date" class="form-control" id="date_birthday" name="date_birthday" required>
        </div>
        <div class="col-md-6">
            <label for="cpf" class="form-label">CPF</label>
            <input type="cpf" class="form-control" id="cpf" name="cpf" required>
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="col-md-6">
            <label for="street" class="form-label">Rua</label>
            <input type="text" class="form-control" id="street" name="street" required>
        </div>
        <div class="col-md-6">
            <label for="number" class="form-label">Número</label>
            <input type="text" class="form-control" id="number" name="number" required>
        </div>
        <div class="col-md-6">
            <label for="neighbourhood" class="form-label">Bairro</label>
            <input type="text" class="form-control" id="neighbourhood" name="neighbourhood" required>
        </div>
        <div class="col-md-6">
            <label for="city" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="col-md-6">
            <label for="zip_code" class="form-label">CEP</label>
            <input type="text" class="form-control" id="zip_code" name="zip_code" required>
        </div>
        <div>
            <input type="checkbox" id="image_term" name="image_term" value="1" required>
            <label for="image_term">Aceito termo de imagem</label>
        </div>
        <div>
            <input type="checkbox" id="data_term" name="data_term" value="1" required>
            <label for="data_term">Aceito termo de dados</label>
        </div>
        <div class="col-12">
            <button type="submit" class="btn-form rounded">Cadastrar</button>
        </div>
    </form>
</div>
@endsection
