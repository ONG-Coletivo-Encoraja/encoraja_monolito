<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VoluntaryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscriptionController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Route::get('/voluntary/formEvent', [VoluntaryController::class, 'formEvent']);
    // Route::get('/voluntary/events', [VoluntaryController::class, 'selectEvents']);
    // Route::get('/voluntary/inscriptions', [VoluntaryController::class, 'viewInscriptions']);
    // Route::post('/voluntary/eventsCreate', [VoluntaryController::class, 'eventsCreate']);
    // Route::get('/beneficiary/inscriptions', [InscriptionController::class, 'show_user_inscriptions']);
    //Route::get('/beneficiary/cancel/{inscription_id}', [StudentController::class, 'cancel_inscription']);


    ///////////////////////////////
    Route::get('/home-user', [HomeController::class, 'changeTypeUser']);


    Route::get('/beneficiary/create/{event}', [InscriptionController::class, 'create']);

    Route::resource('/beneficiary', StudentController::class);

    Route::get('/home', [HomeController::class, 'index'])->name('home.index');

    Route::resource('/events', EventController::class);

    Route::resource('/adm', AdministratorController::class);

    Route::resource('/voluntary', VoluntaryController::class);

    Route::resource('/inscriptions', InscriptionController::class);

});

Route::get('/', function () {
    return view('welcome');
});



require __DIR__.'/auth.php';