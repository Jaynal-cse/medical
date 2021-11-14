
@extends('layouts.frontend')
@push('css')



@endpush
@section('content')
<!-- Slider Area Start Here -->
<div class="slider-area slider-layout1 bg-light-primary slider-top-margin">
    <div class="bend niceties preview-1">

        <div id="ensign-nivoslider-1" class="slides">
            @foreach($banners as $key => $banner)
                <img src="{{ asset('uploads/banner_photo/' . $banner->image) }}" class="img-responsive" alt="slider" title="#slider-direction-{{ $banner->id }}" />
            @endforeach
        </div>

        @foreach($banners as $key => $banner)
            <div id="slider-direction-{{ $banner->id }}" class="t-cn slider-direction">
                <div class="slider-content s-tb slide-1">
                    <div class="text-left title-container s-tb-c">
                        <div class="container">
                            <div class="slider-big-text padding-right">{{ $banner->heading }}</div>
                            <p class="slider-paragraph padding-right">{{ $banner->paragraph }}</p>
                            <div class="slider-btn-area">
                                <a href="#" class="item-btn {{ $banner->button_color }}">{{ $banner->button_text }}<i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
<!-- Slider Area End Here -->
<!-- About Area Start Here -->
<section class="about-wrap-layout1" data-bg-image="{{asset('frontend_assets/img/figure/figure7.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="about-box-layout1 order-xl-2 col-xl-5 col-12">
                <div class="item-content">
                    @php
                       $title = App\Abouttitle::where('status', '1')->first();
                    @endphp
                    <h2 class="item-title">{{$title->about_title}}</h2>
                    <div class="sub-title">
                        {{$title->about_sub_title}}
                    </div>
                    <p>{{$title->about_desp}}</p>
                    <div class="sub-title text-primary">
                        {{$title->designation}}
                    </div>
                    <!--<img src="{{asset('frontend_assets/img/about/sign1.png')}}" alt="sign" class="img-fluid">-->
                </div>
            </div>
            <div class="about-box-layout2 order-xl-3 col-xl-4 col-lg-7 col-12">
                <ul>
                    <li><a href="{{url('appointments')}}"><i class="far fa-calendar-alt"></i>Request Appoinment</a></li>
                    <li><a href="{{url('doctors')}}"><i class="far fa-user"></i>Find Doctors</a></li>
                    <li><a href="#Emergency_Contact"><i class="fas fa-map-marker-alt"></i>Find Locations</a></li>
                    <li><a href="#Emergency_Contact"><i class="fas fa-phone"></i>Emergency Contact</a></li>
                </ul>
            </div>
            <div class="about-box-layout2 order-xl-1 col-xl-3 col-lg-5 col-12">
                <div class="item-img">
                    <img src="{{asset('uploads/about_title/')}}/{{$title->about_image}}" alt="about" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Area End Here -->
