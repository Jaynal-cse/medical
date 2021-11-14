@extends('layouts.dashboard')

@section('breadcrumb')
      <div class="col-md-6">
        <h3 class="block-title">Prescriptions</h3>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb">                     
            <li class="breadcrumb-item">
                <a href="#">
                    <span class="ti-home"></span>
                </a>
            </li>
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Prescription</li>
            <li class="breadcrumb-item">Prescription View</li>
        </ol>
    </div>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <strong><h4>Individual Prescription View</h4></strong>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <td>Doctor Department</td>
                            <td>{{$prescrp_view->department}}</td>
                        </tr>
                        <tr>
                            <td>Doctor Name</td>
                            <td>{{$prescrp_view->doctor_name}}</td>
                        </tr>
                        <tr>
                            <td>Patient Name</td>
                            <td>{{$prescrp_view->patient_name}}</td>
                        </tr>
                        <tr>
                            <td>Patient Address</td>
                            <td>{{$prescrp_view->address}}</td>
                        </tr>
                        <tr>
                            <td>Patient Problem</td>
                            <td>{{$prescrp_view->problem}}</td>
                        </tr>
                        <tr>
                            <td>Prescription</td>
                            <td>{{$prescrp_view->prescription}}</td>
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Content -->
 @endsection
 
     
