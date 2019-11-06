@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h2>Attendance Insights</h2>
        <div class="card-header card-header-lg">
            <canvas id="bigDashboardChart"></canvas>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 text-center">
                <h2>Full Reports</h2>
                <a href="/pdfmaker1" class="btn btn-dark">Full Report on Members</a><br><br>
                <a href="/pdfmaker4" class="btn btn-danger">Full Report on Notes</a><br>
            </div>
            <div class="col-md-4 text-center">
                <h2>Attendance Reports</h2>
                <a href="/pdfmaker1" class="btn btn-dark">Monthly Attendance</a><br><br>
                <a href="/pdfmaker2" class="btn btn-success">Yearly Attendance</a><br><br>
            </div>
            <div class="col-md-4 text-center">
                <h2>Financial Reports</h2>
                <a href="/pdfmaker2" class="btn btn-success">Report on Income</a><br><br>
                <a href="/pdfmaker3" class="btn btn-secondary">Report on Expenses</a><br><br>
            </div>
        </div>
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