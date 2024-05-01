@extends('layouts.main')

@section('title', 'Editar Usuario')
@section('content')

<div class="register-admin-form rounded">
    <form class="row g-3" action="/adm/{{ $user->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="col-md-6">
            <label for="date_birthday" class="form-label">Data de nascimento</label>
            <input type="date" class="form-control" id="date_birthday" name="date_birthday" value="{{ $user->date_birthday }}" readonly>
        </div>
        <div class="col-md-6">
            <label for="cpf" class="form-label">CPF</label>
            <input type="cpf" class="form-control" id="cpf" name="cpf" value="{{ $user->cpf }}" required>
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}" readonly>
        </div>
        @foreach($user->permissions as $permission)
            <div class="col-md-4">
                <label for="type" class="form-label">Tipo</label>
                <select id="type" name="type" class="form-select" required>
                    <option value="administrator" {{ $permission->type == 'administrator' ? 'selected' : '' }}>Administrador</option>
                    <option value="voluntary" {{ $permission->type == 'voluntary' ? 'selected' : '' }}>Voluntário</option>
                    <option value="beneficiary" {{ $permission->type == 'beneficiary' ? 'selected' : '' }}>Beneficiario</option>
                </select>
            </div>
        @endforeach
        @foreach($user->addresses as $address)
            <div class="col-md-6">
                <label for="street" class="form-label">Rua</label>
                <input type="text" class="form-control" id="street" name="street"  value="{{ $address->street }}" required>
            </div>
            <div class="col-md-6">
                <label for="number" class="form-label">Número</label>
                <input type="text" class="form-control" id="number" name="number"  value="{{ $address->number }}" required>
            </div>
            <div class="col-md-6">
                <label for="neighbourhood" class="form-label">Bairro</label>
                <input type="text" class="form-control" id="neighbourhood" name="neighbourhood" value="{{ $address->neighbourhood }}" required>
            </div>
            <div class="col-md-6">
                <label for="city" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="city" name="city"  value="{{ $address->city }}" required>
            </div>
            <div class="col-md-6">
                <label for="zip_code" class="form-label">CEP</label>
                <input type="text" class="form-control" id="zip_code" name="zip_code"  value="{{ $address->zip_code }}" required>
            </div>
        @endforeach
        <div>
            <input type="checkbox" id="image_term" name="image_term"  value="{{ $user->image_term }}" required>
            <label for="image_term">Aceito termo de imagem</label>
        </div>
        <div>
            <input type="checkbox" id="data_term" name="data_term"  value="{{ $user->data_term }}" required>
            <label for="data_term">Aceito termo de dados</label>
        </div>
        <div class="col-12">
            <button type="submit" class="btn-form rounded">Salvar alterações</button>
        </div>
    </form>
</div>
@endsection