<!-- Departments Area Start Here -->
      <section class="departments-wrap-layout7 bg-light-secondary100">
            <div class="container menu-list-wrapper">
                @php
                    $service_heading = App\FrontendSection5DepartmentHeading::where('status', 1)->get();
                    $our_service     = App\FrontendSection5Department::where('status', 1)->get();
                @endphp

                @foreach($service_heading as $key=> $service_headings)
                <div class="section-heading heading-dark text-center heading-layout1">
                    <h2>{{$service_headings->heading}}</h2>
                    <p>{{$service_headings->sub_heading}}</p>
                </div>
                @endforeach
                <div class="row menu-list">
                    
                    @foreach($department as $key=> $dept)
                    <div class="col-xl-3 col-lg-6 col-md-6 col-12 menu-item {{ $key > 7 ? 'more-heading-items' : '' }}">
                        <div class="departments-box-layout1">
                            <div class="item-img">
                                <img src="{{asset('uploads/frontend_department/')}}/{{$dept->image}}" alt="dept_img" class="img-fluid">
                                <div class="item-btn-wrap">
                                    <a href="{{url('single_department')}}/{{$dept->id}}" class="item-btn">{{$dept->in_picture_button_text}}</a>
                                </div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">
                                    <a href="{{url('single_department')}}/{{$dept->id}}">{{$dept->service_name}}</a>
                                </h3>
                                <ul class="department-info">
                                    <li>
                                        <i class="flaticon-doctor"></i>
                                        <span>
                                         {{App\Doctor::where('department',$dept->id)->count()}}
                                        </span>{{$dept->sub_title}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div onclick="collapseHeadingItems(this)" class="loadmore loadmore-layout1 margin-t-20" data-count="4">
                    <a href="#" class="item-btn">More Departments</a>
                </div>
            </div>
        </section>
        <!-- Departments Area End Here -->
<!-- Featured Area Start Here -->
<section class="features-wrap-layout1">
    <div class="features-box-layout1 d-lg-flex bg-primary100">
        <div class="item-inner-wrapper">
            <div class="item-content d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="item-content-inner content-light">
                                <h2 class="item-title">Choose the best for your health</h2>
                                <p>Dwisi enim ad minim veniam, quis laore nostrud exerci tation ulm hedi corper
                                    turet suscipit lobortis.</p>
                                <ul class="list-item">
                                    <li>Free Consultation</li>
                                    <li>Quality Doctors</li>
                                    <li>Professional Experts</li>
                                    <li>Affordable Price</li>
                                    <li>24/7 Opened</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item-inner-wrapper">
            <img src="{{asset('frontend_assets/img/figure/figure8.jpg')}}" class="img-responsive" alt="figure">
        </div>
    </div>
    <div class="features-box-layout1 d-lg-flex flex-lg-row-reverse">
        <div class="item-inner-wrapper">
            <div class="item-content d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-end">
                         <div class="col-lg-6 col-sm-12 col-12">
                            @php
                            $progress = App\Percentice::where('status', 1)->first()
                            @endphp
                            <div class="item-content-inner inner-title-dark">
                                <h2 class="item-title">{{$progress->title?? ''}}</h2>
                                <p>
                                    {{$progress->description?? ''}}
                                </p>
                                <div class="skill-layout1">
                                    <div class="progress">
                                        <div class="lead">{{$progress->progress_name_one?? ''}}</div>
                                        <div style="width: {{$progress->percent_one?? ''}}%; visibility: visible; animation-duration: 1.5s; animation-delay: 0.4s;"
                                            data-progress="95%" class="progress-bar progress-bar-striped wow fadeInLeft animated">
                                            <span>{{$progress->percent_one?? ''}} %</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="lead">{{$progress->progress_name_two?? ''}}</div>
                                        <div style="width: {{$progress->percent_two?? ''}}%; visibility: visible; animation-duration: 1.5s; animation-delay: 0.4s;"
                                            data-progress="95%" class="progress-bar progress-bar-striped wow fadeInLeft animated">
                                            <span>{{$progress->percent_two?? ''}} %</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="lead">{{$progress->progress_name_three?? ''}}</div>
                                        <div style="width: {{$progress->percent_three?? ''}}%; visibility: visible; animation-duration: 1.5s; animation-delay: 0.6s;"
                                            data-progress="85%" class="progress-bar progress-bar-striped wow fadeInLeft animated">
                                            <span>{{$progress->percent_three?? ''}} %</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="lead">{{$progress->progress_name_four?? ''}}</div>
                                        <div style="width: {{$progress->percent_four?? ''}}%; visibility: visible; animation-duration: 1.5s; animation-delay: 0.8s;"
                                            data-progress="99%" class="progress-bar progress-bar-striped wow fadeInLeft animated">
                                            <span>{{$progress->percent_four?? ''}} %</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item-inner-wrapper">
            <img src="{{asset('uploads/progress/')}}/{{$progress->image}}" class="img-responsive" alt="figure">
        </div>
    </div>
</section>
<!-- Featured Area End Here -->
<!-- Brand Area Start Here -->
@php
    $tripple_logo = App\FrontendTrippleLogo::where('status', 1)->get();
@endphp
<section class="brand-wrap-layout1 bg-primary100">
    <div class="container">
        <div class="row">
            @foreach($tripple_logo as $key=> $tripple_logos)
            <div class="brand-box-layout1 col-xl-7 col-lg-6 col-md-12 col-12">
                <h2 class="item-title">{{$tripple_logos->heading}}</h2>
            </div>
            <div class="brand-box-layout2 col-xl-5 col-lg-6 col-md-12 col-12">
                <img src="{{asset('frontend_assets/img/brand/brand-bg1.png')}}" alt="brand" class="img-fluid d-none d-lg-block">
                <ul>
                    <li>
                        <img src="{{asset('uploads/frontend_tripple_logo/')}}/{{$tripple_logos->logo1}}" height="132" width="133" alt="brand" class="img-fluid">
                    </li>
                    <li>
                        <img src="{{asset('uploads/frontend_tripple_logo/')}}/{{$tripple_logos->logo2}}" height="132" width="133" alt="brand" class="img-fluid">
                    </li>
                    <li>
                        <img src="{{asset('uploads/frontend_tripple_logo/')}}/{{$tripple_logos->logo3}}" height="132" width="133" alt="brand" class="img-fluid">
                    </li>
                </ul>
            </div>
            @endforeach
            <!--    <h2 class="item-title">We Are Certified Award Winning Hospital.</h2>-->
            <!--</div>-->
            <!--<div class="brand-box-layout2 col-xl-5 col-lg-6 col-md-12 col-12">-->
            <!--    <img src="{{asset('frontend_assets/img/brand/brand-bg1.png')}}" alt="brand" class="img-fluid d-none d-lg-block">-->
            <!--    <ul>-->
            <!--        <li>-->
            <!--            <img src="{{asset('frontend_assets/img/brand/brand1.png')}}" alt="brand" class="img-fluid">-->
            <!--        </li>-->
            <!--        <li>-->
            <!--            <img src="{{asset('frontend_assets/img/brand/brand2.png')}}" alt="brand" class="img-fluid">-->
            <!--        </li>-->
            <!--        <li>-->
            <!--            <img src="{{asset('frontend_assets/img/brand/brand3.png')}}" alt="brand" class="img-fluid">-->
            <!--        </li>-->
            <!--    </ul>-->
            <!--</div>-->
        </div>
    </div>
</section>
<!-- Brand Area End Here -->
<!-- Team Area Start Here -->
@php
    $our_team_heading = App\FrontendOurTeam::where('status', 1)->get();
@endphp
<section class="team-wrap-layout1 bg-light-secondary100">
    <img class="left-img img-fluid" src="{{asset('frontend_assets/img/figure/figure4.png')}}" alt="figure">
    <img class="right-img img-fluid" src="{{asset('frontend_assets/img/figure/figure5.png')}}" alt="figure">
    <div class="container">
        <div class="section-heading heading-dark text-left heading-layout1">
            @foreach($our_team_heading as $key=> $our_team_headings)
            <h2>{{$our_team_headings->heading}}</h2>
            <p>{{$our_team_headings->sub_heading}}</p>
            @endforeach
            <div id="owl-nav2" class="owl-nav-layout1">
                <span class="rt-prev">
                    <i class="fas fa-chevron-left"></i>
                </span>
                <span class="rt-next">
                    <i class="fas fa-chevron-right"></i>
                </span>
            </div>
        </div>
        <div class="rc-carousel nav-control-layout2" data-loop="true" data-items="4" data-margin="30"
            data-autoplay="false" data-autoplay-timeout="5000" data-custom-nav="#owl-nav2" data-smart-speed="2000"
            data-dots="false" data-nav="false" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true"
            data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="false"
            data-r-small="2" data-r-small-nav="false" data-r-small-dots="false" data-r-medium="3"
            data-r-medium-nav="false" data-r-medium-dots="false" data-r-large="3" data-r-large-nav="false"
            data-r-large-dots="false" data-r-extra-large="4" data-r-extra-large-nav="false"
            data-r-extra-large-dots="false">
            @foreach($doctor as $doctors)
            <div class="team-box-layout2">
                <div class="item-img">
                    <img src="{{asset('uploads/doctor/')}}/{{$doctors->image}}" alt="img" class="img-fluid rounded-circle">
                    <ul class="item-icon">
                        <li>
                            <a href="{{route('doctor.show',$doctors->doctor_slug)}}">
                                <i class="fas fa-plus"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="item-content">
                    <h3 class="item-title">
                        <a href="{{route('doctor.show',$doctors->doctor_slug)}}">{{$doctors->doctor_name}}</a>
                    </h3>
                    <p>{{$doctors->designation}}</p>
                </div>
                <div class="item-schedule">
                   @foreach($schedule as $time)
                      @if($time->doctor_name == $doctors->id)
                    <ul>
                        <li>{{$time->day}} :
                            <span>{{$time->start_time}} : {{$time->end_time}}</span>
                        </li>
                    </ul>
                        @else

                      @endif
                    @endforeach
                    <a href="{{url('appointments')}}" class="item-btn">MAKE AN APPOINTMENT</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Team Area End Here -->
<!-- Schedule Area Start Here -->
@php
    $doctor_schedule_heading = App\FrontendDoctorSchedule::where('status', 1)->get();
@endphp
<section class="class-schedule1">
    <div class="container">
        <div class="section-heading heading-dark text-center heading-layout1">
            @foreach($doctor_schedule_heading as $key=> $doctor_schedule_headings)
            <h2>{{$doctor_schedule_headings->heading}}</h2>
            <p>{{$doctor_schedule_headings->sub_heading}}</p>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="class-schedule-wrap1">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="schedule-time-heading">Time</div>
                                    </th>
                                    <td>
                                        <div class="schedule-day-heading">Saturday</div>
                                    </td>
                                    <td>
                                        <div class="schedule-day-heading">Sunday</div>
                                    </td>
                                    <td>
                                        <div class="schedule-day-heading">Monday</div>
                                    </td>
                                    <td>
                                        <div class="schedule-day-heading">Tuesday</div>
                                    </td>
                                    <td>
                                        <div class="schedule-day-heading">Wednesday</div>
                                    </td>
                                    <td>
                                        <div class="schedule-day-heading">Thursday</div>
                                    </td>
                                    <td>
                                        <div class="schedule-day-heading">Friday</div>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <div class="schedule-time-wrapper">08.00am</div>
                                    </th>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Saturday')->get() as $times)
                                        @if($times->start_time == '08.00am')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Sunday')->get() as $times)
                                        @if($times->start_time == '08.00am')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Monday')->get() as $times)
                                        @if($times->start_time == '08.00am')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Tuesday')->get() as $times)
                                        @if($times->start_time == '08.00am')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Wednesday')->get() as $times)
                                        @if($times->start_time == '08.00am')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Thursday')->get() as $times)
                                        @if($times->start_time == '08.00am')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Friday')->get() as $times)
                                        @if($times->start_time == '08.00am')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="schedule-time-wrapper">10.00am</div>
                                    </th>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Saturday')->get() as $times)
                                        @if($times->start_time == '10.00am')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Sunday')->get() as $times)
                                        @if($times->start_time == '10.00am')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Monday')->get() as $times)
                                        @if($times->start_time == '10.00am')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Tuesday')->get() as $times)
                                        @if($times->start_time == '10.00am')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Wednesday')->get() as $times)
                                        @if($times->start_time == '10.00am')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Thursday')->get() as $times)
                                        @if($times->start_time == '10.00am')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Friday')->get() as $times)
                                        @if($times->start_time == '10.00am')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="schedule-time-wrapper">12.00pm</div>
                                    </th>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Saturday')->get() as $times)
                                        @if($times->start_time == '12.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Sunday')->get() as $times)
                                        @if($times->start_time == '12.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Monday')->get() as $times)
                                        @if($times->start_time == '12.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Tuesday')->get() as $times)
                                        @if($times->start_time == '12.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Wednesday')->get() as $times)
                                        @if($times->start_time == '12.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Thursday')->get() as $times)
                                        @if($times->start_time == '12.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Friday')->get() as $times)
                                        @if($times->start_time == '12.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="schedule-time-wrapper">02.00pm</div>
                                    </th>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Saturday')->get() as $times)
                                        @if($times->start_time == '02.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Sunday')->get() as $times)
                                        @if($times->start_time == '02.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Monday')->get() as $times)
                                        @if($times->start_time == '02.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Tuesday')->get() as $times)
                                        @if($times->start_time == '02.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Wednesday')->get() as $times)
                                        @if($times->start_time == '02.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Thursday')->get() as $times)
                                        @if($times->start_time == '02.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Friday')->get() as $times)
                                        @if($times->start_time == '02.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="schedule-time-wrapper">04.00pm</div>
                                    </th>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Saturday')->get() as $times)
                                        @if($times->start_time == '04.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Sunday')->get() as $times)
                                        @if($times->start_time == '04.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Monday')->get() as $times)
                                        @if($times->start_time == '04.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Tuesday')->get() as $times)
                                        @if($times->start_time == '04.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Wednesday')->get() as $times)
                                        @if($times->start_time == '04.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Thursday')->get() as $times)
                                        @if($times->start_time == '04.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Friday')->get() as $times)
                                        @if($times->start_time == '04.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="schedule-time-wrapper">06.00pm</div>
                                    </th>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Saturday')->get() as $times)
                                        @if($times->start_time == '06.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Sunday')->get() as $times)
                                        @if($times->start_time == '06.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Monday')->get() as $times)
                                        @if($times->start_time == '06.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Tuesday')->get() as $times)
                                        @if($times->start_time == '06.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Wednesday')->get() as $times)
                                        @if($times->start_time == '06.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Thursday')->get() as $times)
                                        @if($times->start_time == '06.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Schedule::where('day', 'Friday')->get() as $times)
                                        @if($times->start_time == '06.00pm')
                                        <div class="schedule-item-wrapper">
                                            <div class="media">
                                                <div class="item-img">
                                                    <img src="{{asset('frontend_assets/img/team/team7.png')}}" alt="team" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="title">Steven Smith</h3>
                                                    <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}} Department</div>
                                                    <a href="{{route('doctor.show',$times->rel_to_doctor_table->doctor_slug)}}" class="item-btn btn-fill size-xs radius-4">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                            <div class="item-ctg">{{$times->rel_to_department_table->department_name?? ''}}</div>
                                            <div class="item-time">{{$times->start_time?? ''}}- {{$times->end_time?? ''}}</div>
                                            <div class="item-team">{{$times->rel_to_doctor_table->doctor_name?? ''}}</div>
                                        </div>
                                        @else

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Schedule Area End Here -->

