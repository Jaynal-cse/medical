<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Day;

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
	     $days = Day::all();
        return view('admin.schedule.day.index',compact('days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.schedule.day.create');
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
            'name'=>'required',
			'priority'  => 'required',
			]);
			
			Day::create([
            'name'=>$request->name,
			'priority' => $request->priority,
            'created_at'=>now(),
        ]);
        return back()->with('day_add', 'Successfully Done!  ');

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
        $days = Day::find($id);
		return view('admin.schedule.day.edit',compact('days'));
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
        $request->validate([
            'name'=>'required',
            
            'priority'=>'required',
        ]);
		
		$day=Day::find($id);
		$day->name = $request->name;
		$day->priority = $request->priority;
		$day->save();
		return back()->with('day_edit','Day successfully ediited');
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
	public function delete($id)
    {    
        $day = Day::find($id);
		$day->delete();
		return back()->with('day_delete','Successfully deleted');
    }
}
