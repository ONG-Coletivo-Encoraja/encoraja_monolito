<?php

namespace App\Http\Controllers;

use App\Rules\ValidVacancies;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Rules\ValidDate;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function index(Request $request)
    {
        $user = User::find(Auth::id());

        $search = $request->input('search');

        $eventsQuery = Event::query();

        if (!empty($search)) {
            $eventsQuery->where('name', 'like', '%' . $search . '%');
        }

        if ($user->permissions()->first()->type == 'beneficiary') {
            $eventsQuery->where('status', '=', 'Active');
        }
        
        $events = $eventsQuery->get();

        return view('events.index', ['events' => $events, 'user' => $user, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::find(Auth::id());
        return view('events.create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name'              => ['required'],
            'description'       => ['required'],
            'date'              => ['required', new ValidDate],
            'time'              => ['required'],
            'modality'          => ['required'],
            'status'            => ['required'],
            'type'              => ['required'],
            'target_audience'   => ['required'],
            'vacancies'         => ['required'],
            'social_vacancies'  => ['required'],
            'regular_vacancies' => ['required'],
            'material'          => ['required'],
            'price'             => ['required', 'numeric'],
        ], [
            'nome.required'              => 'Preenchimento obrigatório do nome.',
            'description.required'       => 'Preenchimento obrigatório da descrição.',
            'date.required'              => 'Preenchimento obrigatótio da data.',
            'time.required'              => 'Preenchimento obrigatório do horário.',
            'modality.required'          => 'Preenchimento obrigatório da modalidade',
            'status.required'            => 'Preenchimento obrigatório do status.',
            'type.required'              => 'Preenchimento obrigatório do tipo.',
            'target_audience.required'   => 'Preenchimento obrigatório.',
            'vacacies.required'          => 'Preenchimento obrigatório.',
            'social_vacancies.required'  => 'Preenchimento obrigatório.',
            'regular_vacancies.required' => 'Preenchimento obrigatório.',
            'material.required'          => 'Preenchimento obrigatório.',
            'price.required'             => 'Preenchimento obrigatório.',
        ]);

        if(Event::query()->create($request->all())) {
            return response()->redirectTo('/events');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // ver detalhes de um evento
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());
        return response()->redirectTo('/events');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return response()->redirectTo('/events');
    }
}