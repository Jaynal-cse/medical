@extends('layouts.dashboard')

@section('breadcrumb') 
<div class="col-md-6">
	<h3 class="block-title">All Schedule Information</h3>
</div>
<div class="col-md-6">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{url('home')}}">
					<span class="ti-home"></span>
				</a>
      </li>
       <li class="breadcrumb-item"><a href="">Home</a></li>
       <li class="breadcrumb-item"><a href="">Schedule</a></li>
		<li class="breadcrumb-item active">All Schedule</li>
</div>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="container-fluid">
    <div class="row">

        <div class="col-lg-8">
            @if(session('schedule_delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h6><strong class="pt-1 pb-1">{{session('schedule_delete')}}</strong></h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('schedule_update'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h6><strong class="pt-1 pb-1">{{session('schedule_update')}}</strong></h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('schedule_add'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h6><strong class="pt-1 pb-1">{{session('schedule_add')}}</strong></h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
        </div>

        <!-- Widget Item -->
        <div class="col-md-12 pt-3">
            <div class="card">
                    <div class="card-header">
                        <div class="top">
                    <div class="float-left">
                        <h3 class="widget-title">All Schedule List</h3>    
                    </div>
                    <div class="float-right pr-5">
                        <a href="{{url('addSchedule')}}"><button type="button" class="btn btn-primary mb-0"><span aria-hidden="true">+</span> Add</button></a>
                    </div>   
                </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mb-3">
                            <table id="table_id" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL.No.</th>
                                        <th>Department</th>
                                        <th>Doctor Name </th>
                                        <th>Day Name</th>
                                        <th>Starting Time</th>
                                        <th>Ending Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($schedule as $schedules)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td><a href="{{route('schedule.dept.index',$schedules->department_id)}}" target="_blank">{{$schedules->rel_to_department_table->department_name}}</a></td>
                                        <td><a href="{{route('schedule.doctor.index',$schedules->doctor_id)}}" target="_blank">{{$schedules->rel_to_doctor_table->doctor_name?? ''}}</a></td>
                                        <td><a href="{{route('schedule.day.index',$schedules->day)}}" target="_blank">
										    @php
											   if($schedules->day == 1){echo "Friday";}
											   elseif($schedules->day == 2){echo "Saturday";}
											   elseif($schedules->day == 3){echo "Sunday";}
											   elseif($schedules->day == 4){echo "Monday";}
											   elseif($schedules->day == 5){echo "Tuesday";}
											   elseif($schedules->day == 6){echo "Wednesday";}
											   elseif($schedules->day == 7){echo "Thursday";}
											
											
											@endphp
										
										
										</a></td>
                                        <td>{{date("h:i A",strtotime($schedules->start_time))}}</td>
                                        <td>{{date("h:i A",strtotime($schedules->end_time))}}</td>
                                        <td>
											    <button id="{{$schedules->id}}"class="btn btn-basic" style="background-color:#faebd700;color:#3e5569" onclick=" scheduleActivationControl({{$schedules->id }})">{{($schedules->status == 1)?'Active':'Deactive'}}</button> 
											
											</td>
                                        <td>
                                            <a href="{{url('scheduleView')}}/{{$schedules->id}}"type="submit" title="View" name="button" class="btn btn-info mt-0 mb-0"><span class="ti-eye"></span></a>
                                            <a href="{{url('scheduleEdit')}}/{{$schedules->id}}"type="submit" title="Edit" name="button" class="btn btn-primary mt-0 mb-0"><span class="ti-pencil-alt"></span></a>
                                            <a href="{{url('scheduleDel')}}/{{$schedules->id}}"type="submit" title="Delete" name="button" class="btn btn-danger mt-0 mb-0"><span class="ti-trash"></span></a>
                                        </td>
                                    </tr>
                                   @endforeach 
                                </tbody>
                            </table>
                        </div>        
                    </div>
                </div>
        </div>
        <!-- /Widget Item -->
    </div>
</div>
    <!-- /Main Content -->
 @endsection
 
@section('footer_script')

<script>

function scheduleActivationControl($id){
	 
	          var x;
			  var department_id=$id;
			  
			
			  var _token = $('input[name="_token"]').val();
			   
               $.ajax({ 
                    url:"{{ route('schedule.activationcontroll') }}",
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
