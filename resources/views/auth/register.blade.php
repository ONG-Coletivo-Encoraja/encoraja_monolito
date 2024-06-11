<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- CPF -->
        <div class="mt-4">
            <x-input-label for="cpf" :value="__('CPF')" />
            <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required autofocus autocomplete="cpf" />
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
        </div>

        <!-- Birthday -->
        <div class="mt-4">
            <x-input-label for="date_birthday" :value="__('Data de nascimento')" />
            <x-text-input id="date_birthday" class="block mt-1 w-full" type="date" name="date_birthday" :value="old('date_birthday')" required autofocus autocomplete="date_birthday" />
            <x-input-error :messages="$errors->get('date_birthday')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('Senha')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirme a senha')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        
        <!-- Image Term -->
        <div class="mt-4 flex flex-row">
            <x-text-input id="image_term" class="block mt-1 mr-1 " type="checkbox" name="image_term" :value="old('image_term')" required autocomplete="image_term" />
            <x-input-label for="image_term" :value="__('Autorização do uso de imagem')" />
            <x-input-error :messages="$errors->get('image_term')" class="mt-2" />
        </div>

        <!-- Data Term -->
        <div class="mt-4 flex flex-row">
            <x-text-input id="data_term" class="block mt-1 mr-1 " type="checkbox" name="data_term" :value="old('data_term')" required autocomplete="data_term" />
            <x-input-label for="data_term" :value="__('Autorização do uso de dados')" />
            <x-input-error :messages="$errors->get('data_term')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Já possui uma conta?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Cadastrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
