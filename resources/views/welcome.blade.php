<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Z-Intensified</title>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <script src="{{asset('/js/script.js')}}"></script>
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
            <li class="center">
                <a href="/blogs/create" title="Create a blog">
                    <i class="fa fa-plus-circle fa-lg rounded-circle"></i>
                </a>
            </li>
            
            
            {{-- <li class="center"><a href="/blogs/create">+Blog</a></li>            --}}
            @auth
            <li class="notification-container">
                <a href="#" id="notification-icon" title="Notifications">
                    <i class="fa fa-bell fa-lg rounded-circle"></i>
                </a>
                
                
                
                
                
                <div id="notification-modal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>All Notifications</h2>
                        <ul class="notification-content">
                            @php
                                $user = auth()->user();
                                if ($user) {
                                    $announcements = $user->announcements;
                            @endphp
                                @foreach($announcements as $announcement)
                                    <li>
                                        <span class="notification-date">{{ $announcement->created_at }}</span>
                                        <a href="/blogs/{{\App\Models\Announcement::find($announcement->id)->blog->id}}" style="text-decoration: none; color: inherit; display: inline-block; border-bottom: 2px solid transparent; transition: border-color 0.3s;">
                                            <p class="notification-message" style="margin: 0;">
                                                A new blog 
                                                <span style="font-family: 'Arial', sans-serif; color: #007bff; font-weight: bold;">{{ \App\Models\Announcement::find($announcement->id)->blog->title}}</span> 
                                                has been posted by 
                                                <span style="font-family: 'Times New Roman', serif; color: #28a745; font-style: italic;">{{ \App\Models\Announcement::find($announcement->id)->author->name}}</span> 
                                            </p>
                                        </a>
                                    </li>
                                @endforeach
                            @php
                                }
                            @endphp 
                        </ul>
                    </div>
                </div>
            </li>

            <a href="search-user" id="search-icon" title="Search">
                <i class="fas fa-search fa-lg"></i>
            </a>

            <li class="center">
                <a href="/chat-room" title="Start a video podcast">
                    <i class="fa fa-comments fa-lg rounded-circle"></i>
                </a>
            </li>
            
            

                {{-- <li class="center">
                    <a href="/notifications">
                        <i class="fa fa-bell fa-lg rounded-circle"></i>
                    </a>
                </li>  --}}


                {{-- <li class="upward">
                    <a href="/users/{{ auth()->id() }}">
                        <img src="{{ auth()->user()->dp_image ? asset('storage/' . auth()->user()->dp_image) : 'https://source.unsplash.com/600x400/?computer' }}" alt="Profile Picture" class="profile-picture" style="border-radius: 50%; width: 40px; height: 40px;">
                    </a>
                </li> --}}
                
                
                {{-- <li class="upward"><a href="/blogs/manage">Manage</a></li> --}}
                {{-- <li class="upward"><a href="/users/{{auth()->id()}}">Profile</a></li> --}}

                <li class="upward">
                    <a href="/users/{{auth()->id()}}" title="profile">
                        <i class="fa fa-user fa-lg rounded-circle"></i>
                    </a>
                </li>
                

                <li class="forward">
                    <form action="/logout" method="POST" class="inline" style="display: inline-block; margin-right: 10px;">
                        @csrf
                        <button type="submit" title="Logout" style="border: 1px solid #007bff; padding: 8px 16px; border-radius: 5px; cursor: pointer;">
                            <i class="fa fa-sign-out-alt"></i>
                        </button>
                    </form>
                </li>
                
                
                
                
                {{-- <li class="forward">
                    <form action="/logout" method="POST" class="inline" style="display: inline-block; margin-right: 10px;">
                        @csrf
                        <button type="submit" style="background-color: #007bff; border: 1px solid #007bff; color: #fff; padding: 8px 16px; border-radius: 5px; cursor: pointer;">
                            <i class="fa-solid fa-door-closed" style="margin-right: 5px;"></i> Logout
                        </button>
                    </form>
                </li> --}}
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
    <script>
        // Get the modal
        var modal = document.getElementById("notification-modal");
    
        // Get the button that opens the modal
        var bellIcon = document.getElementById("notification-icon");
    
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
    
        // When the user clicks the bell icon, open the modal
        bellIcon.onclick = function() {
            modal.style.display = "block";
        }
    
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    
</body>
</html>