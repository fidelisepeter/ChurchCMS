@extends('layouts.homeapp')

@section('content')
    <h3 class="mt-0 mb-0" style="text-align:center; background:darkslategrey; color:white;">Attendance Insights</h3>
   
    <div class="container-fluid row">
        <div class="col-md-6">
            {!! $chart->container() !!}
        </div>
        <div class="col-md-6">
            {!! $chart2->container() !!}
        </div>
    </div>
    <hr>
    <div class="container">
        @if (count($attendances) > 0)
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Attendance Records</h3>
                    </div>
                </div>
            </div>
        <div class="table-responsive">
        <table class="table align-items-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Date Of Service</th>
                    <th scope="col">First Timers</th>
                    <th scope="col">Children</th>
                    <th scope="col">Teens</th>
                    <th scope="col">Adults</th>
                    <th scope="col">New Converts</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>   
            @foreach($attendances as $attendance)
            <tbody>
                <tr>
                    <td>{{ $attendance->date_of_service }}</td>
                    <td>{{ $attendance->number_of_first_timers }}</td>
                    <td>{{ $attendance->number_of_children }}</td>
                    <td>{{ $attendance->number_of_teens }}</td>
                    <td>{{ $attendance->number_of_adults }}</td>
                    <td>{{ $attendance->number_of_new_converts }}</td>
                    <td>{{ $attendance->total }}</td>
                    <td><a href="/attendance/{{$attendance->id}}/edit" class="btn btn-dark">Edit</a></td>
                    <td>
                        {!!Form::open(['action' => ['AttendanceController@destroy', $attendance->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        </div>
        </div>
        @else
            <p>You have not recorded any attendance yet</p>
        @endif
    </div>
    
    {!! $chart->script() !!}
    {!! $chart2->script() !!}
@endsection