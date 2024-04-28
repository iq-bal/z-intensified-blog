@extends('welcome')
@section('content')
<link rel="stylesheet" href="{{asset('/css/registration.css')}}">
<div class="form-container">
    <form action="/users" method="POST" class="registration-form">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}">
        @error('name')
        <p style="color: red; font-size: 14px;">{{ $message }}</p>
        @enderror

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

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="confirm_password" name="password_confirmation" placeholder="Confirm your password">
        @error('password_confirmation')
        <p style="color: red; font-size: 14px;">{{ $message }}</p>
        @enderror

        <input type="submit" value="Register">
    </form>
</div>
@endsection
