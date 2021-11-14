<?php

namespace App\Http\Controllers;

use App\FooterOpeningHour;
use App\Banner;
use App\Doctor;
use App\Education;
use App\Department;
use App\Designation;
use App\Experiance;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.doctor.all_doctor',compact('doctors'));
    }

   public function doctor_register()
   {
       return view('auth.doctor-register');
   }
   public function doctor_dashboard()
   {
       return view('auth.doctor-register');
   }

public function education(Request $request)
    { 		
		
		Education::insert([
		    'department_id'=>$request->department_id,
            'doctor_id'=>$request->doctor_id,
            'edu_year'=>$request->edu_year,
            'edu_degree'=>$request->edu_degree,
            'edu_institute'=>$request->edu_institute,
		    'higher_degree' =>$request->higher_degree,
			'professional_degree' => $request->professional_degree,
            'created_at' =>now(),
        ]);
        return back()->with('education', 'Doctor data Save Successfully');

    }
    public function experience_post(Request $request)
    {
        Experiance::insert([
            'doctor_id'=>$request->doctor_id,
            'department_id'=>$request->department_id,
            'exp_year'=>$request->exp_year,
            'exp_department'=>$request->exp_department,
            'exp_position'=>$request->exp_position,
            'exp_hospital'=>$request->exp_hospital,
            'created_at' =>now(),
        ]);
         return back()->with('education', 'Doctor data Save Successfully');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $designation = Designation::orderBy('created_at', 'desc')->get();
       $department = Department::orderBy('created_at', 'desc')->get();
       $doctor = Doctor::orderBy('created_at', 'desc')->get();
        return view('admin.doctor.add_doctor', compact('designation','department','doctor'));
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
            'doctor_name'=>'required',
            'email'=>'required|regex:/(.+)@(.+)\.(.+)/i',
            'designation'=>'required',
			'priority' => 'required |unique:doctors',
            'department'=>'required',
            'phone_no'=>'required|regex:/(01)[0-9]{9}/',
            'status'=>'required',
        ]);


        $doctor_slug = Str::slug($request->doctor_name.'-'.Carbon::now()->timestamp);

        $form_db = Doctor::create([
            'doctor_name'=>$request->doctor_name,
            'email'=>$request->email,
            'designation'=>$request->designation,
            'department'=>$request->department,
			'priority' =>$request->priority,
            'address'=>$request->address,
            'phone_no'=>$request->phone_no,
            'short_biography'=>$request->short_biography,
            'specialist'=>$request->specialist,

            // 'exp_year'=>$request->exp_year,
            // 'exp_department'=>$request->exp_department,
            // 'exp_position'=>$request->exp_position,
            // 'exp_hospital'=>$request->exp_hospital,
            'sex'=>$request->sex,
            'blood_group'=>$request->blood_group,
            'date_of_birth'=>$request->date_of_birth,
            'doctor_slug'=>$doctor_slug,
            'created_at'=> now(),
        ]);

        $uploaded_doctor_photo = $request->file('image');
        $new_doctor_photo_name = $form_db->id.'.'.$uploaded_doctor_photo->extension();
        $new_doctor_photo_location = base_path('public/uploads/doctor/'.$new_doctor_photo_name);
        Image::make($uploaded_doctor_photo)->resize(230,230)->save($new_doctor_photo_location);

        Doctor::find($form_db->id)->update([
            'image'=> $new_doctor_photo_name,
        ]);
        return back()->with('added_success', "Doctor's profile added successfully ");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $weekDays = ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'];   // fixed 7 day name
      $weakName = substr(Carbon::parse(now())->format('l'), 0, 3);   // current day name
