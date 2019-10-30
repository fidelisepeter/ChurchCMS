<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ImportExcelController extends Controller
{
    function index () {
        $data = DB::table('members')->orderBy('id', 'DESC')->get();
        return view('imports.excel', compact('data'));
    }
}
