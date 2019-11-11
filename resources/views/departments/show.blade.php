@extends('layouts.homeapp')

@section('content')
{{-- <div class="container">
    <div class="row">
        <a href="/members" class="btn btn-secondary">Go Back</a>
        <a href="/members/{{$member->id}}/edit" class="btn btn-primary">Edit</a>
        {!!Form::open(['action' => ['MembersController@destroy', $member->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
        <br>
    </div>
</div>
<br><br> --}}
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p>Name: {{ $department->name}}</p>
                            <p>Position: {{ $department->description }}</p>
                        </div>
                        <div class="col-md-4">
                            <p>{{$department->member->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection