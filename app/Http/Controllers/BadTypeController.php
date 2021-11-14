<?php

namespace App\Http\Controllers;

use App\Bad_Type;
use Illuminate\Http\Request;

class BadTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bedtypes = Bad_Type::all();
        return view('admin.bed_manager.bed_type.all_bed_type',compact('bedtypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bed_type'=>'required|min:2',
        ]);

        $obj = new Bad_Type();
        $obj->bed_type = $request->bed_type;
        $obj->status = 0;
        $obj->save();
        return back()->with('insert_bed_type_success',' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bad_Type  $bad_Type
     * @return \Illuminate\Http\Response
     */
    public function show(Bad_Type $bad_Type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bad_Type  $bad_Type
     * @return \Illuminate\Http\Response
     */
    public function edit(Bad_Type $bad_Type)
    {
        return view('admin.bed_manager.bed_type.all_bed_type',compact('bad_Type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bad_Type  $bad_Type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bad_Type $bad_Type)
    {

        $request->all();
        $bad_Type->bed_type = $request->bed_type;
        $bad_Type->save();
        return redirect('bed_type')->with('bed_type_update_success',' ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bad_Type  $bad_Type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bad_Type $bad_Type)
    {
        //
    }

    public function bed_type_delete($id){
        Bad_Type::find($id)->delete();
        return redirect('bed_type')->with('bed_type_delete_success',' ');
    }

    public function inactive($id){
        Bad_Type::find($id)->update(['status'=>0]);
        return Redirect()->back();
    }

    public function active($id){
        Bad_Type::find($id)->update(['status'=>1]);
        return Redirect()->back();
    }
}
