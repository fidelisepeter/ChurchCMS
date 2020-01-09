@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Add Expense</h3>
                    </div>
                    <div class="col text-right">
                        {{-- <a href="/attendance" class="btn btn-sm btn-primary">See all</a> --}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                {!! Form::open(['action' => 'ExpenseController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::label('expense_type', 'Expense Type')}}
                        {{Form::select('expense_type', array('Donation' => 'Donation', 'Salary' => 'Salary', 'Equipment' => 'Equipment', 'Furniture' => 'Furniture', 'Gadgets' => 'Gadgets', 'Other' => 'Other'), ['class' => 'form-control'])}}
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
                    <div class="form-group col-md-6 offset-md-4">
                        {{Form::submit('Create Expense', ['class' => 'btn btn-primary'])}}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection