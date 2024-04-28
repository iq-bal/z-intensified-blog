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
            <li class="center"><a href="/blogs/create">Create Post</a></li>
            @auth
                <li class="upward"><a href="">Manage Listing</a></li>
                <li class="forward">
                    <form action="/logout" method="POST" class="inline" style="display: inline-block; margin-right: 10px;">
                        @csrf
                        <button type="submit" style="background-color: #f0f0f0; border: 1px solid #ccc; padding: 5px 10px; border-radius: 5px;">
                            <i class="fa-solid fa-door-closed"></i>Logout
                        </button>
                    </form>
                    
                </li>
            @else
                <li class="upward"><a href="/register">Register</a></li>
                <li class="forward"><a href="/login">Login</a></li>
            @endauth
        </ul>
    </header>
    <main>
        @yield('content')
    </main>
    <!-- Site footer -->
    <footer>
        <p>©All rights reserved.</p>
        <p><a href="create_post.html">Create a Post</a></p>
    </footer>
</body>
</html>