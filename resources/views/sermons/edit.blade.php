@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h1>Edit Note</h1>
        {!! Form::open(['action' => ['SermonsController@update', $sermon->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', $sermon->title, ['class' => 'form-control', 'placeholder' => 'Sermon Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('summary', 'Summary')}}
                {{Form::text('summary', '', ['class' => 'form-control', 'placeholder' => 'Should be about 30 words long'])}}
            </div>
            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', $sermon->body, ['class' => 'form-control', 'placeholder' => 'Sermon Body'])}}
            </div>
            {{-- <div class="form-group">
                {{Form::file('cover_image')}}
            </div> --}}
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Publish', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection