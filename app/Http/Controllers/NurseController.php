<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    /**
     * Display a listing of the patients.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('nurse.patients', compact('patients'));
    }

    /**
     * Show the form for editing the specified patient.
     */
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        $patients = Patient::all(); // Fetch all patients to pass to the view
        $editMode = true;
        return view('nurse.patients', compact('patient', 'patients', 'editMode'));
    }

    /**
     * Update the specified patient in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'nullable|integer',
            'birthday' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($request->only(['name', 'age', 'birthday', 'address', 'phone']));

        return redirect()->route('nurse.patients')->with('message', 'Patient updated successfully.');
    }

    /**
     * Store a newly created patient in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'nullable|integer',
            'birthday' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        Patient::create($request->only(['name', 'age', 'birthday', 'address', 'phone']));

        return redirect()->route('nurse.patients')->with('message', 'Patient added successfully.');
    }

    /**
     * Remove the specified patient from storage.
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('nurse.patients')->with('message', 'Patient deleted successfully.');
    }
}