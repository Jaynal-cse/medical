@extends('layouts.frontend')

@section('breadcrumb')
<!-- Inne Page Banner Area Start Here -->
<section class="inner-page-banner bg-common inner-page-top-margin" data-bg-image="img/figure/figure2.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-area">
                    <h1>All Departments</h1>
                    <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>Departments</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Inne Page Banner Area End Here -->
@endsection

@section('content')
<!-- Department Start Here -->
        <section class="departments-wrap-layout8 bg-light-accent100">
            <div class="container">
                <div class="row">
                	@foreach($department as $dept)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12 menu-item">
                        <div class="departments-box-layout1">
                            <div class="item-img">
                                <img src="{{asset('uploads/department/')}}/{{$dept->photo}}" alt="department-img" class="img-fluid">
                                <div class="item-btn-wrap">
                                    <a href="{{url('single_department')}}/{{$dept->id}}" class="item-btn">Details</a>
                                </div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">
                                    <a href="{{url('single_department')}}/{{$dept->id}}">{{$dept->department_name}}</a>
                                </h3>
                                <ul class="department-info">
                                    <li>
                                        <i class="flaticon-doctor"></i>
                                        <span>
                                        	{{App\Doctor::where('department',$dept->id)->count()}}
                                        </span>Specialist Docotrs</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Department End Here -->
        <!-- Call to Action Area Start Here -->
        <section class="call-to-action-wrap-layout2 bg-common parallaxie" data-bg-image="img/figure/figure4.jpg">
            <div class="container">
           
                <div class="call-to-action-box-layout2">
                    <h2>We Provide the highest level of satisfaction<span> care &amp; services to our patients.</span></h2>
                    <a href="#" class="item-btn">Make an Appointment</a>
                </div>
                
            </div>
        </section>
        <!-- Call to Action End Here -->
@endsection