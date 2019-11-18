<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\Member;
use App\Income;
use Barryvdh\DomPDF\Facade as PDF;

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

    public function export_pdfmembers() {
        $members = Member::all();
        $pdf = PDF::loadView('reportmembers', $members);
        return $pdf->download('members.pdf');
    }
    public function export_pdfincome() {
        $incomes = Income::all();
        $pdf = PDF::loadView('reportincome', $incomes);
        return $pdf->download('income.pdf');
    }
    public function export_pdfattendance() {
        $attendances = Attendance::all();
        $pdf = PDF::loadView('reportattendance', $attendances);
        return $pdf->download('attendance.pdf');
    }
}