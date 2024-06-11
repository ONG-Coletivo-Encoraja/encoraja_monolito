<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <h1 class="tittle">Escolha um tipo de usuário</h1>

                    <div class="options-user">
                        <a href="/home-admin" class="choose-user rounded">Administrador</a>

                        <a href="/home-voluntary" class="choose-user rounded">Voluntário</a>

                        <a href="/home-beneficiary" class="choose-user rounded">Beneficiário</a>
                    </div>


                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
