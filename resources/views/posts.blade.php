@extends('layouts.app')

@section('content')
    <h1>Vue Posts</h1>

    <div class="container d-flex flex-wrap">

        <categories-list></categories-list>

        <post-component></post-component>

    </div>
@endsection