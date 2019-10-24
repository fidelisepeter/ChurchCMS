@extends('layouts.adminhomeapp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-secondary">
                <div class="panel-heading">ADMIN Dashboard</div>
                <div class="panel-body">
                    You are logged in as <strong>ADMIN</strong>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="container">
    <a href="/members/create" class="btn btn-dark">Add Member</a>
    <a href="/sermons/create" class="btn btn-primary">Add Note</a>
    <a href="/roles/create" class="btn btn-secondary">Add Position</a>
    <a href="/departments/create" class="btn btn-success">Add Department</a>
    <a href="/services/create" class="btn btn-danger">Add Service</a>
    <a href="/conferences/create" class="btn btn-warning">Add Event</a>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <h3>Upcoming Events &amp; Services</h3>
            <div class="card">
                <div class="card-body">
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h3>Upcoming Birthdays</h3>
            <table class="table table-striped">
                <tr>
                    <th>Name</th>
                    <th>Birthday</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <h3>Your Published Notes</h3>
            @if (count($sermons) > 0)
            <table class="table table-striped">
                <tr>
                    <th>Title</th>
                    <th></th>
                    <th></th>
                </tr>
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
</div> --}}
@endsection
