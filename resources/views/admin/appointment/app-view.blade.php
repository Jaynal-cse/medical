@extends('layouts.dashboard')

@section('breadcrumb') 
<div class="col-md-6">
    <h3 class="block-title">Appointment</h3>
</div>
<div class="col-md-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('home')}}">
                    <span class="ti-home"></span>
                </a>
      </li>
       <li class="breadcrumb-item"><a href="">Home</a></li>
       <li class="breadcrumb-item"><a href="">Appointment</a></li>
        <li class="breadcrumb-item active">View Appointment</li>
</div>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <strong><h4>Individual Appointment View</h4></strong>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                       
                        <tr>
                            <td>Patient ID</td>
                            <td>{{$app_view->patient_id}}</td>
                        </tr>
                        <tr>
                            <td>Appointment ID</td>
                            <td>{{$app_view->appointment_id}}</td>
                        </tr>
                        <tr>
                            <td>Doctor Department</td>
                            <td>{{$app_view->rel_to_department_table->department_name}}</td>
                        </tr>
                        <tr>
                            <td>Doctor Name</td>
                            <td>{{$app_view->rel_to_doctor_table->doctor_name}}</td>
                        </tr>
                        <tr>
                            <td>Appointment Date</td>
                            <td>{{$app_view->appointment_date}}</td>
                        </tr>
                        <tr>
                            <td>Serial No.</td>
                            <td>{{$app_view->serial}}</td>
                        </tr>
                        <tr>
                            <td>Patient Problem</td>
                            <td>{{$app_view->problem}}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>{{$app_view->status}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Content -->
 @endsection
 
     
