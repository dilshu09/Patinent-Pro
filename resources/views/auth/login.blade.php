@extends('layouts.blank')

@section('content')
<div class="login-container">
    <div class="login-card">
        <div class="login-logo">
            <img src="{{ asset('images/logo.png') }}" alt="App Logo" class="logo-image">
        </div>

        <h2 class="login-title">Log in</h2>

        <form method="post" action="{{ route('login.post') }}" class="login-form">
            @csrf

            <!-- Email Field -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required placeholder="Email address">
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="Your password">
            </div>

            <!-- Login Button -->
            <button type="submit" class="btn-submit">Log in</button>
        </form>
    </div>
</div>
@endsection