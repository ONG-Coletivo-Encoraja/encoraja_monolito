@extends('layouts.main')

@section('title', 'Editar Inscrições')
@section('content')

<div>
    <form class="row g-3" action="/inscriptions/{{ $inscription->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="col-md-4">
            <label for="user" class="form-label">Inscrito</label>
            <input type="text" class="form-control" id="user" name="user" value="{{ $inscription->user->name }}" readonly>
        </div>

        <div class="col-md-4">
            <label for="event" class="form-label">Evento</label>
            <input type="text" class="form-control" id="event" name="event" value="{{ $inscription->event->name }}" readonly>
        </div>

        <div class="col-md-4">
            <label for="proof" class="form-label">Comprovante de pagamento</label>
            <input type="checkbox" id="proof" name="proof" value="{{ $inscription->proof }}" readonly>
        </div>

        <div class="col-md-4">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select">
                <option value="approved" {{ $inscription->status == 'approved' ? 'selected' : '' }}>Aprovado</option>
                <option value="pending" {{ $inscription->status == 'pending' ? 'selected' : '' }}>Pendente</option>
                <option value="rejected" {{ $inscription->status == 'rejected' ? 'selected' : '' }}>Rejeitado</option>
            </select>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Salvar alterações</button>
        </div>
    </form>
</div>

@endsection
