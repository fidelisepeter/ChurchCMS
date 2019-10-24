@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h1>Create Department</h1>
        {!! Form::open(['action' => 'DepartmentsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name of Department'])}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Describe the department in detail'])}}
            </div>
            {{-- <div class="form-group">
                {{Form::file('cover_image')}}
            </div> --}}
            {{Form::submit('Create Department', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection