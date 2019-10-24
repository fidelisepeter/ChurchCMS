@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h3>Address Book</h3>
        @if (count($addresses) > 0)
        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Home Address</th>
                <th>Birthday</th>
                {{-- <th>Role in Church</th> --}}
            </tr>
            @foreach($addresses as $address)
                <tr>
                    <td>{{ $address->name }}</td>
                    <td>{{ $address->mobile }}</td>
                    <td>{{ $address->address }}</td>
                    <td>{{ $address->bday }}</td>
                    {{-- <td>{{ $address->}}</td> --}}
                </tr>
            @endforeach
        </table>
        @else
            <p>You have no members registered</p>
        @endif
    </div>
@endsection