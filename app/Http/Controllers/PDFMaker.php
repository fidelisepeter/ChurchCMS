<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFMaker extends Controller
{
    public function make() {

        $data = ['data' => 'hello'];
        $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('reports', $data);
        return $pdf->download('invoice.pdf');
        // Respond with PDF back to browser
        // Send to the file system
    }
}
