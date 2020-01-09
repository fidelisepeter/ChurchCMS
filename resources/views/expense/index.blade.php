@extends('layouts.homeapp')

@section('content')
    <div class="container">
        @if (count($expenses) > 0)
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0 pull-left">Expense Records</h3>
                        <form action="{{ route('expense.index') }}" class="form-inline">
                            <div class="form-group mr-sm-2">
                                <input class="form-control" type="search" name="q" value="" placeholder="Enter parameter">
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
                    <th scope="col">Expense Type</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Transaction Type</th>
                    <th scope="col">Date Received</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>   
            @foreach($expenses as $expense)
            <tbody>
                <tr>
                    <td scope="row">{{ $expense->expense_type }}</td>
                    <td scope="row">{{ $expense->amount }}</td>
                    <td scope="row">{{ $expense->transaction_type }}</td>
                    <td scope="row">{{ $expense->date_received }}</td>
                    <td scope="row">{{ $expense->description }}</td>
                    <td scope="row"><a href="/expense/{{$expense->id}}/edit" class="btn btn-dark">Edit</a></td>
                    <td scope="row">
                        {!!Form::open(['action' => ['ExpenseController@destroy', $expense->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        </div>
        </div>
        @else
            <p>You have not recorded any expense yet</p>
        @endif
    </div>
@endsection