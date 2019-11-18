@extends('layouts.homeapp')

@section('content')
<div class="container">
    <a href="/reportincome/pdf" class="btn btn-success">Print PDF</a>
</div>
<div class="container">
    @if (count($incomes) > 0)
    <table class="table table-striped table-light">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Paid By</th>
                <th scope="col">Income Type</th>
                <th scope="col">Amount</th>
                <th scope="col">Transaction Type</th>
                <th scope="col">Date Received</th>
            </tr>
        </thead>
        @foreach($incomes as $income)
            <tr>
                <td>{{ $income->paid_by }}</td>
                <td>{{ $income->income_type }}</td>
                <td>{{ $income->amount }}</td>
                <td>{{ $income->transaction_type }}</td>
                <td>{{ $income->date_received }}</td>
                <td><a href="/income/{{$income->id}}/edit" class="btn btn-dark">Edit</a></td>
                <td>
                    {!!Form::open(['action' => ['IncomeController@destroy', $income->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                </td>
                
            </tr>
        @endforeach
    </table>
    @else
        <p>You have not recorded any income yet</p>
    @endif
</div> 
@endsection