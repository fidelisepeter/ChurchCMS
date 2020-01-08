<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Attendance;
use App\Charts\AttendanceChart;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::all();
        $data = DB::table('attendances')->pluck('number_of_first_timers');
        $data2 = DB::table('attendances')->pluck('date_of_service');

        $data3 = DB::table('attendances')->pluck('number_of_new_converts');
        $data4 = DB::table('attendances')->pluck('date_of_service');
        
        $chart = new AttendanceChart;
        $chart->labels($data2);
        $chart->loaderColor('#32325d');
        $chart->dataset('First Timers', 'line', $data);

        $chart2 = new AttendanceChart;
        $chart2->labels($data4);
        $chart->loaderColor('#32325d');
        $chart2->dataset('New Converts', 'line', $data3);

        return view('attendance.index')->with('attendances', $attendances)
                                        ->with('chart', $chart)
                                        ->with('chart2', $chart2);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attendance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date_of_service' => 'required',
            'number_of_first_timers' => 'required',
            'number_of_children' => 'required',
            'number_of_teens' => 'required',
            'number_of_adults' => 'required',
            'number_of_new_converts' => 'required',
            'total' => 'required',
        ]);

        // Create Attendance Record
        $attendance = new Attendance;
        $attendance->date_of_service = $request->input('date_of_service');
        $attendance->number_of_first_timers = $request->input('number_of_first_timers');
        $attendance->number_of_children = $request->input('number_of_children');
        $attendance->number_of_teens = $request->input('number_of_teens');
        $attendance->number_of_adults = $request->input('number_of_adults');
        $attendance->number_of_new_converts = $request->input('number_of_new_converts');
        $attendance->total = $request->input('total');
        $attendance->save();

        return redirect('/attendance')->with('success', 'Attendance Recorded Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attendance = Attendance::find($id);
        return view('attendance.show')->with('attendance', $attendance);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attendance = Attendance::find($id);
        return view('attendance.edit')->with('attendance', $attendance);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'date_of_service' => 'required',
            'number_of_first_timers' => 'required',
            'number_of_children' => 'required',
            'number_of_teens' => 'required',
            'number_of_adults' => 'required',
            'number_of_new_converts' => 'required',
            'total' => 'required',
        ]);

        // Update Attendance Record
        $attendance = Attendance::find($id);
        $attendance->date_of_service = $request->input('date_of_service');
        $attendance->number_of_first_timers = $request->input('number_of_first_timers');
        $attendance->number_of_children = $request->input('number_of_children');
        $attendance->number_of_teens = $request->input('number_of_teens');
        $attendance->number_of_adults = $request->input('number_of_adults');
        $attendance->number_of_new_converts = $request->input('number_of_new_converts');
        $attendance->total = $request->input('total');
        $attendance->save();

        return redirect('/attendance')->with('success', 'Attendance Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attendance = Attendance::find($id);
        $attendance->delete();
        return redirect('/attendance')->with('success', 'Attendance Record Deleted');
    }
}
