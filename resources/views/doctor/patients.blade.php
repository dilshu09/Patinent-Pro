@extends('layouts.app')

@section('content')
<h2>Doctor: Manage Patients</h2>
@if(isset($editMode) && isset($patient))
<form method="post" action="{{ route('doctor.patients.update',['id'=>$patient->id]) }}">
    @csrf
    <div>
        <label>Assigned Medicine</label>
        <input name="assigned_medicine" value="{{ $patient->assigned_medicine ?? '' }}">
    </div>
    <div>
        <label>Fever Information</label>
        <textarea name="fever_information">{{ $patient->fever_information ?? '' }}</textarea>
    </div>
    <button type="submit">Update Patient Details</button>
</form>
@else
<p>Select a patient to edit sensitive details.</p>
@endif

<hr>
<h3>Patients</h3>
<table>
    <tr>
        <th>Name</th>
        <th>Medicine</th>
        <th>Fever Info</th>
        <th>Actions</th>
    </tr>
    @foreach($patients as $p)
    <tr>
        <td>{{ $p->name }}</td>
        <td>{{ $p->assigned_medicine }}</td>
        <td>{{ $p->fever_information }}</td>
        <td>
            <a href="{{ route('doctor.patients.edit',['id'=>$p->id]) }}">Edit</a>
            <form method="post" action="{{ route('doctor.patients.delete',['id'=>$p->id]) }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection