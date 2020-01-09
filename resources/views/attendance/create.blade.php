@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Add Attendance</h3>
                    </div>
                    <div class="col text-right">
                        {{-- <a href="/attendance" class="btn btn-sm btn-primary">See all</a> --}}
                    </div>
                </div>
            </div>
            <div class="card-body">
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
                    <div class="form-group col-md-6 offset-md-4">
                        {{Form::submit('Create Attendance', ['class' => 'btn btn-primary'])}}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        
    </div>
@endsection