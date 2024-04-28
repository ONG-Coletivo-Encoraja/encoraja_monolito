@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

<div>    
    <form class="row g-3" method="POST">
        @csrf
        <div class="col-md-6">
            <label for="name" class="form-label">Código do usuário</label>
            <input type="number" class="form-control" id="id" name="id" required>
            <br>
            <button type="submit" class="btn btn-primary" action="beneficiary/{{id}}">Salvar Inscrição</button>
        </div>
    </form>
</div>

@endsection


