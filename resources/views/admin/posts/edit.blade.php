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
          @error('title')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelperr" placeholder="Add a title" value="{{$post->title}}">
            <small id="titleHelperr" class="form-text text-muted">Type a title for the post, max 255 characters</small>
          </div>
          
          @error('author')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
          <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" name="author" id="author" aria-describedby="authorHelperr" placeholder="Add a author" value="{{$post->author}}">
            <small id="authorHelperr" class="form-text text-muted">Type the Author of the post, max 255 characters</small>
          </div>

          @error('date')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" name="date" id="date" aria-describedby="dateHelperr" placeholder="Add a date" value="{{$post->date}}">
            <small id="dateHelperr" class="form-text text-muted">Type the date of the post, max 255 characters</small>
          </div>
          
          @error('image')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror  
          <div class="form-group">
            <label for="image">Cover Image</label>
            <img src="{{asset('storage/images/' . $post->image)}}" alt="">
            <input type="file" class="form-control-file" name="image" id="image" aria-describedby="imageImgHelper" placeholder="Add an image">
            <small id="imageImgHelper" class="form-text text-muted">select an image</small>
          </div>
          
          @error('paragraph')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
          <div class="form-group">
              <label for="paragraph">paragraph</label>
              <textarea class="form-control" name="paragraph" id="paragraph" rows="5"> {{$post->paragraph}}</textarea>
          </div>
          
          @error('category_id')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
          <div class="form-group">
            <label for="category_id">category</label>
            <select class="form-control @error('category') is-invalid @enderror" name="category_id" id="category_id">
              <option value="">Select a category</option>
              @foreach ($categories as $category)
                  <option value="{{$category->id}}" {{$post->category_id == $category->id ? 'selected' : '' }}>
                    {{$category->name}} 
                  </option>
              @endforeach
            </select>
          </div>

          @error('tags')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
          <div class="form-group">
            <label for="tags">tags</label>
            <select multiple class="form-control @error('tags') is-invalid @enderror" name="tags[]" id="tags">
              <option value="">Select a tag</option>
              @if ($tags)
                @foreach ($tags as $tag)
                    @if ($errors->any())
                    <option value="{{$tag->id}}" {{ in_array($tag->id, old('tags')) ? 'selected' : '' }}>{{$tag->name}}</option>
                    @else
                    <option value="{{$tag->id}}" {{ $post->tags->contains($tag) ? 'selected' : ''}}>{{$tag->name}}</option>
                    @endif
                @endforeach
              @endif
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>


@endsection