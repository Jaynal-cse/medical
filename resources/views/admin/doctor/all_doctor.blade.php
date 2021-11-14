@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="{{route('home')}}">
								<span class="ti-home"></span>
							</a>
                        </li>
						<li class="breadcrumb-item active">Doctors</li>
					</ol>
				</div>
@endsection

@section('content')

<!-- Main Content -->
<div class="container-fluid">

    <div class="row">
                        <div class="col-lg-12 mt-2">
                        @if(session('added_success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Successfully Added!</strong> Please Check in Doctor list.
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
                            <strong>Successfully Edited!</strong> Please Check in Doctor list.
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
            <!-- Widget Item -->
            <div class="col-md-12">
                <div class="widget-area-2 proclinic-box-shadow">
                            <div class="row">
                                <div class="col-md-10">
                                <h3 class="widget-title">All Doctors</h3>
                                </div>

                                <div class="col-md-2">
                                <a href="{{route('doctor.create')}}" class="btn btn-sm btn-primary">Add Doctor</a>
                                </div>
                            <div class="table-responsive-sm mb-3 col-md-12">
                                <table id="table_id" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Photo</th>
                                            <th>Name</th>
											<th>Designation</th>
                                            <th>Department</th>
											<th>Priority</th>
                                            <th>Status</th>
                                           
                                            <th>Phone No</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    @php
                                    $i=1;
                                    @endphp
                                    <tbody>
                                        @foreach($doctors as $doctor)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>
                                                <img src="{{asset('uploads/doctor/')}}/{{$doctor->image}}" width="50" alt="">
                                            </td>
                                            <td>{{$doctor->doctor_name}}</td>
                                            <td>{{$doctor->get_designation->designation}}</td>
                                            <td>{{$doctor->get_department->department_name}}</td>
                                            <td>{{$doctor->priority}}</td>
                                            <td>
											    <button id="{{$doctor->id}}"class="btn btn-basic" style="background-color:#faebd700;color:#3e5569" onclick="doctorActivationControl({{$doctor->id }})">{{($doctor->status == 1)?'Active':'Deactive'}}</button> 
											
											</td>
                                            <td>{{$doctor->phone_no}}</td>
                                            <td>
                                                <div class="btn-group">
												<a href="{{route('doctor.show',$doctor->id)}}"><button type="button" class="btn btn-info mb-0"><span class="ti-eye"></span></button></a>
												<a href="{{route('doctor.edit',$doctor->id)}}"><button type="button" class="btn btn-primary mb-0"><span class="ti-pencil-alt"></span></button></a>
												<a href="{{url('doctor_delete')}}/{{$doctor->id}}"><button type="button" class="btn btn-danger mb-0"><span class="ti-trash"></span></button></a>
												</div>
                                            </td>
                                            <!-- <td>
                                                <span class="badge badge-success">Available</span>
                                            </td> -->
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
            </div>
        <!-- /Widget Item -->
    </div>
</div>
<!-- /Main Content -->
</div>
@endsection

@section('footer_script')

<script>

function doctorActivationControl($id){
	 
	          var x;
			  var department_id=$id;
			  
			
			  var _token = $('input[name="_token"]').val();
			   
               $.ajax({ 
                    url:"{{ route('doctor.activationcontroll') }}",
                    method:"POST",
					data:{ department_id:department_id,_token:_token},
					
                    success:function(result)
                       {   
					  
							myObj = JSON.parse(result);
							if(myObj.status == 1){document.getElementById(myObj.id).innerHTML = "Active";}
							else{document.getElementById(myObj.id).innerHTML = "Deactive";}
							
                       }

               })       
}






</script>

@endsection