@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h1>Create Income</h1>
        {!! Form::open(['action' => 'IncomeController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            
            <div class="form-group">
                {{Form::label('income_type', 'Income Type')}}
                {{Form::select('income_type', array('Pledge' => 'Pledge', 'Donation' => 'Donation', 'Tithe' => 'Tithe', 'Offering' => 'Offering', 'Seed' => 'Seed'), ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('amount', 'Amount')}}
                {{Form::number('amount', '', ['class' => 'form-control', 'placeholder' => 'Enter amount'])}}
            </div>
            <div class="form-group">
                {{Form::label('transaction_type', 'Transaction Type')}}
                {{Form::select('transaction_type', array('Bank Deposit' => 'Bank Deposit', 'Cash' => 'Cash', 'MoMo' => 'MoMo'), ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('date_received', 'Date Received')}}
                {{Form::date('date_received', '', ['class' => 'form-control', 'placeholder' => 'Enter date'])}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Describe this income'])}}
            </div>
            <div class="form-group">
                {{Form::label('paid_by', 'Paid By')}}
                {{Form::text('paid_by', '', ['class' => 'form-control', 'placeholder' => 'Enter the member name'])}}
            </div>

            {{-- <div class="form-group">
                {{Form::file('cover_image')}}
            </div> --}}
            {{Form::submit('Create Income', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection