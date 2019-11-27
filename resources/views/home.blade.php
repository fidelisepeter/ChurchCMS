@extends('layouts.homeapp')

@section('content')
<div class="container bg-gradient-primary pb-8">
    <div class="row">
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Members</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $totalmembers }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                {{-- <span class="fas fa-users"></span> --}}
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-success mr-2"><span uk-icon="icon: arrow-up"> 3.48%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Expenses</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $totalexpenses }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                {{-- <span class="fas fa-money-check-alt"></span> --}}
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-danger mr-2"><span uk-icon="icon: arrow-down"> 3.48%</span>
                        <span class="text-nowrap">Since last week</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Income</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $totalincomes }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                {{-- <span class="fas fa-hand-holding-usd"></span> --}}
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-warning mr-2"><span uk-icon="icon: arrow-down"> 1.10%</span>
                        <span class="text-nowrap">Since yesterday</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Converts</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $totalnewconverts }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                {{-- <span class="fas fa-pray"></span> --}}
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-success mr-2"><span uk-icon="icon: arrow-up"> 12%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container text-center">
    <a href="/members/create" class="btn btn-dark">Add Member</a>
    <a href="/sermons/create" class="btn btn-success">Add Note</a>
    <a href="/income/create" class="btn btn-warning">Add Income</a>
    <a href="/expense/create" class="btn btn-info">Add Expense</a>
    <a href="/conferences/create" class="btn btn-secondary">Add Event</a>
    <a href="/attendance/create" class="btn btn-primary">Add Attendance</a>
</div>
<div class="container-fluid">
    {!! $chart->container() !!}
</div>
<hr>
<div class="container text-center">
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center">Event Data</h3>
            @if (count($conferences) > 0)
            <table class="table table-striped table-light">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Conference Theme</th>
                        <th scope="col">Date</th>
                        <th scope="col">Attendants</th>
                    </tr>
                </thead>
                @foreach($conferences as $conference)
                    <tr>
                        <td>{{$conference->name}}</td>
                        <td>{{$conference->date_of_conference}}</td>
                        <td>{{$conference->attendants}}</td>
                    </tr>
                @endforeach
            </table>
            @else
                <p>No upcoming conferences yet</p>
            @endif
        </div>
        <div class="col-md-6">
            <h3 class="text-center">Recent Expenses</h3>
            @if (count($expenses) > 0)
            <table class="table table-striped table-light">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Category</th>
                        <th scope="col">Date</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                @foreach($expenses as $expense)
                    <tr>
                        <td>{{$expense->expense_type}}</td>
                        <td>{{$expense->date_received}}</td>
                        <td>{{$expense->amount}}</td>
                        <td>{{$expense->description}}</td>
                    </tr>
                @endforeach
            </table>
            @else
                <p>You have not made any recent expenses</p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Your Published Notes</h3>
            @if (count($sermons) > 0)
            <table class="table table-striped table-light">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                @foreach($sermons as $sermon)
                    <tr>
                        <td>{{$sermon->title}}</td>
                        <td><a href="/sermons/{{$sermon->id}}/edit" class="btn btn-dark">Edit</a></td>
                        <td>
                            {!!Form::open(['action' => ['SermonsController@destroy', $sermon->id], 'method' => 'POST'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}
                        </td>
                    </tr>
                @endforeach
            </table>
            @else
                <p>You have not published any notes yet</p>
            @endif
        </div>
    </div>
</div>
{!! $chart->script() !!}
@endsection