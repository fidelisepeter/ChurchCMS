@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h2>Church Services</h2>
            @if (count($services) > 0)
                @foreach ($services as $service)
                    <div class="card mb-3 mr-3" style="max-width: 500px; float: left;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                            <img src="/storage/serviceflyer_images/{{ $service->flyer_image }}" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$service->name}}</h5>
                                <p class="card-text">{{$service->description}}</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No services have been created yet</p>
            @endif
    </div>
@endsection
