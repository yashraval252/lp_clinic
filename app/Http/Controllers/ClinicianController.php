<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;

class ClinicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $patients = Patient::all();
        return view('clinician.index', compact('patients'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $patient = Patient::where("id",$id)->first();
       return view('clinician.edit',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patient = Patient::where("id",$id)->update([
            "status" => $request->status
        ]);
        Event::create([
            'name' => 'A new event',
            'startDateTime' => \Carbon\Carbon::now(),
            'endDateTime' => \Carbon\Carbon::now()->addHour(),
         ]);
        return response()->json(['message' => 'Appointment updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
