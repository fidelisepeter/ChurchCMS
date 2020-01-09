@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Sermon Notes</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (count($sermons) > 0)
                    @foreach ($sermons as $sermon)
                        <div class="card shadow">
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
        </div>
    </div>
@endsection