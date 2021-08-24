@extends('layouts.guest')

@section('content')
<main class="container">
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark row">
      <div class="col-md-6">
        <h1 class="display-4 fst-italic">{{$posts[0]->title}}</h1>
        <p class="lead my-3" style="thyphens: auto">{{$posts[0]->paragraph}}</p>
        <p class="lead mb-0"><a href="{{route('posts.show', $posts[0]->id)}}" class="text-white fw-bold">Continue reading...</a></p>
      </div>
      <div class="col-md-6">
        <img width ="100%" src="{{$posts[0]->image}}" alt="">
      </div>
    </div>
  
    <div class="row mb-2">
        @foreach ($posts as $post)
          <div class="col-md-6">
              <div class="row border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">
                  <div class="col p-4 d-flex flex-column">
                  <strong class="d-inline-block mb-2 text-primary">World</strong>
                  <h3 class="mb-0">{{$post->title}}</h3>
                  <div class="mb-1 text-muted">{{$post->author}}</div>
                  <p class="card-text mb-auto">{{$post->paragraph}}</p>
                  <a href="{{route('posts.show', $post->id)}}" class="stretched-link">Continue reading</a>
                  </div>
                  <div class="col-auto d-none d-lg-block">
                    <img  width="200" height="400" src="{{$post->image}}" alt="">
                  
  
                  </div>
              </div>
          </div> 
        @endforeach
      
    </div>
  
  </main>
@endsection