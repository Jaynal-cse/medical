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
                	<strong>Successfully Deleted!</strong> Please Check in Patienr list.
					{{session('added_success')}}
                	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                	</button>
            		</div>
				@endif
				</div>

				<div class="col-lg-12 mt-2">
				@if(session('edit_success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
                	<strong>Successfully Deleted!</strong> Please Check in Patienr list.
					{{session('edit_success')}}
                	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                	</button>
            		</div>
				@endif
				</div>

				<div class="col-lg-12 mt-2">
				@if(session('delete_success'))
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
                	<strong>Successfully Deleted!</strong> Please Check in Patienr list.
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
                                <h3 class="widget-title">All Document</h3>
                                </div>

                                <div class="col-md-2">
                                <a href="{{route('patient_document.create')}}" class="btn btn-sm btn-primary">Add Document</a>
                                </div>
                            </div>
							<div class="table-div">
								<div class="table-responsive">
									<table id="table_id" class="table table-bordered">
										<thead>
											<tr>
												<th scope="col">SL</th>
												<th scope="col">Patient ID</th>
												<th scope="col">Doctor Name</th>
												<th scope="col">Description</th>
												<th scope="col">Documents</th>
											</tr>
										</thead>
										@php
										$i=1;
										@endphp
										<tbody>
                                        @foreach($patientdocuments as $patientdocument)
											<tr>
                                                <td>{{$i++}}</td>
												<td>{{$patientdocument->patient_id}}</td>
												<td>{{$patientdocument->doctor_name}}</td>
												<td>{{$patientdocument->description}}</td>
                                                
												<td>
												<div class="btn-group">
												<a href="{{url('patient/document/view')}}/{{$patientdocument->id}}"><button type="button" class="btn btn-info mb-0"><span class="ti-eye"></span></button></a> 
												<a href="{{url('patient/document/download')}}/{{$patientdocument->patient_document}}"><button type="button" class="btn btn-primary mb-0"><span class="ti-download"></span></button></a>
												<a href="{{url('patient_document/edit')}}/{{$patientdocument->id}}"><button type="button" class="btn btn-secondary mb-0"><span class="ti-pencil"></span></button></a>
												<a href="{{url('patient/document/delete')}}/{{$patientdocument->id}}"><button type="button" class="btn btn-danger mb-0"><span class="ti-trash"></span></button></a>
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