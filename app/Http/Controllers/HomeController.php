<?php

namespace App\Http\Controllers;

use A\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        //$permission = Permission::find(1);
        //return view('home.index', ['permission' => $permission]);
        return view('home.index');
    }
    public function home() {
        return view('home.home');
    }
    //public function home_beneficiary() {
//        return view('beneficiary.home');
  //  }
}
