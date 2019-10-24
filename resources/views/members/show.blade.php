@extends('layouts.homeapp')

@section('content')
<div class="container">
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
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img style="width: 200px; height: 200px; border-raduis: 40%; float: left; margin-right: 20px;" src="/storage/member_images/{{ $member->member_image }}" alt="">
                        </div>
                        <div class="col-md-4">
                            <p>Name: {{ $member->name}}</p>
                            <p>Position: {{ $member->position }}</p>
                            <p>Member Type: {{ $member->member_type }}</p>
                            <p>Mobile: {{ $member->mobile }}</p>
                            <p>Date of Birth: {{ $member->bday }}</p>
                            <p>Date Joined: {{ $member->datejoined }}</p>
                        </div>
                        <div class="col-md-4">
                            <p>Occupation: {{ $member->occupation }}</p>
                            <p>Department: {{ $member->department }}</p>
                            <p>Address: {{ $member->address }}</p>
                            <p>Nationality: {{ $member->nationality }}</p>
                            <p>Email: {{ $member->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection