<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $patients = Patient::all();
       return view('admin.patient.all_patient',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.patient.add_patient');
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
            'patient_id'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|regex:/(.+)@(.+)\.(.+)/i',
            'phone_no'=>'required|regex:/(01)[0-9]{9}/',
            'mobile_no'=>'required|regex:/(01)[0-9]{9}/',
            'blood_group'=>'required',
            'sex'=>'required',
            'date_of_birth'=>'required',
            'address'=>'required',
            'status'=>'required',
        ]);

        $patient_slug = Str::slug($request->patient_name.'-'.Carbon::now()->timestamp);
        $return_form_db = Patient::create([
            'patient_id'=>$request->patient_id,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'     =>$request->email,
            'phone_no'  =>$request->phone_no,
            'mobile_no'  =>$request->mobile_no,
            'blood_group'=>$request->blood_group,
            'sex'=>$request->sex,
            'date_of_birth'=>$request->date_of_birth,
            'address'=>$request->address,
            'status'=>$request->status,
            'patient_slug'=>$patient_slug,
            'created_at'=>Carbon::now(),
        ]);

        $uploaded_patient_photo = $request->file('image');
        $new_patient_photo_name = $return_form_db->id.'.'.$uploaded_patient_photo->extension();
        $new_patient_photo_location = base_path('public/uploads/patient/'.$new_patient_photo_name);
        Image::make($uploaded_patient_photo)->resize(300,300)->save($new_patient_photo_location);
        Patient::find($return_form_db->id)->update([
            'image'=>$new_patient_photo_name,
        ]);

        return redirect('patient')->with('added_success',' ');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $patient_details = Patient::where('patient_slug',$slug)->first();
        return view('admin.patient.view_patient',compact('patient_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('admin.patient.edit_patient',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {

        $request->validate([
            'patient_id'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|regex:/(.+)@(.+)\.(.+)/i',
            'phone_no'=>'required|regex:/(01)[0-9]{9}/',
            'mobile_no'=>'required|regex:/(01)[0-9]{9}/',
            'blood_group'=>'required',
            'sex'=>'required',
            'date_of_birth'=>'required',
            'address'=>'required',
            'status'=>'required',
        ]);
        

        $request->all();
        if($request->hasFile('image')){
            if($patient->image != 'patient_default_photo.jpg'){
                $delete_location = base_path('public/uploads/patient/'.$patient->image);
                unlink($delete_location);
            }

            $uploaded_patient_photo = $request->file('image');
            $new_patient_photo_name = $patient->id.'.'.$uploaded_patient_photo->extension();
            $new_patient_photo_location = base_path('public/uploads/patient/'.$new_patient_photo_name);
            Image::make($uploaded_patient_photo)->resize(300,300)->save($new_patient_photo_location);

            $patient->image =  $new_patient_photo_name;
        }

        $patient->patient_id = $request->patient_id;
        $patient->first_name = $request->first_name;
        $patient->last_name = $request->last_name;
        $patient->email = $request->email;
        $patient->phone_no = $request->phone_no;
        $patient->mobile_no = $request->mobile_no;
        $patient->blood_group = $request->blood_group;
        $patient->sex = $request->sex;
        $patient->date_of_birth = $request->date_of_birth;
        $patient->address = $request->address;
        $patient->status = $request->status;

        $patient->save();
        return redirect('patient');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Patient $patient)
    // {
    //     $patient->delete();
    //     return back();
    // }

    public function patient_delete($id){
        Patient::find($id)->delete();
        return back()->with('delete_success',' ');
    }
}
