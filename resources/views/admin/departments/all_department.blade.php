@extends('layouts.dashboard')
@section('breadcrumb')
<div class="col-md-6">
					<ol class="breadcrumb">						
						<li class="breadcrumb-item">
							<a href="{{route('home')}}">
								<span class="ti-home"></span>
							</a>
                        </li>
						<li class="breadcrumb-item active">Departments</li>
					</ol>
				</div>
@endsection

@section('content')
<div class="container-fluid">

	<div class="row">
				<div class="col-lg-12 mt-2">
				@if(session('department_success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
                	<strong>Successfully Done!</strong> Please Check in department list
					{{session('department_success')}}
                	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                	</button>
            		</div>
				@endif
				</div>

				<div class="col-lg-12 mt-2">
				@if(session('edit_success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
                	<strong>Successfully Edited!</strong> Please Check in department list.
					{{session('edit_success')}}
                	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                	</button>
            		</div>
				@endif
				</div>


				<div class="col-lg-12 mt-2">
				@if(session('department_delete_success'))
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
                	<strong>Successfully Deleted!</strong> Please Check in department list
					{{session('department_delete_success')}}
                	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                	</button>
            		</div>
				@endif
				</div>

					<div class="col-md-12">
						<div class="widget-area-2 proclinic-box-shadow">
							<div class="row">
                                <div class="col-md-8">
                                <h3 class="widget-title">All Departments</h3>
                                </div>

                                <div class="col-md-2">
                                <a href="{{route('department.create')}}" class="btn btn-sm btn-primary">Add Department</a>
                                </div>
								 <div class="col-md-2">
                                <a href="" class="btn btn-sm btn-primary">Add Designation</a>
                                </div>
                        	</div>
							<div class="table-div">
								<table id="table_id" class="table table-bordered">
									<thead>
										<tr>
											<th scope="col">SL</th>
											<th scope="col">Department Name</th>
											<th scope="col">Description</th>
											<th scope="col">Status</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									@php 
    								$i=1;
   									@endphp
									<tbody>
									@foreach($departments as $department)
										<tr>
											<td>{{$i++}}</td>
											<td>{{$department->department_name}}</td>
											<td>{{$department->description}}</td>
											<td>
											@if($department->status==1)
        									<a href="{{url('/department/inactive/'.$department->id)}}" class="btn btn-sm btn-danger">Inactive</a>
       										 @else
        									<a href="{{url('/department/active/'.$department->id)}}" class="btn btn-sm btn-success">Active</a>
        									@endif
											</td>
											<td>
											<div class="btn-group">
												<a href="{{route('department.edit',$department->id)}}" type="button" class="btn btn-primary"><span class="ti-pencil-alt"></span></a>
												<a href="{{url('department_delete')}}/{{$department->id}}"><button type="button" class="btn btn-danger mb-0"><span class="ti-trash"></span></button></a>
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
            </div>


@endsection