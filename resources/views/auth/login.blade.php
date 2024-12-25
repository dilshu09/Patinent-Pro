@extends('layouts.app')

@section('content')
<h2>Login</h2>
<form method="post" action="{{ route('login.post') }}">
    @csrf
    <div>
        <label>Email:</label>
        <input type="email" name="email">
    </div>
    <div>
        <label>Password:</label>
        <input type="password" name="password">
    </div>
    <button type="submit">Login</button>
</form>
@endsection