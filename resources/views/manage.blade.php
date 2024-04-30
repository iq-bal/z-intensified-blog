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
        <tr>
          <td>Blog Post 1</td>
          <td>Technology, AI</td>
          <td>Description of the blog post 1</td>
          <td><img src="blog_post_1.jpg" alt="Blog Post 1 Image" style="max-width: 100px;"></td>
          <td>
            <a href="edit_blog_post.php?id=1">Edit</a> | 
            <a href="delete_blog_post.php?id=1">Delete</a>
          </td>
        </tr>
        <tr>
          <td>Blog Post 2</td>
          <td>Science, Research</td>
          <td>Description of the blog post 2</td>
          <td><img src="blog_post_2.jpg" alt="Blog Post 2 Image" style="max-width: 100px;"></td>
          <td>
            <a href="edit_blog_post.php?id=2">Edit</a> | 
            <a href="delete_blog_post.php?id=2">Delete</a>
          </td>
        </tr>
        <!-- Add more rows for additional blog posts -->
      </tbody>
    </table>
  </div>
@endsection
