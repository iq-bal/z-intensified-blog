@extends('welcome')
@section('content')
{{-- <link rel="stylesheet" href="{{asset('/css/users.css')}}"> --}}
<style>
  /* User Card Styles */
  .user-card {
    display: flex;
    margin: 20px;
    padding: 15px;
    border-radius: 10px;
    background-color: #f9f9f9;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
  }

  .user-card:hover {
    transform: translateY(-5px);
  }

  .user-link {
    text-decoration: none;
  }

  .user-card img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin-right: 20px;
  }

  .user-info {
    /* flex: 1; */
    widows: 40%;
  }

  .user-name {
    margin: 0;
    font-size: 1.5em;
    color: #333;
  }

  .user-description {
    margin-top: 10px;
    margin-bottom: 20px;
    font-size: 1.1em;
    color: #666;
  }

  .about-me {
    background-color: #f0f0f0;
    padding: 15px;
    border-radius: 10px;
  }
</style>
<div class="user-directory">
  @for ($i = 1; $i <= 10; $i++)
    <a href="/users/{{$i}}" class="user-link">
        <div class="user-card">
          <img src="https://source.unsplash.com/600x400/?computer" alt="User {{$i}}">
          <div class="user-info">
            <h2 class="user-name">User {{$i}}</h2>
            <p class="user-description">Talks about User {{$i}}'s interests</p>
          </div>
          <div class="about-me">
            <h3>About Me</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id.</p>
          </div>
        </div>
    </a>
  @endfor
</div>
@endsection
