<?php

namespace App\Http\Controllers;

use A\Models\Permission;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $events = Event::all();
        $user = Auth::user();
        return view('home.index', compact('events', 'user'));
    }
    
    // public function index() {
    //     return view('home.index');
    // }
    public function home_admin() {
        return view('administrator.home');
    }
    public function home_voluntary() {
        return view('voluntary.home');
    }
    public function home_beneficiary() {
       return view('beneficiary.home');
   }
}
