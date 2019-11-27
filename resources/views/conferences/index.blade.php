@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h2>Events &amp; Conferences</h2>
        <hr>
            @if (count($conferences) > 0)
                @foreach ($conferences as $conference)
                    <div class="media">
                        <img src="/storage/eventcover_images/{{ $conference->cover_image }}" class="align-self-center mr-3" style="width: 64px; height: 64px;" alt="...">
                        <div class="media-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mt-0"><strong>{{ $conference->name }}</strong></h4>
                                    <p class="lead">{{ $conference->description }}</p>                                    
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mt-0"><strong>Details</strong></h4>
                                    <p class="mb-0">Attended by: {{ $conference->attendants }} people</p>
                                    <p class="mb-0">Held On: {{ $conference->date_of_conference }}</p>
                                    <p class="mb-0">Began At: {{ $conference->start_time }}</p>
                                    <p class="mb-0">Ended At: {{ $conference->close_time }}</p>
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
    