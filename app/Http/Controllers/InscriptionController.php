<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;


class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //teve alterações
    public function index()
    {
        $user = User::find(Auth::id());

        if ($user->permissions()->first()->type == 'beneficiary') {
            $inscriptions = $this->beneficiary_inscriptions();
        } else {
            $inscriptions = Inscription::All();
        }

        // $search = request('search');

        // if ($search) {
        //     $inscriptions->whereHas('user', function ($query) use ($search) {
        //         $query->where('name', 'like', '%' . $search . '%');
        //     })->orWhereHas('event', function ($query) use ($search) {
        //         $query->where('name', 'like', '%' . $search . '%');
        //     });
        // }
        
        return view('inscriptions.index', ['inscriptions' => $inscriptions, 'user' => $user]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $event_id = $request->event;
        return view('beneficiary.show', ['event' => $event_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $eventId = $request->input('eventId');
        $user = User::find(Auth::id());

        // Verifique se o usuário já possui uma inscrição para este evento
        $existingInscription = Inscription::where('event_id', $eventId)
            ->where('user_id', $user->id)
            ->first();

        if ($existingInscription) {
            // Se o usuário já estiver inscrito neste evento, retorne uma mensagem de erro
            return redirect()->back()->with('error', 'Este usuário já está inscrito neste evento.');
        }

        // Caso contrário, crie a nova inscrição
        $inscription = Inscription::create([
            'proof' => 'lalal',
            'status' => 'pending',
            'event_id' => $eventId,
            'user_id' => $user->id
        ]);

        // Redirecione para onde quiser após a criação bem-sucedida da inscrição
        return redirect('/inscriptions');
    }

    public function beneficiary_inscriptions()
    {
        $user = Auth::id();
        
        $inscriptions = Inscription::with('user', 'event')->where([
            ['user_id','like', '%'.$user.'%']
        ])->get();

        return $inscriptions;
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $inscription = Inscription::with(['user','event'])->findOrFail($id);
        return view('inscriptions.edit', ['inscription' => $inscription, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $inscription = Inscription::findOrFail($id);
            $inscription->update($request->all());

            return response()->redirectTo('/inscriptions');
        } catch (QueryException $e) {
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
        $inscription = Inscription::findOrFail($id);

        $inscription->delete();

        return redirect('/inscriptions');
    }
}