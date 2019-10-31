@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h3>Members Directory</h3>
            <form action="{{ route('members.index') }}" class="form-inline">
                <div class="form-group mr-sm-2">
                    <input class="form-control" type="search" name="q" value="" placeholder="Enter name, position or email">
                </div>
                <div class="form-group mr-sm-2">
                    <select class="form-control" name="sortBy" value="">
                        @foreach (['name', 'email', 'position'] as $col)
                            <option @if ($col == $sortBy)
                                selected
                            @endif value="{{ $col }}">{{ ucfirst($col) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mr-sm-2">
                    <select class="form-control form-control" name="orderBy" value="">
                        @foreach (['asc', 'desc'] as $order)
                            <option @if ($order == $orderBy)
                                selected
                            @endif value="{{ $order }}">{{ ucfirst($order) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mr-sm-2">
                    <select name="perPage" class="form-control" value="">
                        @foreach (['20', '50', '100', '250'] as $page)
                            <option @if ($page == $perPage)
                                selected
                            @endif value="{{ $page }}"></option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mr-sm-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
        <hr>
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