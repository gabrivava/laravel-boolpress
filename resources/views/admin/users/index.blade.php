@extends('layouts.admin')

@section('content')

    <div class="table-responsive">
        <h1>Utenti registrati</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>MAIL</th>
                    <th>PASSWORD</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->password}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection