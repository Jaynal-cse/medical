<?php

namespace App\Http\Controllers;

use App\FrontendDoctorSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendDoctorScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor_schedules = FrontendDoctorSchedule::orderBy('created_at','desc')->get();
        return view('admin.frontendDoctorSchedule.view',compact('doctor_schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.frontendDoctorSchedule.create');
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
            'heading' => 'required',
        ]);
        FrontendDoctorSchedule::insert([
            'heading'     => $request->heading,
            'sub_heading' => $request->sub_heading,
            'created_at'  => Carbon::now(),
        ]);
        
        return redirect('frontend_doctor_schedule')->with('added_success',' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FrontendDoctorSchedule  $frontendDoctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(FrontendDoctorSchedule $frontendDoctorSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FrontendDoctorSchedule  $frontendDoctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontendDoctorSchedule $frontendDoctorSchedule)
    {
        return view('admin.frontendDoctorSchedule.edit',compact('frontendDoctorSchedule'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FrontendDoctorSchedule  $frontendDoctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontendDoctorSchedule $frontendDoctorSchedule)
    {
        $request->validate([
            'heading' => 'required',
        ]);

        $request->all();
        $frontendDoctorSchedule->heading = $request->heading;
        $frontendDoctorSchedule->sub_heading = $request->sub_heading;
        $frontendDoctorSchedule->save();

        return redirect('frontend_doctor_schedule')->with('edit_success',' ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FrontendDoctorSchedule  $frontendDoctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontendDoctorSchedule $frontendDoctorSchedule)
    {
        //
    }

    public function delete($id)
    {
        FrontendDoctorSchedule::find($id)->delete();
        return redirect('frontend_doctor_schedule')->with('delete_success',' ');
    }

    public function ChangeStatus($id)
    {
       $doctor_schedule =  FrontendDoctorSchedule::find($id);
       if($doctor_schedule->status == 0){
        FrontendDoctorSchedule::find($id)->update([
            'status' => 1,
        ]);
       } 

       FrontendDoctorSchedule::where('id', '!=', $id)->update([
            'status' => 0,
       ]);

       return back();
    }
}
