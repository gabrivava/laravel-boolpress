@extends('layouts.admin')

@section('content')
    

    <div class="container-fluid">
        <div class="card">
          
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-subtitle mb-2 text-muted">{{$post->category_id ? $categories[($post->category_id -1)]->name : 'No Category' }}</p>
              <h6 class="card-subtitle mb-2 text-muted">{{$post->date}}</h6>
              <img src="{{ 'public/storage/images' . $post->image}}">
              <p class="card-text">{{$post->paragraph}}</p>
              <a href="#" class="card-link">{{$post->author}}</a>
            </div>
        </div>
    </div>


@endsection