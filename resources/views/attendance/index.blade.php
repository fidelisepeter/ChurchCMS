@extends('layouts.homeapp')

@section('content')
    <div class="container-fluid text-center bg-dark" style="margin-bottom: -17px;">
        <h2 style="color: white; padding: 10px;">Attendance Data</h2>
    </div>
    <div class="card-header card-header-lg">
        <canvas id="bigDashboardChart"></canvas>
    </div>
    <hr>
    <div class="text-center">
        <a href="/attendance/create" class="btn btn-secondary">Add Attendance</a>
    </div>
    <hr>
    <div class="container">
        @if (count($attendances) > 0)
        <table class="table table-striped table-light">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Date Of Service</th>
                    <th scope="col">No. of First Timers</th>
                    <th scope="col">No. of Children</th>
                    <th scope="col">No. of Teens</th>
                    <th scope="col">No. of Adults</th>
                    <th scope="col">No. of New Converts</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>   
            @foreach($attendances as $attendance)
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
            @endforeach
        </table>
        @else
            <p>You have not recorded any attendance yet</p>
        @endif
    </div>
@endsection
@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();
    });
  </script>
@endpush