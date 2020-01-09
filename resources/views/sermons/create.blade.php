@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Add Sermon Note</h3>
                    </div>
                    <div class="col text-right">
                    </div>
                </div>
            </div>
            <div class="card-body">
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
                    <div class="form-group col-md-6 offset-md-4">
                        {{Form::submit('Create Sermon Note', ['class' => 'btn btn-primary'])}}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection