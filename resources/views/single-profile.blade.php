@extends('welcome')
@section('content')
<link rel="stylesheet" href="{{asset('/css/single_profile.css')}}">
<div class="profile-container">
    <div class="profile-section">
      <div class="profile-header">
        <img src="{{$user->dp_image? asset('storage/'.$user->dp_image):'https://source.unsplash.com/600x400/?computer'}}" alt="Profile Picture" class="profile-picture">
        <div class="profile-info">
          <h1 class="profile-username">{{$user->name}}</h1>
          
          @if (auth()->id()==$user->id)
            <a href="/users/{{$user->id}}/edit" style="text-decoration: none; color: #007bff; display: inline-flex; align-items: center; padding: 5px 10px; border-radius: 5px; transition: background-color 0.3s;">
                <span style="margin-right: 5px;"><i class="fas fa-edit" style="font-size: 16px;"></i></span>
                <span style="font-size: 16px;">Edit Info</span>
            </a>  
            @else
            <a href="/users/{{$user->id}}/follow" style="text-decoration: none; color: inherit;">
              <button style="padding: 10px 30px; border: none; background-color: #007bff; color: #fff; border-radius: 8px; cursor: pointer;">
                  {{ auth()->user()->following()->where('followee_id', $user->id)->exists() ? 'Unfollow' : 'Follow' }}
              </button>
            </a>          
            @endif
          

          <p class="profile-email">{{$user->email}}</p>
          <p class="profile-topic">Talks About: {{$user->interest}}</p>
          <p class="profile-bio">{{$user->bio}}</p>
          <div class="social-links">
            <a href="{{$user->twitter}}" class="social-link"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="{{$user->facebook}}" class="social-link"><i class="fab fa-facebook"></i> Facebook</a>
            <a href="{{$user->instagram}}" class="social-link"><i class="fab fa-instagram"></i> Instagram</a>
          </div>
        </div>
      </div>
      <div class="profile-hobbies">
        <h2>Hobbies</h2>
        <ul class="hobbies-list">
          <li>{{$user->hobbies}}</li>
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
                @if (auth()->id() == $blog->user_id)
                <!-- Edit button -->
                <a href="/blogs/{{$blog->id}}/edit" style="text-decoration: none; color: #007bff; margin-left: 10px;"><i class="fas fa-edit"></i> Edit</a>
                <!-- Delete button -->
                <form action="/blogs/{{$blog->id}}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: none; border: none; color: #dc3545; margin-left: 10px; cursor: pointer;"><i class="fas fa-trash-alt"></i> Delete</button>
                </form>
            @endif
          </li>
        @endforeach
        <!-- Add more posts here -->
      </ul>
    </div>
  </div>
@endsection