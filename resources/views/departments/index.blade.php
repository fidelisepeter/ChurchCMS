@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h2>Departments</h2>
        @if (count($departments) > 0)
            @foreach ($departments as $department)
                <div class="card">
                    <div class="card-body">
                        <h3><a href="/departments/{{$department->id}}">{{ $department->name }}</a></h3>
                        <p>{{ $department->description }}</p>
                    </div>
                </div>
                <br>
            @endforeach
        @else
            <p>You have not created any departments yet</p>
        @endif
    </div>
@endsection