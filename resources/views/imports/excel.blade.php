@extends('layouts.homeapp')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/import') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    {{Form::label('select_file', 'Select Excel File to Upload')}}
                    {{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
                    {{Form::file('select_file')}}
                </div>

                <div class="form-group">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" name="upload" class="btn btn-primary">
                            {{ __('Upload') }}
                        </button>
                    </div>
                </div>

                <a href="{{ url('/sample/massuploadmembers2.xlsx') }}">Download Sample Excel File</a>
            </form>
        </div>
    </div>
</div>
@endsection