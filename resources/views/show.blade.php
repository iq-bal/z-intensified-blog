@extends('welcome')
@section('content')
<link rel="stylesheet" href="{{asset('/css/single_blog.css')}}">
@include('partials._search')
<section class="article-section">
    <img src="{{$blog->logo? asset('storage/'.$blog->logo):'https://source.unsplash.com/600x400/?computer'}}" alt="Computer Image">
    <h2>{{$blog->title}}</h2>
    <p>{{$blog->description}}</p>
  
    <button id="summarizeButton" data-blog-id="{{$blog->id}}" style="display: block; margin: 10px auto; padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">Summarize</button>
    <div id="summaryText" style="display: none; text-align: center; margin-top: 20px; padding: 20px; background-color: #f0f0f0; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);"></div>
    
    <script>
      async function fetchSummarizedText(blogId) {
        try {
          // Make a fetch request to the API endpoint
          const response = await fetch(`/summarize/${blogId}`);
          
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          
          const data = await response.json();
          return data.summary; // Extract summarized text from the 'summary' field
        } catch (error) {
          console.error('Error fetching summarized text:', error);
          throw error;
        }
      }
      
      // Get the button and text section
      var summarizeButton = document.getElementById("summarizeButton");
      var summaryText = document.getElementById("summaryText");
    
      // Add event listener to the button
      summarizeButton.addEventListener("click", async function() {
        try {
          var blogId = this.dataset.blogId; // Get the blog ID from the data attribute
          var summarizedText = await fetchSummarizedText(blogId);
          
          // Display the summarized text
          summaryText.textContent = "Summarized Text: " + summarizedText;
          summaryText.style.display = "block"; // Show the text section
        } catch (error) {
          // Handle errors
        }
      });
    </script>
    
      
      

    







    <p class="author-info">
        Author: <a href="/users/{{$blog->user_id}}" style="color: #007bff; text-decoration: none;">{{$blog->author}}</a>
    </p>
    <p class="author-info">Published on: {{$blog->created_at}}</p>
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
