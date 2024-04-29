@extends('layouts.main')

@section('title', 'Editar Inscrições')
@section('content')

    <div>
        <form class="row g-3" action="/adm/{{ $inscription->id }}" method="POST">
            @csrf
            @method('PUT')
            @foreach($inscription->users as $user)
                <div class="col-md-4">
                    <label for="name" class="form-label">Inscrito</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
                </div>
            @endforeach
            @foreach($inscription->events as $event)
                <div class="col-md-4">
                    <label for="name" class="form-label">Evento</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}" readonly>
                </div>
            @endforeach
            <div>
                <input type="checkbox" id="proof" name="proof"  value="{{ $inscription->proof }}" readonly>
                <label for="proof">Comprovante de pagamento</label>
            </div>
            <div class="col-md-4">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select" >
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