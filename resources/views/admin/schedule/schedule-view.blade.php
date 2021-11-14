@extends('layouts.dashboard')

@section('breadcrumb') 
<div class="col-md-6">
	<h3 class="block-title">View Schedule Information</h3>
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
		<li class="breadcrumb-item active">View Schedule</li>
</div>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="card mt-4">
                    <div class="card-header">
                        <strong><h4>Individual Schedule View</h4></strong>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <td>Department :</td>
                            <td>{{$schedule_views->rel_to_department_table->department_name}}</td>
                        </tr>
                        <tr>
                            <td>Doctor Name :</td>
                            <td>{{$schedule_views->rel_to_doctor_table->doctor_name}}</td>
                        </tr>
                        <tr>
                            <td>Day :</td>
                            <td>
                             @php     
                              if($schedule_views->day == 1){$day = "Friday";}
                              elseif($schedule_views->day == 2){$day = "Saturday";}
                              elseif($schedule_views->day == 3){$day = "Sunday";}
                              elseif($schedule_views->day == 4){$day = "Monday";}
                              elseif($schedule_views->day == 5){$day = "Tuesday";}
                              elseif($schedule_views->day == 6){$day = "Wednesday";}
                              elseif($schedule_views->day == 7){$day = "Thursday";}
                              echo $day;
                              @endphp
                        </td>
                        </tr>
                        <tr>
                            <td>Start Time :</td>
                            <td>{{date('h:i A',strtotime($schedule_views->start_time))}}</td>
                        </tr>
                        <tr>
                            <td>End Time :</td>
                            <td>{{ date('h:i A',strtotime($schedule_views->end_time))}}</td>
                        </tr>
                        
                        <tr>
                            <td>Room No:</td>
                            <td>{{$schedule_views->room_no}}</td>
                        </tr>
                        
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Content -->
 @endsection
 
     
