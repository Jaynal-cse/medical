@extends('layouts.frontend')
@section('breadcrumb')
<!-- Inne Page Banner Area Start Here -->
        <section class="inner-page-banner bg-common inner-page-top-margin" data-bg-image="{{asset('frontend_assets/img/figure/figure1.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1>About Us</h1>
                            <span>
                                <li>
                                    <a href="index.html">Home</a>
                                </li>
                                <li>About</li>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!-- Inne Page Banner Area End Here -->


@endsection

@section('content')
<!-- scrollUp End Here -->

    <!-- About Area Start Here -->
     @php
            $about_category = App\FrontendAboutCategory::where('status', 1)->get();
        @endphp

        <section class="about-wrap-layout3">
            <div class="container">
                <div class="row" id="no-equal-gallery">
                    <div class="sidebar-widget-area sidebar-break-md col-xl-3 col-lg-4 col-12 no-equal-item">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="widget widget-about-info">
                                    <ul class="nav nav-tabs tab-nav-list">
                                        <!-- <li class="nav-item">
                                            <a class="active" href="#related1" data-toggle="tab" aria-expanded="false">Who We
                                                Are</a>
                                        </li> -->
                                        @foreach($about_category as $key=> $about_categories)
                                            <li class="nav-item">
                                                <a href="{{ url('about') }}/{{ $about_categories->id }}">{{ $about_categories->about_category}}</a>
                                            </li>
                                        @endforeach


                                        <!-- <li class="nav-item">
                                            <a href="#related3" data-toggle="tab" aria-expanded="false">Experience</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#related4" data-toggle="tab" aria-expanded="false">Awards</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#related5" data-toggle="tab" aria-expanded="false">Success Story</a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>

                            <div class="col-sm-12 mt-5">
                                <div class="widget widget-call-to-action-light">
                                    <div class="media">
                                        <img src="{{asset('uploads/about_offer/figure6.png')}}" alt="figure">
                                        <div class="media-body space-sm">
                                            <h4>Emergency Cases</h4>
                                            <span>2-800-700-6200</span>
                                        </div>
                                    </div>
                                </div>

                            </div>



                            <div class="col-sm-12 mt-5">
                                @php
                                    $aboutOffers = App\AboutOfeer::where('status', 1)->get();
                                @endphp

                                <div class="widget widget-ad-area">
                                    @foreach($aboutOffers as $key=> $aboutOffer)
                                        <div class="ad-wrap">
                                            <img src="{{asset('uploads/about_offer/'.$aboutOffer->image)}}" alt="Figure">
                                            <div class="item-btn-wrap">
                                                <a class="item-btn" href="#">SEE DETAILS<i class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 no-equal-item">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="related1">
                                <div class="about-box-layout5">
                                    <h2 class="item-title">{{ optional($aboutItem)->title ?? "Let’s Know Short Story About Medilink Centeral Hospital. 555555" }}</h2>

                                    <div class="row about-img">
                                        <div class="col-md-6 col-12">
                                            <img src="{{ asset('uploads/about_media/' . (optional($aboutItem)->image ?? 'about5.jpg')) }}" alt="about">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <img src="{{asset('uploads/about_media/' .(optional($aboutItem)->multimedia ?? 'about5.jpg'))}}" alt="about">
                                            <div class="item-btn">

                                                <a class="play-btn popup-youtube" href="http://www.youtube.com/watch?v=1iIZeIy7TqM">
                                                    <i class="flaticon-play-button"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <p>
                                        {{ optional($aboutItem)->paragraph ?? "Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class
                                        bibendum non mattis fusceut perspiciatis undeuisque. Maecenas. Eros mus.
                                        Hymenaeos eros. Nisi mauris et adipiscing. Aliquam class bibendum
                                        mattis fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                        mauris et adipisc iquam class bibendum non mattis fusceut perspiciatis
                                        undeuisque." }}
                                    </p>


                                    <!-- <p>
                                        {{ \Illuminate\Support\Str::limit(optional($aboutItem)->paragraph, 5, '....') }}
                                    </p> -->

                                    <!-- <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class
                                        bibendum non mattis fusceut perspiciatis undeuisque. Maecenas. Eros mus.
                                        Hymenaeos eros. Nisi mauris et adipiscing. Aliquam class bibendum
                                        mattis fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                        mauris et adipisc iquam class bibendum non mattis fusceut perspiciatis
                                        undeuisque. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris
                                        et adipisc iquam class bibendum non mattis fusceut perspiciatise.</p> -->
                                    <ul class="about-info">
                                        @foreach(optional($aboutItem)->get_bullet_points ?? [] as $key => $bulletPoint)
                                            <li>{{ $bulletPoint->bullet_point }}</li>
                                        @endforeach
                                    </ul>
                                    <!-- <p>Hymenaeos eros. Nisi mauris et adipisc iquam class bibendum non mattis fusceut
                                        perspiciatis undeuisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et
                                        adipiscing. Aliquam class bibendum mattis fusceut persecenas.
                                        Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class
                                        bibendum non mattis fusceut perspiciatis undeuisque. Quisque. Maecenas. Eros
                                        mus. Hymenaeos eros.</p> -->
                                </div>
                            </div>
                            <!-- <div class="tab-pane fade" id="related2">
                                <div class="about-box-layout5">
                                    <h2 class="item-title">Let’s Know Short Story About Medilink Centeral Hospital.</h2>
                                    <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class
                                        bibendum non mattis fusceut perspiciatis undeuisque. Maecenas. Eros mus.
                                        Hymenaeos eros. Nisi mauris et adipiscing. Aliquam class bibendum
                                        mattis fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                        mauris et adipisc iquam class bibendum non mattis fusceut perspiciatis
                                        undeuisque.</p>
                                    <div class="row about-img">
                                        <div class="col-md-6 col-12">
                                            <img src="{{asset('uploads/about_offer/about5.jpg')}}" alt="about">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <img src="{{asset('uploads/about_offer/about6.jpg')}}" alt="about">
                                            <div class="item-btn">
                                                <a class="play-btn popup-youtube" href="http://www.youtube.com/watch?v=1iIZeIy7TqM">
                                                    <i class="flaticon-play-button"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class
                                        bibendum non mattis fusceut perspiciatis undeuisque. Maecenas. Eros mus.
                                        Hymenaeos eros. Nisi mauris et adipiscing. Aliquam class bibendum
                                        mattis fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                        mauris et adipisc iquam class bibendum non mattis fusceut perspiciatis
                                        undeuisque. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris
                                        et adipisc iquam class bibendum non mattis fusceut perspiciatise.</p>
                                    <ul class="about-info">
                                        <li>Keep Patients First</li>
                                        <li>Pursue Excellence</li>
                                        <li>Keep Everyone Safe</li>
                                        <li>Manage Your Resources</li>
                                        <li>Work Together</li>
                                        <li>Keep Learning</li>
                                    </ul>
                                    <p>Hymenaeos eros. Nisi mauris et adipisc iquam class bibendum non mattis fusceut
                                        perspiciatis undeuisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et
                                        adipiscing. Aliquam class bibendum mattis fusceut persecenas.
                                        Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class
                                        bibendum non mattis fusceut perspiciatis undeuisque. Quisque. Maecenas. Eros
                                        mus. Hymenaeos eros.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="related3">
                                <div class="about-box-layout5">
                                    <h2 class="item-title">Let’s Know Short Story About Medilink Centeral Hospital.</h2>
                                    <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class
                                        bibendum non mattis fusceut perspiciatis undeuisque. Maecenas. Eros mus.
                                        Hymenaeos eros. Nisi mauris et adipiscing. Aliquam class bibendum
                                        mattis fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                        mauris et adipisc iquam class bibendum non mattis fusceut perspiciatis
                                        undeuisque.</p>
                                    <div class="row about-img">
                                        <div class="col-md-6 col-12">
                                            <img src="{{asset('uploads/about_offer/about5.jpg')}}" alt="about">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <img src="{{asset('uploads/about_offer/about6.jpg')}}" alt="about">
                                            <div class="item-btn">
                                                <a class="play-btn popup-youtube" href="http://www.youtube.com/watch?v=1iIZeIy7TqM">
                                                    <i class="flaticon-play-button"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class
                                        bibendum non mattis fusceut perspiciatis undeuisque. Maecenas. Eros mus.
                                        Hymenaeos eros. Nisi mauris et adipiscing. Aliquam class bibendum
                                        mattis fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                        mauris et adipisc iquam class bibendum non mattis fusceut perspiciatis
                                        undeuisque. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris
                                        et adipisc iquam class bibendum non mattis fusceut perspiciatise.</p>
                                    <ul class="about-info">
                                        <li>Keep Patients First</li>
                                        <li>Pursue Excellence</li>
                                        <li>Keep Everyone Safe</li>
                                        <li>Manage Your Resources</li>
                                        <li>Work Together</li>
                                        <li>Keep Learning</li>
                                    </ul>
                                    <p>Hymenaeos eros. Nisi mauris et adipisc iquam class bibendum non mattis fusceut
                                        perspiciatis undeuisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et
                                        adipiscing. Aliquam class bibendum mattis fusceut persecenas.
                                        Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class
                                        bibendum non mattis fusceut perspiciatis undeuisque. Quisque. Maecenas. Eros
                                        mus. Hymenaeos eros.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="related4">
                                <div class="about-box-layout5">
                                    <h2 class="item-title">Let’s Know Short Story About Medilink Centeral Hospital.</h2>
                                    <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class
                                        bibendum non mattis fusceut perspiciatis undeuisque. Maecenas. Eros mus.
                                        Hymenaeos eros. Nisi mauris et adipiscing. Aliquam class bibendum
                                        mattis fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                        mauris et adipisc iquam class bibendum non mattis fusceut perspiciatis
                                        undeuisque.</p>
                                    <div class="row about-img">
                                        <div class="col-md-6 col-12">
                                            <img src="{{asset('uploads/about_offer/about5.jpg')}}" alt="about">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <img src="{{asset('uploads/about_offer/about6.jpg')}}" alt="about">
                                            <div class="item-btn">
                                                <a class="play-btn popup-youtube" href="http://www.youtube.com/watch?v=1iIZeIy7TqM">
                                                    <i class="flaticon-play-button"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class
                                        bibendum non mattis fusceut perspiciatis undeuisque. Maecenas. Eros mus.
                                        Hymenaeos eros. Nisi mauris et adipiscing. Aliquam class bibendum
                                        mattis fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                        mauris et adipisc iquam class bibendum non mattis fusceut perspiciatis
                                        undeuisque. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris
                                        et adipisc iquam class bibendum non mattis fusceut perspiciatise.</p>
                                    <ul class="about-info">
                                        <li>Keep Patients First</li>
                                        <li>Pursue Excellence</li>
                                        <li>Keep Everyone Safe</li>
                                        <li>Manage Your Resources</li>
                                        <li>Work Together</li>
                                        <li>Keep Learning</li>
                                    </ul>
                                    <p>Hymenaeos eros. Nisi mauris et adipisc iquam class bibendum non mattis fusceut
                                        perspiciatis undeuisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et
                                        adipiscing. Aliquam class bibendum mattis fusceut persecenas.
                                        Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class
                                        bibendum non mattis fusceut perspiciatis undeuisque. Quisque. Maecenas. Eros
                                        mus. Hymenaeos eros.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="related5">
                                <div class="about-box-layout5">
                                    <h2 class="item-title">Let’s Know Short Story About Medilink Centeral Hospital.</h2>
                                    <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class
                                        bibendum non mattis fusceut perspiciatis undeuisque. Maecenas. Eros mus.
                                        Hymenaeos eros. Nisi mauris et adipiscing. Aliquam class bibendum
                                        mattis fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                        mauris et adipisc iquam class bibendum non mattis fusceut perspiciatis
                                        undeuisque.</p>
                                    <div class="row about-img">
                                        <div class="col-md-6 col-12">
                                            <img src="{{asset('uploads/about_offer/about5.jpg')}}" alt="about">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <img src="{{asset('uploads/about_offer/about6.jpg')}}" alt="about">
                                            <div class="item-btn">
                                                <a class="play-btn popup-youtube" href="http://www.youtube.com/watch?v=1iIZeIy7TqM">
                                                    <i class="flaticon-play-button"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class
                                        bibendum non mattis fusceut perspiciatis undeuisque. Maecenas. Eros mus.
                                        Hymenaeos eros. Nisi mauris et adipiscing. Aliquam class bibendum
                                        mattis fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi
                                        mauris et adipisc iquam class bibendum non mattis fusceut perspiciatis
                                        undeuisque. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris
                                        et adipisc iquam class bibendum non mattis fusceut perspiciatise.</p>
                                    <ul class="about-info">
                                        <li>Keep Patients First</li>
                                        <li>Pursue Excellence</li>
                                        <li>Keep Everyone Safe</li>
                                        <li>Manage Your Resources</li>
                                        <li>Work Together</li>
                                        <li>Keep Learning</li>
                                    </ul>
                                    <p>Hymenaeos eros. Nisi mauris et adipisc iquam class bibendum non mattis fusceut
                                        perspiciatis undeuisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et
                                        adipiscing. Aliquam class bibendum mattis fusceut persecenas.
                                        Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class
                                        bibendum non mattis fusceut perspiciatis undeuisque. Quisque. Maecenas. Eros
                                        mus. Hymenaeos eros.</p>
                                </div>
                            </div> -->
                        </div>
                    </div>


                    <!-- <div class="sidebar-widget-area sidebar-break-md col-xl-3 col-lg-4 col-12 no-equal-item"> -->
                        <!-- <div class="widget widget-call-to-action-light">
                            <div class="media">
                                <img src="{{asset('uploads/about_offer/figure6.png')}}" alt="figure">
                                <div class="media-body space-sm">
                                    <h4>Emergency Cases</h4>
                                    <span>2-800-700-6200</span>
                                </div>
                            </div>
                        </div>
                        @php
                            $aboutOffers = App\AboutOfeer::where('status', 1)->get();
                        @endphp
                        <div class="widget widget-ad-area">
                        @foreach($aboutOffers as $key=> $aboutOffer)
                            <div class="ad-wrap">
                                <img src="{{asset('uploads/about_offer/'.$aboutOffer->image)}}" alt="Figure">
                                <div class="item-btn-wrap">
                                    <a class="item-btn" href="#">SEE DETAILS<i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        @endforeach
                        </div> -->
                    <!-- </div> -->
                </div>
            </div>
        </section>
    <!--<section class="about-wrap-layout3">-->
    <!--    <div class="container">-->
    <!--        <div class="row" id="no-equal-gallery">-->
    <!--            <div class="sidebar-widget-area sidebar-break-md col-xl-3 col-lg-4 col-12 no-equal-item">-->
    <!--                <div class="widget widget-about-info">-->
    <!--                    <ul class="nav nav-tabs tab-nav-list">-->
    <!--                        <li class="nav-item">-->
    <!--                            <a class="active" href="#related1" data-toggle="tab" aria-expanded="false">Who We-->
    <!--                                Are</a>-->
    <!--                        </li>-->
    <!--                        <li class="nav-item">-->
    <!--                            <a href="#related2" data-toggle="tab" aria-expanded="false">Our Mission</a>-->
    <!--                        </li>-->
    <!--                        <li class="nav-item">-->
    <!--                            <a href="#related3" data-toggle="tab" aria-expanded="false">Experience</a>-->
    <!--                        </li>-->
    <!--                        <li class="nav-item">-->
    <!--                            <a href="#related4" data-toggle="tab" aria-expanded="false">Awards</a>-->
    <!--                        </li>-->
    <!--                        <li class="nav-item">-->
    <!--                            <a href="#related5" data-toggle="tab" aria-expanded="false">Success Story</a>-->
    <!--                        </li>-->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-xl-9 col-lg-8 no-equal-item">-->
    <!--                <div class="tab-content">-->
    <!--                    <div class="tab-pane fade active show" id="related1">-->
    <!--                        <div class="about-box-layout5">-->
    <!--                            <h2 class="item-title">Let’s Know Short Story About Medilink Centeral Hospital.</h2>-->
    <!--                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class-->
    <!--                                bibendum non mattis fusceut perspiciatis undeuisque. Maecenas. Eros mus.-->
    <!--                                Hymenaeos eros. Nisi mauris et adipiscing. Aliquam class bibendum-->
    <!--                                mattis fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi-->
    <!--                                mauris et adipisc iquam class bibendum non mattis fusceut perspiciatis-->
    <!--                                undeuisque.</p>-->
    <!--                            <div class="row about-img">-->
    <!--                                <div class="col-md-6 col-12">-->
    <!--                                    <img src="img/about/about5.jpg" alt="about">-->
    <!--                                </div>-->
    <!--                                <div class="col-md-6 col-12">-->
    <!--                                    <img src="img/about/about6.jpg" alt="about">-->
    <!--                                    <div class="item-btn">-->
    <!--                                        <a class="play-btn popup-youtube" href="http://www.youtube.com/watch?v=1iIZeIy7TqM">-->
    <!--                                            <i class="flaticon-play-button"></i>-->
    <!--                                        </a>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class-->
    <!--                                bibendum non mattis fusceut perspiciatis undeuisque. Maecenas. Eros mus.-->
    <!--                                Hymenaeos eros. Nisi mauris et adipiscing. Aliquam class bibendum-->
    <!--                                mattis fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi-->
    <!--                                mauris et adipisc iquam class bibendum non mattis fusceut perspiciatis-->
    <!--                                undeuisque. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris-->
    <!--                                et adipisc iquam class bibendum non mattis fusceut perspiciatise.</p>-->
    <!--                            <ul class="about-info">-->
    <!--                                <li>Keep Patients First</li>-->
    <!--                                <li>Pursue Excellence</li>-->
    <!--                                <li>Keep Everyone Safe</li>-->
    <!--                                <li>Manage Your Resources</li>-->
    <!--                                <li>Work Together</li>-->
    <!--                                <li>Keep Learning</li>-->
    <!--                            </ul>-->
    <!--                            <p>Hymenaeos eros. Nisi mauris et adipisc iquam class bibendum non mattis fusceut-->
    <!--                                perspiciatis undeuisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et-->
    <!--                                adipiscing. Aliquam class bibendum mattis fusceut persecenas.-->
    <!--                                Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class-->
    <!--                                bibendum non mattis fusceut perspiciatis undeuisque. Quisque. Maecenas. Eros-->
    <!--                                mus. Hymenaeos eros.</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="tab-pane fade" id="related2">-->
    <!--                        <div class="about-box-layout5">-->
    <!--                            <h2 class="item-title">Let’s Know Short Story About Medilink Centeral Hospital.</h2>-->
    <!--                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class-->
    <!--                                bibendum non mattis fusceut perspiciatis undeuisque. Maecenas. Eros mus.-->
    <!--                                Hymenaeos eros. Nisi mauris et adipiscing. Aliquam class bibendum-->
    <!--                                mattis fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi-->
    <!--                                mauris et adipisc iquam class bibendum non mattis fusceut perspiciatis-->
    <!--                                undeuisque.</p>-->
    <!--                            <div class="row about-img">-->
    <!--                                <div class="col-md-6 col-12">-->
    <!--                                    <img src="img/about/about5.jpg" alt="about">-->
    <!--                                </div>-->
    <!--                                <div class="col-md-6 col-12">-->
    <!--                                    <img src="img/about/about6.jpg" alt="about">-->
    <!--                                    <div class="item-btn">-->
    <!--                                        <a class="play-btn popup-youtube" href="http://www.youtube.com/watch?v=1iIZeIy7TqM">-->
    <!--                                            <i class="flaticon-play-button"></i>-->
    <!--                                        </a>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class-->
    <!--                                bibendum non mattis fusceut perspiciatis undeuisque. Maecenas. Eros mus.-->
    <!--                                Hymenaeos eros. Nisi mauris et adipiscing. Aliquam class bibendum-->
    <!--                                mattis fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi-->
    <!--                                mauris et adipisc iquam class bibendum non mattis fusceut perspiciatis-->
    <!--                                undeuisque. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris-->
    <!--                                et adipisc iquam class bibendum non mattis fusceut perspiciatise.</p>-->
    <!--                            <ul class="about-info">-->
    <!--                                <li>Keep Patients First</li>-->
    <!--                                <li>Pursue Excellence</li>-->
    <!--                                <li>Keep Everyone Safe</li>-->
    <!--                                <li>Manage Your Resources</li>-->
    <!--                                <li>Work Together</li>-->
    <!--                                <li>Keep Learning</li>-->
    <!--                            </ul>-->
    <!--                            <p>Hymenaeos eros. Nisi mauris et adipisc iquam class bibendum non mattis fusceut-->
    <!--                                perspiciatis undeuisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et-->
    <!--                                adipiscing. Aliquam class bibendum mattis fusceut persecenas.-->
    <!--                                Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class-->
    <!--                                bibendum non mattis fusceut perspiciatis undeuisque. Quisque. Maecenas. Eros-->
    <!--                                mus. Hymenaeos eros.</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="tab-pane fade" id="related3">-->
    <!--                        <div class="about-box-layout5">-->
    <!--                            <h2 class="item-title">Let’s Know Short Story About Medilink Centeral Hospital.</h2>-->
    <!--                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class-->
    <!--                                bibendum non mattis fusceut perspiciatis undeuisque. Maecenas. Eros mus.-->
    <!--                                Hymenaeos eros. Nisi mauris et adipiscing. Aliquam class bibendum-->
    <!--                                mattis fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi-->
    <!--                                mauris et adipisc iquam class bibendum non mattis fusceut perspiciatis-->
    <!--                                undeuisque.</p>-->
    <!--                            <div class="row about-img">-->
    <!--                                <div class="col-md-6 col-12">-->
    <!--                                    <img src="img/about/about5.jpg" alt="about">-->
    <!--                                </div>-->
    <!--                                <div class="col-md-6 col-12">-->
    <!--                                    <img src="img/about/about6.jpg" alt="about">-->
    <!--                                    <div class="item-btn">-->
    <!--                                        <a class="play-btn popup-youtube" href="http://www.youtube.com/watch?v=1iIZeIy7TqM">-->
    <!--                                            <i class="flaticon-play-button"></i>-->
    <!--                                        </a>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class-->
    <!--                                bibendum non mattis fusceut perspiciatis undeuisque. Maecenas. Eros mus.-->
    <!--                                Hymenaeos eros. Nisi mauris et adipiscing. Aliquam class bibendum-->
    <!--                                mattis fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi-->
    <!--                                mauris et adipisc iquam class bibendum non mattis fusceut perspiciatis-->
    <!--                                undeuisque. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris-->
    <!--                                et adipisc iquam class bibendum non mattis fusceut perspiciatise.</p>-->
    <!--                            <ul class="about-info">-->
    <!--                                <li>Keep Patients First</li>-->
    <!--                                <li>Pursue Excellence</li>-->
    <!--                                <li>Keep Everyone Safe</li>-->
    <!--                                <li>Manage Your Resources</li>-->
    <!--                                <li>Work Together</li>-->
    <!--                                <li>Keep Learning</li>-->
    <!--                            </ul>-->
    <!--                            <p>Hymenaeos eros. Nisi mauris et adipisc iquam class bibendum non mattis fusceut-->
    <!--                                perspiciatis undeuisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et-->
    <!--                                adipiscing. Aliquam class bibendum mattis fusceut persecenas.-->
    <!--                                Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class-->
    <!--                                bibendum non mattis fusceut perspiciatis undeuisque. Quisque. Maecenas. Eros-->
    <!--                                mus. Hymenaeos eros.</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="tab-pane fade" id="related4">-->
    <!--                        <div class="about-box-layout5">-->
    <!--                            <h2 class="item-title">Let’s Know Short Story About Medilink Centeral Hospital.</h2>-->
    <!--                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class-->
    <!--                                bibendum non mattis fusceut perspiciatis undeuisque. Maecenas. Eros mus.-->
    <!--                                Hymenaeos eros. Nisi mauris et adipiscing. Aliquam class bibendum-->
    <!--                                mattis fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi-->
    <!--                                mauris et adipisc iquam class bibendum non mattis fusceut perspiciatis-->
    <!--                                undeuisque.</p>-->
    <!--                            <div class="row about-img">-->
    <!--                                <div class="col-md-6 col-12">-->
    <!--                                    <img src="img/about/about5.jpg" alt="about">-->
    <!--                                </div>-->
    <!--                                <div class="col-md-6 col-12">-->
    <!--                                    <img src="img/about/about6.jpg" alt="about">-->
    <!--                                    <div class="item-btn">-->
    <!--                                        <a class="play-btn popup-youtube" href="http://www.youtube.com/watch?v=1iIZeIy7TqM">-->
    <!--                                            <i class="flaticon-play-button"></i>-->
    <!--                                        </a>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class-->
    <!--                                bibendum non mattis fusceut perspiciatis undeuisque. Maecenas. Eros mus.-->
    <!--                                Hymenaeos eros. Nisi mauris et adipiscing. Aliquam class bibendum-->
    <!--                                mattis fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi-->
    <!--                                mauris et adipisc iquam class bibendum non mattis fusceut perspiciatis-->
    <!--                                undeuisque. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris-->
    <!--                                et adipisc iquam class bibendum non mattis fusceut perspiciatise.</p>-->
    <!--                            <ul class="about-info">-->
    <!--                                <li>Keep Patients First</li>-->
    <!--                                <li>Pursue Excellence</li>-->
    <!--                                <li>Keep Everyone Safe</li>-->
    <!--                                <li>Manage Your Resources</li>-->
    <!--                                <li>Work Together</li>-->
    <!--                                <li>Keep Learning</li>-->
    <!--                            </ul>-->
    <!--                            <p>Hymenaeos eros. Nisi mauris et adipisc iquam class bibendum non mattis fusceut-->
    <!--                                perspiciatis undeuisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et-->
    <!--                                adipiscing. Aliquam class bibendum mattis fusceut persecenas.-->
    <!--                                Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class-->
    <!--                                bibendum non mattis fusceut perspiciatis undeuisque. Quisque. Maecenas. Eros-->
    <!--                                mus. Hymenaeos eros.</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="tab-pane fade" id="related5">-->
    <!--                        <div class="about-box-layout5">-->
    <!--                            <h2 class="item-title">Let’s Know Short Story About Medilink Centeral Hospital.</h2>-->
    <!--                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class-->
    <!--                                bibendum non mattis fusceut perspiciatis undeuisque. Maecenas. Eros mus.-->
    <!--                                Hymenaeos eros. Nisi mauris et adipiscing. Aliquam class bibendum-->
    <!--                                mattis fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi-->
    <!--                                mauris et adipisc iquam class bibendum non mattis fusceut perspiciatis-->
    <!--                                undeuisque.</p>-->
    <!--                            <div class="row about-img">-->
    <!--                                <div class="col-md-6 col-12">-->
    <!--                                    <img src="img/about/about5.jpg" alt="about">-->
    <!--                                </div>-->
    <!--                                <div class="col-md-6 col-12">-->
    <!--                                    <img src="img/about/about6.jpg" alt="about">-->
    <!--                                    <div class="item-btn">-->
    <!--                                        <a class="play-btn popup-youtube" href="http://www.youtube.com/watch?v=1iIZeIy7TqM">-->
    <!--                                            <i class="flaticon-play-button"></i>-->
    <!--                                        </a>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <p>Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class-->
    <!--                                bibendum non mattis fusceut perspiciatis undeuisque. Maecenas. Eros mus.-->
    <!--                                Hymenaeos eros. Nisi mauris et adipiscing. Aliquam class bibendum-->
    <!--                                mattis fusceut persecenas. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi-->
    <!--                                mauris et adipisc iquam class bibendum non mattis fusceut perspiciatis-->
    <!--                                undeuisque. Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris-->
    <!--                                et adipisc iquam class bibendum non mattis fusceut perspiciatise.</p>-->
    <!--                            <ul class="about-info">-->
    <!--                                <li>Keep Patients First</li>-->
    <!--                                <li>Pursue Excellence</li>-->
    <!--                                <li>Keep Everyone Safe</li>-->
    <!--                                <li>Manage Your Resources</li>-->
    <!--                                <li>Work Together</li>-->
    <!--                                <li>Keep Learning</li>-->
    <!--                            </ul>-->
    <!--                            <p>Hymenaeos eros. Nisi mauris et adipisc iquam class bibendum non mattis fusceut-->
    <!--                                perspiciatis undeuisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et-->
    <!--                                adipiscing. Aliquam class bibendum mattis fusceut persecenas.-->
    <!--                                Quisque. Maecenas. Eros mus. Hymenaeos eros. Nisi mauris et adipisc iquam class-->
    <!--                                bibendum non mattis fusceut perspiciatis undeuisque. Quisque. Maecenas. Eros-->
    <!--                                mus. Hymenaeos eros.</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="sidebar-widget-area sidebar-break-md col-xl-3 col-lg-4 col-12 no-equal-item">-->
    <!--                <div class="widget widget-call-to-action-light">-->
    <!--                    <div class="media">-->
    <!--                        <img src="img/figure/figure6.png" alt="figure">-->
    <!--                        <div class="media-body space-sm">-->
    <!--                            <h4>Emergency Cases</h4>-->
    <!--                            <span>2-800-700-6200</span>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="widget widget-ad-area">-->
    <!--                    <div class="ad-wrap">-->
    <!--                        <img src="img/figure/figure5.jpg" alt="Figure">-->
    <!--                        <div class="item-btn-wrap">-->
    <!--                            <a class="item-btn" href="#">SEE DETAILS<i class="fas fa-chevron-right"></i></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- About Area Start Here -->
    <!-- Team Area Start Here -->
    <section class="team-wrap-layout1 bg-light-secondary100">
        <img class="left-img img-fluid" src="{{asset('frontend_assets/img/figure/figure4.png')}}" alt="figure">
        <img class="right-img img-fluid" src="{{asset('frontend_assets/img/figure/figure5.png')}}" alt="figure">
        <div class="container">
            <div class="section-heading heading-dark text-left heading-layout1">
                <h2>Specialist Doctors</h2>
                <p>Experienced Doctor</p>
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
                        <ul>
                            <li>Mon - Tues
                                <span>08.00 :17.00</span>
                            </li>
                            <li>Fri - Sat
                                <span>09.00 :12.00</span>
                            </li>
                            <li>Sun - Mon
                                <span>08.00 :17.00</span>
                            </li>
                        </ul>
                        <a href="#" class="item-btn">MAKE AN APPOINTMENT</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Team Area End Here -->
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

@endsection
