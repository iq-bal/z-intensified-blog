@extends('welcome')
@section('content')
<link rel="stylesheet" href="{{asset('/css/manage.css')}}">
<div class="blog-manager">
    <table>
      <thead>
        <tr>
          <th>Title</th>
          <th>Tags</th>
          <th>Description</th>
          <th>Image</th>
          <th>Operation</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($blogs as $blog)
            <tr>
                <td>{{$blog->title}}</td>
                <td>{{$blog->Tags}}</td>
                <td>{{$blog->description}}</td>
                <td><img src="{{$blog->logo? asset('storage/'.$blog->logo):'https://source.unsplash.com/600x400/?computer'}}" alt="{{$blog->title}} Image" style="max-width: 100px;"></td>
                <td>
                <a href="/blogs/{{$blog->id}}/edit">Edit</a> | 
                <form action="/blogs/{{$blog->id}}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background-color: #dc3545; color: #fff; padding: 8px 16px; border: none; border-radius: 5px; cursor: pointer;">Delete</button>
                </form>
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
