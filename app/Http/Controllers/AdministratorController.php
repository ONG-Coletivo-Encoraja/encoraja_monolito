<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        return view('administrator.home');
    }
    public function index()
    {
        $search = request('search');

        $adm = new Administrator;
        $users = $adm->search_user_by_name($search);
        return view('administrator.index', ['users' => $users, 'search' => $search]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrator.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $adm = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'date_birthday' => $request->input('date_birthday'),
                'cpf' => $request->input('cpf'),
                'password' => $request->input('password')
            ]);

            $adm->addresses()->create([
                'street' => $request->input('street'),
                'number' => $request->input('number'),
                'neighbourhood' => $request->input('neighbourhood'),
                'city' => $request->input('city'),
                'zip_code' => $request->input('zip_code')
            ]);

            $adm->permissions()->create([
                'type' => 'administrator'
            ]);
        } catch (QueryException $e) {
            if ($e) {
                return back()->withInput()->withErrors(['email' => 'O email fornecido já está em uso. Tente novamente!']);
            }
        }
        return redirect('/adm');
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

        return view('administrator.edit', ['user' => $user]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $user = User::with('addresses')->findOrFail($id);
            $user->update($request->all());
    
            $address = $user->addresses->first();
            $address->update($request->all());
    
            $permission = $user->permissions->first();
            $permission->update($request->all());
    
            return response()->redirectTo('/adm');
        }catch(QueryException $e){
            if ($e) {
                return back()->withInput()->withErrors(['email' => 'O email fornecido já está em uso. Tente novamente!']);
            }
        }

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->redirectTo('/adm');
    }
}
