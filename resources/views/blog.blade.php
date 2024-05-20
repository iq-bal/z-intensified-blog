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
    <img src="{{ $blog->logo ? asset('storage/' . $blog->logo) : asset('/images/avatar/avatar.jpg') }}" alt="Blog Image" class="card__image" width="600">
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







  <div style="display: flex; justify-content: space-between; align-items: center; padding: 5px;">
    @if (\App\Models\Like::where('user_id', auth()->id())
    ->where('blog_id', $blog->id)
    ->first())
        <a href="/blogs/{{$blog->id}}/likes" style="text-decoration: none; color: inherit;">
          <button style="padding: 4px 8px; border: none; background-color: #007bff; color: #fff; border-radius: 3px;">
              <i class="fas fa-thumbs-down" style="font-size: 12px;"></i> Dislike <span style="margin-left: 2px; font-size: 10px;">({{ \App\Models\Like::where('blog_id', $blog->id)->count() }})</span>
          </button>
        </a>
    @else
    <a href="/blogs/{{$blog->id}}/likes" style="text-decoration: none; color: inherit;">
      <button style="padding: 4px 8px; border: none; background-color: #007bff; color: #fff; border-radius: 3px;">
          <i class="fas fa-thumbs-up" style="font-size: 12px;"></i> Like <span style="margin-left: 2px; font-size: 10px;">({{ \App\Models\Like::where('blog_id', $blog->id)->count() }})</span>
      </button>
    </a>
    @endif

    @if (\App\Models\Share::where('user_id', auth()->id())
    ->where('blog_id', $blog->id)
    ->first())
        <a href="/blogs/{{$blog->id}}/shares" style="text-decoration: none; color: #007bff; padding: 5px;">
          <i class="fas fa-share" style="font-size: 12px;"></i> Unshare ({{ \App\Models\Share::where('blog_id', $blog->id)->count() }})
        </a>
    @else
      <a href="/blogs/{{$blog->id}}/shares" style="text-decoration: none; color: #007bff; padding: 5px;">
        <i class="fas fa-share" style="font-size: 12px;"></i> Share ({{ \App\Models\Share::where('blog_id', $blog->id)->count() }})
      </a>
    @endif

    <a href="blogs/{{$blog->id}}" style="text-decoration: none; color: #007bff; padding: 5px;">
        <i class="fas fa-comment" style="font-size: 12px;"></i> Comment <span style="margin-left: 2px; font-size: 10px;">({{ \App\Models\Comment::where('blog_id', $blog->id)->count() }})</span>
    </a>
</div>






</div>
@endforeach
@else
<p>No Blog Post Found</p>    
@endunless
</div>
{{-- <div class="mt-6 p-4">
  {{$blogs->links()}}
</div> --}}
@endsection
