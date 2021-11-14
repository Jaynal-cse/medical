@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
					<ol class="breadcrumb">						
						<li class="breadcrumb-item">
							<a href="index.html">
								<span class="ti-home"></span>
							</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('doctor.index')}}">Doctors</a></li>
						<li class="breadcrumb-item active">View Doctor</li>
					</ol>
				</div>
@endsection

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="widget-area-2 proclinic-box-shadow">
                            <div class="row">
                                <div class="col-md-10">
                                <h3 class="widget-title">Patient's Information</h3>
                                </div>

                                <div class="col-md-2">
                                <a href="{{route('patient.create')}}" class="btn btn-sm btn-primary">Add Patient</a>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                            <a href=""><img src="{{asset('uploads/patient/')}}/{{$patient_details->image}}" width="100" alt=""></a>
                            </div>
                
                <div class="table-responsive-sm mb-3">
                    <table id="#" class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Patient ID</th>
                                <td>{{$patient_details->patient_id}}</td>
                        </tr>
                        <tr>
                            <th>First Name</th>
                            <td>{{$patient_details->first_name}}</td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                                <td>{{$patient_details->last_name}}</td>
                        </tr>
                        <tr>
                            <th>Email Address</th>
                            <td>{{$patient_details->email}}</td>
                        </tr>
                        <tr>
                            <th>Phone No</th>
                                <td>{{$patient_details->phone_no}}</td>
                        </tr>
                        <tr>
                            <th>Mobile No</th>
                            <td>{{$patient_details->mobile_no}}</td>
                        </tr>
                        <tr>
                            <th>Bloood Group</th>
                                <td>{{$patient_details->blood_group}}</td>
                        </tr>
                        <tr>
                            <th>Sex</th>
                            <td>{{$patient_details->sex}}</td>
                        </tr>

                        <tr>
                            <th>Date of Birth</th>
                            <td>{{$patient_details->date_of_birth}}</td>
                        </tr>

                        <tr>
                            <th>Address</th>
                            <td>{{$patient_details->address}}</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <table class="table">
  <tbody>
    <tr>
      <th>Row</th>
      <td>1</td>
      <td>2</td>
      <td>3</td>
    </tr>
    <tr>
      <th>First Name</th>
      <td></td>
      <td>Peter</td>
      <td>John</td>
    </tr>
    <tr>
      <th>Last Name</th>
      <td>Carter</td>
      <td>Parker</td>
      <td>Rambo</td>
    </tr>
    <tr>
      <th>Email</th>
      <td>johncarter@mail.com</td>
      <td>peterparker@mail.com</td>
      <td>johnrambo@mail.com</td>
    </tr>
  </tbody>
</table> -->
@endsection