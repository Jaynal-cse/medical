@extends('layouts.frontend')

@section('breadcrumb')
   <section class="inner-page-banner bg-common inner-page-top-margin" data-bg-image="{{asset('frontend_assets/img/figure/figure1.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1>All Doctors</h1>
                            <ul>
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li>All Doctors</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection        

@section('content')
<!-- All Doctors Start Here -->
        <section class="team-wrap-layout2 bg-light-accent100">
            <div class="container">
                <div class="section-heading heading-dark text-center heading-layout4">
                    <h2>Find A Doctor</h2>
                    <p>Our find a doctor tool assists you in choosing from our diverse
                        pool of health specialists.</p>
                </div>
                <div class="isotope-wrap">
                    <div class="text-center">
                        <div class="isotope-classes-tab isotop-btn">
                            <a href="{{url('doctors')}}" class="current nav-item" data-filter="*">All</a>
                            @foreach($department as $dep)
                            <a href="{{url('department_wise_doctor')}}/{{$dep->id}}" class="nav-item" data-filter=".dental">{{$dep->department_name}}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="row featuredContainer" id="no-equal-gallery">
                        @foreach($doctors as $doctor)
                        <div class="no-equal-item col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 gastroenterology neurology">
                            <div class="team-box-layout2">
                                <div class="item-img">
                                    <img src="{{asset('uploads/doctor/')}}/{{$doctor->image}}">
                                    <ul class="item-icon">
                                        <li><a href="single-doctor.html"><i class="fas fa-plus"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item-content">
                                    <h3 class="item-title"><a href="single-doctor.html">{{$doctor->doctor_name}}</a></h3>
                                    <p>{{$doctor->rel_to_dept_table->department_name?? ''}}</p>
                                </div>
                                <div class="item-schedule">
                                    <ul> 
									   @foreach(App\Schedule::where('doctor_id', $doctor->id)->where('status',1)->get()  as $schedule)
                                        <li>
										    @php   
											   if( $schedule->day == 1){ $day="Friday"; }
											   elseif($schedule->day == 2){$day="Saturday";}
											   elseif($schedule->day == 3){$day="Sunday";}
											   elseif($schedule->day == 4){$day="Monday";}
											   elseif($schedule->day == 5){$day="Tuesday";}
											   elseif($schedule->day == 6){$day="Wednesday";}
											   elseif($schedule->day == 7){$day="Thursday";}
											   $d = strtotime('Next ' .$day);
											   echo date('D',$d);
										
										    @endphp
											<br><span>{{date('h:i A',strtotime($schedule->start_time))}} - {{date('h:i A',strtotime($schedule->end_time))}}</span>
										</li>
                                       
                                       @endforeach
                                    </ul>
                                    <a href="#" class="item-btn"> MAKE AN APPOINTMENT </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- All Doctors End Here -->

@endsection