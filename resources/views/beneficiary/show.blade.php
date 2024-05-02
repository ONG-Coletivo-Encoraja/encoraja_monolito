@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

<div class="register-inscription-form rounded">    
    <form class="row g-3" method="POST" action="/inscriptions">
        @csrf
        @method('POST')
        <div class="col-md-6">
            <label for="name" class="form-label">Código do usuário</label>
            <input type="number" class="form-control" id="user_id" name="user_id" required>
            <br>
            <label for="name" class="form-label">Código do evento</label>
            <input type="text" name="event_id" id="event_id" class="form-control" value="{{ $event }}" readonly>
            <br>
            <button type="submit" class="btn-form rounded">Salvar Inscrição</button>
        </div>
    </form>

</div>
   {{-- Exibir mensagens de erro --}}
   @if(session('error'))
    <div class="alert alert-danger mt-3">
        {{ session('error') }}
    </div>
    @endif
</div>

@endsection