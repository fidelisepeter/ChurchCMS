@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h1>Create Note</h1>
        {!! Form::open(['action' => 'SermonsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('summary', 'Summary')}}
                {{Form::text('summary', '', ['class' => 'form-control', 'placeholder' => 'Should be about 30 words long'])}}
            </div>
            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body'])}}
            </div>
            {{-- <div class="form-group">
                {{Form::file('cover_image')}}
            </div> --}}
            {{Form::submit('Publish Note', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection