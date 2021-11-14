<?php

namespace App\Http\Controllers;

use App\FrontendSection5DepartmentHeading;
use Illuminate\Http\Request;

class FrontendSection5DepartmentHeadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frontendDepartmentHeadings = FrontendSection5DepartmentHeading::all();
        return view('admin.FrontendSection_5_Department.heading.view',compact('frontendDepartmentHeadings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.FrontendSection_5_Department.heading.create');
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
        FrontendSection5DepartmentHeading::insert([
            'heading'     => $request->heading,
            'sub_heading' => $request->sub_heading,
        ]);

        return redirect('frontend_department_heading')->with('added_success',' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FrontendSection5DepartmentHeading  $frontendSection5DepartmentHeading
     * @return \Illuminate\Http\Response
     */
    public function show(FrontendSection5DepartmentHeading $frontendSection5DepartmentHeading)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FrontendSection5DepartmentHeading  $frontendSection5DepartmentHeading
     * @return \Illuminate\Http\Response
     */
    public function edit($frontend_department_heading)
    {
        //
    }

    public function heading_edit($id)
    {
        $find_id = FrontendSection5DepartmentHeading::find($id);
        return view('admin.FrontendSection_5_Department.heading.edit', compact('find_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FrontendSection5DepartmentHeading  $frontendSection5DepartmentHeading
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontendSection5DepartmentHeading $frontendSection5DepartmentHeading)
    {
        //
    }

    public function heading_update(Request $request)
    {
        $request->validate([
            'heading' => 'required',
        ]);

        $request->all();
        $get_id = FrontendSection5DepartmentHeading::where('id',$request->id)->first();
        $get_id->heading = $request->heading;
        $get_id->sub_heading = $request->sub_heading;
        $get_id->save();

        return redirect('frontend_department_heading')->with('edit_success',' ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FrontendSection5DepartmentHeading  $frontendSection5DepartmentHeading
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontendSection5DepartmentHeading $frontendSection5DepartmentHeading)
    {
        //
    }

    public function heading_delete($id)
    {
        FrontendSection5DepartmentHeading::find($id)->delete();
        return redirect('frontend_department_heading')->with('delete_success',' ');

    }

    public function ChangeStatus($id)
    {
       $department_heading =  FrontendSection5DepartmentHeading::find($id);
       if($department_heading->status == 0){
        FrontendSection5DepartmentHeading::find($id)->update([
            'status' => 1,
        ]);
       } 
    //    elseif($department_heading->status == 1)
    //    {
    //     FrontendSection5DepartmentHeading::find($id)->update([
    //         'status' => 0,
    //     ]);
    //    }

       FrontendSection5DepartmentHeading::where('id', '!=', $id)->update([
            'status' => 0,
       ]);

       return back();
    }
}
