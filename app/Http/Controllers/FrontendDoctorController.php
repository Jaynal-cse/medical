<?php

namespace App\Http\Controllers;

use App\FrontendDoctor;
use App\FrontendSection5Department;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FrontendDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor = FrontendDoctor::all();
        return view('admin.FrontendSection_5_Department.doctor.index',compact('doctor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = FrontendSection5Department::orderBy('created_at','desc')->get();
        return view('admin.FrontendSection_5_Department.doctor.create',compact('service'));
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
            'service_name_id'   => 'required',
            'doctor_name'       => 'required',
        ]);
        FrontendDoctor::create([
            'service_name_id'   => $request->service_name_id,
            'doctor_name'       => $request->doctor_name,
            'created_at'        => now(),
        ]);

        return redirect('frontend_doctor')->with('added_success', ' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FrontendDoctor  $frontendDoctor
     * @return \Illuminate\Http\Response
     */
    public function show(FrontendDoctor $frontendDoctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FrontendDoctor  $frontendDoctor
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontendDoctor $frontendDoctor)
    {
        $service = FrontendSection5Department::orderBy('created_at','desc')->get();
        return view('admin.FrontendSection_5_Department.doctor.edit',compact('frontendDoctor','service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FrontendDoctor  $frontendDoctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontendDoctor $frontendDoctor)
    {
        $request->validate([
            'service_name_id'   => 'required',
            'doctor_name'       => 'required',
        ]);

        $request->all();
        $frontendDoctor->service_name_id = $request->service_name_id;
        $frontendDoctor->doctor_name = $request->doctor_name;
        $frontendDoctor->save();
        return redirect('frontend_doctor')->with('edit_success', ' ');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FrontendDoctor  $frontendDoctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontendDoctor $frontendDoctor)
    {
        //
    }

    public function delete($id)
    {
        FrontendDoctor::find($id)->delete();
        return redirect('frontend_doctor')->with('delete_success', ' ');
    }

    public function ChangeStatus($id)
    {
        $change_status = FrontendDoctor::find($id);
        if ($change_status-> status == 0) {
            FrontendDoctor::find($id)->update([
                'status' => 1,
            ]);
        }
        else
        {
            FrontendDoctor::find($id)->update([
                'status' => 0,
            ]);   
        }
        return back();
    }
}
