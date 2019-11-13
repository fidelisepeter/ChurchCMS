@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h1>Add Attendance</h1>
        {!! Form::open(['action' => 'AttendanceController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('date_of_service', 'Date Of Service')}}
                {{Form::date('date_of_service', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('number_of_first_timers', 'Number Of First Timers')}}
                {{Form::number('number_of_first_timers', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('number_of_children', 'Number Of Children')}}
                {{Form::number('number_of_children', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('number_of_teens', 'Number Of Teens')}}
                {{Form::number('number_of_teens', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('number_of_adults', 'Number Of Adults')}}
                {{Form::number('number_of_adults', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('number_of_new_converts', 'Number Of New Converts')}}
                {{Form::number('number_of_new_converts', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('total', 'Total')}}
                {{Form::number('total', '', ['class' => 'form-control'])}}
            </div>
            {{Form::submit('Add Record', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection