@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h1>Edit Attendance Record</h1>
        {!! Form::open(['action' => ['AttendanceController@update', $attendance->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('date_of_service', 'Date Of Service')}}
                {{Form::date('date_of_service', $attendance->date_of_service, ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('number_of_first_timers', 'Number Of First Timers')}}
                {{Form::number('number_of_first_timers', $attendance->number_of_first_timers, ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('number_of_children', 'Number Of Children')}}
                {{Form::number('number_of_children', $attendance->number_of_children, ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('number_of_teens', 'Number Of Teens')}}
                {{Form::number('number_of_teens', $attendance->number_of_teens, ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('number_of_adults', 'Number Of Adults')}}
                {{Form::number('number_of_adults', $attendance->number_of_adults, ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('number_of_new_converts', 'Number Of New Converts')}}
                {{Form::number('number_of_new_converts', $attendance->number_of_new_converts, ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('total', 'Total')}}
                {{Form::number('total', $attendance->total, ['class' => 'form-control'])}}
            </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Edit Record', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection