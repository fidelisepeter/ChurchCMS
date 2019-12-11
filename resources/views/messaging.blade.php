@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Messaging Members</h3>
                    </div>
                </div>
            </div>
            <div class="card-body bg-gradient-gray-dark">
                <h4 style="color:white;">Send SMS to Members</h4>
                <form action="{{ url('sms_all') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="message">Enter Message Here</label>
                        <textarea name="message" id="message" cols="30" rows="5" class="form-control" required autofocus></textarea>
                    </div>

                    <table class="table align-center align-items-center table-hover table-responsive">
                        <thead class="thead-light">
                            <tr class="table-active">
                                <th scope="col"></th>
                                <th scope="col">Name</th>
                                <th scope="col">Position</th>
                                <th scope="col">Mobile</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($members) > 0)
                                @foreach ($members as $members)
                                    <tr>
                                        <td scope="row">
                                            <input type="checkbox" name="mobile[]" value="{{ $member->mobile }}" class="checkbox">
                                        </td>
                                        <td scope="row">{{ $member->name }}</td>
                                        <td scope="row">{{ $member->position }}</td>
                                        <td scope="row">{{ $member->mobile }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection