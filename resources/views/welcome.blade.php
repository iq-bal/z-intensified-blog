<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Z-Intensified</title>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body>
    <header>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            {{-- <li class="center"><a href="#">Portfolio</a></li> --}}
            <li class="upward"><a href="#">Register</a></li>
            <li class="forward"><a href="#">Login</a></li>
        </ul>
    </header>
    <div class="search-container">
        <form action="#" method="GET">
          <input type="text" name="search" placeholder="Search...">
          <button type="submit">Search</button>
        </form>
      </div>
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