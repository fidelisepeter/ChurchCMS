@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h3>Expense Records</h3>
        <form action="{{ route('expense.index') }}" class="form-inline">
            <div class="form-group mr-sm-2">
                <input class="form-control" type="search" name="q" value="" placeholder="Enter term">
            </div>
            <div class="form-group mr-sm-2">
                <select class="form-control" name="sortBy" value="">
                    @foreach (['expense_type', 'transaction_type'] as $col)
                        <option @if ($col == $sortBy)
                            selected
                        @endif value="{{ $col }}">{{ ucfirst($col) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mr-sm-2">
                <select class="form-control" name="orderBy" value="">
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
        <br>
        @if (count($expenses) > 0)
        <table class="table table-striped table-light">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Expense Type</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Transaction Type</th>
                    <th scope="col">Date Received</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>   
            @foreach($expenses as $expense)
                <tr>
                    <td>{{ $expense->expense_type }}</td>
                    <td>{{ $expense->amount }}</td>
                    <td>{{ $expense->transaction_type }}</td>
                    <td>{{ $expense->date_received }}</td>
                    <td>{{ $expense->description }}</td>
                    <td><a href="/expense/{{$expense->id}}/edit" class="btn btn-dark">Edit</a></td>
                    <td>
                        {!!Form::open(['action' => ['ExpenseController@destroy', $expense->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr>
            @endforeach
        </table>
        @else
            <p>You have not recorded any expense yet</p>
        @endif
    </div>
@endsection