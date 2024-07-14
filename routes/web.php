<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;



Route::get('/', function () {
    return view('patient.form');
});

Route::post('/appointment', [AppointmentController::class, 'store']);
