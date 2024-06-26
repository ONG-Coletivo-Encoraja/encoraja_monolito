@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

<h1 class="tittle">Escolha um tipo de usuário</h1>

<div class="options-user">
    
    @if(Auth::user()->can('viewAdmin', $user) || Auth::user()->can('viewVoluntary', $user) || Auth::user()->can('viewBeneficiary', $user))
        <form action="/home-user" method="GET">
            @csrf
            <input type="hidden" name="type_user" id="type_user" value="beneficiary">
            <input class="option-home-admin rounded" type="submit" value="Beneficiário">
        </form>
    @endif
    
    @if(Auth::user()->can('viewAdmin', $user) || Auth::user()->can('viewVoluntary', $user))
        <form action="/home-user" method="GET">
            @csrf
            <input type="hidden" name="type_user" id="type_user" value="voluntary">
            <input class="option-home-admin rounded" type="submit" value="Voluntário">
        </form>
    @endif

    @if(Auth::user()->can('viewAdmin', $user))
        <form action="/home-user" method="GET">
            @csrf
            <input type="hidden" name="type_user" id="type_user" value="administrator">
            <input class="option-home-admin rounded" type="submit" value="Administrador">
        </form>
    @endif

</div>

@endsection
