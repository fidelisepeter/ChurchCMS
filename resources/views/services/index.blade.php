@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h2>Church Services</h2>
            @if (count($services) > 0)
                @foreach ($services as $service)
                    <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
                        <div class="uk-card-media-left uk-cover-container">
                        <img src="/storage/serviceflyer_images/{{ $service->flyer_image }}" alt="" uk-cover>
                            <canvas width="600" height="400"></canvas>
                        </div>
                        <div>
                            <div class="uk-card-body">
                                <h3 class="uk-card-title">{{$service->name}}</h3>
                                <p>{{ $service->description }}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            @else
                <p>No services have been created yet</p>
            @endif
    </div>
@endsection