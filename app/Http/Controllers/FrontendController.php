<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FooterOpeningHour;
use Carbon\Carbon;
use App\Banner;
use App\Blog;
use App\Blogcomment;
use App\Patient;
use App\Schedule;
use App\Appointment;
use App\Doctor;
use App\Department;
use App\Onlineappointment;
use App\Contact;
use App\FooterHeadingItem;
use App\FrontendHeaderLogo;
use App\AboutCategoryItem;
use App\FrontendSection5Department;
use Twilio\Rest\Client;


class FrontendController extends Controller
{
 public function index()
  {


    //   $weekDays = ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'];   // fixed 7 day name
    //   $weakName = substr(Carbon::parse(now())->format('l'), 0, 3);   // current day name
    //   $is_opened = 'Closed';
    //   $is_day_index = 9999;
    //   $openingOurs = FooterOpeningHour::get();

    //   foreach($openingOurs as $key => $openingOur) {
    //       $day = $openingOur->day;
    //       $days = explode('-', $day); // make an array of day
    //       $day1 = trim($days[0], ' ');
    //       try {
    //           $day2 = trim($days[1], ' ');
    //       } catch (\Exception $ex) {
    //           $day2 = $day1;
    //       }



    //       $start_in = array_search ($day1, $weekDays);
    //       $end_in = array_search ($day2, $weekDays);

    //       if ($start_in > $end_in) {
    //           $temp = $start_in;
    //           $start_in = $end_in;
    //           $end_in = $temp;
    //       }
    //       for($i = $start_in; $i<=$end_in; $i++)
    //       {
    //           if($weekDays[$i] == $weakName) {
    //               $is_day_index = $key;

    //               $time = $openingOur->time;
    //               $times = explode('-', $time);

    //               $time1 = str_replace(' ', '', $times[0]);
    //               $time2 = str_replace(' ', '', $times[1]);

    //               $start_times = explode(':', $time1);
    //               $end_times = explode(':', $time2);

    //               $start_hour = $start_times[0];
    //               $end_hour = $end_times[0];
    //               $start_min = $start_times[1];
    //               $end_min = $end_times[1];

    //               $now_hour = Carbon::parse(now())->addHour(6)->format('H');
    //               $now_min = Carbon::parse(now())->format('i');

    //               $start = $start_hour . ':' . $start_min;
    //               $end = $end_hour . ':' . $end_min;
    //               $now = $now_hour . ':' . $now_min;


    //               if($now >= $start && $now <=  $end) {
    //                   $is_opened = 'Opened';
    //               }
    //           }
    //       }
    //   }


      $department = FrontendSection5Department::where('status', 1)->get();
      $banners = Banner::where('status', 1)->get();
      $doctor = Doctor::orderBy('created_at', 'desc')->get();
      $latest_news = Blog::orderBy('created_at', 'desc')->limit(2)->get();
      $schedule = Schedule::all();
      return view('frontend.index', compact('banners', 'doctor','department','latest_news', 'schedule'));
  }

  public function about($category_id = null)

  {

    $doctor = Doctor::all();
    $aboutItem =  AboutCategoryItem::where('about_category_id', $category_id)->first() ?? AboutCategoryItem::first();
    $banners = Banner::where('status', 1)->get();
    return view('frontend.about', compact('banners', 'doctor','aboutItem'));
  }

  public function single_doctor()
  {
      return view('frontend.single_doctor');
  }
  public function contact()

  {
      $doctor = Doctor::all();
      $banners = Banner::where('status', 1)->get();
      return view('frontend.contact', compact('banners', 'doctor'));

  }
  public function contact_post(Request $request)
  {
    Contact::insert([
      'first_name'=>$request->first_name,
      'last_name'=>$request->last_name,
      'email'=>$request->email,
      'phone'=>$request->phone,
      'message'=>$request->message,
      'created_at' =>now(),
  ]);
  return back()->with('contact','Contact added successfully');
  }
//   public function doctors()
//     {
//       $doctors = Doctor::all();
//       $department = Department::all();
//       return view('frontend.doctors', compact('doctors','department'));
//     }

   public function doctors()
  {
      $doctors = Doctor::where('status',1)->orderBy('priority','asc')->get();
	  
      $department = Department::all();
      return view('frontend.doctors', compact('doctors','department'));
  }

  public function single_dept($department_id)
  {
      $department = Department::find($department_id);
      $depts = Department::all();
      $doctors = Doctor::where('department', $department_id)->get();
      return view('frontend.single_dept', compact('department', 'depts', 'doctors'));
  }

  public function all_dept()
  {
  	  $department = Department::all();
      return view('frontend.all_dept', compact('department'));
  }
   public function deptDoctor($dept_id)
  {
      $doctors = Doctor::where('department', $dept_id)->where('status',1)->get();
      $department = Department::all();
      return view('frontend.department_wise_doctor', compact('department', 'doctors','dept_id'));
  }
//   public function deptDoctor($dept_id)
//   {
//       $doctors = Doctor::where('department', $dept_id)->get();
//       $department = Department::all();
//       return view('frontend.department_wise_doctor', compact('doctors','department'));
//   }


  public function latest_news($blog_id)
  {
    $latestnews = Blog::where('id', $blog_id)->first();

    return view('frontend.latest_news', compact('latestnews'));
  }

