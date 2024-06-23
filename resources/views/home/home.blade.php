@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

<h1 class="tittle">Opções</h1>

<div class="options-user">
    
    @if(Auth::user()->can('viewBeneficiary', $user))
        <h1 class="tittle">Opções de beneficiário</h1>

        <div class="options-home-admin">
            {{-- <a href="/beneficiary/create" class="option-home-admin rounded">Se cadastre aqui</a> --}}
            <a href="/user/{{$user->id}}/edit" class="option-home-admin rounded">Editar cadastro</a>

            <a href="/events" class="option-home-admin rounded">Opções de Eventos</a>
        
            <a href="/inscriptions" class="option-home-admin rounded">Minhas inscrições</a>
        </div>
    @endif
    
    @if(Auth::user()->can('viewVoluntary', $user))
        <h1 class="tittle">Opções de voluntário</h1>

        <div class="options-home-admin">
            {{-- <a href="/voluntary/create" class="option-home-admin rounded">Efetuar cadastro</a> --}}
            <a href="/user/{{$user->id}}/edit" class="option-home-admin rounded">Editar cadastro</a>

            <a href="/events" class="option-home-admin rounded">Opções de Eventos</a>
        
            <a href="/events/create" class="option-home-admin rounded">Sugerir Eventos</a>
        
            {{-- <a href="/voluntary/inscriptions" class="option-home-admin rounded">Visualisar inscrições</a> --}}
            <a href="/inscriptions" class="option-home-admin rounded">Visualisar inscrições</a>
        </div>
    @endif

    @if(Auth::user()->can('viewAdmin', $user))
        <h1 class="tittle">Opções de administrador</h1>

        <div class="options-home-admin">
            {{-- <details class="option-home-admin rounded">
                <summary style="list-style: none;">Cadastrar usuários</summary>
                <a href="/adm/create" class="detail-option">Cadastrar administrador</a><br>
                <a href="/voluntary/create" class="detail-option">Cadastrar voluntário</a><br>
                <a href="/beneficiary/create" class="detail-option">Cadastrar beneficiario</a><br>
            </details> --}}
        
            <a href="/user/{{$user->id}}/edit" class="option-home-admin rounded">Editar cadastro</a>

            <a href="/adm" class="option-home-admin rounded">Visualisar todos os usuários</a>
        
            <a href="/events" class="option-home-admin rounded">Opções de Eventos</a>
        
            <a href="/inscriptions" class="option-home-admin rounded">Opções de inscrições</a>
        </div>
    @endif

</div>

@endsection
