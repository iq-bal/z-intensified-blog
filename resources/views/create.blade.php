@extends('welcome')
@section('content')
<link rel="stylesheet" href="{{asset('/css/create.css')}}">
<form class="blog-form" method="POST" action="/blogs" enctype="multipart/form-data">
    @csrf
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" placeholder="Enter the title of your blog post" value="{{old('title')}}">
    @error('title')
    <p style="color: red; font-size: 14px;">{{$message}}</p>
    @enderror

    <label for="tags">Tags:</label>
    <input type="text" id="tags" name="tags" placeholder="Enter tags separated by commas" value="{{old('tags')}}">
    @error('tags')
    <p style="color: red; font-size: 14px;">{{$message}}</p>
    @enderror

    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4" placeholder="Enter a description of your blog post">{{old('description')}}</textarea>
    @error('description')
    <p style="color: red; font-size: 14px;">{{$message}}</p>
    @enderror

    <label for="author">Author:</label>
    <input type="text" id="author" name="author" placeholder="Enter your name" value="{{old('author')}}">
    @error('author')
    <p style="color: red; font-size: 14px;">{{$message}}</p>
    @enderror

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" placeholder="Enter your email address" value="{{old('email')}}">
    @error('email')
    <p style="color: red; font-size: 14px;">{{$message}}</p>
    @enderror

    <label for="image">Upload Image:</label>
    <input type="file" id="image" name="logo">
    @error('logo')
    <p style="color: red; font-size: 14px;">{{$message}}</p>
    @enderror

    <input type="submit" value="Create Blog Post">
</form> 
@endsection
