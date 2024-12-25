@extends('layouts.app')

@section('content')
<div class="welcome-container">
    <h1>Welcome to Patient Management System</h1>
    <p>This is the home page. Please login to continue.</p>

    <!-- Login Button -->
    @guest
    <a href="{{ route('login') }}" class="btn">Login</a>
    <!-- If registration is enabled -->
    {{-- <a href="{{ route('register') }}" class="btn">Register</a> --}}
    @endguest
</div>
@endsection