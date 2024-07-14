<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'user_id' => 'required|exists:users,id',
        ]);


        $token = Str::uuid();

        Patient::create([
            'name' => $request->patient_name,
            'email' => $request->email,
            'phone' => $request->patient_phone,
            'appointment_date' => $request->appointment_date,
            'signature' => $request->signature,
            'user_id' => $request->user_id,
            'status' => 'pending',
            'token' => $token,
        ]);

        // Redirect back with success message and token
        return redirect()->back()->with('success', 'Appointment booked successfully! Your token: ' . $token);
    }

    public function checkStatus($token)
    {
        $patient = Patient::where('token', $token)->first();

        if ($patient) {
            // If patient is found, return the details
            return view('patient.checkstatus', compact('patient'));
        } else {
            // If no patient is found, return an error message
            return redirect()->back()->with('error', 'Invalid token.');
        }
    }

}
