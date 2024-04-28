<?php

namespace App\Http\Controllers;

use A\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home.index');
    }
    public function home_admin() {
        return view('administrator.home');
    }
    public function home_beneficiary() {
       return view('beneficiary.home');
   }
}
