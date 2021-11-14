<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prescription;
use Carbon\Carbon;

class PrescriptionController extends Controller
{
    
   public function prescription()
    {
    	$prescription = Prescription::orderBy('id', 'desc')->get();
    	return view('admin.prescription.prescription', compact('prescription'));
    }

   public function addPrescription()
   {
   	return view('admin.prescription.add-prescription');
   } 


    public function prescriptionPost(Request $request)
    {
        $request->validate([
            'department'=>'required',
            'doctor_name'=>'required',
            'patient_name'=>'required',
            'address'=>'required',
            'problem'=>'required',
            'prescription'=>'required',
        ]);

       Prescription::insert([
            'department'=>$request->department,
            'doctor_name'=>$request->doctor_name,
            'patient_name'=>$request->patient_name,
            'address'=>$request->address,
            'problem'=>$request->problem,
            'prescription'=>$request->prescription,
            'created_at'=>Carbon::now(),
        ]);
        return redirect('prescription')->with('prescription_add', 'Prescription Item Added Successfully!');
    }

    public function prescriptionView($prescription_id){
        $prescrp_view = Prescription::find($prescription_id);
        return view('admin.prescription.prescription-view', compact('prescrp_view'));
    }

    public function prescriptionEdit($prescription_id){
        $prescrp_edit = Prescription::find($prescription_id);
        return view('admin.prescription.prescription-edit', compact('prescrp_edit'));
    }

    public function prescriptionEditPost(Request $request){
      Prescription::find($request->prescription_id)->update([
        'department'=>$request->department,
        'doctor_name'=>$request->doctor_name,
        'patient_name'=>$request->patient_name,
        'address'=>$request->address,
        'problem'=>$request->problem,
        'prescription'=>$request->prescription,
      ]);
       return redirect('prescription')->with('prescription_update', 'Prescription Item Updated Successfully!');
    }

     public function prescriptionDel($prescription_id){
       Prescription::where('id',$prescription_id)->delete();
        return back()->with('prescription_delete', 'Prescription Item Deleted Successfully!');
    }
    
    public function onlyPrescription()
    {
      $prescription = Prescription::orderBy('id', 'desc')->get();
      return view('admin.prescription.onlyPrescription', compact('prescription'));
    }



}
