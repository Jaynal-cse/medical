<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use App\Doctor;
use App\Department;
use App\Appointment;
use App\Onlineappointment;
use Carbon\Carbon;
use App\Patient;
use App\Schedule;
use Twilio\Rest\Client;

class AppointmentController extends Controller
{
    public function appointment()
    {
    	$appointment = Appointment::orderBy('id', 'desc')->get();
		$doctors_department = Doctor::select('id','department')->get();
		//dd($doctors_department);
		$departments = Department::select('id','department_name')->get();
    	return view('admin.appointment.appointment', compact('appointment','doctors_department','departments'));
    }

    public function Addappointment()
    {   //$last_id =Appointment::max('id')+1;
	    $date = Carbon::now()->format('Y-m-d');
		$appointment_today =Appointment::where('created_at','LIKE',$date.'%')->count();
	    $today=Carbon::now()->format('Ymd');//$today is 8 digits
		$today=$today*1000000;//Make $today 14 digits 
		$CurrentId=$today+$appointment_today+1;
		$rand_number = rand(1000,9999);
		$CurrentFinalIdWillBe=($CurrentId*10000)+$rand_number;
		//dd($CurrentFinalIdWillBe);
		
		//dd($CurrentIdWillBe);
     	$depts = Department::all();
        $doctor = Doctor::all();
    	return view('admin.appointment.add-appointment', compact('depts', 'doctor','CurrentFinalIdWillBe'));
    }

    public function appointmentPost(Request $request)
    {
        $request->validate([
            'appointment_id'=>'required',
            'phone_no'=>'required',
            'name'=>'required',
			'age' =>'required',
			'blood_group' => 'required',
			'doctor_id' => 'required',
            'appointment_date'=>'required',
			'problem' =>'required',
            
            
        ]);
		$date = Carbon::now()->format('Y-m-d');
        $patient_today = Patient::where('created_at','LIKE',$date.'%')->count();
		$today=Carbon::now()->format('Ymd');
		$patient_id = ($today*1000000)+$patient_today+1;
		
		$patientExists=Patient::where('phone_no',$request->phone_no)->where('name',$request->name)->first();
		
		if(isset($patientExists)){
			
			$patientExists->age=$request->age;
			$patientExists->blood_group=$request->blood_group;
			$patientExists->save();
		}else{
        Patient::insert([
        	
            'patient_id' =>$patient_id,
			'phone_no' => $request->phone_no,
            'name' => $request->name,
			'age' => $request->age,
			'blood_group' => $request->blood_group,
            'created_at'=>Carbon::now(),
        ]);
		}
		$totalPatientWithDoctorAtThisDate =Appointment::where('doctor_id',$request->doctor_id)->where('appointment_date',$request->appointment_date)->count();
		$patient_serial = $totalPatientWithDoctorAtThisDate+1;
        Appointment::insert([
        	
            'appointment_id'=>$request->appointment_id,
			'patient_id' =>$patient_id,
			'serial' =>$patient_serial,
			'phone_no' => $request->phone_no,
            'doctor_id'=>$request->doctor_id,
            'appointment_date'=>$request->appointment_date,
            'problem'=>$request->problem,
			'status' =>1,
            'type'=>'offline',
            'created_at'=>Carbon::now(),
        ]);
       return redirect('appointment')->with('appointment_add', 'Appointment Item Added Successfully!');
    }

     public function appView($appointment_id){
        $app_view = Appointment::find($appointment_id);
        return view('admin.appointment.app-view', compact('app_view'));
    }

    public function appEdit($appointment_id){
        $app_edit = Appointment::find($appointment_id);
        $depts = Department::all();
        $doctor = Doctor::all();
        return view('admin.appointment.appointment-edit', compact('app_edit','depts', 'doctor'));
    }

    public function appEditPost(Request $request){

        $request->validate([
            'patient_id'=>'required',
            'department'=>'required',
            'doctor_name'=>'required',
            'appointment_date'=>'required',
            'serial'=>'required',
            'problem'=>'required',
        ]);
      
     Appointment::find($request->appointment_id)->update([
        'patient_id'=>$request->patient_id,
        'department'=>$request->department,
        'doctor_name'=>$request->doctor_name,
        'appointment_date'=>$request->appointment_date,
        'serial'=>$request->serial,
        'problem'=>$request->problem,
        'status'=>$request->status,
      ]);
     return redirect('appointment')->with('appointment_update', 'Appointment Item Updated Successfully!');
    }


    public function appointmentDel($appointment_id){
       Appointment::where('id',$appointment_id)->delete();
        return back()->with('appointment_delete', 'Appointment Item Deleted Successfully!');
    }

    public function online_appointment()
    {
        $appointment = Appointment::where('type','online')->get();
        return view('admin.appointment.appointment', compact('appointment'));
    }

