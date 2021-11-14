<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Patient;
use App\Appointment;
use App\Department;
use App\Doctor;
use App\Designation;
use App\Prescription;
use App\Medicine;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $yesterday = Carbon::yesterday();
        $data['patients'] = Patient::count();
        $data['todayPatients'] = Patient::whereDate('created_at', date('Y-m-d'))->count();
        $data['yesterdayPatients'] = Patient::whereDate('created_at',  $yesterday)->count();
        $data['appointments'] = Appointment::count();
        $data['todayAppointments'] = Appointment::whereDate('created_at', date('Y-m-d'))->count();
        $data['yesterdatAppointments'] = Appointment::whereDate('created_at', $yesterday)->count();
        $data['departments'] = Department::count();
        $data['active_doctors'] = Doctor::where('status', 1)->count();
        $data['inactive_doctors'] = Doctor::where('status', 0)->count();
        $data['doctors_all'] = Doctor::where('status', 1)->get();
        $data['total_doctors'] = Doctor::count();
        $data['designations'] = Designation::count();
        $data['prescriptions'] = Prescription::count();
        $data['todayPrescriptions'] = Prescription::whereDate('created_at', date('Y-m-d'))->count();
        $data['yesterdayPrescriptions'] = Prescription::whereDate('created_at', $yesterday)->count();
        $data['medicine'] = Medicine::count();
        return view('home', $data);
    }
    
    public function contact_message()
    {
        $contact_message = Contact::orderBy('created_at', 'desc')->get(); 
        return view('admin.message.all_message',compact('contact_message'));
    }
}
