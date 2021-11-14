<!DOCTYPE html>
<html>


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@php
    $icon = App\Icon::where('status', 1)->first();
    @endphp
	<title>{{$icon->dashboard_title}}</title>
	<!-- Fav  Icon Link -->

	<link rel="shortcut icon" type="image/png" href="{{asset('uploads/icon/')}}/{{$icon->icon}}">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="{{asset('dashboard_assets/css/bootstrap.min.css')}}">
	<!-- themify icons CSS -->
	<link rel="stylesheet" href="{{asset('dashboard_assets/css/themify-icons.css')}}">
	<!-- Animations CSS -->
	<link rel="stylesheet" href="{{asset('dashboard_assets/css/animate.css')}}">
	<!--font awesam-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="{{asset('dashboard_assets/css/styles.css')}}">
	<!-- summernote CSS -->
	<link href="{{asset('dashboard_assets/css/summernote-bs4.min.css')}}" rel="stylesheet">
	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/print-js/1.6.0/print.css" rel="stylesheet">
    


        @yield('style_script')

	<!-- <link rel="stylesheet" href="{{asset('dashboard_assets/css/blue.css')}}" id="style_theme"> -->
	<link rel="stylesheet" href="{{asset('dashboard_assets/css/responsive.css')}}">
	<!-- morris charts -->
	<link rel="stylesheet" href="{{asset('dashboard_assets/charts/css/morris.css')}}">
	<!-- jvectormap -->
	<link rel="stylesheet" href="{{asset('dashboard_assets/css/jquery-jvectormap.css')}}">

    <script src="{{asset('dashboard_assets/js/modernizr.min.js')}}"></script>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
	  <link rel="stylesheet" type="text/css" href="{{asset('jqueryUi/jquery-ui.min.css')}}">
    <script src="https://kit.fontawesome.com/ee0f18c6ce.js" crossorigin="anonymous"></script>
	
</head>

<body>
	<!-- Pre Loader -->
	<div class="loading">
		<div class="spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>
	</div>
	<!--/Pre Loader -->
	<!-- Color Changer -->
	<div class="theme-settings" id="switcher">
		<span class="theme-click">
			<span class="ti-settings"></span>
		</span>
		<span class="theme-color theme-default" data-color="green"></span>
		<span class="theme-color theme-blue theme-active" data-color="blue"></span>
		<span class="theme-color theme-red " data-color="red"></span>
		<span class="theme-color theme-violet" data-color="violet"></span>
		<span class="theme-color theme-yellow" data-color="yellow"></span>
	</div>
	<!-- /Color Changer -->
	<div class="wrapper ">
		<!-- Sidebar -->
		<nav id="sidebar" class="proclinic-bg">
			<div class="sidebar-header">
				@php
				$footer_logos = App\FooterLogo::where('status', 1)->get();
				@endphp
				@foreach($footer_logos as $key=> $footer_logo)
						<div class="logo">
								<a href="{{route('home')}}"><img src="{{asset('uploads/footer_logo/')}}/{{$footer_logo->logo}}"style="
    width: 200px; height: 114px;" class="img-fluid" alt="footer-logo"></a>
						</div>
				@endforeach
				{{-- <a href="index.html"><img src="{{asset('dashboard_assets/images/logo.png')}}" class="logo" alt="logo"></a> --}}
			</div>
			<ul class="list-unstyled components">
				<li class="">
					<a href="{{url('home')}}">
						<span class="ti-home"></span> Dashboard
					</a>

				</li>

				      <li>
							<a href="#frontend" data-toggle="collapse" aria-expanded="false">
								<span class="ti-pencil-alt"></span> Frontend Part
							</a>
							<ul class="collapse list-unstyled" id="frontend">

							    <li>
                					<a href="#top-bar" data-toggle="collapse" aria-expanded="false">Top Bar</a>
                					<ul class="collapse list-unstyled" id="top-bar">
                					    <li>
                							<a href="{{route('frontend_top_bar.index')}}">Top Bar Left</a>
                						</li>
                						<li>
                							<a href="{{route('footer_bottom_icon.index')}}">Top Bar Icon</a>
                						</li>
                					</ul>
                    			 </li>

            					<li class = "@yield('disease')">
                					<a href="#nav-menu" data-toggle="collapse" aria-expanded="false">Menu</a>
                					<ul class="collapse list-unstyled" id="nav-menu">
                					    <li>
                							<a href="{{url('add_menu')}}">Add menu</a>
                						</li>
                						<li>
                							<a href="{{url('frontend')}}">All menu</a>
                						</li>
                						<li>
                							<a href="{{url('add_submenu')}}">Add Submenu</a>
                						</li>
                						<li>
                							<a href="{{url('submenu')}}">All Sub-menu</a>
                						</li>

                						</li>
                					</ul>
                    			 </li>

                        		 <li>
                					<a href="#logo" data-toggle="collapse" aria-expanded="false">Logo</a>
                					<ul class="collapse list-unstyled" id="logo">
                					    <li>
								            <a href="{{route('header-logo.index')}}">Header Logo</a>
							            </li>

                					    <li>
								            <a href="{{route('footer_logo.index')}}">Footer Logo</a>
							            </li>
                					</ul>
                    			 </li>

								<li>
									<a href="{{route('frontend_banner.index')}}">Banner</a>
								</li>

								<li>
                					<a href="#about" data-toggle="collapse" aria-expanded="false">About Part</a>
                					<ul class="collapse list-unstyled" id="about">
                					    <li>
                							<a href="{{route('abouttitle.index')}}">All About Title</a>
                						</li>
                					    <li>
        									 <a href="{{url('about/offer/view')}}">About Offer</a>
        							 	</li>
        								<li>
        									<a href="{{route('about_category.index')}}">About Category</a>
        								</li>
        								<li>
        									<a href="{{route('about_category_item.index')}}">About Category Item</a>
        								</li>
                					</ul>
                    			 </li>
                    			 
                    			 <li>
                					<a href="#service" data-toggle="collapse" aria-expanded="false">Service</a>
                					<ul class="collapse list-unstyled" id="service">
                					    <li>
                							<a href="{{route('frontend_department_heading.index')}}">Our Services Heading</a>
                						</li>
                					    <li>
        									 <a href="{{route('frontend_department.index')}}">Our Services</a>
        							 	</li>
        								<li>
        									<a href="{{route('frontend_doctor.index')}}">Frontend Doctor</a>
        								</li>
                					</ul>
                    			 </li>
                    			 

								<li>
									<a href="{{route('frontend_our_team.index')}}">Our Team Heading</a>
								</li>

								<li>
									<a href="{{route('frontend_doctor_schedule.index')}}">Doctor Schedule Heading</a>
								</li>

                    			 <li>
        							<a href="{{route('icon.index')}}">Frontend Icon & Title</a>
        						</li>
                    			 <li>
        							<a href="{{route('percentice.index')}}">All Progress Bar Info</a>
        						</li>

                    			 <li>
                				    <a href="{{route('frontend_tripple_logo.index')}}"> Frontend Tripple Logo</a>
				                </li>

								<li>
									<a href="{{route('footer_upper_part.index')}}">Footer Upper Part</a>
								</li>

                    			 <li class = "@yield('disease')">
                					<a href="#footer" data-toggle="collapse" aria-expanded="false">Footer Part</a>
                					<ul class="collapse list-unstyled" id="footer">
                					    <li>
									        <a href="{{route('footer_logo_item.index')}}">Footer Logo Item</a>
        								</li>
        								<li>
        									<a href="{{route('footer_heading.index')}}">Footer Heading</a>
        								</li>
        								<li>
        									<a href="{{route('footer_heading_item.index')}}">Footer Heading Item</a>
        								</li>
        								<li>
        									<a href="{{route('footer_opening_hours.index')}}">Footer Opening Hours</a>
        								</li>
        								<li>
        									<a href="{{route('footer_bottom_icon.index')}}">Footer Bottom Icon</a>
        								</li>
        								<li>
        									<a href="{{route('frontend_footer_signup.index')}}">Footer Sign Up Form</a>
        								</li>
                					</ul>
                    			 </li>

							</ul>
				      </li>
        			  <!--blog-->
        			  <li>
					<a href="#nav-blog" data-toggle="collapse" aria-expanded="false">
						<span class="ti-pencil-alt"></span> Blog Post
					</a>
					<ul class="collapse list-unstyled" id="nav-blog">
						<li>
							<a href="{{route('blog.create')}}">Add Blog post</a>
						</li>
						<li>
							<a href="{{route('blog.index')}}">All Blog post</a>
						</li>

					</ul>
				</li>
				      <!--blog end-->

				<li>
					<a href="{{route('department.index')}}">
						<span class="ti-wheelchair"></span> Department
					</a>
				</li>
				 <li>
					<a href="#designation" data-toggle="collapse" aria-expanded="false">
						<span class="ti-pencil-alt"></span> Designation
					</a>
					<ul class="collapse list-unstyled" id="designation">
						<li>
							<a href="{{route('jobdesignation.create')}}">Add Designation</a>
						</li>
						<li>
							<a href="{{route('jobdesignation.index')}}">All Designation</a>
						</li>

					</ul>
				</li>
				<li class = "@yield('doctor')">
					<a href="#nav-doctor" data-toggle="collapse" aria-expanded="false">
						<span class="ti-user"></span> Doctor
					</a>
					<ul class="collapse list-unstyled" id="nav-doctor">
					    <li>
							<a href="{{route('doctor.create')}}">Add Doctor Info</a>
						</li>
                         <li>
							<a href="{{route('doctor.index')}}">All Doctor Info</a>
						</li>

						</li>
					</ul>
				</li>
				<li>
					<a href="#nav-appointment" data-toggle="collapse" aria-expanded="false">
						<span class="ti-pencil-alt"></span> Appointments
					</a>
					<ul class="collapse list-unstyled" id="nav-appointment">
						<li>
							<a href="{{url('appointment')}}">All Appointment</a>
						</li>
						<li>
							<a href="{{url('online_appointment')}}">All Online Appointment</a>
						</li>
						<li>
							<a href="{{url('pending_online_appointment')}}">Pending Appointment</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="#nav-test" data-toggle="collapse" aria-expanded="false">
						<span class="ti-pencil-alt"></span> Test
					</a>
					<ul class="collapse list-unstyled" id="nav-test">
						<li>
					        <a href="{{route('test.create')}}">Add Test</a>
						</li>
						<li>
							<a href="{{route('test.index')}}">All Test</a>
						</li>
						
						
					</ul>
				</li>
				<li>
					<a href="#nav-testinfo" data-toggle="collapse" aria-expanded="false">
						<span class="ti-pencil-alt"></span> Diagonosis
					</a>
					<ul class="collapse list-unstyled" id="nav-testinfo">
						<li>
					        <a href="{{route('testinfo.create')}}">Add Diagonosis</a>
						</li>
						<li>
							<a href="{{route('testinfo.index')}}">All Diagonosis</a>
						</li>
						
						
						
					</ul>
				</li>



				<li>
					<a href="{{route('patient.index')}}">
						<span class="ti-wheelchair"></span> Patients
					</a>
					<!--<ul class="collapse list-unstyled" id="nav-patients">-->
					<!--	<li>-->
					<!--		<a href="add-patient.html">Patient</a>-->
					<!--	</li>-->
					<!--	<li>-->
					<!--		<a href="patients.html">All Patients</a>-->
					<!--	</li>-->
					<!--	<li>-->
					<!--		<a href="about-patient.html">Patient Details</a>-->
					<!--	</li>-->
					<!--	<li>-->
					<!--		<a href="edit-patient.html">Edit Patient</a>-->
					<!--	</li>-->
					<!--</ul>-->
				</li>

				<li>
				    <a href="{{route('patient_document.index')}}">
						<span class="ti-pencil-alt"></span> Patient's Document
					</a>
				</li>


			    
				<li>
					<a href="#nav-schedule" data-toggle="collapse" aria-expanded="false">
						<span class="ti-layout-menu-v"></span> Schedule
					</a>
					<ul class="collapse list-unstyled" id="nav-schedule">
						
						
						<li>
							<a href="{{url('addSchedule')}}">Add Schedule Info</a>
						</li>
						<li>
							<a href="{{url('schedule')}}">All Schedule Info</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="{{route('notice_board.index')}}">
						<span class="ti-layout-menu-v"></span> Notice Board
					</a>
				</li>

				<li>
					<a href="{{url('prescription')}}">
						<span class="ti-layout-menu-v"></span> Prescription
					</a>
				</li>

				<li>
					<a href="#nav-bed-manager" data-toggle="collapse" aria-expanded="false">
						<span class="ti-sleep"></span> Bed Manager
					</a>
					<ul class="collapse list-unstyled" id="nav-bed-manager">
						<li>
							<a href="{{route('bed_type.index')}}">Bed Type</a>
						</li>
						<li>
							<a href="{{route('bed.index')}}">Bed List</a>
						</li>
						<li>
							<a href="appointments.html">Assign Bed</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="#nav-payment" data-toggle="collapse" aria-expanded="false">
						<span class="ti-money"></span> Payments
					</a>
					<ul class="collapse list-unstyled" id="nav-payment">
						<li>
							<a href="add-payment.html">Add Payment</a>
						</li>
						<li>
							<a href="payments.html">All Payments</a>
						</li>
						<li>
							<a href="about-payment.html">Payment Invoice</a>
						</li>
					</ul>
				</li>
				<li class = "@yield('disease')">
					<a href="#nav-disease" data-toggle="collapse" aria-expanded="false">
						<span class="ti-pencil-alt"></span> Disease
					</a>
					<ul class="collapse list-unstyled" id="nav-disease">
						<li>
							<a href="{{url('disease')}}">Add Disease</a>
						</li>
						<li>
							<a href="appointments.html">All Disease</a>
						</li>

						</li>
					</ul>
				</li>
				<li class = "@yield('insurence')">
					<a href="#nav-insurence" data-toggle="collapse" aria-expanded="false">
						<span class="ti-pencil-alt"></span> Insurance
					</a>
					<ul class="collapse list-unstyled" id="nav-insurence">
						<li>
							<a href="{{url('insurence')}}">Add Insurance</a>
						</li>
						<li>
							<a href="{{url('insurance_list')}}">All Insurance</a>
						</li>
						<li>
							<a href="{{url('limit_approval')}}">Add Limit Approval</a>
						</li>
						<li>
							<a href="{{url('limit_approval_list')}}">Limit Approval List</a>
						</li>

						</li>
					</ul>
				</li>
				<li class = "@yield('employee')">
					<a href="#nav-employee" data-toggle="collapse" aria-expanded="false">
						<span class="ti-pencil-alt"></span> Human Resources
					</a>
					<ul class="collapse list-unstyled" id="nav-employee">
						<li>
							<a href="{{url('employee')}}">Add employee</a>
						</li>
						@foreach(App\Designation::all() as $desig)
						<li>
							<a href="{{url('singleEmployee')}}/{{$desig->id}}">{{$desig->designation}} List</a>
						</li>
						@endforeach

						</li>
					</ul>
				</li>
				<li>
					<a href="#nav-rooms" data-toggle="collapse" aria-expanded="false">
						<span class="ti-key"></span> Room Allotments
					</a>
					<ul class="collapse list-unstyled" id="nav-rooms">
						<li>
							<a href="add-room.html">Add Room Allotment</a>
						</li>
						<li>
							<a href="rooms.html">All Rooms</a>
						</li>
						<li>
							<a href="edit-room.html">Edit Room Allotment</a>
						</li>
					</ul>
                </li>


                <li>
					<a href="#human_Resources" data-toggle="collapse" aria-expanded="false">
						<span class="ti-user"></span> Human Resources
					</a>
					<ul class="collapse list-unstyled" id="human_Resources">
						<li>
							<a href="{{url('designation')}}">Add Designation</a>
                        </li>
                        <li>
							<a href="{{url('employee')}}">All Employeee</a>
						</li>
						@foreach(App\Designation::all() as $desig)
						<li>
							<a href="{{url('singleEmployee')}}/{{$desig->id}}">{{$desig->designation}} List</a>
						</li>
						@endforeach
					</ul>
				<li>

                <li>
					<a href="#nav-activity" data-toggle="collapse" aria-expanded="false">
						<span class="ti-key"></span>Hospital Activities
					</a>
					<ul class="collapse list-unstyled" id="nav-activity">
						<li>
							<a href="{{url('birth')}}">Birth Report</a>
						</li>
						<li>
							<a href="{{url('death')}}">Death Report</a>
						</li>
						<li>
							<a href="{{url('operation')}}">Operation Report</a>
						</li>
						<li>
							<a href="#">Investigation Report</a>
						</li>
						<li>
							<a href="{{url('medicineCategory')}}">Medicine Category List</a>
						</li>
						<li>
							<a href="{{url('medicine')}}">Medicine List</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#nav-icons" data-toggle="collapse" aria-expanded="false">
						<span class="ti-themify-favicon"></span> icons
					</a>
					<ul class="collapse list-unstyled" id="nav-icons">
						<li>
							<a href="{{url('icon/font_awesome')}}">Font Awesome </a>
						</li>
						<li>
							<a href="{{url('icon/themify')}}">Themify</a>
						</li>
					</ul>
				</li>


			<div class="nav-help animated fadeIn">
				<h5><span class="ti-comments"></span> Need Help</h5>
				<h6>
					<span class="ti-mobile"></span> +88 01866776970</h6>
				<h6>
					<span class="ti-email"></span>  hello@payrasoftbd.com</h6>
				<p class="copyright-text">Copy rights &copy; 2021</p>
			</div>
		</nav>
		<!-- /Sidebar -->
		<!-- Page Content -->
		<div id="content">
			<!-- Top Navigation -->
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="responsive-logo">
						<a href="index.html"><img src="images/logo-dark.png" class="logo" alt="logo"></a>
					</div>
					<ul class="nav">
						<li class="nav-item">
							<span class="ti-menu" id="sidebarCollapse"></span>
						</li>
						<li class="nav-item">
							<span title="Fullscreen" class="ti-fullscreen fullscreen"></span>
						</li>
						<li class="nav-item">
							<a  data-toggle="modal" data-target=".proclinic-modal-lg">
								<span class="ti-search"></span>
							</a>
							<div class="modal fade proclinic-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lorvens">
									<div class="modal-content proclinic-box-shadow2">
										<div class="modal-header">
											<h5 class="modal-title">Search Patient/Doctor:</h5>
											<span class="ti-close" data-dismiss="modal" aria-label="Close">
											</span>
										</div>
										<div class="modal-body">
											<form>
												<div class="form-group">
													<input type="text" class="form-control" id="search-term" placeholder="Type text here">
													<button type="button" class="btn btn-lorvens proclinic-bg">
														<span class="ti-location-arrow"></span> Search</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
								<span class="ti-announcement"></span>
							</a>
							<div class="dropdown-menu proclinic-box-shadow2 notifications animated flipInY">
								<h5>Notifications</h5>
								<a class="dropdown-item" href="#">
									<span class="ti-wheelchair"></span> New Patient Added</a>
								<a class="dropdown-item" href="#">
									<span class="ti-money"></span> Patient payment done</a>
								<a class="dropdown-item" href="#">
									<span class="ti-time"></span>Patient Appointment booked</a>
								<a class="dropdown-item" href="#">
									<span class="ti-wheelchair"></span> New Patient Added</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
								<span class="ti-user"></span>
							</a>
							<div class="dropdown-menu proclinic-box-shadow2 profile animated flipInY">
								<h5></h5>
								<a class="dropdown-item" href="#">
									<span class="ti-settings"></span> Settings</a>
								<a class="dropdown-item" href="#">
									<span class="ti-help-alt"></span> Help</a>
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
									<span class="ti-power-off"></span> Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
							</div>
						</li>
					</ul>

				</div>
			</nav>

      <!-- <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"><i class="icon-log-out1"></i>
                      Sign Out
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form> -->
			<!-- /Top Navigation -->
			<!-- Breadcrumb -->
			<!-- Page Title -->
			<div class="row no-margin-padding">

        @yield('breadcrumb')
			</div>
			<!-- /Page Title -->

			<!-- /Breadcrumb -->

			<!-- Main Content -->
      <div class="container-fluid home">

        @yield('content')


      </div>
			<!-- /Main Content -->

		</div>
		<!-- /Page Content -->
	</div>
	<!-- Back to Top -->
	<a id="back-to-top" href="#" class="back-to-top">
		<span class="ti-angle-up"></span>
	</a>
	<!-- /Back to Top -->

	<!-- Jquery Library-->
	<script src="{{asset('dashboard_assets/js/jquery-3.2.1.min.js')}}"></script>
	
	<!-- Popper Library-->
	<script src="{{asset('dashboard_assets/js/popper.min.js')}}"></script>
	<!-- Bootstrap Library-->
	<script src="{{asset('dashboard_assets/js/bootstrap.min.js')}}"></script>
	<!-- morris charts -->
	<script src="{{asset('dashboard_assets/charts/js/raphael-min.js')}}"></script>
	<script src="{{asset('dashboard_assets/charts/js/morris.min.js')}}"></script>
	<script src="{{asset('dashboard_assets/js/custom-morris.js')}}"></script>
    <script src="{{asset('jqueryUi/jquery-ui.min.js')}}" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/print-js/1.6.0/print.js" type="text/javascript"></script>
	<!-- Custom Script-->
	<script src="{{asset('dashboard_assets/js/custom.js')}}"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<script>
		$(document).ready( function () {
			$('#table_id').DataTable();
			} );
    </script>
    	<!-- Summernote Script-->
     <script src="{{asset('dashboard_assets/js/summernote-bs4.min.js')}}"></script>
    <script>
      $('#summernote').summernote();
    </script>

    @yield('footer_script')
</body>



</html>
