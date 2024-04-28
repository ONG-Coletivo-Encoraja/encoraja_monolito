<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::where('status', '=', 'Active')->get();
        return view('beneficiary.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('beneficiary.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $beneficiary = User::create([
            'name' => $request->input('name'),
            'email' =>  $request->input('email'),
            'date_birthday' =>  $request->input('date_birthday'),
            'cpf' =>  $request->input('cpf'),
            'password' =>  $request->input('password'),
        ]);

        $beneficiary->addresses()->create([
            'street' =>  $request->input('street'),
            'number' =>  $request->input('number'),
            'neighbourhood' =>  $request->input('neighbourhood'),
            'city' => $request->input('city'),
            'zip_code' => $request->input('zip_code')
        ]);

        $beneficiary->permissions()->create([
            'type' => 'beneficiary'
        ]);

        $key_user = $beneficiary->id;
       
        //return redirect('/beneficiary');

        //redirecionando para a tela de confirmação com o codigo de cadastro do usuário
        return redirect()->route('beneficiary.validation', ['key_user'=> $key_user]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
       //redirecionar para a tela de confirmação
       return redirect()->route('beneficiary.student', ['key_user'=>$request->input ('key_user')]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::with(['addresses', 'permissions'])->findOrFail($id);
        return view('beneficiary.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::with('addresses')->findOrFail($id);
        $user->update($request->all());

        $address = $user->addresses->first();
        $address->update($request->all());
        
        $permission = $user->permissions->first();
        $permission->update($request->all());

        return response()->redirectTo('/beneficiary');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->redirectTo('/beneficiary');
    } 
}
