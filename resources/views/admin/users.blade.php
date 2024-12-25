@extends('layouts.app')

@section('content')
<h2>Manage Users (Admin)</h2>

<form method="post" action="{{ route('admin.users.create') }}">
    @csrf
    <div>
        <label>Name</label>
        <input name="name" required>
    </div>
    <div>
        <label>Email</label>
        <input name="email" type="email" required>
    </div>
    <div>
        <label>Phone</label>
        <input name="phone" required>
    </div>
    <div>
        <label>Password</label>
        <input name="password" type="password" required>
    </div>
    <div>
        <label>Role:</label>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="doctor">Doctor</option>
            <option value="nurse">Nurse</option>
        </select>
    </div>
    <button type="submit">Create User</button>
</form>

<hr>
<h3>Existing Users</h3>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            @if($user->isAdmin) Admin @endif
            @if($user->isDoctor) Doctor @endif
            @if($user->isNurse) Nurse @endif
        </td>
    </tr>
    @endforeach
</table>
@endsection