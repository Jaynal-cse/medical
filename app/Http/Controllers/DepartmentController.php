<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('admin.departments.all_department',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.add_department');
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
            'department_name'=>'required|unique:departments',
            'description'=>'required|min:4',
            'status'=>'required',
        ]);
        Department::insert([
            'department_name'=>$request->department_name,
            'description'=>$request->description,
            'status'=>$request->status,
        ]);
        return redirect('department')->with('department_success','Department added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('admin.departments.edit_department',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'department_name'=>'required|unique:departments',
            'description'=>'required|min:4',
            'status'=>'required',
        ]);
        $request->all();
        $department->department_name = $request->department_name;
        $department->description = $request->description;
        $department->status = $request->status;
        $department->save();
        return redirect('department')->with('edit_success',' ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Department $department)
    // {
    //     $department->delete();
    //     return back()->with('department_delete_success',' ');
    // }

    public function department_delete($id){
        Department::find($id)->delete();
        return back()->with('department_delete_success',' ');
    }

    public function inactive($id){
        Department::find($id)->update(['status'=>0]);
        return Redirect()->back();
    }

    public function active($id){
        Department::find($id)->update(['status'=>1]);
        return Redirect()->back();
    }
}
