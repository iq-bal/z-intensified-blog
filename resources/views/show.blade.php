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
    <a href="/blogs/{{$blog->id}}/edit" style="display: inline-block; margin-right: 10px; background-color: #007bff; color: #fff; padding: 8px 16px; text-decoration: none; border-radius: 5px;">Edit</a>
    
    <!-- Delete Link -->
    <form action="/blogs/{{$blog->id}}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" style="background-color: #dc3545; color: #fff; padding: 8px 16px; border: none; border-radius: 5px; cursor: pointer;">Delete</button>
    </form>
</section> 
@endsection
