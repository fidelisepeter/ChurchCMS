<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;


class PDFMaker extends Controller
{
    public function make1() {
        $data = [
			'foo' => 'bar'
		];
		$pdf = PDF::loadView('pdf.cmembers', $data);
		return $pdf->stream('cmembers.pdf');
    }

    public function make2() {
        $data = [
			'foo' => 'bar'
		];
		$pdf = PDF::loadView('pdf.cmembers', $data);
		return $pdf->stream('cmembers.pdf');
    }

    public function make3() {
        $data = [
			'foo' => 'bar'
		];
		$pdf = PDF::loadView('pdf.cmembers', $data);
		return $pdf->stream('cmembers.pdf');
    }

    public function make4() {
        $data = [
			'foo' => 'bar'
		];
		$pdf = PDF::loadView('pdf.cmembers', $data);
		return $pdf->stream('cmembers.pdf');
    }
}
