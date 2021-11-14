<?php

namespace App\Http\Controllers;

use App\Bed;
use App\Bad_Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $count = DB::table('calllogs')
        //  ->select('created_at', DB::raw('count(*) as calllogs'))
        //  ->get(); ->groupBy('browser')

        $beds = Bed::all();
        //$totalbeds = DB::table('beds')->select('bedType_id', DB::raw('sum(*) as capacity'))->groupBy('bedType_id')->get();
        
        return view('admin.bed_manager.bed.all_bed',compact('beds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bedtypes = Bad_Type::all();
        return view('admin.bed_manager.bed.add_bed',compact('bedtypes'));
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
            'bedType_id'=>'required',
            'description'=>'required',
            'capacity'=>'required',
            'charge'=>'required',
            'status'=>'required',
        ]);
        Bed::insert([
            'bedType_id'=>$request->bedType_id,
            'description'=>$request->description,
            'capacity'=>$request->capacity,
            'charge'=>$request->charge,
            'status'=>$request->status,
            'created_at'=>Carbon::now(),
        ]);

        return redirect('bed')->with('added_success',' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function show(Bed $bed)
    {
        //$sumbed = Bed::where('bedType_id',$bed)->sum('capacity');
        return view('admin.bed_manager.bed.show_bed',compact('bed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function edit(Bed $bed)
    {
        $bedtypes = Bad_Type::all();
        return view('admin.bed_manager.bed.edit_bed',compact('bed','bedtypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bed $bed)
    {
        $request->validate([
            'bedType_id'=>'required',
            'description'=>'required',
            'capacity'=>'required',
            'charge'=>'required',
            'status'=>'required',
        ]);
        $request->all();
        $bed->bedType_id = $request->bedType_id;
        $bed->description = $request->description;
        $bed->capacity = $request->capacity;
        $bed->charge = $request->charge;
        $bed->status = $request->status;
        $bed->save();

        return redirect('bed')->with('edit_success',' ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bed $bed)
    {
       
    }

    public function bed_delete($id)
    {
        Bed::find($id)->delete();
        return back()->with('delete_success',' ');
    }

    public function inactive($id){
        Bed::find($id)->update(['status'=>0]);
        return Redirect()->back();
    }

    public function active($id){
        Bed::find($id)->update(['status'=>1]);
        return Redirect()->back();
    }
}
