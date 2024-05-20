@extends('welcome')
@section('content')
<link rel="stylesheet" href="{{asset('/css/single_blog.css')}}">
@include('partials._search')
<section class="article-section">

  <img src="{{$blog->logo ? asset('storage/' . $blog->logo) : asset('/images/avatar/avatar.jpg') }}" alt="Computer Image" style="display: block; margin: 20px auto; max-width: 100%; height: auto; max-height: 400px; border-radius: 10px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); transition: transform 0.3s ease-in-out; transform-origin: center center;">

  
    <h2 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 28px; font-weight: 600; color: #2c3e50; text-align: center; margin: 20px auto; padding: 10px; border-bottom: 2px solid #4CAF50; display: inline-block; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 5px;">
      {{$blog->title}}
    </h2>
    

    <p style="font-family: Arial, sans-serif; font-size: 16px; line-height: 1.6; color: #333; background-color: #f9f9f9; padding: 15px; border-left: 4px solid #4CAF50; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 800px; margin: 20px auto; text-align: justify; text-indent: 0;">
      {{$blog->description}}
    </p>
    
    


  
    <button id="summarizeButton" data-blog-id="{{$blog->id}}" style="display: block; margin: 10px auto; padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">Summarize</button>
    <div id="summaryText" style="display: none; text-align: left; margin: 20px auto; padding: 20px; background-color: #ffffff; border-left: 4px solid #4CAF50; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); max-width: 600px; font-family: 'Arial', sans-serif; font-size: 16px; line-height: 1.6; color: #333;">
    </div>
    
    
    <script>
      async function fetchSummarizedText(blogId) {
        try {
          
          const response = await fetch(`/summarize/${blogId}`);
          
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          
          const data = await response.json();
          return data.summary; 
        } catch (error) {
          console.error('Error fetching summarized text:', error);
          throw error;
        }
      }
      
      var summarizeButton = document.getElementById("summarizeButton");
      var summaryText = document.getElementById("summaryText");
    
      summarizeButton.addEventListener("click", async function() {
        try {
          var blogId = this.dataset.blogId; 
          var summarizedText = await fetchSummarizedText(blogId);
          
          summaryText.textContent = "Summarized Text: " + summarizedText;
          summaryText.style.display = "block"; 
        } catch (error) {

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
        <a href="/users/{{$comm->user_id}}" class="commenter-name">{{$comm->user->name}}</a> (<a href="mailto:{{$comm->user->email}}" class="commenter-email">{{$comm->user->email}}</a>)
        <p class="comment-text">{{$comm->comment}}</p>
        
        @if(auth()->id() == $blog->user_id || auth()->id()== $comm->user_id)
          <a href="/comments/{{$comm->id}}" class="delete-comment" style="color: #f44336; text-decoration: none; font-weight: bold;">Delete</a>
        @endif

    </div>
    @endforeach
  </section>

  <section style="padding: 20px; max-width: 800px; margin: 0 auto; text-align: center;">
    <button id="sentimentButton" data-blog-id="{{$blog->id}}" style="display: block; margin: 20px auto; padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
        Understand Public Sentiment
    </button>
    <div id="sentimentText" style="display: none; text-align: left; margin: 20px auto; padding: 20px; background-color: #ffffff; border-left: 4px solid #4CAF50; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); max-width: 600px; font-family: 'Arial', sans-serif; font-size: 16px; line-height: 1.6; color: #333;">
    </div>
</section>


<script>
  async function fetchSentimentData(blogId) {
      try {
         
          const response = await fetch(`/sentiment/${blogId}`); 
          
          if (!response.ok) {
              throw new Error('Network response was not ok');
          }
          
          const data = await response.json();
          return data.summary; 
      } catch (error) {
          console.error('Error fetching sentiment data:', error);
          throw error; 
      }
  }
  
  const sentimentButton = document.getElementById("sentimentButton");
  const sentimentText = document.getElementById("sentimentText");

  sentimentButton.addEventListener("click", async function() {
      const blogId = sentimentButton.dataset.blogId; 
      try {
          const sentiment = await fetchSentimentData(blogId);
          
          sentimentText.textContent = "Public Sentiment: " + sentiment;
          sentimentText.style.display = "block"; 
      } catch (error) {
          sentimentText.textContent = "Failed to fetch sentiment data.";
          sentimentText.style.display = "block";
      }
  });
</script>


  
@endsection
