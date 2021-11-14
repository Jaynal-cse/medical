@extends('layouts.dashboard')

@section('breadcrumb') 
<div class="col-md-6">
    <h3 class="block-title">Online Appointment</h3>
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
        <li class="breadcrumb-item active">Online Appointment View</li>
</div>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <strong><h4>Individual Online Appointment View</h4></strong>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                       
                        <tr>
                            <td>Appointment ID</td>
                            <td>{{$view->appointment_id?? ''}}</td>
                        </tr>
                        <tr>
                            <td>Department</td>
                            <td>{{$view->rel_to_dept_table->department_name?? ''}}</td>
                        </tr>
                        <tr>
                            <td>Doctor Name</td>
                            <td>{{$view->rel_to_doctor_table->doctor_name?? ''}}</td>
                        </tr>
                        <tr>
                            <td>Patient Name</td>
                            <td>{{$view->name?? ''}}</td>
                        </tr>
                        <tr>
                            <td>Patient Problem</td>
                            <td>{{$view->problem?? ''}}</td>
                        </tr>
                        <tr>
                            <td>Appointment Date</td>
                            <td>{{$view->date?? ''}}</td>
                        </tr>
                        <tr>
                            <td>Appointment Time</td>
                            <td>{{$view->time?? ''}}</td>
                        </tr>
                        <tr>
                            <td>Patient Phone No.</td>
                            <td>{{$view->phone?? ''}}</td>
                        </tr>
                        <tr>
                            <td>Patient Email</td>
                            <td>{{$view->email?? ''}}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                            @if($view->status == 0)
                               <span class="badge badge-warning">Pending</span>
                               @elseif($view->status == 1)
                               <span class="badge badge-success">Confirmed</span>
                               @elseif($view->status == 2)
                               <span class="badge badge-danger">Cancelled</span>
                               @else
                            
                            @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Content -->
 @endsection
 
     
