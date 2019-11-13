<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Barryvdh\DomPDF\Facade as PDF;

class PrintController extends Controller
{
    public function index() {
        $members = Member::all();
        return view('pdf.printcmembers')->with('members', $members);
    }
    public function prnpreview() {
        $members = Member::all();
        return view('pdf.cmembers')->with('members', $members);
    }
    public function printPDF() {
        $members = Member::all();
        $pdf = PDF::loadView('members.index', $members);
        return $pdf->download('members.pdf');
    }
}
