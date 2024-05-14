@extends('welcome')
@section('content')
<link rel="stylesheet" href="{{asset('/css/single_profile.css')}}">
<div class="profile-container">
    <div class="profile-section">
      <div class="profile-header">
        <img src="{{$user->dp_image? asset('storage/'.$user->dp_image):asset('/images/avatar/avatar.jpg')}}" alt="Profile Picture" class="profile-picture">
        <div class="profile-info">
          <h1 class="profile-username">{{$user->name}}</h1>
          
          @if (auth()->id()==$user->id)
            <a href="/users/{{$user->id}}/edit" style="text-decoration: none; color: #007bff; display: inline-flex; align-items: center; padding: 5px 10px; border-radius: 5px; transition: background-color 0.3s;">
                <span style="margin-right: 5px;"><i class="fas fa-edit" style="font-size: 16px;"></i></span>
                <span style="font-size: 16px;">Edit Info</span>
            </a>  
            @else
            {{-- <a href="/users/{{$user->id}}/follow" style="text-decoration: none; color: inherit;">
              <button style="padding: 10px 30px; border: none; background-color: #007bff; color: #fff; border-radius: 8px; cursor: pointer;">
                  {{ auth()->user()->following()->where('followee_id', $user->id)->exists() ? 'Unfollow' : 'Follow' }}
              </button>
            </a>           --}}

            <div style="margin-top: 20px; margin-bottom: 20px;">
              <a href="/users/{{$user->id}}/follow" class="custom-button">
                  <i class="fas {{ auth()->user()->following()->where('followee_id', $user->id)->exists() ? 'fa-user-minus' : 'fa-user-plus' }}"></i>
                  {{ auth()->user()->following()->where('followee_id', $user->id)->exists() ? 'Unfollow' : 'Follow' }}
              </a>
          
              <a href="/users/{{$user->id}}/followers" class="custom-button">
                  <i class="fas fa-users"></i> Followers
              </a>
          
              <a href="/users/{{$user->id}}/following" class="custom-button">
                  <i class="fas fa-user-friends"></i> Following
              </a>
          </div>
            @endif
          
            <p>
              <a href="mailto:{{$user->email}}" class="profile-email">
                  <i class="fas fa-envelope"></i> {{$user->email}}
              </a>
          </p>

          
          <p class="profile-topic">
            <i class="fas fa-comments"></i> Talks About: {{$user->interest}}
        </p>
        

          <p class="profile-bio">{{$user->bio}}</p>

          <div class="social-links">
            <a href="{{$user->twitter}}" class="social-link twitter-link">
                <i class="fab fa-twitter"></i> Twitter
            </a>
            <a href="{{$user->facebook}}" class="social-link facebook-link">
                <i class="fab fa-facebook-f"></i> Facebook
            </a>
            <a href="{{$user->instagram}}" class="social-link instagram-link">
                <i class="fab fa-instagram"></i> Instagram
            </a>
        </div>
          
        </div>
      </div>
      <div class="profile-hobbies">
        <h2>Hobbies</h2>
        <ul class="hobbies-list">
            @foreach (explode(',', $user->hobbies) as $hobby)
                <li>
                    <i class="fas fa-star"></i>
                    {{ trim($hobby) }}
                </li>
            @endforeach
        </ul>
    </div>
    </div>

    {{-- <div class="blog-section">
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
    </div> --}}



    <div class="blog-section">
      <h2>Blog Posts</h2>
      <ul class="blog-post-list">
          @foreach ($blogs as $blog)
              <li>
                  {{-- <span class="controversial-factor high">High</span> --}}
                  <a href="/blogs/{{$blog->id}}">{{$blog->title}}</a>
                  <div class="post-meta">
                      <div class="post-stats">
                          <span><i class="fas fa-thumbs-up"></i> {{\App\Models\Like::where('blog_id', $blog->id)->count() }} Likes</span>
                          <span><i class="fas fa-comments"></i> {{\App\Models\Comment::where('blog_id', $blog->id)->count() }} Comments</span>
                          {{-- <span><i class="fas fa-share"></i> {{ $blog->shares }} Shares</span> --}}
                      </div>
                      <div class="post-actions">
                          @if (auth()->id() == $blog->user_id)
                              <!-- Edit button -->
                              <a href="/blogs/{{$blog->id}}/edit"><i class="fas fa-edit"></i> Edit</a>
                              <!-- Delete button -->
                              <form action="/blogs/{{$blog->id}}" method="POST" style="display: inline;">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
                              </form>
                          @endif
                      </div>
                  </div>
              </li>
          @endforeach
      </ul>
  </div>
  </div>
@endsection