<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
