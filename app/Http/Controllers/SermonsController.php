<?php

namespace App\Http\Controllers;

use App\Mail\SermonOfTheWeek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Sermon;

class SermonsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sermons = Sermon::orderBy('created_at', 'desc')->paginate(7);
        return view('sermons.index')->with('sermons', $sermons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sermons.create');
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
            'title' => 'required',
            'summary' => 'required',
            'body' => 'required'
        ]);

        // Create Sermon
        $sermon = new Sermon;
        $sermon->title = $request->input('title');
        $sermon->summary = $request->input('summary');
        $sermon->body = $request->input('body');
        $sermon->user_id = auth()->user()->id;
        $sermon->save();

        return redirect('/sermons')->with('success', 'Note Created');

        $members = DB::table('members')->pluck('email');

        Mail::to($members)->send(new SermonOfTheWeek($sermon));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sermon = Sermon::find($id);
        return view('sermons.show')->with('sermon', $sermon);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sermon = Sermon::find($id);

        // Check for correct user
        if(auth()->user()->id !== $sermon->user_id){
            return redirect('/sermons')->with('error', 'Unauthorized Page');
        }
        return view('sermons.edit')->with('sermon', $sermon);
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
            'title' => 'required',
            'summary' => 'required',
            'body' => 'required'
        ]);

        // Update Post
        $sermon = Sermon::find($id);
        $sermon->title = $request->input('title');
        $sermon->summary = $request->input('summary');
        $sermon->body = $request->input('body');
        $sermon->save();

        return redirect('/sermons')->with('success', 'Note Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sermon = Sermon::find($id);

        // Check for correct user
        if(auth()->user()->id !== $sermon->user_id){
            return redirect('/sermons')->with('error', 'Unauthorized Page');
        }
        
        $sermon->delete();
        return redirect('/sermons')->with('success', 'Note Removed');
    }
}
