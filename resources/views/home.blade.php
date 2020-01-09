@extends('layouts.homeapp')

@section('content')
<div class="container pb-3">
    <div class="row">
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0 shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Members</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $totalmembers }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                    {{-- <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-success mr-2"><span uk-icon="icon: arrow-up"> 3.48%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p> --}}
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0 shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Expenses</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $totalexpenses }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </div>
                    </div>
                    {{-- <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-danger mr-2"><span uk-icon="icon: arrow-down"> 3.48%</span>
                        <span class="text-nowrap">Since last week</span>
                    </p> --}}
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0 shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Income</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $totalincomes }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                <i class="fas fa-hand-holding-usd"></i>                             </div>
                        </div>
                    </div>
                    {{-- <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-warning mr-2"><span uk-icon="icon: arrow-down"> 1.10%</span>
                        <span class="text-nowrap">Since yesterday</span>
                    </p> --}}
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0 shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Converts</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $totalnewconverts }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                <i class="fas fa-pray"></i>
                            </div>
                        </div>
                    </div>
                    {{-- <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-success mr-2"><span uk-icon="icon: arrow-up"> 12%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p> --}}
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="container text-center">
    <a href="/members/create" class="btn btn-light">Add Member</a>
    <a href="/sermons/create" class="btn btn-light">Add Note</a>
    <a href="/income/create" class="btn btn-light">Add Income</a>
    <a href="/expense/create" class="btn btn-light">Add Expense</a>
    <a href="/conferences/create" class="btn btn-light">Add Event</a>
    <a href="/attendance/create" class="btn btn-light">Add Attendance</a>
</div> --}}
<br>
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Overall Attendance</h3>
                </div>
                <div class="col text-right">
                    <a href="/attendance" class="btn btn-sm btn-primary">See all</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {!! $chart->container() !!}
        </div>
    </div>
</div>
<br>
<div class="container text-center">
    <div class="row">
        <div class="col-md-6">
            @if (count($incomes) > 0)
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Recent Incomes</h3>
                        </div>
                        <div class="col text-right">
                            <a href="/income" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Paid By</th>
                            <th scope="col">Category</th>
                            <th scope="col">Date</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    @foreach($incomes as $income)
                    <tbody>
                        <tr>
                            <td scope="row">{{$income->paid_by}}</td>
                            <td scope="row">{{$income->income_type}}</td>
                            <td scope="row">{{$income->date_received}}</td>
                            <td scope="row">{{$income->amount}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                    </table>
                </div>
            </div>
            @else
                <p>No upcoming conferences yet</p>
            @endif
        </div>
        <div class="col-md-6">
            @if (count($expenses) > 0)
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Recent Expenses</h3>
                        </div>
                        <div class="col text-right">
                            <a href="/expense" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Category</th>
                            <th scope="col">Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    @foreach($expenses as $expense)
                    <tbody>
                        <tr>
                            <td scope="row">{{$expense->expense_type}}</td>
                            <td scope="row">{{$expense->date_received}}</td>
                            <td scope="row">{{$expense->amount}}</td>
                            <td scope="row">{{$expense->description}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                    </table>
                </div>
            </div>
            @else
                <p>You have not made any recent expenses</p>
            @endif
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            @if (count($sermons) > 0)
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Your Sermon Notes</h3>
                        </div>
                        <div class="col text-right">
                            <a href="/sermons" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    @foreach($sermons as $sermon)
                    <tbody>
                        <tr>
                            <td scope="row">{{$sermon->title}}</td>
                            <td scope="row"><a href="/sermons/{{$sermon->id}}/edit" class="btn btn-dark">Edit</a></td>
                            <td scope="row">
                                {!!Form::open(['action' => ['SermonsController@destroy', $sermon->id], 'method' => 'POST'])!!}
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
                <p>You have not published any notes yet</p>
            @endif
        </div>
    </div>
</div>
{!! $chart->script() !!}
@endsection