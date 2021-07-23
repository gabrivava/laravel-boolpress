@extends('layouts.admin')

@section('content')
    
    <h1>Ciao, hai un nuovo messaggio</h1>
    <p>Da: "{{$data['email']}}"</p>
    <p>Messaggio: {{$data['message']}}</p>
@endsection