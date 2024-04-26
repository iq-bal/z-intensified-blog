@props(['blog'])

<x-card>
    <div class="card__header">
        <img src="https://source.unsplash.com/600x400/?computer" alt="card__image" class="card__image" width="600">
      </div>
      <div class="card__body">
        <span class="tag tag-blue">{{$blog->tags}}</span>
        <h4>{{$blog->title}}</h4>
        <p>{{$blog->description}}</p>
      </div>
      <div class="card__footer">
        <div class="user">
          <img src="https://i.pravatar.cc/40?img=1" alt="user__image" class="user__image">
          <div class="user__info">
            <h5>{{$blog->author}}</h5>
            <small>{{$blog->created_at}}</small>
          </div>
        </div>
      </div>
</x-card>