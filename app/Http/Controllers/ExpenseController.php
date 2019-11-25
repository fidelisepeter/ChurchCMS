<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sortBy = 'expense_type';
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

        $totalexpenses = DB::table('expenses')->sum('amount');
        $expenses = Expense::search($q)->orderBy($sortBy, $orderBy)->paginate($perPage);
        return view('expense.index', compact('totalexpenses', 'expenses', 'orderBy', 'sortBy', 'q', 'perPage'));

        // $expenses = Expense::all();
        // return view('expense.index')->with('expenses', $expenses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expense.create');
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
            'expense_type' => 'required',
            'amount' => 'required',
            'transaction_type' => 'required',
            'date_received' => 'required',
            'description' => 'required',
        ]);

        // Create Expense
        $expense = new Expense;
        $expense->expense_type = $request->input('expense_type');
        $expense->amount = $request->input('amount');
        $expense->transaction_type = $request->input('transaction_type');
        $expense->date_received = $request->input('date_received');
        $expense->description = $request->input('description');
        $expense->save();

        return redirect('/expense')->with('success', 'Expense Recorded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expense = Expense::find($id);
        return view('expense.show')->with('expense', $expense);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = Expense::find($id);
        return view('expense.edit')->with('expense', $expense);
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
            'expense_type' => 'required',
            'amount' => 'required',
            'transaction_type' => 'required',
            'date_received' => 'required',
            'description' => 'required',
        ]);

        // Update Expense Record
        $expense = Expense::find($id);
        $expense->expense_type = $request->input('expense_type');
        $expense->amount = $request->input('amount');
        $expense->transaction_type = $request->input('transaction_type');
        $expense->date_received = $request->input('date_received');
        $expense->description = $request->input('description');
        $expense->save();

        return redirect('/expense')->with('success', 'Expense Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Expense::find($id);
        $expense->delete();
        return redirect('/expense')->with('success', 'Expense Record Deleted');
    }
}
