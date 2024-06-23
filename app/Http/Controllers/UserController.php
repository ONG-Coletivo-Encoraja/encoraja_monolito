<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use App\Rules\ValidAge;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::with(['addresses', 'permissions'])->findOrFail($id);
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'cpf' => ['required', 'string', 'max:14', 'min:14'],
            'date_birthday' => ['required', new ValidAge],
            'street' => ['required', 'string'],
            'number' => ['required', 'numeric'],
            'neighbourhood' => ['required', 'string'],
            'city' => ['required', 'string'],
            'zip_code' => ['required', 'string', 'max:9', 'min:9'],
            'availability' => ['string'],
            'course_experience' => ['string'],
            'how_know' => ['string'],
            'expectations' => ['string'],
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
            
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.string' => 'O campo CPF deve ser uma string.',
            'cpf.max' => 'O campo CPF deve ter no máximo :max caracteres.',
            'cpf.min' => 'O campo CPF deve ter pelo menos :min caracteres.',
            
            'date_birthday.required' => 'O campo data de nascimento é obrigatório.',
            'date_birthday.valid_age' => 'Você deve ter pelo menos 18 anos de idade.',
            
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
        
            $user = User::with('addresses')->findOrFail($id);
            $user->update($request->all());
    
            $address = $user->addresses->first();
            $address->update($request->all());
    
            $permission = $user->permissions->first();
            $permission->update($request->all());
    
            return view('home.home', ['user' => Auth::user()]);
        }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
