<?php

namespace App\Http\Controllers;
use Auth;
use App\Birth;
use Illuminate\Http\Request;

class BirthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $birth = Birth::orderBy('id', 'desc')->get();
        return view('admin.birth.index',compact('birth'))->with('sl', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $birth = Birth::orderBy('id', 'desc')->get();
        return view('admin.birth.add_birth',compact('birth'))->with('sl', 1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($request->all());
        // die();
        $request->validate([
            'new_born_id'=>'required|unique:births',
            'name'=>'required',
            'gender'=>'required',
            'dateofbirth'=>'required',
            'timeofbirth'=>'required',
            'mothers_id'=>'required|unique:births',
            'mother_name'=>'required',
            'mother_nationality'=>'required',
            'mother_religion'=>'required',
            'father_name'=>'required',
            'father_nationality'=>'required',
            'father_religion'=>'required',
            'present_address'=>'required',
            'permanent_address'=>'required',

        ],[
          'new_born_id.required' =>'The Born Id field is unique!',
          'mothers_id.required' =>'The Mothers Id field is unique!',
        ]);

         $return_form_db = Birth::create([
            'new_born_id'=>$request->new_born_id,
            'name'=>$request->name,
            'gender'=>$request->gender,
            'dateofbirth'=>$request->dateofbirth,
            'timeofbirth'=>$request->timeofbirth,

            'mothers_id'=>$request->mothers_id,
            'mother_name'=>$request->mother_name,
            'mother_nationality'=>$request->mother_nationality,
            'mother_religion'=>$request->mother_religion,

            'father_name'=>$request->father_name,
            'father_nationality'=>$request->father_nationality,
            'father_religion'=>$request->father_religion,

            'present_address'=>$request->present_address,
            'permanent_address'=>$request->permanent_address,

            'added_by'=>Auth::id(),
            'created_at'=>now(),
         ]);

         return back()->with('success', 'Please Check in Birth list');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Birth  $birth
     * @return \Illuminate\Http\Response
     */
    public function show(Birth $birth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Birth  $birth
     * @return \Illuminate\Http\Response
     */
    public function edit(Birth $birth)

    {
        $birth = Birth::orderBy('id', 'desc')->get();
        return view('admin.birth.index',compact('birth'))->with('sl', 1);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Birth  $birth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Birth $birth)
    {
        $request->all();
        $birth->new_born_id = $request->new_born_id;
        $birth->name = $request->name;
        $birth->gender = $request->gender;
        $birth->dateofbirth = $request->dateofbirth;
        $birth->timeofbirth = $request->timeofbirth;
        $birth->mothers_id = $request->mothers_id;
        $birth->mother_name = $request->mother_name;
        $birth->mother_nationality = $request->mother_nationality;
        $birth->mother_religion = $request->mother_religion;
        $birth->father_name = $request->father_name;
        $birth->father_nationality = $request->father_nationality;
        $birth->father_religion = $request->father_religion;
        $birth->present_address = $request->present_address;
        $birth->permanent_address = $request->permanent_address;

        $birth->save();
        return back()->with('Update',' You should check in on some of those fields below.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Birth  $birth
     * @return \Illuminate\Http\Response
     */

    public function birth_delete($id){
        Birth::find($id)->delete();
        return back()->with('Delete',' You should check in on some of those fields below.');
    }


    public function destroy(Birth $birth)
    {
        //
    }
}
