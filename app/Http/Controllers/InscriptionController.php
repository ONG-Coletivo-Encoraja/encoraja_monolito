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
    //teve alterações
    public function index()
    {
        $search = request('search');

        $inscriptions = Inscription::with(['user','event']);

        if ($search) {
            $inscriptions->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->orWhereHas('event', function ($query) use ($search) {
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

    }

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

        return view('beneficiary.inscriptions', ['inscriptions' => $inscriptions]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $inscription = Inscription::with(['user','event'])->findOrFail($id);
        return view('inscriptions.edit', ['inscription' => $inscription]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inscription = Inscription::findOrFail($id);
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