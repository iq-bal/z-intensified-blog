@extends('welcome')
@section('content')
<link rel="stylesheet" href="{{asset('/css/login.css')}}">
<div class="login-container">
    <form class="login-form">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email address">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password">

        <input type="submit" value="Login">
    </form>
</div>
@endsection
