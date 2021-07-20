@extends('layouts.admin')

@section('content')
    
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>IMAGE</th>
                <th>TITLE</th>
                <th>AUTHOR</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img width="150" src="{{$post->image}}" alt=""></td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->author}}</td>
                    <td>View |Edit | Delete</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    

@endsection