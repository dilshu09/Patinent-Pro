<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Management</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav class="navbar">
        <a href="{{ route('home') }}">Home</a>
        @auth
        @if(auth()->user()->isAdmin)
        <a href="{{ route('admin.users') }}">Manage Users</a>
        @endif
        @if(auth()->user()->isNurse)
        <a href="{{ route('nurse.patients') }}">Manage Patients (Nurse)</a>
        @endif
        @if(auth()->user()->isDoctor)
        <a href="{{ route('doctor.patients') }}">Manage Patients (Doctor)</a>
        @endif
        <form action="{{ route('logout') }}" method="post" style="display:inline;">
            @csrf
            <button type="submit" class="btn-link">Logout</button>
        </form>
        @else
        <a href="{{ route('login') }}">Login</a>
        @endauth
    </nav>
    <div class="container">
        @if(session('message'))
        <div class="alert success">{{ session('message') }}</div>
        @endif
        @if(session('error'))
        <div class="alert error">{{ session('error') }}</div>
        @endif
        @yield('content')
    </div>
</body>

</html>