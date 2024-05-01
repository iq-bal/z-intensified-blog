@extends('welcome')
@section('content')
<link rel="stylesheet" href="{{asset('/css/single_blog.css')}}">
@include('partials._search')
<section class="article-section">
    <img src="{{$blog->logo? asset('storage/'.$blog->logo):'https://source.unsplash.com/600x400/?computer'}}" alt="Computer Image">
    <h2>{{$blog->title}}</h2>
    <p>{{$blog->description}}</p>
    <p class="author-info">Author: {{$blog->author}}</p>
    <p class="author-info">Published on: {{$blog->created_at}}</p>

    <!-- Edit Link -->
    {{-- <a href="/blogs/{{$blog->id}}/edit" style="display: inline-block; margin-right: 10px; background-color: #007bff; color: #fff; padding: 8px 16px; text-decoration: none; border-radius: 5px;">Edit</a> --}}
    
    <!-- Delete Link -->
    {{-- <form action="/blogs/{{$blog->id}}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" style="background-color: #dc3545; color: #fff; padding: 8px 16px; border: none; border-radius: 5px; cursor: pointer;">Delete</button>
    </form> --}}
</section> 

@auth
    <div class="comment-box">
    <h2>Leave a Comment</h2>
    <form action="/blogs/{{$blog->id}}/comment" method="POST">
      @csrf
      <label for="comment">Comment:</label>
      <textarea id="comment" name="comment" rows="5" required></textarea>
      <button type="submit">Submit</button>
    </form>
  </div>
@else
<div class="comment-box">
    <p>You must log in to make a comment</p>
</div>
@endauth
  <section class="comment-section">
    <h2>Comments</h2>
    @foreach ($comments as $comm)
    <div class="comment">
        <a href="/users/{{$comm->user_id}}" class="commenter-name">{{$comm->user->name}}</a> (<a href="mailto:john@example.com" class="commenter-email">john@example.com</a>)
        <p class="comment-text">{{$comm->comment}}</p>
      </div>
    @endforeach
  </section>
  
@endsection
