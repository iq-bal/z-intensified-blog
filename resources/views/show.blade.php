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
</section> 
@endsection