    public function view($onlineappointment_id)
    {
        $view = Onlineappointment::find($onlineappointment_id);
        return view('admin.appointment.online_appointment_view', compact('view'));
    }

    public function confirm($onlineappointment_id)
    {
       $app = Onlineappointment::find($onlineappointment_id);
            if ($app->status == 0) {
                Onlineappointment::find($onlineappointment_id)->update([
                    'status' => 1,
                ]);
        } 
      return back()->with('confirm', 'One Online Appointment Confirmed Successfully !');
    }
    public function online_confirm($onlineappointment_id)
    {
       $app = Onlineappointment::find($onlineappointment_id);
            if ($app->status == 2) {
                Onlineappointment::find($onlineappointment_id)->update([
                    'status' => 1,
                ]);
        } 
      return back()->with('confirm', 'One Canceled Appointment Confirmed Successfully !');
    }
    public function cancel($onlineappointment_id)
    {
       $app = Onlineappointment::find($onlineappointment_id);
            if ($app->status == 0) {
                Onlineappointment::find($onlineappointment_id)->update([
                    'status' => 2,
                ]);
        }
      return back()->with('cancel', 'One Online Appointment Canceled Successfully !');
    }
    public function delete($onlineappointment_id){
       Onlineappointment::where('id',$onlineappointment_id)->delete();
        return back()->with('delete', 'One Online Appointment Deleted Successfully !');
    }
    public function canceled()
    {
        $cancel = Onlineappointment::where('status', '2')->get();
        return view('admin.appointment.online_appointment_cancel', compact('cancel'));
    }


 public function pendings()
  {
    $appointment = Appointment::where('status',  0)->get();
    return view('admin.appointment.appointment', compact('appointment'));
  }


public function getMobile(Request $request){

      $search = $request->search;
    
      if($search == ''){
         $employees =Patient::orderby('phone_no','asc')
		                      ->select('id','phone_no','name','age','blood_group','created_at')
							  ->limit(5)
							  ->get();
      }else{
         $employees =Patient::orderby('phone_no','asc')
		                      ->select('id','phone_no','name','age','blood_group','created_at')
							  ->where('phone_no', 'like', '%' .$search . '%' )
							  ->limit(5)
							  ->get();
      }

      $response = array();
      foreach($employees as $employee){
		  $presentYear = Carbon::now()->format('Y');
		  $birthYear =Date('Y',strtotime($employee->created_at));
		  $ageDifference = $presentYear- $birthYear;
         $response[] = array(
		                "value"=>$employee->phone_no,
						"label"=>$employee->phone_no,
						"name" =>$employee->name,
						"age" =>$employee->age+$ageDifference,
						'blood_group' =>$employee->blood_group, 
						
						 
						
						);
      }

      return response()->json($response);
}


	public function activationTrigger(Request $request){
		
		$doctorstatus =Appointment::where('id',$request->appointment_id)->first();
		
		if($doctorstatus->status == 0)
		{
				$doctorstatus->status = 1;
				$doctorstatus->save();
				$receiverNumber ="+88".$doctorstatus->phone_no;	


                $doctor=Doctor::where('id',$doctorstatus->doctor_id)->first();
               $day =date('D',strtotime( $doctorstatus->appointment_date));
                if($day== 'Frid'){$day_id = 1;}
                elseif($day== 'Sat'){$day_id = 2;}
                elseif($day== 'Sun'){$day_id = 3;}
                elseif($day== 'Mon'){$day_id = 4;}
                elseif($day== 'Tue'){$day_id = 5;}
                elseif($day== 'Wed'){$day_id = 6;}
                elseif($day== 'Thu'){$day_id = 7;}
                $start_time=Schedule::where('doctor_id',$doctorstatus->doctor_id)->where('day',$day_id)->first();
                
				$message = "Your Appointment With Dr.".$doctor->doctor_name." on ".date('h:i A',strtotime($start_time->start_time)).",".$doctorstatus->appointment_date." at room No.".  $start_time->room_no.". Your Appointment ID =".$doctorstatus->appointment_id. ", serial = ".$doctorstatus->serial;
				/*
				
				try {
				$account_sid = getenv("TWILIO_SID");
				$auth_token = getenv("TWILIO_TOKEN");
				$twilio_number = getenv("TWILIO_FROM");
				$client = new Client($account_sid, $auth_token);
				$client->messages->create($receiverNumber, [
					'from' => $twilio_number, 
					'body' => $message]);
			  } catch (Exception $e) {
				dd("Error: ". $e->getMessage());
			   }
				*/
		}
		
		

       

  

        
		
		
		$appointmentstatus =Appointment::where('id',$request->appointment_id)->first();
		
		return json_encode($appointmentstatus);
	}




}
