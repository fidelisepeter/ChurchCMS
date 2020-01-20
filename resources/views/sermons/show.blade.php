@extends('layouts.homeapp')

@section('content')
<div class="container">
    <div class="row">
        <a href="/sermons" class="btn btn-secondary">Go Back</a>
        @if(!Auth::guest())
            @if(Auth::user()->id == $sermon->user_id)
                <a href="/sermons/{{$sermon->id}}/edit" class="btn btn-primary">Edit</a>
                {!!Form::open(['action' => ['SermonsController@destroy', $sermon->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
            @endif
        @endif
        {{-- {!!Form::open(['action' => 'SermonsController@sendmail', 'method' => 'POST'])!!}
            {{Form::submit('Send To Members via Mail', ['class' => 'btn btn-success'])}}
        {!!Form::close()!!} --}}
        {{-- <a href="/sermons/{{$sermon->id}}/edit" class="btn btn-success">Send To Members via Mail</a> --}}
        <br>
    </div>
    
    <h1>{{$sermon->title}}</h1>
    <small>Posted on {{$sermon->created_at}}</small><br>
    <small>By {{$sermon->user->name}}</small>
    <hr>
    <div style="text-align:justify; font-size: 17px;">
        {!!$sermon->body!!}
    </div>
</div>
@endsection