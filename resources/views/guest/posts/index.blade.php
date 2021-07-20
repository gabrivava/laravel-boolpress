@extends('layouts.app')

@section('content')
    
    @foreach ($posts as $post)
        <div class="post">
            <h3>{{$post->title}}</h3>
            <img src="{{$post->image}}" alt="">
            <p>{{$post->paragraph}}</p>
            <h5>{{$post->author}}</h5>
        </div>
    @endforeach

@endsection