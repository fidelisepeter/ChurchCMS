@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h3>Send SMS to Specific Member</h3>
        <div class="row">
            <div class="col-md-6">
                <form action="{{ url('sms') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="mobile">Mobile Number</label>
                        <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile Number">
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">Send SMS</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <h3>Recently Added Members</h3>
        <div class="row">
            @foreach (auth()->user()->unreadNotifications as $notification)
                <div class="card bg-light m-2">
                    <div class="card-body">
                        <h5 class="card-title">{{ snake_case(class_basename($notification->type)) }}</h5>
                        <p class="card-text">Say Hello to our newest member. Show him some love</p>
                        <a href="#" class="btn btn-secondary">Clear</a>
                    </div>
                </div>
            @endforeach
        </div>
        <hr>
        <h3>Upcoming Events &amp; Conferences</h3>
        <div class="row">
            {{-- @foreach ($collection as $item)
                
            @endforeach --}}
        </div>
    </div>
@endsection