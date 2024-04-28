@extends('welcome')
@section('content')
<link rel="stylesheet" href="{{asset('/css/registration.css')}}">
<div class="form-container">
    <form action="/users" method="POST" class="registration-form">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email address">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password">

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="confirm_password" name="password_confirmation" placeholder="Confirm your password">
        <input type="submit" value="Register">
    </form>
</div>
@endsection
