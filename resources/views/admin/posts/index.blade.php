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
                    <td class="d-flex flex-column align-items-start justify-content-around">
                        <a class="btn btn-primary" href="{{ route('admin.posts.show', $post->id) }}">View</a>
                        <a class="btn btn-secondary" href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
                         <form action="{{route('admin.posts.destroy', $post->id)}}" method="post">
                             @csrf
                             @method('delete')
                             <button type="submit" class="btn btn-danger" href="{{ route('admin.posts.show', $post->id) }}">Delete</button>
                         </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    

@endsection