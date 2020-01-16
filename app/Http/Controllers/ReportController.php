<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\Member;
use App\Income;

class ReportController extends Controller
{
    public function income() {
        $incomes = Income::all();
        return view('reportincome')->with('incomes', $incomes);
    }
    public function members() {
        $members = Member::all();
        return view('reportmembers')->with('members', $members);
    }
    public function attendance() {
        $attendances = Attendance::all();
        return view('reportattendance')->with('attendances', $attendances);
    }
    
}