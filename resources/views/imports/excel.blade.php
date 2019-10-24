@extends('layouts.homeapp')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/import') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    {{Form::label('excel_file', 'Select Excel File to Upload')}}
                    {{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
                    {{Form::file('excel_file')}}
                </div>

                <div class="form-group">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Upload') }}
                        </button>
                    </div>
                </div>

                <a href="{{ url('/sample/addmember.xlsx') }}">Download Sample Excel File</a>
            </form>
        </div>
    </div>
</div>
@endsection