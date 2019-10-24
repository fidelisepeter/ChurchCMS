@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h2>Events &amp; Conferences</h2>
            @if (count($conferences) > 0)
                @foreach ($conferences as $conference)
                    <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin uk-card-small" uk-grid>
                        <div class="uk-card-media-left uk-cover-container">
                        <img src="/storage/eventcover_images/{{ $conference->cover_image }}" alt="" uk-cover>
                            <canvas width="600" height="400"></canvas>
                        </div>
                        <div>
                            <div class="uk-card-body">
                                <h3 class="uk-card-title">{{ $conference->name }}</h3>
                                <p>{{ $conference->description }}</p>
                                <p>Scheduled to come off on : {{ $conference->date_of_conference }}</p>
                            </div>
                            <div class="uk-card-footer">
                                <p>Begins at : {{ $conference->start_time }}</p>
                                <p>Ends at : {{ $conference->close_time }}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            @else
                <p>No conferences have been announced yet!</p>
            @endif
    </div>
@endsection