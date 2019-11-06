@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h2>Events &amp; Conferences</h2>
            @if (count($conferences) > 0)
                @foreach ($conferences as $conference)
                    <div class="card mb-3 mr-3" style="max-width: 500px; float: left;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="/storage/eventcover_images/{{ $conference->cover_image }}" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $conference->name }}</h5>
                                    <p class="card-text">{{ $conference->description }}</p>
                                    <p class="lead">Scheduled for: {{ $conference->date_of_conference }}</p>
                                    <p class="card-text"><small class="text-muted">Begins at : {{ $conference->start_time }}</small></p>
                                    <p class="card-text"><small class="text-muted">Ends at : {{ $conference->close_time }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No conferences have been announced yet!</p>
            @endif
    </div>
@endsection
    