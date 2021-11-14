@extends('layouts.frontend')


@section('breadcrumb')
<!-- Inne Page Banner Area Start Here -->
<section class="inner-page-banner bg-common inner-page-top-margin" data-bg-image="{{asset('frontend_assets/img/figure/figure1.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-area">
                    <h1>Single Department</h1>
                    <ul>
                        <li>
                            <a href="https://iconmedicalbd.com/">Home</a>
                        </li>
                        <li>
                            <a href="#">Single Department Details</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Inne Page Banner Area End Here -->
@endsection

@section('content')
<!-- Single Department Start Here -->
        <section class="single-department-wrap-layout1 bg-light-primary100">
            <div class="container">
                <div class="row" id="no-equal-gallery">
                    <div class="sidebar-widget-area sidebar-break-md col-xl-3 col-lg-4 col-12 no-equal-item">
                        <div class="widget widget-department-info">
                            <h3 class="section-title title-bar-primary">All Departments</h3>
                            <ul class="nav nav-tabs tab-nav-list">
                              @foreach($depts as $dept)
                                <li class="nav-item">
                                    <a href="{{url('single_department')}}/{{$dept->id}}">{{$dept->department_name}}</a>
                                </li>
                               @endforeach 
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-12 no-equal-item">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active show" id="department1">
                                <div class="single-departments-box-layout1">
                                    <div class="single-departments-img">
                                        <img alt="single" src="{{asset('uploads/department/')}}/{{$department->photo}}">
                                    </div>
                                    <div class="item-content">
                                        <div class="item-content-wrap">
                                            <h3 class="item-title title-bar-primary5">{{$department->department_name}} Department</h3>
                                            <span class="sub-title">
                                                {{$department->description}}
                                            </span>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc iquam class bibendum non mattis
                                                fusceut perspiciatis undeuisque. </p>
                                            <h3 class="item-title">Advantage:</h3>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc.</p>
                                            <ul class="department-info">
                                                <li>Keep Patients First Nulla lobortis.</li>
                                                <li>Keep Everyone Safe.</li>
                                                <li>Work Together Quisque pretium quam.</li>
                                                <li>Curabitur semper enim id accumsan.</li>
                                            </ul>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc.Aliquam class bibendum mattis
                                                fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                                mauris et adipisc.</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="item-cost">
                                                    <h3 class="item-title title-bar-primary7">Our Pricing Plan</h3>
                                                    <ul>
                                                        <li>Dental Implant<span>$45.00</span></li>
                                                        <li>Another Feature<span>$25.00</span></li>
                                                        <li>Another Major Feature<span>$25.00</span></li>
                                                        <li>Emergency Care<span>$25.00</span></li>
                                                        <li>Prescription Drugs<span>$85.00</span></li>
                                                        <li>Specialist Visits<span>$99.00</span></li>
                                                        <li>Rheumatology<span>$89.00</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-specialist-wrap">
                                            <h3 class="item-title title-bar-primary7">Meet Our Doctors</h3>
                                        </div>
                                        <div class="row">
                                            @foreach($doctors as $doct)
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="{{asset('frontend_assets/img/team/team32.png')}}" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">{{$doct->first_name}}</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="department2">
                                <div class="single-departments-box-layout1">
                                    <div class="single-departments-img">
                                        <img alt="single" src="img/department/department22.jpg">
                                    </div>
                                    <div class="item-content">
                                        <div class="item-content-wrap">
                                            <h3 class="item-title title-bar-primary5">Dental Department</h3>
                                            <span class="sub-title">Dorem ipsum dolor sit amet, consectetuer adipiscing
                                                elit, sed diam nonummy nibh
                                                erty cidunt utter laoreet dolore magna aliquam erat volutpanostrud
                                                exercier.</span>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc iquam class bibendum non mattis
                                                fusceut perspiciatis undeuisque. </p>
                                            <h3 class="item-title">Advantage:</h3>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc.
                                            </p>
                                            <ul class="department-info">
                                                <li>Keep Patients First Nulla lobortis.</li>
                                                <li>Keep Everyone Safe.</li>
                                                <li>Work Together Quisque pretium quam.</li>
                                                <li>Curabitur semper enim id accumsan.</li>
                                            </ul>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc.Aliquam class bibendum mattis
                                                fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                                mauris et adipisc.</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="item-cost">
                                                    <h3 class="item-title title-bar-primary7">Our Pricing Plan</h3>
                                                    <ul>
                                                        <li>Dental Implant<span>$45.00</span></li>
                                                        <li>Another Feature<span>$25.00</span></li>
                                                        <li>Another Major Feature<span>$25.00</span></li>
                                                        <li>Emergency Care<span>$25.00</span></li>
                                                        <li>Prescription Drugs<span>$85.00</span></li>
                                                        <li>Specialist Visits<span>$99.00</span></li>
                                                        <li>Rheumatology<span>$89.00</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-specialist-wrap">
                                            <h3 class="item-title title-bar-primary7">Meet Our Doctors</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team29.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    David Roy</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team30.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Zinia Zara</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team31.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Julea</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team32.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Steven Smith</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="department3">
                                <div class="single-departments-box-layout1">
                                    <div class="single-departments-img">
                                        <img alt="single" src="img/department/department23.jpg">
                                    </div>
                                    <div class="item-content">
                                        <div class="item-content-wrap">
                                            <h3 class="item-title title-bar-primary5">Hepatology Department</h3>
                                            <span class="sub-title">Dorem ipsum dolor sit amet, consectetuer adipiscing
                                                elit, sed diam nonummy nibh erty cidunt utter laoreet dolore magna
                                                aliquam erat volutpanostrud exercier.</span>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc iquam class bibendum non mattis
                                                fusceut perspiciatis undeuisque. </p>
                                            <h3 class="item-title">Advantage:</h3>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc.
                                            </p>
                                            <ul class="department-info">
                                                <li>Keep Patients First Nulla lobortis.</li>
                                                <li>Keep Everyone Safe.</li>
                                                <li>Work Together Quisque pretium quam.</li>
                                                <li>Curabitur semper enim id accumsan.</li>
                                            </ul>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc.Aliquam class bibendum mattis
                                                fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                                mauris et adipisc.</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="item-cost">
                                                    <h3 class="item-title title-bar-primary7">Our Pricing Plan</h3>
                                                    <ul>
                                                        <li>Dental Implant<span>$45.00</span></li>
                                                        <li>Another Feature<span>$25.00</span></li>
                                                        <li>Another Major Feature<span>$25.00</span></li>
                                                        <li>Emergency Care<span>$25.00</span></li>
                                                        <li>Prescription Drugs<span>$85.00</span></li>
                                                        <li>Specialist Visits<span>$99.00</span></li>
                                                        <li>Rheumatology<span>$89.00</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-specialist-wrap">
                                            <h3 class="item-title title-bar-primary7">Meet Our Doctors</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team29.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    David Roy</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team30.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Zinia Zara</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team31.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Julea</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team32.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Steven Smith</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="department4">
                                <div class="single-departments-box-layout1">
                                    <div class="single-departments-img">
                                        <img alt="single" src="img/department/department24.jpg">
                                    </div>
                                    <div class="item-content">
                                        <div class="item-content-wrap">
                                            <h3 class="item-title title-bar-primary5">Gastroenterology Department</h3>
                                            <span class="sub-title">Dorem ipsum dolor sit amet, consectetuer adipiscing
                                                elit, sed diam nonummy nibh
                                                erty cidunt utter laoreet dolore magna aliquam erat volutpanostrud
                                                exercier.</span>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc iquam class bibendum non mattis
                                                fusceut perspiciatis undeuisque. </p>
                                            <h3 class="item-title">Advantage:</h3>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc.
                                            </p>
                                            <ul class="department-info">
                                                <li>Keep Patients First Nulla lobortis.</li>
                                                <li>Keep Everyone Safe.</li>
                                                <li>Work Together Quisque pretium quam.</li>
                                                <li>Curabitur semper enim id accumsan.</li>
                                            </ul>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc.Aliquam class bibendum mattis
                                                fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                                mauris et adipisc.</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="item-cost">
                                                    <h3 class="item-title title-bar-primary7">Our Pricing Plan</h3>
                                                    <ul>
                                                        <li>Dental Implant<span>$45.00</span></li>
                                                        <li>Another Feature<span>$25.00</span></li>
                                                        <li>Another Major Feature<span>$25.00</span></li>
                                                        <li>Emergency Care<span>$25.00</span></li>
                                                        <li>Prescription Drugs<span>$85.00</span></li>
                                                        <li>Specialist Visits<span>$99.00</span></li>
                                                        <li>Rheumatology<span>$89.00</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-specialist-wrap">
                                            <h3 class="item-title title-bar-primary7">Meet Our Doctors</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team29.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    David Roy</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team30.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Zinia Zara</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team31.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Julea</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team32.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Steven Smith</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="department5">
                                <div class="single-departments-box-layout1">
                                    <div class="single-departments-img">
                                        <img alt="single" src="img/department/department25.jpg">
                                    </div>
                                    <div class="item-content">
                                        <div class="item-content-wrap">
                                            <h3 class="item-title title-bar-primary5">Ophthalmology Department</h3>
                                            <span class="sub-title">Dorem ipsum dolor sit amet, consectetuer adipiscing
                                                elit, sed diam nonummy nibh
                                                erty cidunt utter laoreet dolore magna aliquam erat volutpanostrud
                                                exercier.</span>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc iquam class bibendum non mattis
                                                fusceut perspiciatis undeuisque. </p>
                                            <h3 class="item-title">Advantage:</h3>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc.
                                            </p>
                                            <ul class="department-info">
                                                <li>Keep Patients First Nulla lobortis.</li>
                                                <li>Keep Everyone Safe.</li>
                                                <li>Work Together Quisque pretium quam.</li>
                                                <li>Curabitur semper enim id accumsan.</li>
                                            </ul>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc.Aliquam class bibendum mattis
                                                fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                                mauris et adipisc.</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="item-cost">
                                                    <h3 class="item-title title-bar-primary7">Our Pricing Plan</h3>
                                                    <ul>
                                                        <li>Dental Implant<span>$45.00</span></li>
                                                        <li>Another Feature<span>$25.00</span></li>
                                                        <li>Another Major Feature<span>$25.00</span></li>
                                                        <li>Emergency Care<span>$25.00</span></li>
                                                        <li>Prescription Drugs<span>$85.00</span></li>
                                                        <li>Specialist Visits<span>$99.00</span></li>
                                                        <li>Rheumatology<span>$89.00</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-specialist-wrap">
                                            <h3 class="item-title title-bar-primary7">Meet Our Doctors</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team29.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    David Roy</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team30.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Zinia Zara</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team31.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Julea</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team32.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Steven Smith</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="department6">
                                <div class="single-departments-box-layout1">
                                    <div class="single-departments-img">
                                        <img alt="single" src="img/department/department27.jpg">
                                    </div>
                                    <div class="item-content">
                                        <div class="item-content-wrap">
                                            <h3 class="item-title title-bar-primary5">Orthopedics Department</h3>
                                            <span class="sub-title">Dorem ipsum dolor sit amet, consectetuer adipiscing
                                                elit, sed diam nonummy nibh
                                                erty cidunt utter laoreet dolore magna aliquam erat volutpanostrud
                                                exercier.</span>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc iquam class bibendum non mattis
                                                fusceut perspiciatis undeuisque. </p>
                                            <h3 class="item-title">Advantage:</h3>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc.
                                            </p>
                                            <ul class="department-info">
                                                <li>Keep Patients First Nulla lobortis.</li>
                                                <li>Keep Everyone Safe.</li>
                                                <li>Work Together Quisque pretium quam.</li>
                                                <li>Curabitur semper enim id accumsan.</li>
                                            </ul>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc.Aliquam class bibendum mattis
                                                fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                                mauris et adipisc.</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="item-cost">
                                                    <h3 class="item-title title-bar-primary7">Our Pricing Plan</h3>
                                                    <ul>
                                                        <li>Dental Implant<span>$45.00</span></li>
                                                        <li>Another Feature<span>$25.00</span></li>
                                                        <li>Another Major Feature<span>$25.00</span></li>
                                                        <li>Emergency Care<span>$25.00</span></li>
                                                        <li>Prescription Drugs<span>$85.00</span></li>
                                                        <li>Specialist Visits<span>$99.00</span></li>
                                                        <li>Rheumatology<span>$89.00</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-specialist-wrap">
                                            <h3 class="item-title title-bar-primary7">Meet Our Doctors</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team29.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    David Roy</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team30.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Zinia Zara</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team31.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Julea</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team32.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Steven Smith</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="department7">
                                <div class="single-departments-box-layout1">
                                    <div class="single-departments-img">
                                        <img alt="single" src="img/department/department28.jpg">
                                    </div>
                                    <div class="item-content">
                                        <div class="item-content-wrap">
                                            <h3 class="item-title title-bar-primary5">Gynecology Department</h3>
                                            <span class="sub-title">Dorem ipsum dolor sit amet, consectetuer adipiscing
                                                elit, sed diam nonummy nibh
                                                erty cidunt utter laoreet dolore magna aliquam erat volutpanostrud
                                                exercier.</span>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc iquam class bibendum non mattis
                                                fusceut perspiciatis undeuisque. </p>
                                            <h3 class="item-title">Advantage:</h3>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc.
                                            </p>
                                            <ul class="department-info">
                                                <li>Keep Patients First Nulla lobortis.</li>
                                                <li>Keep Everyone Safe.</li>
                                                <li>Work Together Quisque pretium quam.</li>
                                                <li>Curabitur semper enim id accumsan.</li>
                                            </ul>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc.Aliquam class bibendum mattis
                                                fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                                mauris et adipisc.</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="item-cost">
                                                    <h3 class="item-title title-bar-primary7">Our Pricing Plan</h3>
                                                    <ul>
                                                        <li>Dental Implant<span>$45.00</span></li>
                                                        <li>Another Feature<span>$25.00</span></li>
                                                        <li>Another Major Feature<span>$25.00</span></li>
                                                        <li>Emergency Care<span>$25.00</span></li>
                                                        <li>Prescription Drugs<span>$85.00</span></li>
                                                        <li>Specialist Visits<span>$99.00</span></li>
                                                        <li>Rheumatology<span>$89.00</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-specialist-wrap">
                                            <h3 class="item-title title-bar-primary7">Meet Our Doctors</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team29.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    David Roy</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team30.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Zinia Zara</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team31.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Julea</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team32.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Steven Smith</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="department8">
                                <div class="single-departments-box-layout1">
                                    <div class="single-departments-img">
                                        <img alt="single" src="img/department/department29.jpg">
                                    </div>
                                    <div class="item-content">
                                        <div class="item-content-wrap">
                                            <h3 class="item-title title-bar-primary5">Neurology Department</h3>
                                            <span class="sub-title">Dorem ipsum dolor sit amet, consectetuer adipiscing
                                                elit, sed diam nonummy nibh
                                                erty cidunt utter laoreet dolore magna aliquam erat volutpanostrud
                                                exercier.</span>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc iquam class bibendum non mattis
                                                fusceut perspiciatis undeuisque. </p>
                                            <h3 class="item-title">Advantage:</h3>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc.
                                            </p>
                                            <ul class="department-info">
                                                <li>Keep Patients First Nulla lobortis.</li>
                                                <li>Keep Everyone Safe.</li>
                                                <li>Work Together Quisque pretium quam.</li>
                                                <li>Curabitur semper enim id accumsan.</li>
                                            </ul>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc.Aliquam class bibendum mattis
                                                fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                                mauris et adipisc.</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="item-cost">
                                                    <h3 class="item-title title-bar-primary7">Our Pricing Plan</h3>
                                                    <ul>
                                                        <li>Dental Implant<span>$45.00</span></li>
                                                        <li>Another Feature<span>$25.00</span></li>
                                                        <li>Another Major Feature<span>$25.00</span></li>
                                                        <li>Emergency Care<span>$25.00</span></li>
                                                        <li>Prescription Drugs<span>$85.00</span></li>
                                                        <li>Specialist Visits<span>$99.00</span></li>
                                                        <li>Rheumatology<span>$89.00</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-specialist-wrap">
                                            <h3 class="item-title title-bar-primary7">Meet Our Doctors</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team29.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    David Roy</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team30.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Zinia Zara</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team31.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Julea</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team32.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Steven Smith</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="department9">
                                <div class="single-departments-box-layout1">
                                    <div class="single-departments-img">
                                        <img alt="single" src="img/department/department30.jpg">
                                    </div>
                                    <div class="item-content">
                                        <div class="item-content-wrap">
                                            <h3 class="item-title title-bar-primary5">Rhinology Department</h3>
                                            <span class="sub-title">Dorem ipsum dolor sit amet, consectetuer adipiscing
                                                elit, sed diam nonummy nibh
                                                erty cidunt utter laoreet dolore magna aliquam erat volutpanostrud
                                                exercier.</span>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc iquam class bibendum non mattis
                                                fusceut perspiciatis undeuisque. </p>
                                            <h3 class="item-title">Advantage:</h3>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc.
                                            </p>
                                            <ul class="department-info">
                                                <li>Keep Patients First Nulla lobortis.</li>
                                                <li>Keep Everyone Safe.</li>
                                                <li>Work Together Quisque pretium quam.</li>
                                                <li>Curabitur semper enim id accumsan.</li>
                                            </ul>
                                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc
                                                iquam class bibendum non mattis fusceut perspiciatis undeuisque.
                                                Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipiscing. Aliquam
                                                class
                                                bibendum mattis fusceut persecenas. Quisque. Maecenas. Eros mus.
                                                Hymenaeos eros. Nisi mauris et adipisc.Aliquam class bibendum mattis
                                                fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                                mauris et adipisc.</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="item-cost">
                                                    <h3 class="item-title title-bar-primary7">Our Pricing Plan</h3>
                                                    <ul>
                                                        <li>Dental Implant<span>$45.00</span></li>
                                                        <li>Another Feature<span>$25.00</span></li>
                                                        <li>Another Major Feature<span>$25.00</span></li>
                                                        <li>Emergency Care<span>$25.00</span></li>
                                                        <li>Prescription Drugs<span>$85.00</span></li>
                                                        <li>Specialist Visits<span>$99.00</span></li>
                                                        <li>Rheumatology<span>$89.00</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-specialist-wrap">
                                            <h3 class="item-title title-bar-primary7">Meet Our Doctors</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team29.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    David Roy</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team30.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Zinia Zara</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team31.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Julea</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-12">
                                                <div class="item-specialist">
                                                    <div class="media media-none--xs">
                                                        <div class="item-img">
                                                            <img src="img/team/team32.png" alt="Generic placeholder image"
                                                                class="img-fluid media-img-auto">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="item-title"><a href="single-doctor.html">Dr.
                                                                    Steven Smith</a></h4>
                                                            <span>MSD, DDSc, MDS</span>
                                                            <p>Rorem ipsum dolramet tetuer work rorem ipsum
                                                                consectetuer.</p>
                                                            <a href="#" class="item-btn">Make an Appointment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget-area sidebar-break-md col-xl-3 col-lg-4 col-12 no-equal-item">
                        <div class="widget widget-call-to-action-light">
                            <div class="media">
                                <img src="{{asset('frontend_assets/img/figure/figure1.png')}}" alt="figure">
                                <div class="media-body space-sm">
                                    <h4>Emergency Cases</h4>
                                    <span>2-800-700-6200</span>
                                </div>
                            </div>
                        </div>
                        <div class="widget widget-schedule">
                            <h3 class="section-title title-bar-primary">Opening Hours</h3>
                            <ul>
                                <li>Saturday - Monday: <span>09:00 am - 10.00 pm</span></li>
                                <li>Tuesday - Thursday: <span>09:00 am - 10.00 pm</span></li>
                                <li>Friday - Saturday: <span>09:00 am - 10.00 pm</span></li>
                                <li>Sunday: <span class="bold">Will Be Closed</span></li>
                            </ul>
                        </div>
                        <div class="widget widget-appointment">
                            <h3 class="section-title-light title-bar-light">Book Appointment</h3>
                            <form>
                                <div class="form-group">
                                    <select class="select2" data-error="Phone field is required" required>
                                        <option value="">Select Department *</option>
                                        <option value="1">Gynaecology</option>
                                        <option value="2">Cardiology</option>
                                        <option value="3">Orthopaedics</option>
                                        <option value="4">Medicine</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <select class="select2" data-error="Phone field is required" required>
                                        <option value="">Choose Doctor by Name *</option>
                                        <option value="1">Dr. Mou</option>
                                        <option value="2">Dr. Kalvin</option>
                                        <option value="3">Dr. Mark Willy</option>
                                        <option value="4">Dr. Zinia Zara</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Patient Name *" class="form-control" name="name" id="form-name"
                                        data-error="Name field is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Phone *" class="form-control" name="Phone" id="form-phone"
                                        data-error="Phone field is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="email" placeholder="E-mail *" class="form-control" name="email" id="form-email"
                                        data-error="E-mail field is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <i class="far fa-calendar-alt"></i>
                                    <input type="text" class="form-control rt-date" placeholder="Appointment Date *"
                                        name="date" id="form-date" data-error="Subject field is required" required />
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <i class="far fa-clock"></i>
                                    <input type="text" class="form-control rt-time" placeholder="Time *" name="time" id="form-time"
                                        data-error="Subject field is required" required />
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <textarea placeholder="Type Appintment Note" class="textarea form-control" name="message"
                                        id="form-message" rows="5" cols="20" data-error="Message field is required"
                                        required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group text-center">
                                    <button class="item-btn">BOOK NOW<i class="fas fa-chevron-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Single Department End Here -->
@endsection