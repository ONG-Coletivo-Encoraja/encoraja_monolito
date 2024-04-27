<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\BeneficiaryStudentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscriptionController;
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

Route::get('/home/{type}', [HomeController::class, 'home']);
Route::get('/inscriptions/{type_user}', [InscriptionController::class, 'index']);
Route::resource('/', HomeController::class);

Route::resource('/events', EventController::class);

Route::resource('/adm', AdministratorController::class);

Route::resource('/beneficiary', BeneficiaryStudentController::class);

Route::resource('/inscriptions', InscriptionController::class);

Route::get('/beneficiary/events_details', [BeneficiaryStudentController::class, 'show_events']);



//adm

// Route::get('/adm/event', [AdministratorController::class, 'event'])->name('adm.event');

//Route::get('/home/{type}', [HomeController::class, 'home']);
//Route::resource('/', HomeController::class);

//Route::get('/{type}/create', [BeneficiaryStudentController::class, 'create']);
///Route::get('/{type}/home', 'BeneficiaryController@home')->name('beneficiary.home');










require __DIR__.'/auth.php';