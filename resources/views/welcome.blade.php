<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Z-Intensified</title>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
</head>
<body>
    <header>
        <ul class="nav-links">
            <li><a href="/">Home</a></li>
            <li class="center"><a href="/blogs/create">+Blog</a></li>           
            @auth
                <li class="center">
                    <a href="/notifications">
                        <i class="fa fa-bell fa-lg rounded-circle"></i>
                    </a>
                </li> 


                {{-- <li class="upward">
                    <a href="/users/{{ auth()->id() }}">
                        <img src="{{ auth()->user()->dp_image ? asset('storage/' . auth()->user()->dp_image) : 'https://source.unsplash.com/600x400/?computer' }}" alt="Profile Picture" class="profile-picture" style="border-radius: 50%; width: 40px; height: 40px;">
                    </a>
                </li> --}}
                
                
                {{-- <li class="upward"><a href="/blogs/manage">Manage</a></li> --}}
                <li class="upward"><a href="/users/{{auth()->id()}}">Profile</a></li>

                <li class="forward">
                    <form action="/logout" method="POST" class="inline" style="display: inline-block; margin-right: 10px;">
                        @csrf
                        <button type="submit" style="background-color: #007bff; border: 1px solid #007bff; color: #fff; padding: 8px 16px; border-radius: 5px; cursor: pointer;">
                            <i class="fa-solid fa-door-closed" style="margin-right: 5px;"></i> Logout
                        </button>
                    </form>
                </li>
            @else
                <li class="upward"><a href="/register">Register</a></li>
                <li class="forward"><a href="/login">Login</a></li>
                {{-- <li class="forward"><a href="/single-profile">Single Profile</a></li> --}}
                {{-- <li class="forward"><a href="/all-users">all Profile</a></li> --}}
            @endauth
        </ul>
    </header>
    <main>
        @yield('content')
    </main>
    <!-- Site footer -->
    <footer>
        <p>©All rights reserved.</p>
        <p><a href="/blogs/create">Create a Post</a></p>
    </footer>
</body>
</html>