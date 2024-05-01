@extends('welcome')
@section('content')
<link rel="stylesheet" href="{{asset('/css/single_profile.css')}}">
<div class="profile-container">
    <div class="profile-section">
      <div class="profile-header">
        <img src="profile-picture.jpg" alt="Profile Picture" class="profile-picture">
        <div class="profile-info">
          <h1 class="profile-username">{{$user->name}}</h1>
          <p class="profile-email">{{$user->email}}</p>
          <p class="profile-topic">Talks About: Topic</p>
          <p class="profile-bio">This is where you can write a short description about yourself.</p>
          <div class="social-links">
            <a href="#" class="social-link"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="#" class="social-link"><i class="fab fa-facebook"></i> Facebook</a>
            <a href="#" class="social-link"><i class="fab fa-instagram"></i> Instagram</a>
          </div>
        </div>
      </div>
      <div class="profile-hobbies">
        <h2>Hobbies</h2>
        <ul class="hobbies-list">
          <li>Hobby 1</li>
        </ul>
      </div>
    </div>
    <div class="blog-section">
      <h2>Blog Posts</h2>
      <ul class="blog-post-list">
        @foreach ($blogs as $blog)
            <li>
                <span class="controversial-factor high">High</span>
                <a href="/blogs/{{$blog->id}}">{{$blog->title}}</a>
          </li>
        @endforeach
        <!-- Add more posts here -->
      </ul>
    </div>
  </div>
@endsection