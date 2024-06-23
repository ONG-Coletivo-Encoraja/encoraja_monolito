<?php

namespace App\Utils;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RestoreOriginalPermissionSession {
    public static function restoreOriginalPermission(Request $request) {
        if ($request->session()->has('original_permission')) {

            $originalPermission = $request->session()->get('original_permission');
            
            $user = User::find(Auth::id());
            if ($user) {
                $user->permissions()->update(['type' => $originalPermission]);
            }

            $request->session()->forget('original_permission');
        }
    }
}