@extends('layouts.homeapp')

@section('content')
    <div class="container">
        <h3>Income Records</h3>
        <div class="row">
            <form action="{{ route('income.index') }}">
                <div class="row">
                    <div class="col-md-4">
                        <input class="form-control form-control-sm" type="search" name="q" value="">
                    </div>
                    <div class="col-md-2 col-3">
                        <select class="form-control form-control-sm" name="sortBy" value="">
                            @foreach (['income_type', 'transaction_type', 'paid_by'] as $col)
                                <option @if ($col == $sortBy)
                                    selected
                                @endif value="{{ $col }}">{{ ucfirst($col) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 col-3">
                        <select class="form-control form-control-sm" name="orderBy" value="">
                            @foreach (['asc', 'desc'] as $order)
                                <option @if ($order == $orderBy)
                                    selected
                                @endif value="{{ $order }}">{{ ucfirst($order) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 col-3">
                        <select name="perPage" class="form-control form-control-sm" value="">
                            @foreach ([20, 50, 100, 250] as $page)
                                <option @if ($page == $perPage)
                                    selected
                                @endif value="{{ $page }}"></option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 col-3">
                        <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                    </div>
                </div>
            </form>
        </div>
        
        <hr>
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
                    <td>{{ $income->type }}</td>
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

