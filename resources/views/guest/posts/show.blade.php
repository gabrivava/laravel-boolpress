@extends('layouts.guest')

@section('content')
<div class="blog-post">
    <h2 class="blog-post-title">{{$post->title}}</h2>
    <p class="blog-post-meta">{{$post->date}} by <a href="#">{{$post->author}}</a></p>
    <p>{{$post->paragraph}}</p>
  </div><!-- /.blog-post -->
@endsection