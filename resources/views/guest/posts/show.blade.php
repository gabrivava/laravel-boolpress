@extends('layouts.guest')

@section('content')
<div class="blog-post">
    <h2 class="blog-post-title">{{$post->title}}</h2>
    <p class="blog-post-meta">{{$post->date}} by <a href="#">{{$post->author}}</a></p>
    <img src="{{asset('storage/' . $post->image)}}" alt="">
    <p>{{$post->paragraph}}</p>
  </div>
@endsection