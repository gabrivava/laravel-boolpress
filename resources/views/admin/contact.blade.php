@extends('layouts.guest')

@section('content')
    <div class="container pb-3">
        <h1>Contact Me</h1>

        @include('partials.errors')
        @if (session('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>{{session('message')}}</strong> 
            </div>
            
            <script>
              $(".alert").alert();
            </script>
        @endif
        <form action="{{route('contact.send')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="full_name">Full_name</label>
              <input type="text" name="full_name" id="full_name" class="form-control" placeholder="full_name" aria-describedby="helpId" value="{{old('full_name')}}">
              <small id="helpId" class="text-muted">nome</small>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="email" value="{{old('email')}}" required>
              <small id="emailHelpId" class="form-text text-muted">Help text</small>
            </div>

            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" name="message" id="message" rows="3" value="{{old('message')}}"></textarea>
            </div>

            <button class="btn btn-primary" type="submit">Send</button>

        </form>
    </div>
@endsection