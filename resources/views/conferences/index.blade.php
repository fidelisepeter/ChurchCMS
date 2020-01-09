@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Events &amp; Conferences</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (count($conferences) > 0)
                    @foreach ($conferences as $conference)
                    <div class="card shadow pt-3 pr-3 pl-3 pb-3">
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
                    </div>
                    <br>
                    @endforeach
                @else
                    <p>No event data has been recorded yet!</p>
                @endif
            </div>
        </div>
    </div>
@endsection
    