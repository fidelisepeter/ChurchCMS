<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\AttendanceChart;
use App\User;
use App\Member;
use App\Conference;
use App\Expense;
use App\Attendance;
use App\Income;

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
        $members = Member::all();
        $conferences = Conference::orderBy('date_of_conference', 'asc')->take(3)->get();
        $expenses = Expense::orderBy('date_received', 'desc')->take(3)->get();
        $incomes = Income::orderBy('date_received', 'desc')->take(3)->get();

        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $attendances = Attendance::all();
        $data = DB::table('attendances')->pluck('total');
        $data2 = DB::table('attendances')->pluck('date_of_service');
        
        $chart = new AttendanceChart;
        $chart->labels($data2);
        $chart->loaderColor('#32325d');
        $chart->dataset('Overall Attendance', 'line', $data);
        
        $totalmembers = DB::table('members')->count();
        $totalexpenses = DB::table('expenses')->sum('amount');
        $totalincomes = DB::table('incomes')->sum('amount');
        $totalnewconverts = DB::table('attendances')->sum('number_of_new_converts');

        return view('home')->with('sermons', $user->sermons)
                           ->with('members', $members)
                           ->with('conferences', $conferences)
                           ->with('expenses', $expenses)
                           ->with('incomes', $incomes)
                           ->with('attendances', $attendances)
                           ->with('chart', $chart)
                           ->with('totalmembers', $totalmembers)
                           ->with('totalexpenses', $totalexpenses)
                           ->with('totalincomes', $totalincomes)
                           ->with('totalnewconverts', $totalnewconverts);
    }
}
