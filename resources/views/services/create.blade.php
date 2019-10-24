@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h1>Create Service</h1>
        {!! Form::open(['action' => 'ServicesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name of Service'])}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Should be about 30 words long'])}}
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
                {{Form::label('rota', 'Duty Rota')}}
                {{Form::select('rota', ['L' => 'Large', 'S' => 'Small'])}}
            </div>
            <div class="form-group">
                {{Form::file('flyer_image')}}
            </div>
            {{Form::submit('Create', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection