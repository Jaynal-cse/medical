@extends('layouts.dashboard')

@section('style_script')
  
<link rel="stylesheet" href="{{asset('frontend_assets/css/style.css')}}">
<style>

.widget-about-team .item-content .item-ctg {
    margin-bottom: 0px;
}
.team-detail-box-layout1 .single-item table.schedule-table tbody td .item-btn {
    
    padding: 7px 9px;

}
</style>

@endsection
@section('breadcrumb')
<div class="col-md-6">
	<h3 class="block-title">{{$doctor_details->doctor_name}} Info</h3>
</div>
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
<section class="team-details-wrap-layout1 bg-light-accent100">
            <div class="container">
                <div class="row">
                    <div class="order-xl-2 order-lg-2 col-xl-9 col-lg-8 col-md-12 col-12">
                        <div class="team-detail-box-layout1">
                            <div class="single-item">
                                <h3 class="section-title title-bar-primary2">About Me:</h3>
                                    <p>{{$doctor_details->short_biography}}</p>
                            </div>
                            <div class="single-item">
                                <div class="table-responsive">
                                    <h3 class="section-title title-bar-primary2">Education:</h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Year</th>
                                                <th>Degree</th>
                                                <th>Institute</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($educations as $education)
                                            <tr>
                                                <td>{{$education->edu_year}}</td>
                                                <td>{{$education->edu_degree}}</td>
                                                <td>{{$education->edu_institute}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="single-item">
                                <div class="table-responsive">
                                    <h3 class="section-title title-bar-primary2">Experienced:</h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Year</th>
                                                <th>Department</th>
                                                <th>Position</th>
                                                <th>Hospital</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(App\Experiance::all() as $experiance)
                                            <tr>
                                                <td>{{$experiance->exp_year}}</td>
                                                <td>{{$experiance->exp_department}}</td>
                                                <td>{{$experiance->exp_position}}</td>
                                                <td>{{$experiance->exp_hospital}}</td>
                                                
                                            </tr>
                                             @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="single-item">
                                <div class="table-responsive">
                                    <h3 class="section-title title-bar-primary2">Appointmnet Schedules:</h3>
                                    <table class="table schedule-table">
                                        <thead>
                                            <tr>
                                                <th>Day</th>
												<th>Date</th>
                                                <th>Time</th>
                                                <th>Appointment</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
										  @if($doctor_details->status == 1)
										   @foreach($schedules as $schedule)
                                            <tr>
											
                                                <td width="5%" >
												@php
												if($schedule->day == 1){ echo "Fri";$day="Friday";}
												elseif($schedule->day == 2){ echo "Sat";$day="Saturday"; }
												elseif($schedule->day == 3){ echo "Sun";$day="Sunday";}
												elseif($schedule->day == 4){ echo "Mon";$day="Monday";}
												elseif($schedule->day == 5){ echo "Tue";$day="Tuesday";}
												elseif($schedule->day == 6){ echo "Wed";$day="Wednesday";}
												elseif($schedule->day == 7){ echo "Thu";$day="Thursday";}
												
												@endphp
												
												</td>
												<td width="30%">
												@php
												$d=strtotime("next ".$day);
                                                echo date("M d,Y", $d) . "<br>";
												@endphp  
												</td>
												
                                                <td style="width:62%">{{date("h:i A",strtotime($schedule->start_time))}} - {{date("h:i A",strtotime($schedule->end_time))}}</td>
                                                <td style="width:3%" class="schedule-btn"><a href="#" class="item-btn">Appointment</a></td>
                                            </tr>
											@endforeach
											@endif
                                            
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
							 <div class="single-item">
                                <div class="table-responsive">
                                    <h3 class="section-title title-bar-primary2">Appointmnet List<sub><span style="border-radius:50%"class="badge badge-pill badge-danger">{{$appointment_total}}</span></sub></h3>
                                    <table class="table schedule-table">
                                        <thead>
                                            <tr>
                                                <th>Day</th>
												<th>Date</th>
                                                <th>Time</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
										  @foreach( $Appointment_datas as $data)
										    <tr> 
											   <td>
											      {{$data['day']}}
										       </td>
											   <td>{{$data['date']}}</td>
											   <td>{{date("h:i A",strtotime($data['start_time']))}}-{{date("h:i A",strtotime($data['end_time']))}}</td>
											   <td>{{$data['total']}}</td>
										    </tr>
										  @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-xl-1 order-lg-1 sidebar-widget-area sidebar-break-md col-xl-3 col-lg-4 col-md-12 col-12">
                        <div class="widget widget-about-team">
                            <img src="{{asset('uploads/doctor/')}}/{{$doctor_details->image}}" class="img-fluid" alt="team">
                            <div class="item-content" style="text-align: center;">
                                <h3 class="item-title"> {{$doctor_details->doctor_name}}</h3>
                                <p class="item-ctg">{{$doctor_details->get_designation->designation}}</p>
                                <span class="item-designation">{{$doctor_details->rel_to_dept_table->department_name}}</span><hr>
								
                            </div>
                        </div>
                        <div class="widget widget-team-contact">
                            <h3 class="section-title title-bar-primary2" >Personal Info</h3>
                            <ul>
                                <li>Phone:<span>+ {{$doctor_details->phone_no}}</span></li>
                               
                                <li>E-mail:<span>{{$doctor_details->email}}</span></li>
                               
                            </ul>
                        </div>
                        <div class="widget widget-call-to-action">
                            <div class="media">
                                <img src="{{asset('frontend_assets/img/figure/figure1.png')}}" alt="figure">
                                <div class="media-body space-sm">
                                    <h4>Emergency</h4>
                                    <span>2-800-700-6200</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
