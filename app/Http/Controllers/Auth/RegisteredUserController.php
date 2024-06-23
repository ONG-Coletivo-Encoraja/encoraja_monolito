<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'cpf' => ['required', 'string', 'max:14'],
            'date_birthday' => ['required'],
            'image_term' => ['required'],
            'data_term' => ['required'],

            'street' => ['required', 'string'],
            'number' => ['required', 'numeric'],
            'neighbourhood' => ['required', 'string'],
            'city' => ['required', 'string'],
            'zip_code' => ['required', 'string', 'max:10'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'date_birthday' => $request->date_birthday,
            'image_term' => $request->has('image_term'),
            'data_term' => $request->has('data_term'),
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