//dd(Carbon::parse(now())->addHour(6)->format('Y-m-d H:i:s'));
      $is_opened = 'Closed';
      $is_day_index = 9999;
      $openingOurs = FooterOpeningHour::get();

      foreach($openingOurs as $key => $openingOur) {
          $day = $openingOur->day;
          $days = explode('-', $day); // make an array of day
          $day1 = trim($days[0], ' ');
          try {
              $day2 = trim($days[1], ' ');
          } catch (\Exception $ex) {
              $day2 = $day1;
          }



          $start_in = array_search ($day1, $weekDays);
          $end_in = array_search ($day2, $weekDays);

          if ($start_in > $end_in) {
              $temp = $start_in;
              $start_in = $end_in;
              $end_in = $temp;
          }
          for($i = $start_in; $i<=$end_in; $i++)
          {
              if($weekDays[$i] == $weakName) {
                  $is_day_index = $key;

                  $time = $openingOur->time;
                  $times = explode('-', $time);

                  $time1 = str_replace(' ', '', $times[0]);
                  $time2 = str_replace(' ', '', $times[1]);

                  $start_times = explode(':', $time1);
                  $end_times = explode(':', $time2);

                  $start_hour = $start_times[0];
                  $end_hour = $end_times[0];
                  $start_min = $start_times[1];
                  $end_min = $end_times[1];

                  $now_hour = Carbon::parse(now())->addHour(6)->format('H');
                  $now_min = Carbon::parse(now())->format('i');

                  $start = $start_hour . ':' . $start_min;
                  $end = $end_hour . ':' . $end_min;
                  $now = $now_hour . ':' . $now_min;


                  if($now >= $start && $now <=  $end) {
                      $is_opened = 'Opened';
                  }
              }
          }
      }
     
       $doctor_details = Doctor::where('id',$id)->first();
	   $educations = Education::where('doctor_id',$id)->get();
	 
        //return view('frontend.single_doctor',compact('doctor_details', 'is_opened', 'is_day_index'));
		return view('admin.doctor.view_doctor',compact('doctor_details', 'is_opened', 'is_day_index','educations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $deparments = Department::all();
		$designations = Designation::where('department_id',$doctor->department)->get();
        return view('admin.doctor.edit_doctor',compact('doctor','deparments','designations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
		    'doctor_name'=>'required',
            'department_id'=>'required',
            'designation_id'=>'required',
			'specialist'=>'required',
			'phone_no'=>'required|regex:/(01)[0-9]{9}/',
            'email'=>'required|regex:/(.+)@(.+)\.(.+)/i',            
            'address'=>'required',            
            'short_biography'=>'required',           
            'date_of_birth'=>'required',
			'priority' =>'required ',
            'sex'=>'required',
            'blood_group'=>'required',
            'status'=>'required',
        ]);

        $request->all();
        if($request->hasFile('image')){
            if($doctor->image != 'doctor_default_photo.jpg'){
                $delete_location = base_path('public/uploads/doctor/'.$doctor->image);
                unlink($delete_location);
            }

            $uploaded_doctor_photo = $request->file('image');
            $new_doctor_photo_name = $doctor->id.'.'.$uploaded_doctor_photo->extension();
            $new_doctor_photo_location = base_path('public/uploads/doctor/'.$new_doctor_photo_name);
            Image::make($uploaded_doctor_photo)->resize(300,300)->save($new_doctor_photo_location);

            $doctor->image =  $new_doctor_photo_name;
        }

        // $obj = new Doctor();
        $doctor->doctor_name = $request->doctor_name;
        $doctor->department = $request->department_id;
		$doctor->designation = $request->designation_id;
        $doctor->specialist = $request->specialist;
		$doctor->phone_no = $request->phone_no;
        $doctor->email = $request->email;
        $doctor->address = $request->address;
        $doctor->short_biography = $request->short_biography;
        $doctor->date_of_birth = $request->date_of_birth;
		$doctor->priority = $request->priority;        
        $doctor->sex = $request->sex;
        $doctor->blood_group = $request->blood_group;
        $doctor->status = $request->status;
        $doctor->update();
       
        return redirect('doctor')->with('edit_success','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Doctor $doctor)
    // {
    //     $doctor->delete();
    //     return back()->with('delete_success','Data deleted successfully');
    // }

    public function doctor_delete($id){
		//$checkIfDoctorExists = Education::where('doctor_id',10)->first();
		for($i=1;;$i++){
			$checkIfDoctorExists = Education::where('doctor_id',$id)->first();
			if($checkIfDoctorExists== null){break;}
			$checkIfDoctorExists->delete();
		}
		for($i=1;;$i++){
			$checkIfDoctorExists = Experiance::where('doctor_id',$id)->first();
			if($checkIfDoctorExists== null){break;}
			$checkIfDoctorExists->delete();
		}
		$doctor =Doctor::find($id);
		if($doctor->image){
              $delete_location = base_path('public/uploads/doctor/'.$doctor->image);
              unlink($delete_location);
            }
        $doctor->delete();
		
        return back()->with('delete_success',' ');
    }
	
	public function fetch_doctor(Request $request){
		
	     
		 $doctors =Doctor::where('department', $request->department_id)->get();
		
		 $output = '<option value="">--Select Doctor--</option>';
        foreach( $doctors as $row)
        {
         $output .= '<option value="'.$row->id.'">'.$row->doctor_name.'</option>';
        }
		echo  $output;
    
	   
	}
	
	public function activationTrigger(Request $request){
		//$request->department_id;
		$doctorstatus =Doctor::where('id',$request->department_id)->first();
		
		if($doctorstatus->status == 0)
		{
			$doctorstatus->status = 1;
			$doctorstatus->save();
			
		}elseif($doctorstatus->status ==1 )
		{   
			$doctorstatus->status = 0;
			$doctorstatus->save();
			
			
		}
		
		$doctorstatus =Doctor::where('id',$request->department_id)->first();
		
		return json_encode($doctorstatus);
	}
}
