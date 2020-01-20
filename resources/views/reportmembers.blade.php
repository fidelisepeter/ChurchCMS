@extends('layouts.homeapp')

@section('content')
<div class="container text-center">
    {{-- <a href="/reportmembers/pdf" class="btn btn-success">Print PDF</a> --}}
    <button class="btn btn-info" onclick="window.print();">Print PDF</button>
</div>
<div class="container">
    @if (count($members) > 0)
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Members Report</h3>
                </div>
                <div class="col text-right">
                </div>
            </div>
        </div>
        <div class="table-responsive">
        <div class="card-body">
            <table class="table align-items-center table-hover">
                <thead class="thead-light">
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
                        <td scope="row"><img style="width: 30px; height: 30px;" src="/storage/member_images/{{ $member->member_image }}" alt=""></td>
                        <td scope="row"><a href="/members/{{ $member->id }}">{{ $member->name }}</a></td>
                        <td scope="row">{{ $member->mobile }}</td>
                        <td scope="row">{{ $member->address }}</td>
                        <td scope="row">{{ $member->bday }}</td>
                        <td scope="row">{{ $member->position }}</td>
                        <td scope="row">{{ $member->department }}</td>
                        <td scope="row">{{ $member->occupation }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        </div>
    </div>
    @else
        <p>You have no members registered</p>
    @endif
</div>
@endsection