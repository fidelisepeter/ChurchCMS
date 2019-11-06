<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\MembersChart;

class ChartsController extends Controller
{
    public function index() {
        $chart = new MembersChart;
        $chart->labels(['One', 'Two', 'Three']);
        $chart->dataset('My Dataset 1', 'line', [1,2,3]);
        $chart->dataset('My Dataset 2', 'line', [1,2,3]);

        return view('insights', ['chart' => $chart]);
    }
}
