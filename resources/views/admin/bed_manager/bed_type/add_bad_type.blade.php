@extends('layouts.dashboard')
@section('breadcrumb')
<div class="col-md-6">
					<ol class="breadcrumb">						
						<li class="breadcrumb-item">
							<a href="{{route('home')}}">
								<span class="ti-home"></span>
							</a>
                        </li>
						<li class="breadcrumb-item active">Add Bed Type</li>
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
				@if(session('department_delete_success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
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
                                <div class="col-md-10">
                                <h3 class="widget-title">All Departments</h3>
                                </div>

                                <div class="col-md-2">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 								 Add Department
								</button>
                                </div>
                        	</div>
							<div class="table-div">
								<table id="table_id" class="table table-bordered">
									<thead>
										<tr>
											<th scope="col">SL</th>
											<th scope="col">Department Name</th>
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
											<td>
											@if($department->status==1)
        									<a href="{{url('/department/inactive/'.$department->id)}}" class="btn btn-sm btn-danger">Inactive</a>
       										 @else
        									<a href="{{url('/department/active/'.$department->id)}}" class="btn btn-sm btn-success">Active</a>
        									@endif
											</td>
											<td>
											<div class="btn-group">
												<a href="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$department->id}}"><span class="ti-pencil-alt"></span></a>
												<a href="{{url('department_delete')}}/{{$department->id}}"><button type="button" class="btn btn-danger mb-0"><span class="ti-trash"></span></button></a>
											</div>
												
											</td>
										</tr>


										
										<!-- Edit Modal Satrt	 -->
										<div class="modal fade" id="{{$department->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
											<div class="modal-header">
												<h5 class="widget-title" id="exampleModalLabel">Edit Department</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												
																<div class="widget-area-2 proclinic-box-shadow">
																	<div class="proclinic-widget">
																		<form action="{{route('department.update',$department->id)}}" method="post">
																		{{method_field('PUT')}}
																		@csrf
																			<div class="form-group">
																				<label for="DepartmentName">Department Name</label>
																				<input type="text" class="form-control" id="DepartmentName" name="department_name" aria-describedby="emailHelp" value="{{$department->department_name}}" placeholder="Enter department name">
																				@error('department_name')
																				<small class="text-danger">{{$message}}</small>
																				@enderror
																			</div>
																	</div>
																</div>
																<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<input type="submit" class="btn btn-primary">
											</div>
											</form>


											</div>
											</div>
										</div>
										</div>
										<!-- End Edit Modal -->
									@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
            </div>


<!-- Insert Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="widget-title" id="exampleModalLabel">Add Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
						<div class="widget-area-2 proclinic-box-shadow">
							<div class="proclinic-widget">
								<form action="{{route('department.store')}}" method="post">
								@csrf
									<div class="form-group">
										<label for="DepartmentName">Department Name</label>
										<input type="text" class="form-control" id="DepartmentName" name="department_name" aria-describedby="emailHelp" value="{{old('department_name')}}" placeholder="Enter department name">
										@error('department_name')
                            			<small class="text-danger">{{$message}}</small>
                           			 	@enderror
									</div>
							</div>
						</div>
						<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary">
      </div>
	  </form>


      </div>
    </div>
  </div>
</div>
<!-- End insert Modal -->


<!-- start edit Modal -->
<!-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="widget-title" id="exampleModalLabel">Edit Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
						<div class="widget-area-2 proclinic-box-shadow">
							<div class="proclinic-widget">
								<form action="{{route('department.update',$department->id)}}" method="post">
								{{method_field('PUT')}}
								@csrf
									<div class="form-group">
										<label for="DepartmentName">Department Name</label>
										<input type="text" class="form-control" id="DepartmentName" name="department_name" aria-describedby="emailHelp" value="{{$department->department_name}}" placeholder="Enter department name">
										@error('department_name')
                            			<small class="text-danger">{{$message}}</small>
                           			 	@enderror
									</div>
							</div>
						</div>
						<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary">
      </div>
	  </form>


      </div>
    </div>
  </div>
</div> -->
<!-- End edit Modal -->
@endsection