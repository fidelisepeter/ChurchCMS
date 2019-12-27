@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3">
                <a href="/reportincome" class="btn btn-dark">Print Income Report</a>
            </div>
            <div class="col-md-3">
                <a href="/reportattendance" class="btn btn-success">Print Attendance Report</a>
            </div>
            <div class="col-md-3">
                <a href="/reportmembers" class="btn btn-info">Print Members Report</a>
            </div>
            <div class="col-md-3">
                <a href="/reportmembers" class="btn btn-primary">Print Messaging Report</a>
            </div>
        </div>
    </div>
@endsection