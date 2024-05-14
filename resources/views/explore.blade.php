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
        <!-- User Card 1 -->
        {{-- <div class="user-card-unique">
            <img src="https://source.unsplash.com/600x400/?computer" alt="User Image" class="user-image-unique">
            <div class="user-info-unique">
                <h2 class="user-name-unique"><a href="#" class="user-name-link-unique">John Doe</a></h2>
                <p class="user-followers-unique">Followers: 150</p>
                <div class="action-section-unique">
                    <a href="#" class="action-button-unique"><i class="fas fa-user-plus"></i> Follow</a>
                    <a href="mailto:john@example.com" class="action-button-unique"><i class="fas fa-envelope"></i> Email</a>
                    <a href="https://twitter.com/johndoe" class="action-button-unique"><i class="fab fa-twitter"></i> Twitter</a>
                </div>
                <p class="user-talks-about-unique">Talks about: Technology, AI, Programming</p>
                <p class="user-bio-unique">Bio: Software developer with a passion for open-source projects and AI research.</p>
            </div>
        </div> --}}
        <!-- User Card 2 -->
        {{-- <div class="user-card-unique">
            <img src="https://source.unsplash.com/600x400/?computer" alt="User Image" class="user-image-unique">
            <div class="user-info-unique">
                <h2 class="user-name-unique"><a href="#" class="user-name-link-unique">Jane Smith</a></h2>
                <p class="user-followers-unique">Followers: 250</p>
                <div class="action-section-unique">
                    <a href="#" class="action-button-unique"><i class="fas fa-user-plus"></i> Follow</a>
                    <a href="mailto:jane@example.com" class="action-button-unique"><i class="fas fa-envelope"></i> Email</a>
                    <a href="https://twitter.com/janesmith" class="action-button-unique"><i class="fab fa-twitter"></i> Twitter</a>
                </div>
                <p class="user-talks-about-unique">Talks about: Design, UX, Art</p>
                <p class="user-bio-unique">Bio: UX designer and artist with a love for creating beautiful and functional user experiences.</p>
            </div>
        </div> --}}
        <!-- User Card 3 -->
        {{-- <div class="user-card-unique">
            <img src="https://source.unsplash.com/600x400/?computer" alt="User Image" class="user-image-unique">
            <div class="user-info-unique">
                <h2 class="user-name-unique"><a href="#" class="user-name-link-unique">Michael Johnson</a></h2>
                <p class="user-followers-unique">Followers: 180</p>
                <div class="action-section-unique">
                    <a href="#" class="action-button-unique"><i class="fas fa-user-plus"></i> Follow</a>
                    <a href="mailto:michael@example.com" class="action-button-unique"><i class="fas fa-envelope"></i> Email</a>
                    <a href="https://twitter.com/michaeljohnson" class="action-button-unique"><i class="fab fa-twitter"></i> Twitter</a>
                </div>
                <p class="user-talks-about-unique">Talks about: Fitness, Health, Wellness</p>
                <p class="user-bio-unique">Bio: Fitness coach dedicated to helping people achieve their health and wellness goals.</p>
            </div>
        </div> --}}
        <!-- User Card 4 -->
        {{-- <div class="user-card-unique">
            <img src="https://source.unsplash.com/600x400/?computer" alt="User Image" class="user-image-unique">
            <div class="user-info-unique">
                <h2 class="user-name-unique"><a href="#" class="user-name-link-unique">Emily Davis</a></h2>
                <p class="user-followers-unique">Followers: 320</p>
                <div class="action-section-unique">
                    <a href="#" class="action-button-unique"><i class="fas fa-user-plus"></i> Follow</a>
                    <a href="mailto:emily@example.com" class="action-button-unique"><i class="fas fa-envelope"></i> Email</a>
                    <a href="https://twitter.com/emilydavis" class="action-button-unique"><i class="fab fa-twitter"></i> Twitter</a>
                </div>
                <p class="user-talks-about-unique">Talks about: Travel, Photography, Blogging</p>
                <p class="user-bio-unique">Bio: Travel blogger capturing the beauty of the world through the lens of my camera.</p>
            </div>
        </div> --}}
        <!-- User Card 5 -->
        {{-- <div class="user-card-unique">
            <img src="https://source.unsplash.com/600x400/?computer" alt="User Image" class="user-image-unique">
            <div class="user-info-unique">
                <h2 class="user-name-unique"><a href="#" class="user-name-link-unique">David Lee</a></h2>
                <p class="user-followers-unique">Followers: 290</p>
                <div class="action-section-unique">
                    <a href="#" class="action-button-unique"><i class="fas fa-user-plus"></i> Follow</a>
                    <a href="mailto:david@example.com" class="action-button-unique"><i class="fas fa-envelope"></i> Email</a>
                    <a href="https://twitter.com/davidlee" class="action-button-unique"><i class="fab fa-twitter"></i> Twitter</a>
                </div>
                <p class="user-talks-about-unique">Talks about: Music, Guitar, Songwriting</p>
                <p class="user-bio-unique">Bio: Musician and songwriter sharing tips and tutorials on playing guitar and creating music.</p>
            </div>
        </div> --}}
    </div>
</div>

<div class="mt-6 p-4">
    {{$users->links()}}
</div>

@endsection