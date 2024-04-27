<?php

namespace app\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;


class BeneficiaryStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        return view('beneficiary.home');
    }   
    public function index()
    {
        $users = User::with('permissions')->get();
        return view('beneficiary.index', ['users' => $users]);
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
       
        return redirect()->route('beneficiary.home')->with('name', $request->name);
    }
 
    /**
     * Display the specified event for beneficiaries.
     */
    public function show(Event $event)
    {
        // Verifique se o evento está aprovado antes de exibi-lo
        if ($event->status === 'Active') {
            return view('beneficiary.event_details', ['event' => $event]);
        } else {
            // Redirecione ou exiba uma mensagem de erro informando que o evento não está disponível
            return "Beneficiário não está inscrito em nenhum evento ainda";
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::with(['addresses', 'permissions'])->findOrFail($id);
        // dd($user);
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