<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inscriptions = Inscription::with(['users','events'])->get();
        return view('inscriptions.index', ['inscriptions' => $inscriptions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inscriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Defina as regras de validação aqui
        ]);

        // Crie a inscrição se os dados forem válidos
        $inscription = Inscription::create($validatedData);

        
        // Redirecione com uma mensagem de sucesso se a inscrição for criada com sucesso
        return redirect('/inscriptions')->with('success', 'Inscription created successfully');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inscription = Inscription::with(['users','events'])->findOrFail($id);
        return view('inscriptions.show', ['inscription' => $inscription]);    
    }
    /**
    * Display the inscriptions of a specific user.
    */
    public function show_user_inscriptions(string $userId)
    {

        $inscriptions = Inscription::whereHas('users', function($query) use ($userId) {
            $query->where('id', $userId);
        })->with(['users', 'events'])->get();

        return view('beneficiary.student', ['inscriptions' => $inscriptions]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $inscription = Inscription::with(['users','events'])->findOrFail($id);
        return view('inscription.edit', ['inscription' => $inscription]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inscription = Inscription::with(['users','events'])->findOrFail($id);
        $inscription->update($request->all());

        return response()->redirectTo('/inscriptions');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $inscription = Inscription::findOrFail($id);
    
        $inscription->delete();

        return redirect('/inscriptions')->with('success', 'Inscription deleted successfully');
    }
}
