@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h1>Create Event or Conference</h1>
        {!! Form::open(['action' => 'ConferencesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name of Event'])}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Should be about 30 words long'])}}
            </div>
            <div class="form-group">
                {{Form::label('date', 'Date')}}
                {{Form::date('date', '', ['class' => 'form-control', 'placeholder' => 'Date of Event'])}}
            </div>
            <div class="form-group">
                {{Form::label('start', 'Start')}}
                {{Form::time('start', '', ['class' => 'form-control', 'placeholder' => 'Start Time'])}}
            </div>
            <div class="form-group">
                {{Form::label('close', 'Close')}}
                {{Form::time('close', '', ['class' => 'form-control', 'placeholder' => 'Close Time'])}}
            </div>
            <div class="form-group">
                {{Form::label('attendants', 'Number of attendants')}}
                {{Form::number('attendants', '', ['class' => 'form-control', 'placeholder' => 'How many people attended'])}}
            </div>
            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>
            {{Form::submit('Create Event', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection