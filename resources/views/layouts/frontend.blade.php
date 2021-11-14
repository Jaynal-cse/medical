<!doctype html>
<html class="no-js" lang="">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    @php
    $icon = App\Icon::where('status', 1)->first();
    @endphp
    <title>{{$icon->frontend_title}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('uploads/icon/')}}/{{$icon->icon}}">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/normalize.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/main.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/bootstrap.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/animate.min.css')}}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/fontawesome-all.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset('frontend_assets/fonts/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/font/flaticon.css')}}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/meanmenu.min.css')}}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/magnific-popup.css')}}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{asset('frontend_assets/vendor/OwlCarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/vendor/OwlCarousel/owl.theme.default.min.css')}}">
    <!-- Nivo slider CSS -->
    <link rel="stylesheet" href="{{asset('frontend_assets/vendor/slider/css/nivo-slider.css')}}">
    <!-- Elements CSS -->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/elements.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/style.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('frontend_assets/style.css')}}"> -->
    <!-- Modernizr Js -->
    <script src="{{asset('frontend_assets/js/modernizr-3.5.0.min.js')}}"></script>
	@stack('css')
</head>

<body data-spy="scroll" data-offset="500">
  <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "115470750001656");
      chatbox.setAttribute("attribution", "biz_inbox");

      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v11.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

    <div class="mean-bar">

        @php
        $header_logos = App\FrontendHeaderLogo::where('status', 1)->get();
        @endphp
        @foreach($header_logos as $key=> $header_logo)
      <!-- <div class="mobile-menu-nav-back">
        <a class="logo-mobile" href="#">
          <img src="{{asset('uploads/header_logo/')}}/{{$header_logo->logo}}" alt="logo" class="img-fluid">
        </a>
      </div> -->
        @endforeach

      <a href="#nav" class="meanmenu-reveal" style="right: 0px; left: auto; text-align: center; text-indent: 0px; font-size: 18px;">

      </a>
      <nav class="mean-nav">
        <ul style="display: none; height: 412px;">
            <li>
                <a href = "">Home</a>

            <a class="mean-expand" href="#" style="font-size: 18px">+</a></li>
            <li>
                <a href="#">About</a>
                <ul class="dropdown-menu-col-1" style="display: none;">
                    <li><a href="about1.html">About 1</a></li>
                    <li><a href="about2.html">About 2</a></li>
                    <li><a href="about3.html">About 3</a></li>
                </ul>
            <a class="mean-expand" href="#" style="font-size: 18px">+</a></li>
            <li>
                <a href="#">Departments</a>
                <ul class="dropdown-menu-col-1" style="display: none;">
                    <li>
                        <a href="departments1.html">Departments 1</a>
                    </li>
                    <li>
                        <a href="departments2.html">Departments 2</a>
                    </li>
                    <li>
                        <a href="departments3.html">Departments 3</a>
                    </li>
                    <li>
                        <a href="single-departments.html">Departments Details</a>
                    </li>
                </ul>
            <a class="mean-expand" href="#" style="font-size: 18px">+</a></li>
            <li>
                <a href="#">Doctors</a>
                <ul class="dropdown-menu-col-1" style="display: none;">
                    <li>
                        <a href="doctors1.html">Doctors 1</a>
                    </li>
                    <li>
                        <a href="doctors2.html">Doctors 2</a>
                    </li>
                    <li>
                        <a href="single-doctor.html">Doctors Details</a>
                    </li>
                </ul>
            <a class="mean-expand" href="#" style="font-size: 18px">+</a></li>
            <li class="possition-static hide-on-mobile-menu">
                <a href="#">Pages</a>
                <div class="template-mega-menu">
                    <div class="container">
                        <div class="row">
                            <div class="col-3">
                                <div class="menu-ctg-title">Home</div>
                                <ul class="sub-menu" style="display: none;">
                                    <li>
                                        <a href="index.html">
                                            <i class="fas fa-home"></i>Home 1</a>
                                    </li>
                                    <li>
                                        <a href="index2.html">
                                            <i class="fas fa-home"></i>Home 2</a>
                                    </li>
                                </ul>
                                <div class="menu-ctg-title">About</div>
                                <ul class="sub-menu" style="display: none;">
                                    <li>
                                        <a href="about.html">
                                            <i class="fab fa-cloudversify"></i>About</a>
                                    </li>
                                </ul>
                                <div class="menu-ctg-title">Doctors</div>
                                <ul class="sub-menu" style="display: none;">
                                    <li>
                                        <a href="doctors1.html">
                                            <i class="fas fa-user-md"></i>Doctors 1</a>
                                    </li>
                                </ul>
                            <a class="mean-expand" href="#" style="font-size: 18px">+</a><a class="mean-expand" href="#" style="font-size: 18px">+</a><a class="mean-expand" href="#" style="font-size: 18px">+</a></div>
                            <div class="col-3">
                                <ul class="sub-menu" style="display: none;">
                                    <li>
                                        <a href="doctors2.html">
                                            <i class="fas fa-user-md"></i>Doctors 2</a>
                                    </li>
                                    <li>
                                        <a href="single-doctor.html">
                                            <i class="fas fa-user-md"></i>Doctors Details</a>
                                    </li>
                                </ul>
                                <div class="menu-ctg-title">Departments</div>
                                <ul class="sub-menu" style="display: none;">
                                    <li>
                                        <a href="departments1.html">
                                            <i class="fas fa-hospital"></i>Department 1</a>
                                    </li>
                                    <li>
                                        <a href="departments2.html">
                                            <i class="fas fa-hospital"></i>Department 2</a>
                                    </li>
                                    <li>
                                        <a href="departments3.html">
                                            <i class="fas fa-hospital"></i>Department 3</a>
                                    </li>
                                    <li>
                                        <a href="single-departments.html">
                                            <i class="fas fa-hospital"></i>Department
                                            Details
                                        </a>
                                    </li>
                                </ul>
                            <a class="mean-expand" href="#" style="font-size: 18px">+</a><a class="mean-expand" href="#" style="font-size: 18px">+</a></div>
                            <div class="col-3">
                                <div class="menu-ctg-title">Pages</div>
                                <ul class="sub-menu" style="display: none;">
                                    <li>
                                        <a href="gallery.html">
                                            <i class="fas fa-clone"></i>Gallery</a>
                                    </li>
                                    <li>
                                        <a href="appointment.html">
                                            <i class="far fa-calendar-check"></i>Appointment</a>
                                    </li>
                                    <li>
                                        <a href="price-table.html">
                                            <i class="far fa-money-bill-alt"></i>Price
                                            Table
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop.html">
                                            <i class="fas fa-shopping-basket"></i>Shop</a>
                                    </li>
                                    <li>
                                        <a href="single-shop.html">
                                            <i class="fas fa-shopping-basket"></i>Shop
                                            Details
                                        </a>
                                    </li>
                                    <li>
                                        <a href="contact.html">
                                            <i class="fas fa-envelope"></i>Contact</a>
                                    </li>
                                </ul>
                            <a class="mean-expand" href="#" style="font-size: 18px">+</a></div>
                            <div class="col-3">
                                <ul class="sub-menu" style="display: none;">
                                    <li>
                                        <a href="faq.html">
                                            <i class="fas fa-file-archive"></i>Faq List</a>
                                    </li>
                                    <li>
                                        <a href="404.html">
                                            <i class="fas fa-exclamation-triangle"></i>404
                                            Error
                                        </a>
                                    </li>
                                    <li>
                                        <a href="coming-soon.html">
                                            <i class="fas fa-sort-amount-up"></i>Coming
                                            Soon
                                        </a>
                                    </li>
                                </ul>
                                <div class="menu-ctg-title">News</div>
                                <ul class="sub-menu" style="display: none;">
                                    <li>
                                        <a href="news1.html">
                                            <i class="far fa-newspaper"></i>News 1</a>
                                    </li>
                                    <li>
                                        <a href="news2.html">
                                            <i class="far fa-newspaper"></i>News 2</a>
                                    </li>
                                    <li>
                                        <a href="single-news.html">
                                            <i class="far fa-newspaper"></i>News Details</a>
                                    </li>
                                </ul>
                            <a class="mean-expand" href="#" style="font-size: 18px">+</a><a class="mean-expand" href="#" style="font-size: 18px">+</a></div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="hide-on-desktop-menu">
                <a href="#">Pages</a>
                <ul style="display: none;">
                    <li>
                        <a href="gallery.html">Gallery</a>
                    </li>
                    <li>
                        <a href="appointment.html">Appointment</a>
                    </li>
                    <li>
                        <a href="price-table.html">Price Table</a>
                    </li>
                    <li>
                        <a href="shop.html">Shop</a>
                    </li>
                    <li>
                        <a href="single-shop.html">Shop Details</a>
                    </li>
                    <li>
                        <a href="faq.html">Faq List</a>
                    </li>
                    <li>
                        <a href="404.html">404 Error</a>
                    </li>
                    <li>
                        <a href="coming-soon.html">Coming Soon</a>
                    </li>
                </ul>
            <a class="mean-expand" href="#" style="font-size: 18px">+</a></li>
            <li>
                <a href="#">News</a>
                <ul class="dropdown-menu-col-1" style="display: none;">
                    <li>
                        <a href="news1.html">News 1</a>
                    </li>
                    <li>
                        <a href="news2.html">News 2</a>
                    </li>
                    <li>
                        <a href="single-news.html">News Details</a>
                    </li>
                </ul>
            <a class="mean-expand" href="#" style="font-size: 18px">+</a></li>
            <li class="mean-last">
                <a href="contact.html">Contact</a>
            </li>
        </ul>
    </nav>
  </div>




    <!-- Preloader Start Here -->
    <!-- <div id="preloader"></div> -->
    <!-- Preloader End Here -->
    <!-- scrollUp Start Here -->
    <a href="#wrapper" data-type="section-switch" class="scrollUp">
        <i class="fas fa-angle-double-up"></i>
    </a>
    <!-- scrollUp End Here -->
    <div id="wrapper" class="wrapper">
        <!-- Header Area Start Here -->
        @php
            $items = App\FrontendTopBar::where('status', 1)->get();
            $topbar_icons = App\FooterBottomIcon::where('status', 1)->get();
        @endphp

        <header id="header_1">
            <div class="header-top-bar top-bar-border-bottom bg-light-primary100 d-none d-md-block">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-12 col-md-12 col-12 header-contact-layout1">
                            <ul>
                                @foreach($items as $key=> $item)
                                <li>
                                    <i class="fas fa-{{$item->icon}}"></i>{{$item->item}}
                                </li>
                                @endforeach
                                <!--<li>-->
                                <!--    <i class="fas fa-map-marker-alt"></i>Medilink ltd, 59 Newyork City-->
                                <!--</li>-->
                                <!--<li>-->
                                <!--    <i class="far fa-clock"></i>Mon - Fri: 9.00am - 11.00pm-->
                                <!--</li>-->
                            </ul>
                        </div>
                        <div class="col-xl-4 d-none d-xl-block">
                            <ul class="header-social-layout1">
                                @foreach($topbar_icons as $key=> $topbar_icon)
                                <li>
                                    <a href="{{$topbar_icon->link}}">
                                        <i class="fab fa-{{$topbar_icon->icon}}"></i>
                                    </a>
                                </li>
                                @endforeach
                                <!--<li>-->
                                <!--    <a href="#">-->
                                <!--        <i class="fab fa-twitter"></i>-->
                                <!--    </a>-->
                                <!--</li>-->
                                <!--<li>-->
                                <!--    <a href="#">-->
                                <!--        <i class="fab fa-linkedin-in"></i>-->
                                <!--    </a>-->
                                <!--</li>-->
                                <!--<li>-->
                                <!--    <a href="#">-->
                                <!--        <i class="fab fa-pinterest"></i>-->
                                <!--    </a>-->
                                <!--</li>-->
                                <!--<li>-->
                                <!--    <a href="#">-->
                                <!--        <i class="fab fa-skype"></i>-->
                                <!--    </a>-->
                                <!--</li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-menu-area header-menu-layout1">
                <div class="container">
                    <div class="row no-gutters d-flex align-items-center">
                      @php
                      $header_logos = App\FrontendHeaderLogo::where('status', 1)->get();
                      @endphp
                      @foreach($header_logos as $key=> $header_logo)
                      <div class="col-lg-2 col-md-2 logo-area-layout1">
                          <a href="https://iconmedicalbd.com/" class="temp-logo">
                              <img src="{{asset('uploads/header_logo/')}}/{{$header_logo->logo}}" alt="logo" class="img-fluid">
                          </a>
                      </div>
                      @endforeach

                        <div class="col-lg-6 col-md-6 possition-static">
                            <div class="template-main-menu">
                                <nav id="dropdown">
                                    <ul style = "padding-right:20px;">
                                        <li>
                                            <a href="https://iconmedicalbd.com/">Home</a>

                                        </li>
                                        @foreach(App\Frontend::where('status',1)->get() as $menu)
                                        <li>
                                            <a href="{{$menu->url?? ''}}">{{$menu->menu}}</a>
                                            @foreach(App\Submenu::all() as $subone)
										        @if($subone->menu_id == $menu->id)
                                            <ul class="dropdown-menu-col-1">
                                                <li><a href="{{$subone->suburl?? ''}}">{{$subone->submenu?? ''}}</a></li>

                                            </ul>
                                                 @else

    								            @endif

    									@endforeach
                                        </li>
                                         @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="header-action-items-layout1">
                                <ul>
                                    <li class="d-none d-xl-block">
                                        <form id="top-search-form" class="header-search-dark">
                                            <input type="text" class="search-input" placeholder="Search...." required="">
                                            <button class="search-button">
                                                <i class="flaticon-search"></i>
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <a href="{{url('appointments')}}" class="action-items-primary-btn">Appointment<i class="fas fa-chevron-right"></i></a>
                                    </li>
                                    @if (Route::has('login'))
                                    <li>

                                            @auth
                                                <a href="{{ url('/home') }}"></a>

                                                <a class="action-items-primary-btn" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
									             Logout</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            @else
                                                <a href="{{ route('login') }}"class="action-items-primary-btn">Login</a>

                                                @if (Route::has('register'))
                                                    <a href="{{ route('register') }}"></a>
                                                @endif
                                            @endauth
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header Area End Here -->


          @yield('breadcrumb')

          @yield('content')





 <!-- Footer Area Start Here -->
 <footer>
     <section class="footer-top-wrap">
         <div class="container">
             <div class="row">
                 <div class="single-item col-lg-3 col-md-6 col-12">
                     <div class="footer-box">
                     @php
                     $footer_logos = App\FooterLogo::where('status', 1)->get();
                     @endphp
                     @foreach($footer_logos as $key=> $footer_logo)
                         <div class="footer-logo" >
                             <a href="#"><img src="{{asset('uploads/footer_logo/')}}/{{$footer_logo->logo}}" class="img-fluid" style="height: 100px; width: 195px;" alt="footer-logo"></a>
                         </div>
                     @endforeach

                     @php
                        $footer_logo_items = App\FooterLogoItem::where('status', 1)->get();
                     @endphp
                     @foreach($footer_logo_items as $key=> $footer_logo_item)
                         <div class="footer-about">
                             <p>{{$footer_logo_item->paragraph}}
                             </p>
                         </div>

                         <div class="footer-contact-info">
                             <ul>
                                 <li><i class="fas fa-map-marker-alt"></i>{{$footer_logo_item->location}}</li>
                                 <li><i class="fas fa-phone"></i>{{$footer_logo_item->phone}}</li>
                                 <li><i class="far fa-envelope"></i>{{$footer_logo_item->email}}</li>
                             </ul>
                         </div>
                        @endforeach
                     </div>
                 </div>
     <!--<section class="footer-top-wrap">-->
     <!--    <div class="container">-->
     <!--        <div class="row">-->
     <!--            <div class="single-item col-lg-3 col-md-6 col-12">-->
     <!--                <div class="footer-box">-->
     <!--                    <div class="footer-logo">-->
     <!--                        <a href="index.html"><img src="{{asset('frontend_assets/img/footerlogo.png')}}" class="img-fluid" alt="footer-logo"></a>-->
     <!--                    </div>-->
     <!--                    <div class="footer-about">-->
     <!--                        <p>We are ipsum dolor sit amet aeeatt consectetuer adipiscing elitseder diam-->
     <!--                            nonummy.-->
     <!--                        </p>-->
     <!--                    </div>-->
     <!--                    <div class="footer-contact-info">-->
     <!--                        <ul>-->
     <!--                            <li><i class="fas fa-map-marker-alt"></i>59 Street, 1200 Techpark</li>-->
     <!--                            <li><i class="fas fa-phone"></i>+59888555</li>-->
     <!--                            <li><i class="far fa-envelope"></i>medilink@gmail.com</li>-->
     <!--                        </ul>-->
     <!--                    </div>-->
     <!--                </div>-->
     <!--            </div>-->
                 @php
                    $headings = App\FooterHeading::active()->take(2)->with(['heading_items' => function($q) {
                        $q->active();
                    }])->get();

                    $openingHours = App\FooterOpeningHour::where('status', 0)->get();
                @endphp

                 @foreach($headings as $key => $heading)
                     <div class="single-item col-lg-3 col-md-6 col-12">
                         <div class="footer-box">
                             <div class="footer-header">
                                 <h3>{{ $heading->heading }}</h3>
                             </div>
                             <div class="footer-departments">
                                 <ul>
                                     @foreach($heading->heading_items as $key => $item)
                                        <li>
                                            <a target="_blank" href="{{ $item->link }}">{{ $item->heading_item }}</a>
                                        </li>
                                     @endforeach
                                 </ul>
                             </div>
                         </div>
                     </div>
                 @endforeach
                 <!--<div class="single-item col-lg-3 col-md-6 col-12">-->
                 <!--    <div class="footer-box">-->
                 <!--        <div class="footer-header">-->
                 <!--            <h3>Departments</h3>-->
                 <!--        </div>-->
                 <!--        <div class="footer-departments">-->
                 <!--            <ul>-->
                 <!--                <li><a href="single-departments.html">Dental Care</a></li>-->
                 <!--                <li><a href="single-departments.html">Medicine</a></li>-->
                 <!--                <li><a href="single-departments.html">Orthopedic</a></li>-->
                 <!--                <li><a href="single-departments.html">Emergency</a></li>-->
                 <!--                <li><a href="single-departments.html">Skilled Doctors</a></li>-->
                 <!--                <li><a href="single-departments.html">Certified Clinic</a></li>-->
                 <!--            </ul>-->
                 <!--        </div>-->
                 <!--    </div>-->
                 <!--</div>-->

                 <!--<div class="single-item col-lg-3 col-md-6 col-12">-->
                 <!--    <div class="footer-box">-->
                 <!--        <div class="footer-header">-->
                 <!--            <h3>Quick Links</h3>-->
                 <!--        </div>-->
                 <!--        <div class="footer-quick-link">-->
                 <!--            <ul>-->
                 <!--                <li><a href="about.html">About Us</a></li>-->
                 <!--                <li><a href="about.html">What We Do</a></li>-->
                 <!--                <li><a href="faq.html">Faq’s</a></li>-->
                 <!--                <li><a href="appointment.html">Appointment</a></li>-->
                 <!--                <li><a href="contact.html">Contact</a></li>-->
                 <!--                <li><a href="contact.html">24/7 Support</a></li>-->
                 <!--            </ul>-->
                 <!--        </div>-->
                 <!--    </div>-->
                 <!--</div>-->


                         @php

                            $weekDays = ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'];   // fixed 7 day name
                            $weakName = substr(Carbon\Carbon::parse(now())->format('l'), 0, 3);   // current day name

                            $is_opened = 'Closed';
                            $is_day_index = 9999;
                            $openingOurs = App\FooterOpeningHour::get();

                            foreach($openingOurs as $key => $openingOur) {
                                $day = $openingOur->day;
                                $days = explode('-', $day); // make an array of day
                                $day1 = trim($days[0], ' ');

                                try {
                                    $day2 = trim($days[1], ' ');
                                } catch (\Exception $ex) {
                                    $day2 = $day1;
                                }



                                $start_in = array_search ($day1, $weekDays);
                                $end_in = array_search ($day2, $weekDays);

                                if ($start_in > $end_in) {
                                    $temp = $start_in;
                                    $start_in = $end_in;
                                    $end_in = $temp;
                                }

                                for($i = $start_in; $i<=$end_in; $i++)
                                {
                                    if($weekDays[$i] == $weakName) {
                                        $is_day_index = $key;

                                        $time = $openingOur->time;
                                        $times = explode('-', $time);

                                        $time1 = str_replace(' ', '', $times[0]);
                                        $time2 = str_replace(' ', '', $times[1]);

                                        $start_times = explode(':', $time1);
                                        $end_times = explode(':', $time2);

                                        $start_hour = $start_times[0];
                                        $end_hour = $end_times[0];
                                        $start_min = $start_times[1];
                                        $end_min = $end_times[1];

                                        $now_hour = Carbon\Carbon::parse(now())->addHour(6)->format('H');
                                        $now_min = Carbon\Carbon::parse(now())->format('i');

                                        $start = $start_hour . ':' . $start_min;
                                        $end = $end_hour . ':' . $end_min;
                                        $now = $now_hour . ':' . $now_min;


                                        if($now >= $start && $now <=  $end) {
                                            $is_opened = 'Opened';
                                        }
                                    }
                                }
                            }
                        @endphp


                 <div class="single-item col-lg-3 col-md-6 col-12">
                     <div class="footer-box">
                         <div class="footer-header">
                             <h3>Opening Hours</h3>
                         </div>
                         <div class="footer-opening-hours">
                             <ul>
                                  @foreach($openingHours as $key => $openingHour)
                                    <li>

                                        @if($key == $is_day_index)
                                        {{ $openingHour->day }} :  <span>{{ $is_opened }}</span>
                                        @else
                                        {{ $openingHour->day }} : {{ $openingHour->time }}
                                        @endif
                                    </li>
                                 @endforeach
                                 <!-- <li>Friday: 9.00 - 12.00</li>
                                 <li>Saturday: 9.00 - 17.00</li>
                                 <li>Sunday: 9.00 - 16.00</li>
                                 <li>Monday: 9.00 - 16.00</li>
                                 <li>Tuesday: 9.00 - 16.00</li>
                                 <li>Wednesday: 9.00 - 16.00</li>
                                 <li>Thursday: 9.00 - 16.00</li> -->



                                  <!-- <li>Fri - Sat: 9.00 - 12.00</li>
                                 <li>Mon - Tue: 9.00 - 17.00</li>
                                 <li>Wed - Thur: 9.00 - 16.00</li> -->

                                 <!--<li>Saturday: 9.00 - 14.00</li>-->
                                 <!-- <li>Sunday:<span> Closed</span></li> -->
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
      <section class="footer-center-wrap">
         <div class="container">

                        <div class="row">
                             <div class="col-lg-12">
                                 @if(session('added_success'))
                                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                                         <strong>Successfully Done!</strong>
                                         {{session('added_success')}}
                                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                             <span aria-hidden="true">×</span>
                                         </button>
                                     </div>
                                 @endif
                             </div>
                        </div>

             <div class="row no-gutters">
                 <div class="col-lg-4 col-12">
                     <div class="footer-social">
                         <ul>
                             <li>Follow Us:</li>
                              @php
                                $footer_bottom_icons = App\FooterBottomIcon::where('status', 1)->get();
                             @endphp

                             @foreach($footer_bottom_icons as $key=> $footer_bottom_icon)
                             <li><a target="_blank" href="{{$footer_bottom_icon->link}}"><i class="fab fa-{{$footer_bottom_icon->icon}}"></i></a></li>
                             @endforeach
                             <!-- <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                             <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                             <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                             <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                             <li><a href="#"><i class="fab fa-skype"></i></a></li> -->
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-8 col-12">
                     <div class="row">
                         <div class="col-md-6 col-12">
                             <div class="newsletter-title">
                                 <h4 class="item-title">Stay informed and healthy</h4>
                             </div>
                         </div>
                         <div class="col-md-6 col-12">
                             <form class="newsletter-form" action="{{route('frontend_footer_signup.store')}}" method="POST">
                                 @csrf
                                 <div class="input-group stylish-input-group">
                                     <input type="email" name="email" class="form-control" placeholder="Enter your e-mail">

                                     <span class="input-group-addon">
                                         <button type="submit">
                                             <span aria-hidden="true">SIGN UP!</span>
                                         </button>
                                     </span>
                                  </div>
                             </form>
                              <!-- <div class="newsletter-form">
                                 <div class="input-group stylish-input-group">
                                     <input type="text" class="form-control" placeholder="Enter your e-mail">
                                     <span class="input-group-addon">
                                         <button type="submit">
                                             <span aria-hidden="true">SIGN UP!</span>
                                         </button>
                                     </span>
                           </div>
                             </div> -->
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-md-8">
             </div>
             <div class="col-md-4">
                 @error('email')
                 <small class="text-danger">{{$message}}</small>
                 @enderror
             </div>
         </div>
     </section>
     <section class="footer-bottom-wrap">
         <div class="copyright">Copyright @ 2021 medilink. All Rights Reserved.<a target="_blank" href="" rel="nofollow">
                 PayraSoft</a></div>
     </section>
 </footer>
 <!-- Footer Area End Here -->
