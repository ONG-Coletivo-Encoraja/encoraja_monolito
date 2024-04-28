<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Event;

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
    public function create(Request $request)
    {
        $inscriptions = Inscription::with(['user','event']);
        return view('beneficiary.show');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // Obtenha o ID do usuário e do evento do formulário
            $userId = $request->input('user_id');
            $eventId = $request->input('event_id');

            // Verifique se o usuário e o evento existem
            $user = User::find($userId);
            $event = Event::find($eventId);

            if (!$user || !$event) {
                // Usuário ou evento não encontrado, redirecione ou retorne uma mensagem de erro
                return view('beneficiary.show')->with('error', 'Usuário ou evento não encontrado.');
            }

            // Crie uma nova inscrição associando o usuário e o evento
            $inscription = new Inscription();
            $inscription->user()->associate($user);
            $inscription->event()->associate($event);
            $inscription->save();

            // Redirecione de volta com uma mensagem de sucesso
            return view('beneficiary.student')->with('success', 'Inscrição realizada com sucesso.');

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
    public function show_user_inscriptions(string $user_id)
    {

        $inscriptions = Inscription::whereHas('users', function($query) use ($user_id) {
            $query->where('id', $user_id);
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
