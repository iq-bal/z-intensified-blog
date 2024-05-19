@extends('welcome')
@section('content')

<link rel="stylesheet" href="{{asset('/css/explore.css')}}">


<script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>



<div class="explore-container-unique">
    <div class="search-bar-unique">
        <form method="get">
            <input type="text" name="search" id="user-search-unique" placeholder="Search for users...">
            {{-- <br> --}}
            {{-- <input type="submit" value="Search" style="margin-top: 10px; padding: 10px 15px; font-size: 16px; color: #fff; background-color: #007bff; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;"> --}}
        </form>
    </div>
    <div class="user-list-unique">
        @foreach ($users as $user)
            @if (auth()->id()==$user->id)
                @continue; 
            @endif
            <div class="user-card-unique">
                <img src="{{$user->dp_image? asset('storage/'.$user->dp_image):asset('/images/avatar/avatar.jpg')}}" alt="User Image" class="user-image-unique">
                <div class="user-info-unique">
                    <h2 class="user-name-unique"><a href="/users/{{$user->id}}" class="user-name-link-unique">{{$user->name}}</a></h2>
                    <p class="user-followers-unique">Followers: {{\App\Models\User::find($user->id)->followers->count()}}</p>
                    <div class="action-section-unique">

                        <a href="/users/{{$user->id}}/follow" class="action-button-unique"><i class="fas fa-user-plus"></i>
                            {{ auth()->user()->following()->where('followee_id', $user->id)->exists() ? 'Unfollow' : 'Follow' }}
                        </a>

                        <a href="mailto:{{$user->email}}" class="action-button-unique"><i class="fas fa-envelope"></i> Email</a>
                        <a href="{{$user->twitter}}" class="action-button-unique"><i class="fab fa-twitter"></i> Twitter</a>
                    </div>
                    <p class="user-talks-about-unique">Talks about: {{$user->interest}}</p>
                    <p class="user-bio-unique">Bio: {{$user->bio}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="mt-6 p-4">
    {{$users->links()}}
</div>

@endsection