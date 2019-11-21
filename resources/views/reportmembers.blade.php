@extends('layouts.homeapp')

@section('content')
<div class="container text-center">
    <a href="/reportmembers/pdf" class="btn btn-success">Print PDF</a>
</div>
<div class="container">
    @if (count($members) > 0)
    <table class="table table-striped table-light">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Mobile No.</th>
                <th scope="col">Address</th>
                <th scope="col">Birth Date</th>
                <th scope="col">Position</th>
                <th scope="col">Department</th>
                <th scope="col">Occupation</th>
            </tr>
        </thead>
        @foreach($members as $member)
            <tr>
                <td><img style="width: 30px; height: 30px;" src="/storage/member_images/{{ $member->member_image }}" alt=""></td>
                <td><a href="/members/{{ $member->id }}">{{ $member->name }}</a></td>
                <td>{{ $member->mobile }}</td>
                <td>{{ $member->address }}</td>
                <td>{{ $member->bday }}</td>
                <td>{{ $member->position }}</td>
                <td>{{ $member->department }}</td>
                <td>{{ $member->occupation }}</td>
            </tr>
        @endforeach
    </table>
    @else
        <p>You have no members registered</p>
    @endif
</div>
@endsection