@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h1>Create Position</h1>
        {!! Form::open(['action' => 'RolesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Role Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Describe the role briefly'])}}
            </div>
            {{-- <div class="form-group">
                {{Form::file('role_image')}}
            </div> --}}
            {{Form::submit('Create Role', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection