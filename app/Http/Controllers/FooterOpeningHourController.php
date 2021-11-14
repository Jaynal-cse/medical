<?php

namespace App\Http\Controllers;

use App\FooterOpeningHour;
use Illuminate\Http\Request;

class FooterOpeningHourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer_opening_hours = FooterOpeningHour::all();
        return view('admin.footerOpeningHours.view',compact('footer_opening_hours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.footerOpeningHours.create');
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
            'day' => 'required|unique:footer_opening_hours',
            'time' => 'required',
        ]);

        FooterOpeningHour::insert([
            'day' => $request->day,
            'time' => $request->time,
            'status' => 1,
        ]);

        return redirect('footer_opening_hours')->with('added_success',' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FooterOpeningHour  $footerOpeningHour
     * @return \Illuminate\Http\Response
     */
    public function show(FooterOpeningHour $footerOpeningHour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FooterOpeningHour  $footerOpeningHour
     * @return \Illuminate\Http\Response
     */
    public function edit(FooterOpeningHour $footerOpeningHour)
    {
        return view('admin.footerOpeningHours.edit',compact('footerOpeningHour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FooterOpeningHour  $footerOpeningHour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FooterOpeningHour $footerOpeningHour)
    {
        $request->validate([
            'day' => 'required|unique:footer_opening_hours',
            'time' => 'required',
        ]);

        $request->all();
        $footerOpeningHour->day = $request->day;
        $footerOpeningHour->time = $request->time;
        $footerOpeningHour->save();

        return redirect('footer_opening_hours')->with('edit_success',' ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FooterOpeningHour  $footerOpeningHour
     * @return \Illuminate\Http\Response
     */
    public function destroy(FooterOpeningHour $footerOpeningHour)
    {
        //
    }

    public function footer_opening_hours_delete($id)
    {
        FooterOpeningHour::find($id)->delete();
        return redirect('footer_opening_hours')->with('delete_success',' ');
    }

    public function inactive($id){
        FooterOpeningHour::find($id)->update(['status'=>0]);
        return Redirect()->back();
    }

    public function active($id){
        FooterOpeningHour::find($id)->update(['status'=>1]);
        return Redirect()->back();
    }
}
