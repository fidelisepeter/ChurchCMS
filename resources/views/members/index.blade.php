@extends('layouts.homeapp')

@section('content')
    <div class="container">
        @if (count($members) > 0)
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0 pull-left">Members Directory</h3>
                        <form action="{{ route('members.index') }}" class="form-inline">
                            <div class="form-group mr-sm-2">
                                <input class="form-control" type="search" name="q" value="" placeholder="Enter name, position or department">
                            </div>
                            <div class="form-group mr-sm-2">
                                <select class="form-control" name="sortBy" value="">
                                    @foreach (['name', 'department', 'position'] as $col)
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
                                    @foreach (['25', '50', '100', '250'] as $page)
                                        <option @if ($page == $perPage)
                                            selected
                                        @endif value="{{ $page }}"></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mr-lg-7">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <div class="table-responsive">
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
            <tbody>
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
            </tbody>
            @endforeach
        </table>
        </div>
        </div>
        @else
            <p>You have no members registered</p>
        @endif
    </div>
@endsection