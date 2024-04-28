@extends('welcome')
@section('content')
<link rel="stylesheet" href="{{asset('/css/create.css')}}">
<form class="blog-form" method="POST" action="/blogs/{{$blog->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" placeholder="Enter the title of your blog post" value="{{$blog->title}}">

    <label for="tags">Tags:</label>
    <input type="text" id="tags" name="tags" placeholder="Enter tags separated by commas" value="{{$blog->tags}}">

    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4" placeholder="Enter a description of your blog post">{{$blog->description}}</textarea>

    <label for="author">Author:</label>
    <input type="text" id="author" name="author" placeholder="Enter your name" value="{{$blog->author}}">

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" placeholder="Enter your email address" value="{{$blog->email}}">

    <label for="image">Upload Image:</label>
    <input type="file" id="image" name="logo">
    <input type="submit" value="Update Blog Post">
</form> 
@endsection
