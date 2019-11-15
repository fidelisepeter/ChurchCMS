<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\AttendanceChart;
use App\Charts\IncomeChart;
use App\Income;
use App\User;
use App\Member;
use App\Conference;
use App\Expense;
use App\Attendance;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::orderBy('bday', 'desc')->take(3)->get();
        $conferences = Conference::orderBy('date_of_conference', 'asc')->take(3)->get();
        $expenses = Expense::orderBy('date_received', 'desc')->take(5)->get();

        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $attendances = Attendance::all();
        $data = DB::table('attendances')->pluck('total');
        $data2 = DB::table('attendances')->pluck('id');
        
        $chart = new AttendanceChart;
        $chart->labels($data2);
        $chart->dataset('Overall Attendance', 'line', $data)->options([
            'color' => '#383834',
            'backgroundColor' => '#383834',
        ]);;

        $data3 = DB::table('incomes')->pluck('amount');
        $data4 = DB::table('incomes')->pluck('paid_by');

        $chart2 = new IncomeChart;
        $chart2->labels($data4);
        $chart2->dataset('Income Data', 'bar', $data3)->options([
            'color' => '#1f9fa3',
            'backgroundColor' => '#1f9fa3',
        ]);;

        return view('home')->with('sermons', $user->sermons)
                           ->with('members', $members)
                           ->with('conferences', $conferences)
                           ->with('expenses', $expenses)
                           ->with('attendances', $attendances)
                           ->with('chart', $chart)
                           ->with('chart2', $chart2);
    }
}