<!-- Progress Area Start Here -->
<section class="progress-wrap-layout1">
            <div class="container">
                <div class="row">
                    <div class="progress-box-layout1 col-md-4">
                        <div class="inner-item">
                            <div class="item-icon">
                                <i class="flaticon-first-aid-kit"></i>
                            </div>
                            <div class="item-content">
                                <div class="counting-text counter" data-num="59">59</div>
                                <p>Health Sections</p>
                            </div>
                        </div>
                    </div>
                    <div class="progress-box-layout1 col-md-4">
                        <div class="inner-item">
                            <div class="item-icon">
                                <i class="flaticon-transport-1"></i>
                            </div>
                            <div class="item-content">
                                <div class="counting-text counter" data-num="4709">4709</div>
                                <p>Happy Patients</p>
                            </div>
                        </div>
                    </div>
                    <div class="progress-box-layout1 col-md-4">
                        <div class="inner-item">
                            <div class="item-icon">
                                <i class="flaticon-doctor"></i>
                            </div>
                            <div class="item-content">
                                <div class="counting-text counter" data-num="128">128</div>
                                <p>Quality Doctors</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Progress Area End Here -->
<!-- Blog and Testimonial Area Start Here -->
<section class="both-side-half-bg">
    <div class="single-item">
        <div class="section-heading heading-dark heading-layout5">
            <h2>Our Latest News</h2>
        </div>
        @foreach($latest_news as $news)
        <div class="blog-box-layout1">
            <h3 class="item-title"><a href="{{url('latest_news')}}/{{$news->id}}">{{substr($news->blog_title,0,40)}}..</a></h3>
            <ul class="entry-meta">
                <li><i class="far fa-calendar-alt"></i>{{$news->created_at->format('d M Y')}}</li>
                <li><i class="fas fa-user"></i>Posted by <a href="#">admin</a></li>
            </ul>
        </div>
        @endforeach
        <a class="blog-btn" href="https://iconmedicalbd.com/news">SEE ALL NEWS<i class="fas fa-chevron-right"></i></a>
    </div>
    <div class="single-item bg-common" data-bg-image="{{asset('frontend_assets/img/figure/figure9.png')}}">
        <div class="section-heading heading-light heading-layout5">
            <h2>Testimonials</h2>
            <div id="owl-nav3" class="owl-nav-layout2">
                <span class="rt-prev">
                    <i class="fas fa-chevron-left"></i>
                </span>
                <span class="rt-next">
                    <i class="fas fa-chevron-right"></i>
                </span>
            </div>
        </div>
        <div class="rc-carousel nav-control-layout7" data-loop="true" data-items="4" data-margin="30"
            data-autoplay="false" data-autoplay-timeout="5000" data-custom-nav="#owl-nav3" data-smart-speed="2000"
            data-dots="false" data-nav="false" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true"
            data-r-x-small-dots="false" data-r-x-medium="1" data-r-x-medium-nav="false" data-r-x-medium-dots="false"
            data-r-small="1" data-r-small-nav="false" data-r-small-dots="false" data-r-medium="1"
            data-r-medium-nav="false" data-r-medium-dots="false" data-r-large="1" data-r-large-nav="false"
            data-r-large-dots="false" data-r-extra-large="1" data-r-extra-large-nav="false"
            data-r-extra-large-dots="false">
            <div class="item">
                <div class="testmonial-box-layout2">
                    <h4 class="item-title">Josef Ardogan <span>/ CEO Artland</span></h4>
                    <ul class="rating">
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                    </ul>
                    <p>"Eodem modo typi, qui nunc nobis videntur parum clar fiant sollemnes in futurum. Lorem
                        ipsum dolor sit amet tetuer adipiscing elit, sed diam nonu."</p>
                </div>
                <div class="testmonial-box-layout2">
                    <h4 class="item-title">Josef Ardogan <span>/ CEO Artland</span></h4>
                    <ul class="rating">
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                    </ul>
                    <p>"Eodem modo typi, qui nunc nobis videntur parum clar fiant sollemnes in futurum."</p>
                </div>
            </div>
            <div class="item">
                <div class="testmonial-box-layout2">
                    <h4 class="item-title">Josef Ardogan <span>/ CEO Artland</span></h4>
                    <ul class="rating">
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                    </ul>
                    <p>"Eodem modo typi, qui nunc nobis videntur parum clar fiant sollemnes in futurum. Lorem
                        ipsum dolor sit amet tetuer adipiscing elit, sed diam nonu."</p>
                </div>
                <div class="testmonial-box-layout2">
                    <h4 class="item-title">Josef Ardogan <span>/ CEO Artland</span></h4>
                    <ul class="rating">
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                    </ul>
                    <p>"Eodem modo typi, qui nunc nobis videntur parum clar fiant sollemnes in futurum."</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog and Testimonial Area End Here -->
