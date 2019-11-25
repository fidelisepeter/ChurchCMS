@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h1>Edit Expense</h1>
        {!! Form::open(['action' => ['ExpenseController@update', $expense->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('expense_type', 'Expense Type')}}
                {{Form::select('expense_type', array('Donation' => 'Donation', 'Salary' => 'Salary', 'Equipment' => 'Equipment', 'Furniture' => 'Furniture', 'Gadgets' => 'Gadgets', 'Other' => 'Other'), ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('amount', 'Amount')}}
                {{Form::number('amount', $expense->amount, ['class' => 'form-control', 'placeholder' => 'Enter amount'])}}
            </div>
            <div class="form-group">
                {{Form::label('transaction_type', 'Transaction Type')}}
                {{Form::select('transaction_type', array('Bank Deposit' => 'Bank Deposit', 'Cash' => 'Cash', 'MoMo' => 'MoMo'), ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('date_received', 'Date Received')}}
                {{Form::date('date_received', $expense->date_received, ['class' => 'form-control', 'placeholder' => 'Enter date'])}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', $expense->description, ['class' => 'form-control', 'placeholder' => 'Describe this income'])}}
            </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Edit Expense', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection