<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- CPF -->
        <div class="mt-4">
            <x-input-label for="cpf" :value="__('CPF')" />
            <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" autofocus autocomplete="cpf" />
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
        </div>

        <!-- Birthday -->
        <div class="mt-4">
            <x-input-label for="date_birthday" :value="__('Data de nascimento')" />
            <x-text-input id="date_birthday" class="block mt-1 w-full" type="date" name="date_birthday" :value="old('date_birthday')" autofocus autocomplete="date_birthday" />
            <x-input-error :messages="$errors->get('date_birthday')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                         autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Zip code -->
        <div class="mt-4">
            <x-input-label for="zip_code" :value="__('CEP')" />
            <x-text-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code" :value="old('zip_code')" autofocus autocomplete="zip_code" />
            <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
        </div>

        <!-- City -->
        <div class="mt-4">
            <x-input-label for="city" :value="__('Cidade')" />
            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" autofocus autocomplete="city" />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>
            
        <!-- Neighbourhood -->
        <div class="mt-4">
            <x-input-label for="neighbourhood" :value="__('Bairro')" />
            <x-text-input id="neighbourhood" class="block mt-1 w-full" type="text" name="neighbourhood" :value="old('neighbourhood')" autofocus autocomplete="neighbourhood" />
            <x-input-error :messages="$errors->get('neighbourhood')" class="mt-2" />
        </div>

        <!-- Street -->
        <div class="mt-4">
            <x-input-label for="street" :value="__('Rua')" />
            <x-text-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')" autofocus autocomplete="street" />
            <x-input-error :messages="$errors->get('street')" class="mt-2" />
        </div>

        <!-- Street number -->
        <div class="mt-4">
            <x-input-label for="number" :value="__('Número')" />
            <x-text-input id="number" class="block mt-1 w-full" type="number" name="number" :value="old('number')" autofocus autocomplete="number" />
            <x-input-error :messages="$errors->get('number')" class="mt-2" />
        </div>

        <!-- Image Term -->
        <div class="mt-4 flex flex-row">
            <x-text-input id="image_term" class="block mt-1 mr-1 " type="checkbox" name="image_term" :value="old('image_term')" autocomplete="image_term" />
            <x-input-label for="image_term" :value="__('Autorização do uso de imagem')" />
            <x-input-error :messages="$errors->get('image_term')" class="mt-2" />
        </div>

        <!-- Data Term -->
        <div class="mt-4 flex flex-row">
            <x-text-input id="data_term" class="block mt-1 mr-1 " type="checkbox" name="data_term" :value="old('data_term')" autocomplete="data_term" />
            <x-input-label for="data_term" :value="__('Autorização do uso de dados')" />
            <x-input-error :messages="$errors->get('data_term')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
