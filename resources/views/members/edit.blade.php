@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h1>Edit Member</h1>
        {!! Form::open(['action' => ['MembersController@update', $member->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', $member->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('member_type', 'Member Type')}}
                {{Form::select('member_type', array('Child' => 'Child', 'Teen' => 'Teen', 'Adult' => 'Adult', 'First Timer' => 'First Timer', 'New Convert' => 'New Convert'), ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('email', 'Email')}}
                {{Form::text('email', $member->email, ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
            </div>
            <div class="form-group">
                {{Form::label('mobile', 'Mobile')}}
                {{Form::text('mobile', $member->mobile, ['class' => 'form-control', 'placeholder' => 'Mobile Number'])}}
            </div>
            <div class="form-group">
                {{Form::label('nationality', 'Nationality')}}
                {{Form::text('nationality', $member->nationality, ['class' => 'form-control', 'placeholder' => 'Nationality'])}}
            </div>
            <div class="form-group">
                {{Form::label('gender', 'Gender')}}
                {{Form::select('gender', array('Male' => 'Male', 'Female' => 'Female'), ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('occupation', 'Occupation')}}
                {{Form::text('occupation', $member->occupation, ['class' => 'form-control', 'placeholder' => 'Occupation'])}}
            </div>
            <div class="form-group">
                {{Form::label('address', 'Address')}}
                {{Form::text('address', $member->address, ['class' => 'form-control', 'placeholder' => 'Address'])}}
            </div>
            <div class="form-group">
                {{Form::label('position', 'Position')}}
                {{Form::select('position', array('Founder' => 'Founder', 'Pastor' => 'Pastor', 'Administrator' => 'Administrator', 'Elder' => 'Elder', 'Deacon' => 'Deacon', 'Member' => 'Member'), ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('department', 'Department')}}
                {{Form::select('department', array('Sanctum' => 'Sanctum', 'Mens Ministry' => 'Mens Ministry', 'Womens Ministry' => 'Womens Ministry', 'Prayer Team' => 'Prayer Team', 'Technical Team' => 'Technical Team', 'Cleaning Team' => 'Cleaning Team', 'Choir' => 'Choir', 'Evangelism Team' => 'Evangelism Team', 'Worship & Praise Team' => 'Worship & Praise Team'), ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('bday', 'Date of Birth')}}
                {{Form::date('bday', $member->bday, ['class' => 'form-control', 'placeholder' => 'Birthday'])}}
            </div>
            <div class="form-group">
                {{Form::label('datejoined', 'Date Joined')}}
                {{Form::date('datejoined', $member->datejoined, ['class' => 'form-control', 'placeholder' => 'Birthday'])}}
            </div>
            <div class="form-group">
                {{Form::label('previouschurch', 'Previous Church')}}
                {{Form::text('previouschurch', $member->previouschurch, ['class' => 'form-control', 'placeholder' => 'Email'])}}
            </div>
            <div class="form-group">
                {{Form::label('member_image', 'Member Image')}}
                {{Form::file('member_image')}}
            </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Edit Member', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection