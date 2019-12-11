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
                <h4 style="color:whitesmoke;">Send SMS to Members</h4>
                <form action="{{ url('sms_all') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="mobile[]" class="checkbox" value="{{ $member->mobile }}">
                                </th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Mobile</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection