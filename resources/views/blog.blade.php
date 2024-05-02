@extends('welcome')
@section('content')
<link rel="stylesheet" href="{{asset('/css/blog.css')}}">
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
@include('partials._about')
@include('partials._search')
<div class="blog_container">
@unless (count($blogs)==0)
@foreach ($blogs as $blog)
<div class="card">
  <div class="card__header">
    <img src="{{$blog->logo? asset('storage/'.$blog->logo):'https://source.unsplash.com/600x400/?computer'}}" alt="card__image" class="card__image" width="600">
  </div>
  <div class="card__body">
    {{-- <span class="tag tag-blue">{{$blog->tags}}</span> --}}
    <x-blog-tags :tagsCsv="$blog->tags" />
    <a href="blogs/{{$blog->id}}"><h4>{{$blog->title}}</h4></a>
    <p>
      {{ strlen($blog->description) > 120 ? substr($blog->description, 0, 120) . '...' : $blog->description }}
    </p>
  </div>
  <div class="card__footer">
    <div class="user">
      {{-- <img src="https://i.pravatar.cc/40?img={{$blog->id}}" alt="user__image" class="user__image"> --}}
      <div class="user__info">
        <h5>
          <a href="/users/{{$blog->user_id}}" style="text-decoration: none; color: #007bff;">{{$blog->author}}</a>
      </h5>      
        <small>{{$blog->created_at}}</small>
      </div>
    </div>
  </div>
</div>
@endforeach
@else
<p>No Blog Post Found</p>    
@endunless
</div>
<div class="mt-6 p-4">
  {{$blogs->links()}}
</div>
@endsection
