<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sortBy = 'income_type';
        $orderBy = 'desc';
        $perPage = 20;
        $q = null;

        if ($request->has('orderBy'))
            $orderBy = $request->query('orderBy');
        if ($request->has('sortBy'))
            $sortBy = $request->query('sortBy');
        if ($request->has('perPage'))
            $perPage = $request->query('perPage');
        if ($request->has('q'))
            $q = $request->query('q');

        $totalincomes = DB::table('incomes')->sum('amount');
        
        $incomes = Income::search($q)->orderBy($sortBy, $orderBy)->paginate($perPage);
        return view('income.index', compact('totalincomes', 'incomes', 'orderBy', 'sortBy', 'q', 'perPage'));

        // $incomes = Income::all();
        // return view('income.index')->with('incomes', $incomes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('income.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'income_type' => 'required',
            'amount' => 'required',
            'transaction_type' => 'required',
            'date_received' => 'required',
            'description' => 'required',
            'paid_by' => 'nullable',
        ]);

        // Create Income
        $income = new Income;
        $income->income_type = $request->input('income_type');
        $income->amount = $request->input('amount');
        $income->transaction_type = $request->input('transaction_type');
        $income->date_received = $request->input('date_received');
        $income->description = $request->input('description');
        $income->paid_by = $request->input('paid_by');
        $income->save();

        return redirect('/income')->with('success', 'Income Recorded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $income = Income::find($id);
        return view('income.show')->with('income', $income);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $income = Income::find($id);
        return view('income.edit')->with('income', $income);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'income_type' => 'required',
            'amount' => 'required',
            'transaction_type' => 'required',
            'date_received' => 'required',
            'description' => 'required',
        ]);

        // Update Income Record
        $income = Income::find($id);
        $income->income_type = $request->input('income_type');
        $income->amount = $request->input('amount');
        $income->transaction_type = $request->input('transaction_type');
        $income->date_received = $request->input('date_received');
        $income->description = $request->input('description');
        $income->paid_by = $request->input('paid_by');
        $income->save();

        return redirect('/income')->with('success', 'Income Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $income = Income::find($id);
        $income->delete();
        return redirect('/income')->with('success', 'Income Record Deleted');
    }

}