</div>
<!-- jquery-->
<script src="{{asset('frontend_assets/js/jquery-2.2.4.min.js')}}"></script>
<!-- Plugins js -->
<script src="{{asset('frontend_assets/js/plugins.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('frontend_assets/js/popper.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('frontend_assets/js/bootstrap.min.js')}}"></script>
<!-- Counterup Js -->
<script src="{{asset('frontend_assets/js/jquery.counterup.min.js')}}"></script>
<!-- WOW JS -->
<script src="{{asset('frontend_assets/js/wow.min.js')}}"></script>
<!-- Waypoints Js -->
<script src="{{asset('frontend_assets/js/waypoints.min.js')}}"></script>
<!-- Parallaxie Js -->
<script src="{{asset('frontend_assets/js/parallaxie.js')}}"></script>
<!-- Nivo slider js -->
<script src="{{asset('frontend_assets/vendor/slider/js/jquery.nivo.slider.js')}}"></script>
<script src="{{asset('frontend_assets/vendor/slider/home.js')}}"></script>
<!-- Owl Carousel Js -->
<script src="{{asset('frontend_assets/vendor/OwlCarousel/owl.carousel.min.js')}}"></script>
<!-- Meanmenu Js -->
<script src="{{asset('frontend_assets/js/jquery.meanmenu.min.js')}}"></script>
<!-- Magnific Popup Js -->
<script src="{{asset('frontend_assets/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Isotope Js -->
<script src="{{asset('frontend_assets/js/isotope.pkgd.min.js')}}"></script>
<!-- Smoothscroll Js -->
<script src="{{asset('frontend_assets/js/smoothscroll.min.js')}}"></script>
<script src="{{asset('frontend_assets/js/animation.js')}}"></script>
<!-- Custom Js -->
<script src="{{asset('frontend_assets/js/main.js')}}"></script>

@yield('footer_script')

</body>



</html>
