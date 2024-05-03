<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\Inscription;
use Illuminate\Http\Request;


class VoluntaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        return view('voluntary.home');
    }   
    public function index()
    {
        $users = User::with('permissions')->get();
        return view('voluntary.index', ['users' => $users]);

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('voluntary.create');
    }

    public function createEvent()
    {
        return view('voluntary.createEvent');
    }
    public function eventsCreate(Request $request)
    {
        if(Event::query()->create($request->all())) {
            return response()->redirectTo('/voluntary/events');
        }
    }


    public function selectEvents()
    {

        $search = request('search');

        $event = new Event;
        $events = $event->search_event_by_name($search);

        return view('voluntary.events', ['events' => $events, 'search' => $search]);
    }
    public function viewInscriptions()
    {
        $search = request('search');
        
        if($search){
            $inscriptions = Inscription::with('user', 'event')->where([
                ['user_id','like', '%'.$search.'%']
            ])->get();
        }else{
            $inscriptions = Inscription::with('user', 'event')->get();
        }
        return view('voluntary.inscriptions', ['inscriptions' => $inscriptions]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $voluntary = User::create([
            'name' => $request->input('name'),
            'email' =>  $request->input('email'),
            'date_birthday' =>  $request->input('date_birthday'),
            'cpf' =>  $request->input('cpf'),
            'password' =>  $request->input('password'),
            'availability' =>  $request->input('availability'),
            'course_experience' =>  $request->input('course_experience'),
            'how_know' =>  $request->input('how_know'),
            'expectations' =>  $request->input('expectations'),
        ]);

        $voluntary->addresses()->create([
            'street' =>  $request->input('street'),
            'number' =>  $request->input('number'),
            'neighbourhood' =>  $request->input('neighbourhood'),
            'city' => $request->input('city'),
            'zip_code' => $request->input('zip_code')
        ]);

        $voluntary->permissions()->create([
            'type' => 'voluntary'
        ]);
        
        return redirect('/voluntary');

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
        $user = User::with(['addresses'])->findOrFail($id);
        // dd($user);
        return view('voluntary.edit', ['user' => $user]);
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
        
        return response()->redirectTo('/voluntary');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->redirectTo('/voluntary');
        
    }

}