<!-- Call to Action Area Start Here -->
@php
$footerUperParts = App\FooterUperPart::where('status', 0)->get();
@endphp

@foreach($footerUperParts as $key=> $footerUperPart)

<section class="call-to-action-wrap-layout4" id="Emergency_Contact" data-spy="scroll" data-offset="500">
    <div class="item-img">
        <img src="{{asset('uploads/footer_upper_part/')}}/{{$footerUperPart->image}}" alt="figure" class="img-fluid">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-8 col-md-8 col-12">
                <div class="call-to-action-box-layout4">
                    <h2 class="item-title">{{$footerUperPart->paragraph}}</h2>
                    <div class="call-to-action-phone">
                        <a href="tel:+12344092888"><i class="{{$footerUperPart->icon}}"></i>{{$footerUperPart->phone}}</a>
                    </div>
                    <div class="call-to-action-btn">
                        <a target="_blank" href="{{ $footerUperPart->button_link }}" class="{{$footerUperPart->button_color}}">{{$footerUperPart->button_text}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
<!--<section class="call-to-action-wrap-layout4">-->
<!--    <div class="item-img">-->
<!--        <img src="{{asset('frontend_assets/img/figure/figure7.png')}}" alt="figure" class="img-fluid">-->
<!--    </div>-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-xl-12 col-lg-8 col-md-8 col-12">-->
<!--                <div class="call-to-action-box-layout4">-->
<!--                    <h2 class="item-title">We Provide the highest level of satisfaction care &amp; services to-->
<!--                        our patients.</h2>-->
<!--                    <div class="call-to-action-phone">-->
<!--                        <a href="tel:+12344092888"><i class="fas fa-phone"></i>+123 44092 888</a>-->
<!--                    </div>-->
<!--                    <div class="call-to-action-btn">-->
<!--                        <a href="#" class="item-btn">Make an Appointment</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- Call to Action End Here -->

@endsection

@section('js')
    <script>

        $(document).ready(function() {
            $('.more-heading-items').hide()
        })

        function collapseHeadingItems(object)
        {
            if($(object).find('a').text() == 'More Departments') {
                $('.more-heading-items').show()
            } else {
                // $('.more-heading-items').hide()
            }
        }
    </script>
@endsection
