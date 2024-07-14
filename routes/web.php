<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;



Route::get('/', function () {
    return view('patient.form');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/appointment', [AppointmentController::class, 'store']);

Route::get('/appointment/status/{token}', [AppointmentController::class, 'checkStatus']);

