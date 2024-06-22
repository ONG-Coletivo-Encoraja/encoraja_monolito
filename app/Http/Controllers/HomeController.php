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
        // // Verificar se a permissão original está armazenada na sessão
        // if ($request->session()->has('original_permission')) {
        //     // Recuperar a permissão original
        //     $originalPermission = $request->session()->get('original_permission');
            
        //     // Restaurar a permissão original
        //     $user = User::find(Auth::id()); // Certificar de obter o modelo User
        //     $user->permissions()->update(['type' => $originalPermission]);

        //     // Remover a permissão original da sessão
        //     $request->session()->forget('original_permission');
        // }
        RestoreOriginalPermissionSession::restoreOriginalPermission($request);

        $user = Auth::user();

        return view('home.index', compact('user'));
    }

    public function changeTypeUser(Request $request) {
        $type = $request->input('type_user');
        $user = User::find(Auth::id()); // Certificar de obter o modelo User
        
        // Verificar e armazenar a permissão original na sessão
        if (!$request->session()->has('original_permission')) {
            $originalPermission = $user->permissions()->first()->type;
            $request->session()->put('original_permission', $originalPermission);
        }

        // Atualizar a permissão do usuário temporariamente
        $user->permissions()->update(['type' => $type]);

        return view('home.home', ['user' => Auth::user()]);
    }
}
