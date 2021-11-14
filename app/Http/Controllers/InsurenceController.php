<?php

namespace App\Http\Controllers;

use App\Approval;
use App\Disease;
use App\Insurance;
use Illuminate\Http\Request;

class InsurenceController extends Controller
{
    public function disease(){
       
        
        return view('admin.disease.add_disease');
    }
    public function diseasepost(Request $request){
        $request->validate([
            'disease_name'=>'required|unique:diseases',
            'disease_charge'=> 'required',
        ]);
        Disease::insert([
            'disease_name'=>$request->disease_name,
            'disease_charge'=>$request->disease_charge,
            'created_at' =>now(),
        ]);
        return back()->with('disease', 'Disease Save Successfully');
    }
    
    public function insurence(){
        $costs = Disease::sum('disease_charge');
      
        return view('admin.insurence.add_insurence', compact('costs'));
    }
    public function insurencepost(Request $request){
        Insurance::insert([
            'insurance_name'=>$request->insurance_name,
            'service_tax'=>$request->service_tax,
            'discount'=>$request->discount,
            'remark'=>$request->remark,
            'insurance_no'=>$request->insurance_no,
            'insurance_code'=>$request->insurance_code,
            'disease_charge'=>$request->disease_charge,
            'hospital_rate'=>$request->hospital_rate,
            'insurance_rate'=>$request->insurance_rate,
            'status'=>$request->status,
            'created_at' =>now(),
        ]);
        return back();
    }
    public function insurencelist(){
        $insurance_list = Insurance::orderBy('created_at','desc')->get();
        return view('admin.insurence.insurance_list', compact('insurance_list'));
    }
    public function limitapproval(){
        $insurance_approval = Insurance::all();
        return view('admin.insurence.limit_approval', compact('insurance_approval'));
    }
    public function limitapprovalpost(Request $request){
        $request->validate([
            'patient_id'=>'required',
            'insurance_name'=> 'required',
            'status'=> 'required',
        ]);
            $limit_approval = Approval::insertGetId($request->except('_token') + [
                'created_at'=>now(),
            ]);
            return back()->with('approve_success','Successfully Done! Payment added');
    }
    public function limitapprovallist(){
        $limit_approval = Approval::orderBy('created_at','desc')->get();
        return view('admin.insurence.limit_approval_list', compact('limit_approval'));
    }
}
