@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h2>Bible Notes</h2>
        @if (count($sermons) > 0)
            @foreach ($sermons as $sermon)
                <div class="card">
                    <div class="card-body">
                        <h3><a href="/sermons/{{$sermon->id}}">{{ $sermon->title }}</a></h3>
                        <p>{{ $sermon->summary }}</p>
                        <br>
                        <small>Written on {{ $sermon->created_at }}</small><br>
                        <small>By {{ $sermon->user->name }}</small>
                    </div>
                </div>
                <br>
            @endforeach
            {{ $sermons->links() }} 
        @else
            <p>No sermons found</p>
        @endif
    </div>
@endsection