@extends('layouts.app')

@section('content')
    <h1>Vue Posts</h1>

    <div class="container d-flex flex-wrap">

        <div class="card" v-for="post in posts">
            <img width="200" class="card-img-top" :src="post.image" alt="">
            <div class="card-body">
                <h4 class="card-title">@{{post.title}}</h4>
                <p class="card-text">Text</p>
            </div>
        </div>

    </div>
@endsection