 public function commentpost(Request $request){
       Blogcomment::insert([
           'blog_id'=>$request->blog_id,
           'name'=>$request->name,
           'email'=>$request->email,
           'blog_comment'=>$request->blog_comment,
           'created_at' =>now(),
           ]);
           return back();
   }

public function news()
  {
    $department = Department::all();
    $all_news = Blog::orderBy('created_at', 'desc')->get();
      return view('frontend.news', compact('all_news', 'department'));
  }

  // ==============patient_dashboard==============
public function patient_dashboard()
  {
      return view('frontend.patient_dashboard');
  }

public function doctor_appointment($id){
	
	$data = Doctor::where('id',$id)->first();
	$schedules = Schedule::where('doctor_id',$id)->where('status',1)->get();
	$doctor_schedule='<option value="">--Select Schedule--</option>';
	foreach($schedules as $schedule){
		if($schedule->day == 1){$day = "Friday";}
		elseif($schedule->day == 2){$day = "Saturday";}
		elseif($schedule->day == 3){$day = "Sunday";}
		elseif($schedule->day == 4){$day = "Monday";}
		elseif($schedule->day == 5){$day = "Tuesday";}
		elseif($schedule->day == 6){$day = "Wednesday";}
		elseif($schedule->day == 7){$day = "Thursday";}
		$d=strtotime('Next '.$day);
		$doctor_id = '<input type="hidden"  id="doctor_id" name="doctor_id" value="'.$schedule->doctor_id.'"> ';
		$doctor_schedule .='<option value="'.date('D M d,Y',$d).'">'.date('D M d, Y',$d).'( '.date('h:i A',strtotime($schedule->start_time)).' - '.date('h:i A',strtotime($schedule->end_time)).' )</option>';
	}

	$data->doctor_schedule=$doctor_schedule;
	$data->doctor_id=$doctor_id;
	
	return json_encode($data);
	
}

public function onlineAppointmentStore(Request $request){
	
	
	$this->validate($request,[
            'schedule' => 'required',
            'name' => 'required',
			'phone_no'=> 'required',
            'blood_group' => 'required',
            'age' => 'required',
            'problem' => 'required',
        ]);
		
    $patient = Patient::where('phone_no',$request->phone_no)->where('name', $request->name)->first();
	$date = Carbon::now()->format('Y-m-d');
    $patient_today = Patient::where('created_at','LIKE',$date.'%')->count();
    $today=Carbon::now()->format('Ymd');
    $patient_id = ($today*1000000)+$patient_today+1;
	$id=$patient_id;
	
	//Appointment_id  autoCalculation
	$date = Carbon::now()->format('Y-m-d');
    $appointment_today =Appointment::where('created_at','LIKE',$date.'%')->count();
	$today=Carbon::now()->format('Ymd');//$today is 8 digits
    $today=$today*1000000;//Make $today 14 digits 
    $CurrentId=$today+$appointment_today+1;
	$rand_number = rand(1000,9999);
	$CurrentFinalIdWillBe=($CurrentId*10000)+$rand_number;
	
	//Serial AutoCalculation
	
	$totalPatientWithDoctorAtThisDate =Appointment::where('doctor_id',$request->doctor_id)->where('appointment_date',$request->schedule)->count();
	$patient_serial = $totalPatientWithDoctorAtThisDate+1;
	
	if( $patient == null){
		
        $patient= new Patient();		
		$patient->patient_id = $patient_id;
		$patient->name = $request->name;
		$patient->phone_no = $request->phone_no;
		$patient->blood_group = $request->blood_group;
		$patient->age = $request->age;
		$patient->save();
		
		$appointment =new Appointment();
		$appointment->appointment_id = $CurrentFinalIdWillBe;
        $appointment->patient_id =	 $patient_id;
		$appointment->serial = $patient_serial;
        $appointment->phone_no =$request->phone_no;
		$appointment->doctor_id = $request->doctor_id;
		$appointment->appointment_date = $request->schedule;
		$appointment->problem = $request->problem;
        $appointment->operator = $request->operator;
		$appointment->bikash = $request->bikash;
		$appointment->save();
		
      
		  
		
		
		
		
	}else{
		
		$patientExis = Patient::find($patient->id);
		$patientExis->blood_group = $request->blood_group;
		$patientExis->age = $request->age;
		$patientExis->save();
		
		
		$appointment =new Appointment();
		$appointment->appointment_id = $CurrentFinalIdWillBe;
        $appointment->patient_id =	 $patientExis->patient_id;
		$appointment->serial = $patient_serial;
        $appointment->phone_no =$request->phone_no;
		$appointment->doctor_id = $request->doctor_id;
		$appointment->appointment_date = $request->schedule;
		$appointment->problem = $request->problem;
		$appointment->operator = $request->operator;
		$appointment->bikash = $request->bikash;
		
		$appointment->save();
		
		
	}
	    $doctor_name=Doctor::where('id',$request->doctor_id)->first();
		   
		   
	    $receiverNumber ="+88".$request->phone_no;

        $message = "Your request for appointment with Dr.".$doctor_name->doctor_name." is recived.Iconmedicalbd confirm your appointment by a confirmation SMS";

  

        try {

  

            $account_sid = getenv("TWILIO_SID");

            $auth_token = getenv("TWILIO_TOKEN");

            $twilio_number = getenv("TWILIO_FROM");

  

            $client = new Client($account_sid, $auth_token);

            $client->messages->create($receiverNumber, [

                'from' => $twilio_number, 

                'body' => $message]);

  

            dd('SMS Sent Successfully.');

  

        } catch (Exception $e) {

            dd("Error: ". $e->getMessage());

        }   
	
}


}
