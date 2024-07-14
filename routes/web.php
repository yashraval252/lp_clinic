<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClinicianController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('patient.form');
});

Auth::routes();

Route::get('/home',[HomeController::class,'index'])->name('home');

Route::post('/appointment', [AppointmentController::class, 'store']);

Route::post('/appointment/status/{id}', [AppointmentController::class, 'store']);

Route::resource('clinician', ClinicianController::class);

Route::get('/appointment/status/{token}', [AppointmentController::class, 'checkStatus']);

