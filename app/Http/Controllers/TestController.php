<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use App\Department;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $appointment = Test::all();
        return view('admin.test.test',compact('appointment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $departments = Department::all();
        return view('admin.test.add-test',compact('departments'));
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
            'test_name' => 'required',
            'department_id'=> 'required',
            'description'=>'required',
            'fee'=>'required',
            'priority'=>'required',
            'room_no'=>'required',
            'status'=>'required',
        ]);
        
       $tests = new Test();
       $tests->name = $request->test_name;
       $tests->department= $request->department_id;
       $tests->description = $request->description;
       $tests->fee = $request->fee;
       $tests->priority = $request->priority;
       $tests->room_no = $request->room_no;
       $tests->status = $request->status;
       $tests->save();
       return redirect()->route('test.index')->with('test-add','Test Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {    
        $departments = Department::all();
        return view('admin.test.test-edit')->with('test',$test)
                                           ->with('departments',$departments);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        $request->validate([
            'test_name' => 'required',
            'department_id'=> 'required',
            'description'=>'required',
            'fee'=>'required',
            'priority'=>'required',
            'room_no'=>'required',
            'status'=>'required',
        ]);
        
     
       $test->name = $request->test_name;
       $test->department= $request->department_id;
       $test->description = $request->description;
       $test->fee = $request->fee;
       $test->priority = $request->priority;
       $test->room_no = $request->room_no;
       $test->status = $request->status;
       $test->save();
       return redirect()->route('test.index')->with('test-update','Test Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
    public function delete($id)
    {   $test = Test::find($id);
        $test->delete();
        return redirect()->route('test.index')->with('test-delete','Test Successfully Deleted');
    }
}
