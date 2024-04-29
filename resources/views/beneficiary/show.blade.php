@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

<div>    
    <form class="row g-3" method="POST" action="/inscriptions">
        @csrf
        @method('POST')
        <div class="col-md-6">
            <label for="name" class="form-label">Código do usuário</label>
            <input type="number" class="form-control" id="user_id" name="user_id" required>
            <br>
            <input type="text" name="event_id" id="event_id" class="form-control" value="{{ $event }}" readonly>
            <button type="submit" class="btn btn-primary">Salvar Inscrição</button>
        </div>
    </form>
</div>

@endsection