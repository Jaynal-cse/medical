<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use App\Schedule;
use App\Department;
use App\Doctor;
use Carbon\Carbon;
use App\Day;

class ScheduleController extends Controller
{
    public function schedule()
    {   
	    
        $schedule = Schedule::orderBy('start_time', 'desc')->get();
    	return view('admin.schedule.schedule',compact('schedule'));
    }
	
	public function schedule_dependent_department($id){
		$schedule = Schedule::where('department_id',$id)->orderBy('start_time', 'desc')->get();
		return view('admin.schedule.schedule',compact('schedule'));
		
	}
	public function schedule_dependent_doctor($id){
		$schedule = Schedule::where('doctor_id',$id)->orderBy('start_time', 'desc')->get();
		return view('admin.schedule.schedule',compact('schedule'));
		
	}
	public function schedule_dependent_day($id){
		$schedule = Schedule::where('day',$id)->orderBy('start_time', 'desc')->get();
		return view('admin.schedule.schedule',compact('schedule'));
		
	}

    public function addSchedule()
    {   $days = Day::orderBy('priority','asc')->get();
        $department = Department::all();
        $doctors = Doctor::all(); 
    	return view('admin.schedule.add-schedule',compact('department', 'doctors','days'));
    }


    public function schedulePost(Request $request)
    {    
        $request->validate([
            'department_id'=>'required',
            'doctor_id'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
            'day'=>'required',
			'room_no' => 'required',
            'status'=>'required',
            
        ]);
     
        Schedule::create([
            'department_id'=>$request->department_id,
            'doctor_id'=>$request->doctor_id,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'day'=>$request->day,
			'room_no' => $request->room_no,
			'priority' => 1,
            
            'status'=>$request->status,
            'created_at'=>Carbon::now(),
        ]);
        return redirect('schedule')->with('schedule_add', 'schedule Added Successfully!');
    }

     public function scheduleView($schedule_id){
        $schedule_views = Schedule::find($schedule_id);
        return view('admin.schedule.schedule-view', compact('schedule_views'));
    }

    public function scheduleEdit($schedule_id){
        $department = Department::all();
       // $doctors = Doctor::all(); 
        $schedule_edits = Schedule::find($schedule_id);
		$days = Day::orderBy('priority','asc')->get();
		$dept_id=Schedule::where('id',$schedule_id)->first();
		$doctors = Doctor::where('department',$dept_id->department_id)->orderBy('priority','asc')->get(); 
		
        return view('admin.schedule.schedule-edit', compact('schedule_edits', 'department', 'doctors','days'));
    }

    public function scheduleEditPost(Request $request){
		
       $request->validate([
            'department_id'=>'required',
            'doctor_id'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
            'day'=>'required',
			'room_no'=>'required',
			
            'status'=>'required',
        ]);
      Schedule::find($request->schedule_id)->update([
        'department_id'=>$request->department_id,
        'doctor_id'=>$request->doctor_id,
        'start_time'=>$request->start_time,
        'end_time'=>$request->end_time,
        'day'=>$request->day,
		'room_no'=>$request->room_no,
        
		
        'status'=>$request->status,
      ]);
      return redirect('schedule')->with('schedule_update', 'schedule Updated Successfully!');  
    }

    public function scheduleDel($schedule_id){
       Schedule::where('id',$schedule_id)->delete();
        return back()->with('schedule_delete', 'Schedule Item Deleted Successfully!');
    }
    public function fetch_doctor(Request $request){
		
		$doctors =Doctor::where('department', $request->department_id)->where('status',1)->get();
		
		 $output = '<option value="">--Select Doctor--</option>';
        foreach( $doctors as $row)
        {
         $output .= '<option value="'.$row->id.'">'.$row->doctor_name.'</option>';
        }
		echo  $output;
	}
	
	
	public function activationTrigger(Request $request){
		//$request->department_id;
		$doctorstatus =Schedule::where('id',$request->department_id)->first();
		
		if($doctorstatus->status == 0)
		{
			$doctorstatus->status = 1;
			$doctorstatus->save();
			
		}elseif($doctorstatus->status ==1 )
		{   
			$doctorstatus->status = 0;
			$doctorstatus->save();
			
			
		}
		
		$doctorstatus =Schedule::where('id',$request->department_id)->first();
		
		return json_encode($doctorstatus);
	}
	
	public function doctor_fetch(Request $request){
		
	     
		 $doctors =Doctor::where('department', $request->department_id)->get();
		
		 $output = '<option value="">--Select Doctor--</option>';
        foreach( $doctors as $row)
        {
         $output .= '<option value="'.$row->id.'">'.$row->doctor_name.'</option>';
        }
		echo  $output;
    
	   
	}
	
	public function fetch_schedule(Request $request){
		
	     
		 
		 $doctors =Schedule::where('doctor_id', $request->doctor_id)->where('status',1)->orderBy('day','asc')->get();
		
	
		 $output = '<option value="">--Select Schedule--</option>';
        foreach( $doctors as $row)
        { 
		  if($row->day == 1){$day="Friday";}
		  elseif($row->day == 2){$day="Saturday";}
		  elseif($row->day == 3){$day="Sunday";}
		  elseif($row->day == 4){$day="Monday";}
		  elseif($row->day == 5){$day="Tuesday";}
	      elseif($row->day == 6){$day="Wednesday";}
		  elseif($row->day == 7){$day="Thursday";}
		  $d=strtotime('next '.$day);
         $output .= '<option value="'.date('D M d,Y',$d).'"> '.date('D M d,Y',$d).'( '.date("h:i A",strtotime($row->start_time)).' - '.date("h:i A",strtotime($row->end_time)).' )'.'</option>';
        }
		echo  $output;
    
	   
	}

}
