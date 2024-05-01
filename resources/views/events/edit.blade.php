@extends('layouts.main')

@section('title', 'Editar Evento')

@section('content')
    <h1 class="tittle1">Editar Evento</h1>

    <form action="/events/{{ $event->id }}" method="POST" class="row g-3 register-admin-form rounded">
        @csrf
        @method('PUT')

        <div class="col-md-6">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}" required>
        </div>
        <div class="col-md-6">
            <label for="description" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $event->description}}" required>
        </div>
        <div class="col-md-6">
            <label for="date" class="form-label">Data</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $event->date }}" required>
        </div>
        <div class="col-md-6">
            <label for="time" class="form-label">Time</label>
            <input type="time" class="form-control" id="time" name="time" value="{{ $event->time }}" required>
        </div>
        <div class="col-md-4">
            <label for="modality" class="form-label">Modalidade</label>
            <select id="modality" name="modality" class="form-select" required>
                <option value="Presential" {{ $event->modality == 'Presential' ? 'selected' : '' }}>Presencial</option>
                <option value="Hybrid" {{ $event->modality == 'Hybrid' ? 'selected' : '' }}>Híbrido</option>
                <option value="Remote" {{ $event->modality == 'Remote' ? 'selected' : '' }}>Remoto</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select" required>
                <option value="Active" {{ $event->status == 'Active' ? 'selected' : '' }}>Ativo</option>
                <option value="Inactive" {{ $event->status == 'Inactive' ? 'selected' : '' }}>Inativo</option>
                <option value="Pending" {{ $event->status == 'Pending' ? 'selected' : '' }}>Pendente</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="type" class="form-label">Tipo</label>
            <select id="type" name="type" class="form-select" required>
                <option value="Course" {{ $event->type == 'Course' ? 'selected' : '' }}>Curso</option>
                <option value="Workshop" {{ $event->type == 'Workshop' ? 'selected' : '' }}>Oficina</option>
                <option value="Lecture" {{ $event->type == 'Lecture' ? 'selected' : '' }}>Palestra</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="target_audience" class="form-label">Público Alvo</label>
            <input type="text" class="form-control" id="target_audience" name="target_audience" value="{{ $event->target_audience }}" required>
        </div>
        <div class="col-md-6">
            <label for="vacancies" class="form-label">Vagas</label>
            <input type="number" class="form-control" id="vacancies" name="vacancies" value="{{ $event->vacancies }}" required>
        </div>
        <div class="col-md-6">
            <label for="social_vacancies" class="form-label">Vagas sociais</label>
            <input type="number" class="form-control" id="social_vacancies" name="social_vacancies" value="{{ $event->social_vacancies }}" required>
        </div>
        <div class="col-md-6">
            <label for="regular_vacancies" class="form-label">Vagas normais</label>
            <input type="number" class="form-control" id="regular_vacancies" name="regular_vacancies" value="{{ $event->regular_vacancies }}" required>
        </div>
        <div class="col-md-6">
            <label for="material" class="form-label">Materiais necessários</label>
            <input type="text" class="form-control" id="material" name="material" value="{{ $event->material }}" required>
        </div>
        <div class="col-md-6">
            <label for="interest_area" class="form-label">Área de interesse</label>
            <input type="text" class="form-control" id="interest_area" name="interest_area" value="{{ $event->interest_area }}" required>
        </div>
        <div class="col-md-6">
            <label for="price" class="form-label">Preço (opcional)</label>
            <input type="number" step="any" class="form-control" id="price" name="price" value="{{ $event->price }}" required>
        </div>
        <br>
        <div class="col-12">
            <button type="submit" class="btn-form rounded">Salvar alterações</button>
        </div>
    </form>
    {{-- <a href="/events"><button>Cancelar</button></a> --}}
@endsection