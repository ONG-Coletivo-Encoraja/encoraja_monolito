<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\ValidAge;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],  //, Rules\Password::defaults()
            'cpf' => ['required', 'string', 'max:14', 'min:14'],
            'date_birthday' => ['required', new ValidAge],
            'image_term' => ['required'],
            'data_term' => ['required'],
            'street' => ['required', 'string'],
            'number' => ['required', 'numeric'],
            'neighbourhood' => ['required', 'string'],
            'city' => ['required', 'string'],
            'zip_code' => ['required', 'string', 'max:9', 'min:9'],
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser uma string.',
            'name.max' => 'O campo nome não pode ter mais de :max caracteres.',
            
            'email.required' => 'O campo email é obrigatório.',
            'email.string' => 'O campo email deve ser uma string.',
            'email.lowercase' => 'O campo email deve estar em minúsculas.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
            'email.max' => 'O campo email não pode ter mais de :max caracteres.',
            'email.unique' => 'Este email já está em uso.',
            
            'password.required' => 'O campo senha é obrigatório.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
            'password.regex' => 'A senha deve conter pelo menos uma letra maiúscula, uma letra minúscula e um número.',
            
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.string' => 'O campo CPF deve ser uma string.',
            'cpf.max' => 'O campo CPF deve ter no máximo :max caracteres.',
            'cpf.min' => 'O campo CPF deve ter pelo menos :min caracteres.',
            
            'date_birthday.required' => 'O campo data de nascimento é obrigatório.',
            'date_birthday.valid_age' => 'Você deve ter pelo menos 18 anos de idade.',
            
            'image_term.required' => 'Você deve aceitar os termos de autorização do uso de imagem.',
            
            'data_term.required' => 'Você deve aceitar os termos de autorização do uso de dados.',
            
            'street.required' => 'O campo rua é obrigatório.',
            'street.string' => 'O campo rua deve ser uma string.',
            
            'number.required' => 'O campo número é obrigatório.',
            'number.numeric' => 'O campo número deve ser um valor numérico.',
            
            'neighbourhood.required' => 'O campo bairro é obrigatório.',
            'neighbourhood.string' => 'O campo bairro deve ser uma string.',
            
            'city.required' => 'O campo cidade é obrigatório.',
            'city.string' => 'O campo cidade deve ser uma string.',
            
            'zip_code.required' => 'O campo CEP é obrigatório.',
            'zip_code.string' => 'O campo CEP deve ser uma string.',
            'zip_code.max' => 'O campo CEP não pode ter mais de :max caracteres.',
            'zip_code.min' => 'O campo CEP deve ter pelo menos :min caracteres.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->permissions()->create([
            'type' => 'beneficiary'
        ]);

        $user->addresses()->create([
            'street' => $request->street,
            'number' => $request->number,
            'neighbourhood' => $request->neighbourhood,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home.index', absolute: false));
    }
}
