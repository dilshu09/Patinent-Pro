@extends('layouts.app')

@section('content')
<!-- Link to our new patients.css -->
<link rel="stylesheet" href="{{ asset('css/patients.css') }}">

<div class="patients-container">
    <h2 class="page-title">Nurse: Manage Patients</h2>

    <!-- Patient Form Section -->
    <div class="form-card">
        <form class="patient-form" method="post" action="@if(isset($editMode) && isset($patient)) 
                         {{ route('nurse.patients.update',['id'=>$patient->id]) }} 
                      @else 
                         {{ route('nurse.patients.store') }} 
                      @endif">
            @csrf

            <div class="form-row">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $patient->name ?? '' }}"
                    required placeholder="Enter patient name">
            </div>

            <div class="form-row">
                <label for="age" class="form-label">Age</label>
                <input type="number" name="age" id="age" class="form-control" value="{{ $patient->age ?? '' }}"
                    placeholder="Age in years">
            </div>

            <div class="form-row">
                <label for="birthday" class="form-label">Birthday</label>
                <input type="date" name="birthday" id="birthday" class="form-control"
                    value="{{ $patient->birthday ?? '' }}">
            </div>

            <div class="form-row">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control"
                    value="{{ $patient->address ?? '' }}" placeholder="Enter address">
            </div>

            <div class="form-row">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $patient->phone ?? '' }}"
                    placeholder="Contact number">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">
                    @if(isset($editMode))
                    Update
                    @else
                    Add
                    @endif
                    Patient
                </button>
            </div>
        </form>
    </div>

    <hr class="section-divider">

    <!-- Existing Patients Table -->
    <h3 class="table-title">Patients</h3>
    <div class="table-container">
        <table class="patient-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Birthday</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->age }}</td>
                    <td>{{ $p->birthday }}</td>
                    <td>{{ $p->address }}</td>
                    <td>{{ $p->phone }}</td>
                    <td>
                        <a href="{{ route('nurse.patients.edit',['id'=>$p->id]) }}" class="btn-link">Edit</a>
                        <form method="post" action="{{ route('nurse.patients.delete',['id'=>$p->id]) }}"
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