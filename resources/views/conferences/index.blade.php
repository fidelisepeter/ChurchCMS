@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h2>Events &amp; Conferences</h2>
        <hr>
            @if (count($conferences) > 0)
                @foreach ($conferences as $conference)
                    {{-- <div class="card mb-3 mr-3" style="max-width: 500px; float: left;">
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
                    </div> --}}
                    <div class="media">
                        <img src="/storage/eventcover_images/{{ $conference->cover_image }}" class="align-self-center mr-3" style="width: 64px; height: 64px;" alt="...">
                        <div class="media-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mt-0"><strong>{{ $conference->name }}</strong></h4>
                                    <p class="lead">{{ $conference->description }}</p>
                                    <p class="mb-0">Event Date: {{ $conference->date_of_conference }}</p>
                                    <small class="text-muted">Began at : {{ $conference->start_time }}</small>
                                    <small class="text-muted">Ended at : {{ $conference->close_time }}</small>
                                </div>
                                <div class="col-md-6">
                                    <p></p>
                                    <br>
                                    <p class="lead">Attended by: {{ $conference->attendants }} people</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            @else
                <p>No conferences have been announced yet!</p>
            @endif
    </div>
@endsection
    