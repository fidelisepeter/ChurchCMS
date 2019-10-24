@extends('layouts.homeapp')

@section('content')
<div class="container">
    <a href="/members/create" class="btn btn-dark">Add Member</a>
    <a href="/sermons/create" class="btn btn-primary">Add Note</a>
    {{-- <a href="/roles/create" class="btn btn-secondary">Add Position</a> --}}
    <a href="/departments/create" class="btn btn-success">Add Department</a>
    <a href="/conferences/create" class="btn btn-secondary">Add Event</a>
    <a href="/services/create" class="btn btn-danger">Add Service</a>
    <a href="/income/create" class="btn btn-warning">Add Income</a>
    <a href="/expense/create" class="btn" style="background: greenyellow;">Add Expense</a>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center">Upcoming Events</h3>
            @if (count($conferences) > 0)
            <table class="table table-striped table-light">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Theme Of Conference</th>
                        <th scope="col">Date For Conference</th>
                    </tr>
                </thead>
                @foreach($conferences as $conference)
                    <tr>
                        <td>{{$conference->name}}</td>
                        <td>{{$conference->date_of_conference}}</td>
                    </tr>
                @endforeach
            </table>
            @else
                <p>No upcoming conferences yet</p>
            @endif
        </div>
        <div class="col-md-6">
            <h3 class="text-center">Upcoming Birthdays</h3>
            @if (count($members) > 0)
            <table class="table table-striped table-light">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Birthday</th>
                    </tr>
                </thead>
                @foreach($members as $member)
                    <tr>
                        <td>{{$member->name}}</td>
                        <td>{{$member->bday}}</td>
                    </tr>
                @endforeach
            </table>
            @else
                <p>No birthdays are coming up soon</p>
            @endif
        </div>
    </div> 

    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Recent Expenses</h3>
            @if (count($expenses) > 0)
            <table class="table table-striped table-light">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Expense Category</th>
                        <th scope="col">Date Received</th>
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
                        <td><a href="/sermons/{{$sermon->id}}/edit" class="btn btn-primary">Edit</a></td>
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
@endsection
