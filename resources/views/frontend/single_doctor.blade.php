@extends('layouts.frontend')
@section('content')
<!-- Inne Page Banner Area Start Here -->
<section class="inner-page-banner bg-common inner-page-top-margin" data-bg-image="{{asset('frontend_assets/img/figure/figure1.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1 style = "color:white">Single Doctor</h1>
                            <ul>
                                <li>
                                    <a href="https://iconmedicalbd.com/">Home</a>
                                </li>
                                <li>
                                    <a href="#">All Doctors</a>
                                </li>
                                <li>Dental</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Inne Page Banner Area End Here -->
       <!-- Doctors Detail Start Here -->
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
                                            @foreach(App\Education::all() as $education)
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
                                                <th>Time</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Saturday</td>
                                                <td>10.00 am - 12.00 pm</td>
                                                <td class="schedule-btn"><a href="#" class="item-btn">Appointment</a></td>
                                            </tr>
                                            <tr>
                                                <td>Monday</td>
                                                <td>05.00 pm - 09.00 pm</td>
                                                <td class="schedule-btn"><a href="#" class="item-btn">Appointment</a></td>
                                            </tr>
                                            <tr>
                                                <td>Wednesday</td>
                                                <td>07.00 pm - 10.00 pm</td>
                                                <td class="schedule-btn"><a href="#" class="item-btn">Appointment</a></td>
                                            </tr>
                                            <tr>
                                                <td>Friday</td>
                                                <td>08.00 pm - 11.00 pm</td>
                                                <td class="schedule-btn"><a href="#" class="item-btn">Appointment</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-xl-1 order-lg-1 sidebar-widget-area sidebar-break-md col-xl-3 col-lg-4 col-md-12 col-12">
                        <div class="widget widget-about-team">
                            <img src="{{asset('uploads/doctor/')}}/{{$doctor_details->image}}" class="img-fluid" alt="team">
                            <div class="item-content">
                                <h3 class="item-title">{{$doctor_details->doctor_name}}</h3>
                                <p class="item-ctg">{{$doctor_details->rel_to_dept_table->department_name}}</p>
                                <span class="item-designation">{{$doctor_details->designation}}</span>
                            </div>
                        </div>
                        <div class="widget widget-team-contact">
                            <h3 class="section-title title-bar-primary2">Personal Info</h3>
                            <ul>
                                <li>Phone:<span>+ {{$doctor_details->phone_no}}</span></li>
                                <li>Office:<span>+ {{$doctor_details->phone_no}}</span></li>
                                <li>E-mail:<span>{{$doctor_details->email}}</span></li>
                                <li class="d-flex">Social:
                                    <ul class="widget-social">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#"><i class="fab fa-skype"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="widget widget-call-to-action">
                            <div class="media">
                                <img src="{{asset('frontend_assets/img/figure/figure1.png')}}" alt="figure">
                                <div class="media-body space-sm">
                                    <h4>Emergency Cases</h4>
                                    <span>2-800-700-6200</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Doctors Detail End Here -->
@endsection