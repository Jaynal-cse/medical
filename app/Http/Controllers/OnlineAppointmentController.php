<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Department;
use App\Onlineappointment;
use App\FooterOpeningHour;
use Carbon\Carbon;

class OnlineAppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  public function appointments()
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



    $doctor = Doctor::all();
    $depts = Department::all();
      return view('frontend.appointment', compact('doctor', 'depts', 'is_opened', 'is_day_index', 'openingOurs'));
  }

  public function appointment_post(Request $request)
    {
        $request->validate([
            'department_id'=>'required',
            'doctor_id'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'date'=>'required',
            'email'=>'required|email',
            'time'=>'required',
            'problem'=>'required',
        ]);

        Onlineappointment::insert([
            'appointment_id'=>$request->appointment_id,
            'department_id'=>$request->department_id,
            'doctor_id'=>$request->doctor_id,
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'date'=>$request->date,
            'time'=>$request->time,
            'problem'=>$request->problem,
            'created_at'=>Carbon::now(),
        ]);

        return back()->with('success', 'Your Appointment Successfully Completed !');
    }










}
