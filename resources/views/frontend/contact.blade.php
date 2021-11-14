@extends('layouts.frontend')
@section('content')
<!-- Inne Page Banner Area Start Here -->
<section class="inner-page-banner bg-common inner-page-top-margin" data-bg-image="{{asset('frontend_assets/img/figure/coming-soon.jpg')}}">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area ml-5">
                            <h1>Contact Us</h1>
                            <ul>
                                <li>
                                    <a href="https://iconmedicalbd.com/">Home</a>
                                </li>
                                <li>Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Inne Page Banner Area End Here -->
        <!-- Contact Us Area Start Here -->
        <section class="contact-wrap-layout">
            <div class="container">
                @if(session('contact'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Please select checkbox</strong> in working days field !.
                        {{session('contact')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                        </div>
                     @endif
                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact-box-layout1">
                            <h3 class="title title-bar-primary4">Leave Us Message</h3>
                            <form class="contact-form-box" id="contact-form" action = "{{url('contact_post')}}" method = "post">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" placeholder="First Name *" class="form-control" name="first_name"
                                            data-error="Phone field is required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text" placeholder="Last Name *" class="form-control" name="last_name"
                                        
                                            data-error="E-mail field is required" required>
                                        <div class="help-block with-errors"></div>
                                        
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="email" placeholder="E-mail *" class="form-control" name="email"
                                            data-error="Subject field is required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text"  placeholder="Phone *" class="form-control" name="phone"
                                            data-error="Subject field is required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    
                                    <div class="col-12 form-group">
                                        <textarea placeholder="Message*" class="textarea form-control" name="message"
                                            id="form-message" rows="7" cols="20" data-error="Message field is required"
                                            required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-12 form-group margin-b-none">
                                        <button type="submit" class="item-btn">Submit Message</button>
                                    </div>
                                </div>
                                <div class="form-response"></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-box-layout1">
                            <h3 class="title title-bar-primary4">Address</h3>
                            <div class="contact-info">
                                <ul>
                                     @php
                        $footer_logo_items = App\FooterLogoItem::where('status', 1)->get();
                     @endphp
                     @foreach($footer_logo_items as $key=> $footer_logo_item)
                                    <li><i class="fas fa-map-marker-alt"></i>{{$footer_logo_item->location}}</li>
                                    <li><i class="far fa-envelope"></i>{{$footer_logo_item->email}}</li>
                                    <li><i class="fas fa-phone"></i>{{$footer_logo_item->phone}}</li>
                                     @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Us Area End Here -->
@endsection