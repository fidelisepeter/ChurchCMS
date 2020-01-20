@extends('layouts.homeapp')

@section('content')
<div class="container text-center">
    {{-- <a href="/reportincome/pdf" class="btn btn-success">Print PDF</a> --}}
    <button class="btn btn-info" onclick="window.print();">Print PDF</button>
</div>
<div class="container">
    @if (count($incomes) > 0)
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Income Report</h3>
                </div>
                <div class="col text-right">
                </div>
            </div>
        </div>
        <div class="table-responsive">
        <div class="card-body">
    <table class="table align-items-center table-hover">
        <thead class="thead-light">
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
                <td scope="row">{{ $income->paid_by }}</td>
                <td scope="row">{{ $income->income_type }}</td>
                <td scope="row">{{ $income->amount }}</td>
                <td scope="row">{{ $income->transaction_type }}</td>
                <td scope="row">{{ $income->date_received }}</td>
                <td scope="row"><a href="/income/{{$income->id}}/edit" class="btn btn-dark">Edit</a></td>
                <td scope="row">
                    {!!Form::open(['action' => ['IncomeController@destroy', $income->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                </td>
                
            </tr>
        @endforeach
    </table>
        </div>
        </div>
    </div>
    @else
        <p>You have not recorded any income yet</p>
    @endif
</div> 
@endsection