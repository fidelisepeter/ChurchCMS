<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conference;

class ConferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conferences = Conference::orderBy('created_at', 'desc')->paginate(10);
        return view('conferences.index')->with('conferences', $conferences);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conferences.create');
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
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'start' => 'required',
            'close' => 'required',
            'attendants' => 'required',
            'cover_image' => 'image|required|max:1999'
        ]);
        //Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/eventcover_images', $fileNameToStore);
        }

        // Create Conference
        $conference = new Conference;
        $conference->name = $request->input('name');
        $conference->description = $request->input('description');
        $conference->date_of_conference = $request->input('date');
        $conference->start_time = $request->input('start');
        $conference->close_time = $request->input('close');
        $conference->attendants = $request->input('attendants');
        $conference->cover_image = $fileNameToStore;
        $conference->save();

        return redirect('/conferences')->with('success', 'Conference Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conference = Conference::find($id);
        return view('conferences.edit')->with('conference', $conference);
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
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'start' => 'required',
            'close' => 'required',
            'attendants' => 'required',
            'cover_image' => 'image|required|max:1999'
        ]);
        //Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/eventcover_images', $fileNameToStore);
        }

        // Update Conference
        $conference = Conference::find($id);
        $conference->name = $request->input('name');
        $conference->description = $request->input('description');
        $conference->date_of_conference = $request->input('date');
        $conference->start_time = $request->input('start');
        $conference->close_time = $request->input('close');
        $conference->attendants = $request->input('attendants');
        $conference->cover_image = $fileNameToStore;
        $conference->save();

        return redirect('/conferences')->with('success', 'Conference Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
