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
    public function index(Request $request)
    {
        $user = User::find(Auth::id());

        $search = $request->input('search');

        $inscriptionsQuery = Inscription::query();

        if (!empty($search)) {
            $inscriptionsQuery->whereHas('event', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        }

        if ($user->permissions()->first()->type == 'beneficiary') {
            $inscriptionsQuery->where('user_id', $user->id);
        }

        $inscriptions = $inscriptionsQuery->with('event')->get();

        return view('inscriptions.index', ['inscriptions' => $inscriptions, 'user' => $user, 'search' => $search]);
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

        $existingInscription = Inscription::where('event_id', $eventId)
            ->where('user_id', $user->id)
            ->first();

        if ($existingInscription) {
            return redirect()->back()->with('error', 'Este usuário já está inscrito neste evento.');
        }

        $inscription = Inscription::create([
            'proof' => 'lalal',
            'status' => 'pending',
            'event_id' => $eventId,
            'user_id' => $user->id
        ]);

        return redirect('/inscriptions');
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