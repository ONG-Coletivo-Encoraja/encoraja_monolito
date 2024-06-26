@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

<div class="register-admin-form rounded">
    <form class="row g-3" action="/events" method="POST">
        @csrf

        <div class="col-md-6">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

        </div>


        <div class="col-md-6">
            <label for="description" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="description" name="description">
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>


        <div class="col-md-6">
            <label for="date" class="form-label">Data</label>
            <input type="date" class="form-control" id="date" name="date">
            <x-input-error :messages="$errors->get('date')" class="mt-2" />
        </div>


        <div class="col-md-6">
            <label for="time" class="form-label">Time</label>
            <input type="time" class="form-control" id="time" name="time">
            <x-input-error :messages="$errors->get('time')" class="mt-2" />
        </div>


        <div class="col-md-4">
            <label for="modality" class="form-label">Modalidade</label>
            <select id="modality" name="modality" class="form-select">
                <option value="Presential">Presencial</option>
                <option value="Hybrid">Híbrido</option>
                <option value="Remote">Remoto</option>
            </select>
            <x-input-error :messages="$errors->get('modality')" class="mt-2" />
        </div>


        <div class="col-md-4">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select">
                @can('viewAdmin', $user)
                    <option value="Active">Ativo</option>
                    <option value="Inactive">Inativo</option>
                @endcan
                <option value="Pending" selected>Pendente</option>
            </select>
            <x-input-error :messages="$errors->get('status')" class="mt-2" />
        </div>


        <div class="col-md-4">
            <label for="type" class="form-label">Tipo</label>
            <select id="type" name="type" class="form-select">
                <option value="Course">Curso</option>
                <option value="Workshop">Oficina</option>
                <option value="Lecture">Palestra</option>
            </select>
            <x-input-error :messages="$errors->get('type')" class="mt-2" />
        </div>


        <div class="col-md-6">
            <label for="target_audience" class="form-label">Público Alvo</label>
            <input type="text" class="form-control" id="target_audience" name="target_audience">
            <x-input-error :messages="$errors->get('target_audience')" class="mt-2" />
        </div>


        <div class="col-md-6">
            <label for="vacancies" class="form-label">Vagas</label>
            <input type="number" class="form-control" id="vacancies" name="vacancies">
            <x-input-error :messages="$errors->get('vacancies')" class="mt-2" />
        </div>


        <div class="col-md-6">
            <label for="social_vacancies" class="form-label">Vagas sociais</label>
            <input type="number" class="form-control" id="social_vacancies" name="social_vacancies">
            <x-input-error :messages="$errors->get('social_vacancies')" class="mt-2" />
        </div>


        <div class="col-md-6">
            <label for="regular_vacancies" class="form-label">Vagas normais</label>
            <input type="number" class="form-control" id="regular_vacancies" name="regular_vacancies">
            <x-input-error :messages="$errors->get('regular_vacancies')" class="mt-2" />
        </div>


        <div class="col-md-6">
            <label for="material" class="form-label">Materiais necessários</label>
            <input type="text" class="form-control" id="material" name="material">
            <x-input-error :messages="$errors->get('material')" class="mt-2" />
        </div>


        <div class="col-md-6">
            <label for="interest_area" class="form-label">Área de interesse</label>
            <input type="text" class="form-control" id="interest_area" name="interest_area">
            <x-input-error :messages="$errors->get('interest_area')" class="mt-2" />
        </div>


        <div class="col-md-6">
            <label for="price" class="form-label">Preço (opcional)</label>
            <input type="number" step="any" class="form-control" id="price" name="price">
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>

        <div class="col-12">
            <button type="submit" class="btn-form rounded">Cadastrar</button>
        </div>
    </form>
</div>

@endsection