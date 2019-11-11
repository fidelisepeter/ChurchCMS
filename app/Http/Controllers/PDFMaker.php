<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Member;


class PDFMaker extends Controller
{
    public function make1() {
		$members = Member::all();
		$pdf = PDF::loadView('pdf.cmembers', $members);
		return $pdf->stream('cmembers.pdf');
		
    }

    public function make2() {
		$pdf = PDF::loadView('pdf.cmembers');
		return $pdf->stream('cmembers.pdf');
    }

    public function make3() {
		$pdf = PDF::loadView('pdf.cmembers');
		return $pdf->stream('cmembers.pdf');
    }

    public function make4() {
		$pdf = PDF::loadView('pdf.cmembers');
		return $pdf->stream('cmembers.pdf');
    }
}
