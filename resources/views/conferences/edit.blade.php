@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h1>Edit Event or Conference</h1>
        {!! Form::open(['action' => ['ConferencesController@update', $conference->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', $conference->name, ['class' => 'form-control', 'placeholder' => 'Name of Event'])}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', $conference->description, ['class' => 'form-control', 'placeholder' => 'Should be about 30 words long'])}}
            </div>
            <div class="form-group">
                {{Form::label('date', 'Date')}}
                {{Form::date('date', $conference->date_of_conference, ['class' => 'form-control', 'placeholder' => 'Date for Event'])}}
            </div>
            <div class="form-group">
                {{Form::label('start', 'Start')}}
                {{Form::time('start', $conference->start_time, ['class' => 'form-control', 'placeholder' => 'Start Time'])}}
            </div>
            <div class="form-group">
                {{Form::label('close', 'Close')}}
                {{Form::time('close', $conference->close_time, ['class' => 'form-control', 'placeholder' => 'Close Time'])}}
            </div>
            <div class="form-group">
                {{Form::label('attendants', 'Number of attendants')}}
                {{Form::number('attendants', $conference->attendants, ['class' => 'form-control', 'placeholder' => 'How many people attended'])}}
            </div>
            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Edit Event', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection