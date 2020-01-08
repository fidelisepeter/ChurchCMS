@extends('layouts.homeapp')

@section('content')
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Attendance Charts</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>First Timers</h6>
                        <div>{!! $chart->container() !!}</div>
                    </div>
                    <div class="col-md-6">
                        <h6>New Converts</h6>
                        <div>{!! $chart2->container() !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
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
        <table class="table align-items-center table-hover">
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