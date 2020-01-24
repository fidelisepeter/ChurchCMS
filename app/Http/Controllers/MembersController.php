<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Excel;
use App\Imports\MembersImport;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sortBy = 'name';
        $orderBy = 'desc';
        $perPage = '20';
        $q = null;

        if ($request->has('orderBy'))
            $orderBy = $request->query('orderBy');
        if ($request->has('sortBy'))
            $sortBy = $request->query('sortBy');
        if ($request->has('perPage'))
            $perPage = $request->query('perPage');
        if ($request->has('q'))
            $q = $request->query('q');

        $members = Member::search($q)->orderBy($sortBy, $orderBy)->paginate($perPage);
        return view('members.index', compact('members', 'orderBy', 'sortBy', 'q', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'bday' => 'date',
            'nationality' => 'required|string|max:255',
            'gender' => 'required|string',
            'occupation' => 'required|string',
            'position' => 'required|string',
            'department' => 'required|string',
            'datejoined' => 'date',
            'previouschurch' => 'required|string|max:255',
            'member_image' => 'nullable|image|max:1999'
        ]);

        //Handle File Upload
        if($request->hasFile('member_image')){
            // Get filename with the extension
            $fileNameWithExt = $request->file('member_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('member_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('member_image')->storeAs('public/member_images', $fileNameToStore);
        }

        // Create Member
        $member = new Member;
        $member->name = $request->input('name');
        $member->member_type = $request->input('member_type');
        $member->email = $request->input('email');
        $member->mobile = $request->input('mobile');
        $member->nationality = $request->input('nationality');
        $member->gender = $request->input('gender');
        $member->occupation = $request->input('occupation');
        $member->address = $request->input('address');
        $member->position = $request->input('position');
        $member->department = $request->input('department');
        $member->bday = $request->input('bday');
        $member->datejoined = $request->input('datejoined');
        $member->previouschurch = $request->input('previouschurch');
        $member->member_image = $fileNameToStore;
        $member->save();

        return redirect('/members')->with('success', 'Member Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        return view('members.show')->with('member', $member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        return view('members.edit')->with('member', $member);
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'bday' => 'date',
            'nationality' => 'required|string|max:255',
            'gender' => 'required|string',
            'occupation' => 'required|string',
            'position' => 'required|string',
            'department' => 'required|string',
            'datejoined' => 'date',
            'previouschurch' => 'required|string|max:255',
            'member_image' => 'nullable|image|max:1999'
        ]);

        //Handle File Upload
        if($request->hasFile('member_image')){
            // Get filename with the extension
            $fileNameWithExt = $request->file('member_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('member_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('member_image')->storeAs('public/member_images', $fileNameToStore);
        }

        // Update Member
        $member = Member::find($id);
        $member->name = $request->input('name');
        $member->member_type = $request->input('member_type');
        $member->email = $request->input('email');
        $member->mobile = $request->input('mobile');
        $member->nationality = $request->input('nationality');
        $member->gender = $request->input('gender');
        $member->occupation = $request->input('occupation');
        $member->address = $request->input('address');
        $member->position = $request->input('position');
        $member->department = $request->input('department');
        $member->bday = $request->input('bday');
        $member->datejoined = $request->input('datejoined');
        $member->previouschurch = $request->input('previouschurch');
        $member->member_image = $fileNameToStore;
        $member->save();

        return redirect('/members')->with('success', 'Member Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect('/members')->with('success', 'Member Removed');
    }
    
    public function importFile() {
        return view('imports.excel');
    }

    public function importExcel(Request $request) {
        $this->validate($request, [
            'select_file' => 'required|mimes:xls,xlsx,csv,'
        ]);
        
        Excel::import(new MembersImport, request()->file('select_file'));
        return redirect('/members')->with('success', 'Bulk Members Added');
    }

}
