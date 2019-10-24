@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h1>Edit Department</h1>
        {!! Form::open(['action' => ['DepartmentsController@update', $department->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', $department->name, ['class' => 'form-control', 'placeholder' => 'Name of Department'])}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::textarea('description', $department->description, ['class' => 'form-control', 'placeholder' => 'Describe the department in detail'])}}
            </div>
            {{-- <div class="form-group">
                {{Form::file('cover_image')}}
            </div> --}}
            {{Form::submit('Edit Department', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection