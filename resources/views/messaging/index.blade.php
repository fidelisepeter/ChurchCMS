@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header border-0 bg-gradient-gray-dark">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0" style="color:white;">Messaging Members</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h4>Send SMS to Members</h4>
                <p><small class="text-muted">Type message, select recepients, click on Send Message, then Viola! Your message is sent!</small></p>
                <form action="{{ url('/message') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="message">Enter Message Here</label>
                        <textarea name="message" id="message" cols="30" rows="5" class="form-control" required></textarea>
                    </div>
                    @if (count($members) > 0)
                    <table class="table align-center align-items-center table-hover table-responsive table-bordered">
                        <thead class="thead-light">
                            <tr class="table-active">
                                <th scope="col"></th>
                                <th scope="col">Name</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Position</th>
                                <th scope="col">Department</th>
                                <th scope="col">Address</th>
                                <th scope="col">Mobile</th>
                            </tr>
                        </thead>
                        @foreach ($members as $member)
                        <tbody>
                            <tr>
                                <td scope="row">
                                    <input type="checkbox" name="mobile" value="{{ $member->mobile }}" class="checkbox">
                                </td>
                                <td scope="row"><img style="width: 30px; height: 30px;" src="/storage/member_images/{{ $member->member_image }}" alt=""></td>
                                <td scope="row">{{ $member->name }}</td>
                                <td scope="row">{{ $member->position }}</td>
                                <td scope="row">{{ $member->department }}</td>
                                <td scope="row">{{ $member->address }}</td>
                                <td scope="row">{{ $member->mobile }}</td>
                            </tr>
                        </tbody> 
                        @endforeach   
                    @endif  
                    </table>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection