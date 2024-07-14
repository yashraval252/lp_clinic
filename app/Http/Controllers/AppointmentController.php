<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:patients',
            'patient_phone' => 'required|string|max:20',
            'appointment_date' => 'required|date',
            'signature' => 'required|string',
        ]);

        Patient::create([
            'name' => $request->patient_name,
            'email' => $request->email,
            'phone' => $request->patient_phone,
            'appointment_date' => $request->appointment_date,
            'signature' => $request->signature,
        ]);

        return redirect()->back()->with('success', 'Appointment booked successfully!');
    }
}
