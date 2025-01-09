@extends('layouts.app')

@section('content')
<!-- Link our new doctorpatients.css -->
<link rel="stylesheet" href="{{ asset('css/doctorpatients.css') }}">

<div class="doctor-patients-container">
    <h2 class="page-title">Doctor: Manage Patients</h2>

    <!-- Edit Form Section -->
    @if(isset($editMode) && isset($patient))
    <div class="form-card">
        <form class="doctor-form" method="post" action="{{ route('doctor.patients.update',['id'=>$patient->id]) }}">
            @csrf

            <div class="form-row">
                <label for="assigned_medicine" class="form-label">Assigned Medicine</label>
                <input type="text" name="assigned_medicine" id="assigned_medicine" class="form-control"
                    value="{{ $patient->assigned_medicine ?? '' }}" placeholder="Enter assigned medicine">
            </div>

            <div class="form-row">
                <label for="fever_information" class="form-label">Fever Information</label>
                <textarea name="fever_information" id="fever_information" class="form-control" rows="4"
                    placeholder="Describe fever info">{{ $patient->fever_information ?? '' }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Update Patient Details</button>
            </div>
        </form>
    </div>
    @else
    <p class="no-edit-message">Select a patient to edit sensitive details.</p>
    @endif

    <hr class="section-divider">

    <!-- Patients Table -->
    <h3 class="table-title">Patients</h3>
    <div class="table-container">
        <table class="doctor-patient-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Medicine</th>
                    <th>Fever Info</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->assigned_medicine }}</td>
                    <td>{{ $p->fever_information }}</td>
                    <td>
                        <a href="{{ route('doctor.patients.edit',['id'=>$p->id]) }}" class="btn-link">Edit</a>
                        <form method="post" action="{{ route('doctor.patients.delete',['id'=>$p->id]) }}"
                            class="inline-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-link danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection