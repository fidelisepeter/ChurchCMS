@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h2>Member Roles</h2>
        @if (count($roles) > 0)
            @foreach ($roles as $role)
                <div class="uk-card uk-card-small uk-card-hover uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
                    <div class="uk-card-media-left uk-cover-container">
                    <img src="/storage/role_images/{{ $role->role_image }}" uk-cover>
                        <canvas width="400" height="400"></canvas>
                    </div>
                    <div>
                        <div class="uk-card-body">
                            <h3 class="uk-card-title">{{ $role->name }}</h3>
                            <h5>{{ $role->user->name }}</h5>
                            <p>{{ $role->description }}</p>
                        </div>
                    </div>
                </div>
                <br>
            @endforeach
        @else
            <p>No roles have been created yet</p>
        @endif
    </div>
@endsection