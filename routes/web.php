<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// // Rotas que precisam de autenticação padrão BREEZE
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// //Rotas de adm
// Route::middleware('auth')->group(function () {
//     Route::resource('/events', EventController::class);
//     Route::resource('/adm', AdministratorController::class);
// });

Route::resource('/', HomeController::class);
Route::resource('/events', EventController::class);

//adm
Route::get('/adm/home', [AdministratorController::class, 'home'])->name('adm.home');
Route::get('/adm/teste', [AdministratorController::class, 'teste'])->name('adm.teste');
Route::resource('/adm', AdministratorController::class);







require __DIR__.'/auth.php';