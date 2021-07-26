@extends('layouts.admin')

@section('content')


    <div class="container-fluid">
        <h1>Edit Post</h1>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form action="{{route('admin.posts.update', $post->id)}}" method="post">
            @csrf
          @method('PUT')
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelperr" placeholder="Add a title" value="{{$post->title}}">
            <small id="titleHelperr" class="form-text text-muted">Type a title for the post, max 255 characters</small>
          </div>
          
          <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" name="author" id="author" aria-describedby="authorHelperr" placeholder="Add a author" value="{{$post->author}}">
            <small id="authorHelperr" class="form-text text-muted">Type the Author of the post, max 255 characters</small>
          </div>

          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" name="date" id="date" aria-describedby="dateHelperr" placeholder="Add a date" value="{{$post->date}}">
            <small id="dateHelperr" class="form-text text-muted">Type the date of the post, max 255 characters</small>
          </div>
          
          <div class="form-group">
            <label for="image">Cover Image</label>
            <img src="{{$post->image}}" alt="">
            <input type="text" class="form-control" name="image" id="image" aria-describedby="imageHelperr" placeholder="Add an image" value="{{$post->image}}">
            <small id="imageHelperr" class="form-text text-muted">Type a image url for the post, max 255 characters</small>
          </div>  
          
          <div class="form-group">
              <label for="paragraph">paragraph</label>
              <textarea class="form-control" name="paragraph" id="paragraph" rows="5"> {{$post->paragraph}}</textarea>
          </div>
          
          <div class="form-group">
            <label for="category_id">category</label>
            <select class="form-control" name="category_id" id="category_id">
              <option value="">Select a category</option>
              @foreach ($categories as $category)
                  <option value="{{$category->id}}" {{$category->id == old($post->category_id) ? active : ''}}>{{$category->name}}</option>
              @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>


@endsection