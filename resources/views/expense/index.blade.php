@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h3>Expense Records</h3>
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
                    <td>{{ $expense->type }}</td>
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