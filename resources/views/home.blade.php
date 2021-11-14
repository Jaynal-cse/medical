@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
	<h3 class="block-title">Quick Statistics</h3>
</div>
<div class="col-md-6">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{route('home')}}">
        <span class="ti-home"></span>
      </a>
    </li>
    <li class="breadcrumb-item active">Dashboard</li>
  </ol>
</div>
@endsection
@section('content')
<!-- Main Content -->
@php 
    
    $currentTime = Carbon\Carbon::now();
    $timenow = $currentTime->hour;
    $message = '';
    if($timenow >= 18 && $timenow <= 20){
      $message = "Good Evening";
    }
    elseif ($timenow >= 20 && $timenow <= 24) {
      $message = "Good Night";
    }
    elseif ($timenow >= 24 && $timenow <= 5) {
      $message = "Good Night";
    }
    elseif ($timenow >= 5 && $timenow <= 11) {
      $message = "Good Morning";
    }
    elseif ($timenow >= 11 && $timenow <= 18) {
      $message = "Good Afternoon";
    }
    else{
      $message = "Others Evening";
    }
@endphp
<p style="font-size: 20px; margin: 8px" id="message">{{ $message }}</p>
<p style="font-size: 20px; margin: 8px"><span  id="wlc">Welcome Back, </span> <span class="rounded-circle"></span> {{Auth::user()->name}} <span style="float: right">{{date("l, F jS Y, h:i:s A")}}</span></p>
<div class="row">
  <!-- Widget Item -->
  <div class="col-md-4">
    <div class="widget-area proclinic-box-shadow color-red">
      <div class="widget-left">
        <span class="ti-wheelchair"></span>
      </div>
      <div class="widget-right">
        <h4 class="wiget-title">Today Patients</h4>
        <span class="numeric color-red">{{$todayPatients}}</span>
        {{-- <p class="inc-dec mb-0"><span class="ti-angle-up"></span> +20% Increased</p> --}}
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="widget-area proclinic-box-shadow color-red">
      <div class="widget-left">
        <span class="ti-wheelchair"></span>
      </div>
      <div class="widget-right">
        <h4 class="wiget-title">Yesterday Patients</h4>
        <span class="numeric color-red">{{$yesterdayPatients}}</span>
        {{-- <p class="inc-dec mb-0"><span class="ti-angle-up"></span> +20% Increased</p> --}}
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="widget-area proclinic-box-shadow color-red">
      <div class="widget-left">
        <span class="ti-wheelchair"></span>
      </div>
      <div class="widget-right">
        <h4 class="wiget-title">Total Patients</h4>
        <span class="numeric color-red">{{$patients}}</span>
        {{-- <p class="inc-dec mb-0"><span class="ti-angle-up"></span> +20% Increased</p> --}}
      </div>
    </div>
  </div>
  <!-- /Widget Item -->
  <!-- Widget Item -->
  <div class="col-md-4">
    <div class="widget-area proclinic-box-shadow color-green">
      <div class="widget-left">
        <span class="ti-bar-chart"></span>
      </div>
      <div class="widget-right">
        <h4 class="wiget-title">Today Appointments</h4>
        <span class="numeric color-green">{{$todayAppointments}}</span>
        {{-- <p class="inc-dec mb-0"><span class="ti-angle-down"></span> -15% Decreased</p> --}}
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="widget-area proclinic-box-shadow color-green">
      <div class="widget-left">
        <span class="ti-bar-chart"></span>
      </div>
      <div class="widget-right">
        <h4 class="wiget-title">Yesterday Appointments</h4>
        <span class="numeric color-green">{{$yesterdatAppointments}}</span>
        {{-- <p class="inc-dec mb-0"><span class="ti-angle-down"></span> -15% Decreased</p> --}}
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="widget-area proclinic-box-shadow color-green">
      <div class="widget-left">
        <span class="ti-bar-chart"></span>
      </div>
      <div class="widget-right">
        <h4 class="wiget-title">Total Appointments</h4>
        <span class="numeric color-green">{{$appointments}}</span>
        {{-- <p class="inc-dec mb-0"><span class="ti-angle-down"></span> -15% Decreased</p> --}}
      </div>
    </div>
  </div>
  <!-- /Widget Item -->

  <div class="col-md-4">
    <div class="widget-area proclinic-box-shadow color-red">
      <div class="widget-left">
        <span class="ti-pencil-alt"></span>
      </div>
      <div class="widget-right">
        <h4 class="wiget-title">Today Diagnostic Test</h4>
        <span class="numeric color-red">{{'0'}}</span>
        {{-- <p class="inc-dec mb-0"><span class="ti-angle-up"></span> +20% Increased</p> --}}
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="widget-area proclinic-box-shadow color-red">
      <div class="widget-left">
        <span class="ti-pencil-alt"></span>
      </div>
      <div class="widget-right">
        <h4 class="wiget-title">Yesterday Diagnostic Test</h4>
        <span class="numeric color-red">{{'0'}}</span>
        {{-- <p class="inc-dec mb-0"><span class="ti-angle-up"></span> +20% Increased</p> --}}
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="widget-area proclinic-box-shadow color-red">
      <div class="widget-left">
        <span class="ti-pencil-alt"></span>
      </div>
      <div class="widget-right">
        <h4 class="wiget-title">Total Diagnostic Test</h4>
        <span class="numeric color-red">{{'0'}}</span>
        {{-- <p class="inc-dec mb-0"><span class="ti-angle-up"></span> +20% Increased</p> --}}
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="widget-area proclinic-box-shadow color-green">
      <div class="widget-left">
        <span class="ti-pencil-alt"></span>
      </div>
      <div class="widget-right">
        <h4 class="wiget-title">Today Prescription</h4>
        <span class="numeric color-green">{{$todayPrescriptions}}</span>
        {{-- <p class="inc-dec mb-0"><span class="ti-angle-up"></span> +10% Increased</p> --}}
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="widget-area proclinic-box-shadow color-green">
      <div class="widget-left">
        <span class="ti-pencil-alt"></span>
      </div>
      <div class="widget-right">
        <h4 class="wiget-title">Yesterday Prescription</h4>
        <span class="numeric color-green">{{$yesterdayPrescriptions}}</span>
        {{-- <p class="inc-dec mb-0"><span class="ti-angle-up"></span> +10% Increased</p> --}}
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="widget-area proclinic-box-shadow color-green">
      <div class="widget-left">
        <span class="ti-pencil-alt"></span>
      </div>
      <div class="widget-right">
        <h4 class="wiget-title">Total Prescription</h4>
        <span class="numeric color-green">{{$prescriptions}}</span>
        {{-- <p class="inc-dec mb-0"><span class="ti-angle-up"></span> +10% Increased</p> --}}
      </div>
    </div>
  </div>
  <!-- Widget Item -->
  <div class="col-md-4">
    <div class="widget-area proclinic-box-shadow color-yellow">
      <div class="widget-left">
        <span class="ti-user"></span>
      </div>
      <div class="widget-right">
        <h4 class="wiget-title">Active Doctor</h4>
        <span class="numeric color-yellow">{{$active_doctors}}</span>
        {{-- <p class="inc-dec mb-0"><span class="ti-angle-up"></span> +10% Increased</p> --}}
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="widget-area proclinic-box-shadow color-yellow">
      <div class="widget-left">
        <span class="ti-user"></span>
      </div>
      <div class="widget-right">
        <h4 class="wiget-title">Inactive Doctor</h4>
        <span class="numeric color-yellow">{{$inactive_doctors}}</span>
        {{-- <p class="inc-dec mb-0"><span class="ti-angle-up"></span> +10% Increased</p> --}}
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="widget-area proclinic-box-shadow color-yellow">
      <div class="widget-left">
        <span class="ti-wheelchair"></span>
      </div>
      <div class="widget-right">
        <h4 class="wiget-title">Total Doctor</h4>
        <span class="numeric color-user">{{$total_doctors}}</span>
        {{-- <p class="inc-dec mb-0"><span class="ti-angle-up"></span> +10% Increased</p> --}}
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="widget-area proclinic-box-shadow color-green">
      <div class="widget-left">
        <span class="ti-user"></span>
      </div>
      <div class="widget-right">
        <h4 class="wiget-title">Today Medicine Order</h4>
        <span class="numeric color-green">{{$medicine}}</span>
        {{-- <p class="inc-dec mb-0"><span class="ti-angle-up"></span> +10% Increased</p> --}}
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="widget-area proclinic-box-shadow color-green">
      <div class="widget-left">
        <span class="ti-user"></span>
      </div>
      <div class="widget-right">
        <h4 class="wiget-title">Pending Medicine Order</h4>
        <span class="numeric color-green">{{$departments}}</span>
        {{-- <p class="inc-dec mb-0"><span class="ti-angle-up"></span> +10% Increased</p> --}}
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="widget-area proclinic-box-shadow color-green">
      <div class="widget-left">
        <span class="ti-user"></span>
      </div>
      <div class="widget-right">
        <h4 class="wiget-title">Outoff Stock</h4>
        <span class="numeric color-green">{{$departments}}</span>
        {{-- <p class="inc-dec mb-0"><span class="ti-angle-up"></span> +10% Increased</p> --}}
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="widget-area proclinic-box-shadow color-green">
      <div class="widget-left">
        <span class="ti-user"></span>
      </div>
      <div class="widget-right">
        <h4 class="wiget-title">Total Departments</h4>
        <span class="numeric color-green">{{$departments}}</span>
        {{-- <p class="inc-dec mb-0"><span class="ti-angle-up"></span> +10% Increased</p> --}}
      </div>
    </div>
  </div>

  
  <!-- /Widget Item -->
