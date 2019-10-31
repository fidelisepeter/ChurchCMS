<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;

class PDFMaker extends Controller
{
    public function make() {

        $pdf = PDF::make('dompdf.wrapper');
        $pdf->loadHTML('members.index');
        return $pdf->stream();
        // Respond with PDF back to browser
        // Send to the file system
    }
}
