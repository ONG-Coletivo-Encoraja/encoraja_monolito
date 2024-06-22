<?php

namespace App\Utils;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RestoreOriginalPermissionSession {
    public static function restoreOriginalPermission(Request $request) {
        if ($request->session()->has('original_permission')) {
            // Recuperar a permissão original
            $originalPermission = $request->session()->get('original_permission');
            
            // Restaurar a permissão original
            $user = User::find(Auth::id());
            if ($user) {
                $user->permissions()->update(['type' => $originalPermission]);
            }

            // Remover a permissão original da sessão
            $request->session()->forget('original_permission');
        }
    }
}