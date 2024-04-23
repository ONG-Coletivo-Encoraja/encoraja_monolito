<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

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
        $users = User::with('permissions')->get();
        return view('administrator.index', ['users' => $users]);
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

        $adm = User::create([
            'name' => $request->input('name'),
            'email' =>  $request->input('email'),
            'date_birthday' =>  $request->input('date_birthday'),
            'cpf' =>  $request->input('cpf'),
            'password' =>  $request->input('password'),
        ]);

        $adm->addresses()->create([
            'street' =>  $request->input('street'),
            'number' =>  $request->input('number'),
            'neighbourhood' =>  $request->input('neighbourhood'),
            'city' => $request->input('city'),
            'zip_code' => $request->input('zip_code')
        ]);

        $adm->permissions()->create([
            'type' => 'administrator'
        ]);
       
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
        // dd($user);
        return view('administrator.edit', ['user' => $user]);
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

        return response()->redirectTo('/adm');
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
    // public function event(){
    //     $events = Event::all();
    //     return view('events.index', ['events' => $events]);
    // }
}
