<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Utils\RestoreOriginalPermissionSession;

class HomeController extends Controller
{
    public function index(Request $request) {

        RestoreOriginalPermissionSession::restoreOriginalPermission($request);

        $user = Auth::user();

        return view('home.index', compact('user'));
    }

    public function changeTypeUser(Request $request) {
        $type = $request->input('type_user');
        $user = User::find(Auth::id()); 
        
        if (!$request->session()->has('original_permission')) {
            $originalPermission = $user->permissions()->first()->type;
            $request->session()->put('original_permission', $originalPermission);
        }

        $user->permissions()->update(['type' => $type]);

        return view('home.home', ['user' => Auth::user()]);
    }
}
