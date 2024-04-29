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
    //TEVE CONFLITO
    public function index()
    {
        $search = request('search');

        $inscriptions = Inscription::with(['users','events']);

        if ($search) {
            $inscriptions->whereHas('users', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->orWhereHas('events', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        }
        $inscriptions = $inscriptions->get();
        
        return view('inscriptions.index', ['inscriptions' => $inscriptions]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $event_id = $request->event;
        return view('beneficiary.show', ['event' => $event_id]);
    }

    // public $event_id;
    // public $user_id;

    // public function event_id(Request $request)
    // {
    //     $event_id= Event::where('id', $this->event_id)->first();
    //     return view('/beneficiary', compact('event_id'));
    // }


    // public function user_id(Request $request)
    // {
    //     // Busca o usuário pelo ID fornecido na requisição
    //     $id = $request->input('id');
    //     $user_id = $this->user_id = User::find($id);
    //     return view('beneficiary.show');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event_id = $request->input('event_id');
        $user_id = $request->input('user_id');

        $inscription = Inscription::create([
            'proof' => 'lalal',
            'status' => 'pending',
            'event_id' => ($event_id),
            'user_id' => ($user_id)
        ]);

        return redirect('/beneficiary');

        // if (!$user_id) {
        //     // Se não foi encontrado, exibe uma mensagem de erro
        //     return view('beneficiary.show')->with('error', 'Beneficiary user not found with ID: ' . $user_id);
        // }


        // // Se o usuário foi encontrado, cria a inscrição associada a ele
        // $validatedData['id'] = $user_id->id;
        // $validatedData['event'] = $event_id;
        // $inscription = Inscription::create($validatedData);

        // // Redireciona com uma mensagem de sucesso se a inscrição for criada com sucesso
        // return view('/beneficiary', ['inscription' => $request->input('inscription')]);



        // // Obtenha o ID do usuário e do evento do formulário
        // $userId = $request->input('user_id');
        // $eventId = $request->input('event_id');

        // // Verifique se o usuário e o evento existem
        // $user = User::find($userId);
        // $event = Event::find($eventId);

        // if (!$user || !$event) {
        //     // Usuário ou evento não encontrado, redirecione ou retorne uma mensagem de erro
        //     return view('beneficiary.show')->with('error', 'Usuário ou evento não encontrado.');
        // }

        // // Crie uma nova inscrição associando o usuário e o evento
        // $inscription = new Inscription();
        // $inscription->user()->associate($user);
        // $inscription->event()->associate($event);
        // $inscription->save();

        // // Redirecione de volta com uma mensagem de sucesso
        // return view('beneficiary.show')->with('success', 'Inscrição realizada com sucesso.');

    }
    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $inscription = Inscription::with(['users', 'events'])->findOrFail($id);
    //     return view('inscriptions.show', ['inscription' => $inscription]);
    // }
    /**
     * Display the inscriptions of a specific user.
     */
    public function show_user_inscriptions()
    {
        $search = request('search');
        
        if($search){
            $inscriptions = Inscription::with('user', 'event')->where([
                ['user_id','like', '%'.$search.'%']
            ])->get();
        }else{
            $inscriptions = [];
        }

        // $inscriptions = Inscription::whereHas('users', function ($query) use ($user_id) {
        //     $query->where('id', $user_id);
        // })->with(['users', 'events'])->get();

        return view('beneficiary.inscriptions', ['inscriptions' => $inscriptions]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $inscription = Inscription::with(['users', 'events'])->findOrFail($id);
        return view('inscription.edit', ['inscription' => $inscription]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inscription = Inscription::with(['users', 'events'])->findOrFail($id);
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