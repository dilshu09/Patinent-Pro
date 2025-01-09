@extends('layouts.app')

@section('content')
<!-- We can optionally load the user.css here if you don't want to load it in app.blade.php -->
<link rel="stylesheet" href="{{ asset('css/user.css') }}">

<div class="user-container">
    <h2 class="user-title">Manage Users (Admin)</h2>

    <!-- Create User Form -->
    <div class="form-card">
        <form class="user-form" method="post" action="{{ route('admin.users.create') }}">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" required placeholder="Enter full name">
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required
                    placeholder="Enter email address">
            </div>

            <div class="form-group">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" required
                    placeholder="Enter phone number">
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required
                    placeholder="Set a password">
            </div>

            <div class="form-group">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="doctor">Doctor</option>
                    <option value="nurse">Nurse</option>
                </select>
            </div>

            <button type="submit" class="btn-submit">Create User</button>
        </form>
    </div>

    <hr class="section-divider">

    <!-- Existing Users Table -->
    <h3 class="table-title">Existing Users</h3>
    <div class="table-container">
        <table class="user-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
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
            </tbody>
        </table>
    </div>
</div>
@endsection