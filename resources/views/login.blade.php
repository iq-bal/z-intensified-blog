@extends('welcome')
@section('content')
<link rel="stylesheet" href="{{asset('/css/login.css')}}">
<div class="login-container">
    <form action="/users/authenticate" method="POST" class="login-form">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email address" value="{{ old('email') }}">
        @error('email')
        <p style="color: red; font-size: 14px;">{{ $message }}</p>
        @enderror
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password">
        @error('password')
        <p style="color: red; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="submit" value="Login">
    </form>
</div>
@endsection
