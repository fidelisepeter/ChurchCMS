@extends('layouts.homeapp')

@section('content')
    <div class="container">
        @if (count($incomes) > 0)
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0 pull-left">Income Records</h3>
                        <form action="{{ route('income.index') }}" class="form-inline">
                            <div class="form-group mr-sm-2">
                                <input class="form-control" type="search" name="q" value="" placeholder="Enter parameter">
                            </div>
                            <div class="form-group mr-sm-2">
                                <select class="form-control" name="sortBy" value="">
                                    @foreach (['income_type', 'transaction_type', 'paid_by'] as $col)
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
                    <th scope="col">Paid By</th>
                    <th scope="col">Income Type</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Transaction Type</th>
                    <th scope="col">Date Received</th>
                </tr>
            </thead>
            @foreach($incomes as $income)
            <tbody>
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
            </tbody>
            @endforeach
        </table>
        </div>
        </div>
        @else
            <p>You have not recorded any income yet</p>
        @endif 
    </div>
@endsection

