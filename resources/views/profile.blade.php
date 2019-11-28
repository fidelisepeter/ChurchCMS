@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <img src="/uploads/avatars/{{ $user->avatar }}" alt="avatar" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">
        <h2>{{ $user->name }}'s Profile</h2>
        <form enctype="multipart/form-data" action="/profile" method="POST">
            <label for="">Update Profile Image</label>
            <input type="file" name="avatar">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="btn btn-sm btn-primary" value="Upload Image">
        </form>
    </div>
    <div class="container">
        {!! Form::open(['action' => ['UserController@update_profile', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter name'])}}
            </div>
            <div class="form-group">
                {{Form::label('email', 'Email')}}
                {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter email'])}}
            </div>
            <div class="form-group">
                {{Form::label('password', 'Password')}}
                {{Form::password('password', '', ['class' => 'form-control'])}}
            </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Edit Profile', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection
