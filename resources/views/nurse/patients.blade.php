@extends('layouts.app')

@section('content')
<h2>Nurse: Manage Patients</h2>
<form method="post"
    action="@if(isset($editMode) && isset($patient)) {{ route('nurse.patients.update',['id'=>$patient->id]) }} @else {{ route('nurse.patients.store') }} @endif">
    @csrf
    <div>
        <label>Name</label>
        <input name="name" value="{{ $patient->name ?? '' }}" required>
    </div>
    <div>
        <label>Age</label>
        <input name="age" type="number" value="{{ $patient->age ?? '' }}">
    </div>
    <div>
        <label>Birthday</label>
        <input name="birthday" type="date" value="{{ $patient->birthday ?? '' }}">
    </div>
    <div>
        <label>Address</label>
        <input name="address" value="{{ $patient->address ?? '' }}">
    </div>
    <div>
        <label>Phone</label>
        <input name="phone" value="{{ $patient->phone ?? '' }}">
    </div>
    <button type="submit">@if(isset($editMode)) Update @else Add @endif Patient</button>
</form>

<hr>
<h3>Patients</h3>
<table>
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Birthday</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>
    @foreach($patients as $p)
    <tr>
        <td>{{ $p->name }}</td>
        <td>{{ $p->age }}</td>
        <td>{{ $p->birthday }}</td>
        <td>{{ $p->address }}</td>
        <td>{{ $p->phone }}</td>
        <td>
            <a href="{{ route('nurse.patients.edit',['id'=>$p->id]) }}">Edit</a>
            <form method="post" action="{{ route('nurse.patients.delete',['id'=>$p->id]) }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection