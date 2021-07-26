@extends('layouts.admin')

@section('content')


    <div class="container-fluid">
        <h1>Create a new Post</h1>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
            
            @csrf
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelperr" placeholder="Add a title" value="{{old('title')}}">
            <small id="titleHelperr" class="form-text text-muted">Type a title for the post, max 255 characters</small>
          </div>
          
          <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" name="author" id="author" aria-describedby="authorHelperr" placeholder="Add a author" value="{{old('author')}}">
            <small id="authorHelperr" class="form-text text-muted">Type the Author of the post, max 255 characters</small>
          </div>

          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" name="date" id="date" aria-describedby="dateHelperr" placeholder="Add a date" value="{{old('date')}}">
            <small id="dateHelperr" class="form-text text-muted">Type the date of the post, max 255 characters</small>
          </div>
          
          <div class="form-group">
            <label for="image">Cover Image</label>
            <input type="file" class="form-control-file" name="image" id="image" aria-describedby="imageImgHelper" placeholder="Add an image">
            <small id="imageImgHelper" class="form-text text-muted">select an image</small>
          </div>  
          @error('image')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="form-group">
              <label for="paragraph">paragraph</label>
              <textarea class="form-control" name="paragraph" id="paragraph" rows="5"> {{ old('paragraph')}}</textarea>
          </div>

          <div class="form-group">
            <label for="category_id">category</label>
            <select class="form-control" name="category_id" id="category_id">
              <option slected value="">Select a category</option>
              @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>


@endsection