</div>

<div class="row">
  <!-- Widget Item -->
  {{-- <div class="col-md-6">
    <div class="widget-area-2 proclinic-box-shadow">
      <h3 class="widget-title">Appointments Year by Year</h3>
      <div id="lineMorris" class="chart-home"></div>
    </div>
  </div> --}}
  <!-- /Widget Item -->
  <!-- Widget Item -->
  {{-- <div class="col-md-6">
    <div class="widget-area-2 proclinic-box-shadow">
      <h3 class="widget-title"> Patients Year by Year</h3>
      <div id="barMorris" class="chart-home"></div>
    </div>
  </div> --}}
  <!-- /Widget Item -->
</div>

{{-- <div class="row">
  <!-- Widget Item -->
  <div class="col-md-12">
    <div class="widget-area-2 proclinic-box-shadow">
      <h3 class="widget-title">Appointments</h3>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Patient Name</th>
              <th>Doctor</th>
              <th>Check-Up</th>
              <th>Date</th>
              <th>Time</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Rajesh</td>
              <td>Manoj Kumar</td>
              <td>Dental</td>
              <td>12-10-2018</td>
              <td>12:10PM</td>
              <td>
                <span class="badge badge-success">Completed</span>
              </td>
            </tr>
            <tr>
              <td>Riya</td>
              <td>Daniel </td>
              <td>Ortho</td>
              <td>12-10-2018</td>
              <td>1:10PM</td>
              <td>
                <span class="badge badge-warning">Pending</span>
              </td>
            </tr>
            <tr>
              <td>Siri</td>
              <td>Daniel </td>
              <td>Ortho</td>
              <td>12-10-2018</td>
              <td>1:30PM</td>
              <td>
                <span class="badge badge-danger">Cancelled</span>
              </td>
            </tr>
            <tr>
              <td>Rajesh</td>
              <td>Manoj Kumar</td>
              <td>Dental</td>
              <td>12-10-2018</td>
              <td>12:10PM</td>
              <td>
                <span class="badge badge-success">Completed</span>
              </td>
            </tr>
            <tr>
              <td>Riya</td>
              <td>Daniel </td>
              <td>Ortho</td>
              <td>12-10-2018</td>
              <td>1:10PM</td>
              <td>
                <span class="badge badge-warning">Pending</span>
              </td>
            </tr>
            <tr>
              <td>Siri</td>
              <td>Daniel </td>
              <td>Ortho</td>
              <td>12-10-2018</td>
              <td>1:30PM</td>
              <td>
                <span class="badge badge-danger">Cancelled</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- /Widget Item -->
</div> --}}

<div class="row">
  <!-- Widget Item -->
  {{-- <div class="col-sm-6">
    <div class="widget-area-2 proclinic-box-shadow">
      <h3 class="widget-title">Appointments Status</h3>
      <div id="donutMorris" class="chart-home"></div>
    </div>
  </div> --}}
  <!-- /Widget Item -->
  <!-- Widget Item -->
  <div class="col-md-12">
    <div class="widget-area-2 progress-status proclinic-box-shadow">
      <h3 class="widget-title">Doctors Availability</h3>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Doctor</th>
              <th>Designation</th>
              <th>Department</th>
              <th>Speciality</th>
              <th>Availability</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($doctors_all as $doctor)
            <tr>
              <td>{{$doctor->doctor_name}}</td>
              <td>{{$doctor->get_designation->designation}}</td>
              <td>{{$doctor->get_department->department_name}}</td>
              <td>{{$doctor->specialist}}</td>
              <td>
                <span class="badge badge-success">Available</span>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>
  <!-- /Widget Item -->

</div>
<!-- /Main Content -->
@endsection
