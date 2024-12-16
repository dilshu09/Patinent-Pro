<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the patients.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('doctor.patients', compact('patients'));
    }

    /**
     * Show the form for editing the specified patient.
     */
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        $patients = Patient::all(); // Fetch all patients to pass to the view
        return view('doctor.patients', [
            'patient' => $patient,
            'editMode' => true,
            'patients' => $patients
        ]);
    }

    /**
     * Update the specified patient in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'assigned_medicine' => 'required|string|max:255',
            'fever_information' => 'required|string',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->assigned_medicine = $request->assigned_medicine;
        $patient->fever_information = $request->fever_information;
        $patient->save();

        return redirect()->route('doctor.patients')->with('message', 'Patient details updated successfully.');
    }

    /**
     * Remove the specified patient from storage.
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('doctor.patients')->with('message', 'Patient deleted successfully.');
    }
}