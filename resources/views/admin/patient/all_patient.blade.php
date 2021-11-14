@extends('layouts.dashboard')
@section('breadcrumb')
<div class="col-md-6">
					<ol class="breadcrumb">						
						<li class="breadcrumb-item">
							<a href="{{route('home')}}">
								<span class="ti-home"></span>
							</a>
                        </li>
						<li class="breadcrumb-item active">Patients</li>
					</ol>
				</div>
@endsection
@section('content')
<div class="container-fluid">
<div class="row">
				
				<div class="col-lg-12 mt-2">
				@if(session('added_success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
                	<strong>Successfully Added!</strong> Please Check in patient list.
					{{session('added_success')}}
                	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                	</button>
            		</div>
				@endif
				</div>
				
				<div class="col-lg-12 mt-2">
				@if(session('delete_success'))
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
                	<strong>Successfully Deleted!</strong> Please Check in Patient list.
					{{session('delete_success')}}
                	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                	</button>
            		</div>
				@endif
				</div>
				
        <!-- Responsive Table-->
					<div class="col-md-12">
						<div class="widget-area-2 proclinic-box-shadow">
                            <div class="row">
                                <div class="col-md-10">
                                <h3 class="widget-title">All Patients</h3>
                                </div>

                                <div class="col-md-2">
                                <a href="{{route('patient.create')}}" class="btn btn-sm btn-primary">Add Patient</a>
                                </div>
                            </div>
							<div class="table-div">
								<div class="table-responsive">
									<table id="table_id" class="table table-bordered">
										<thead>
											<tr>
												<th scope="col">SL</th>
												<th scope="col">Photo</th>
												<th scope="col">Patient ID</th>
												<th scope="col">First Name</th>
												<th scope="col">Last Name</th>
												<th scope="col">Email</th>
												<th scope="col">Mobile No</th>
												<th scope="col">Address</th>
												<th scope="col">Sex</th>
                                                <th scope="col">Action</th>
											</tr>
										</thead>
										@php
										$i=1;
										@endphp
										<tbody>
                                        @foreach($patients as $patient)
											<tr>
                                                <td>{{$i++}}</td>
												<td><img src="{{asset('uploads/patient/')}}/{{$patient->image}}" width="50" alt=""></td>
												<td>{{$patient->patient_id}}</td>
												<td>{{$patient->first_name}}</td>
												<td>{{$patient->last_name}}</td>
												<td>{{$patient->email}}</td>
												<td>{{$patient->mobile_no}}</td>
												<td>{{$patient->address}}</td>
												<td>{{$patient->sex}}</td>
                                                
												<td>
												<div class="btn-group">
												<a href="{{route('patient.show',$patient->patient_slug)}}"><button type="button" class="btn btn-info mb-0"><span class="ti-eye"></span></button></a> 
												<a href="{{route('patient.edit',$patient->id)}}"><button type="button" class="btn btn-primary mb-0"><span class="ti-pencil-alt"></span></button></a>
												<a href="{{url('/patient_delete')}}/{{$patient->id}}"><button type="button" class="btn btn-danger mb-0"><span class="ti-trash"></span></button></a>
												</div>
												</td>
											</tr>
                                        @endforeach
										</tbody>
									</table>
								</div>
							</div>
				
						</div>
					</div>
					<!-- /Responsive Table-->

</div>
</div>
@endsection