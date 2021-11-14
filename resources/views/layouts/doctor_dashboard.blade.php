@extends('layouts.frontend')
<!-- @section('contentg')

  <style>
    body {  }
    h1 { font-size: 50px; }
    body { font: 20px Helvetica, sans-serif; color: #333; }
    article { text-align: center;  padding-top: 200px;
    padding-bottom: 150px; display: block; text-align: left; width: 650px; margin: 0 auto; }
    a { color: #dc8100; text-decoration: none; }
    a:hover { color: #333; text-decoration: none; }
  </style>

  <article s>
      <h1>We&rsquo;ll be back soon!</h1>
      <div>
          <p>Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment. If you need to you can always <a href="https://payrasoft.com/">contact us</a>, otherwise we&rsquo;ll be back online shortly!</p>
          <p>&mdash; The Payra Soft Team</p>
      </div>
  </article>
@endsection -->
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

		<!-- Favicons -->


		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{asset('login_assets/css/bootstrap.min.css')}}">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{asset('login_assets/plugins/fontawesome/css/fontawesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('login_assets/plugins/fontawesome/css/all.min.css')}}">

		<!-- Main CSS -->
		<link rel="stylesheet" href="{{asset('login_assets/css/style.css')}}">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

	</head>
	<body class="account-page">

		<!-- Main Wrapper -->
		<div class="main-wrapper">
			<!-- Page Content -->
			<div class="content" style="padding-top:100px; padding-bottom:100px">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-8 offset-md-2">

							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="{{asset('login_assets/img/login-banner.png')}}" class="img-fluid" alt="Login">
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Login <span></span></h3>
										</div>
										<form method="POST"  action="{{ route('login') }}">
                      @csrf

											<div class="form-group form-focus">
                        			<label class="focus-label">Email</label>
                            <input id="email" type="email" class=" floating form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
											</div>
											<div class="form-group form-focus">
								        <label class="focus-label">Password</label>
                        <input id="password" type="password" class="floating form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

											</div>

											<div class="col-md-12" style="display: flex;">
												<div class="col-md-6 text-left">
													<input class="form-check-input" style="font-size:20px;" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

													<label class="form-check-label" style="font-size:13px;" for="remember">
															{{ __('Remember Me') }}
													</label>
												</div>
												<div class="col-md-6 text-right">
													@if (Route::has('password.request'))
														<a class="forgot-link" href="{{ route('password.request') }}">Forgot Password ?</a>
													@endif

												</div>
											</div>
											<button type="submit" class="btn btn-primary btn-block btn-lg login-btn" >Login</button>
											<div class="login-or">
												<span class="or-line"></span>
												<span class="span-or">or</span>
											</div>
											<div class="row form-row social-login">
												<div class="col-6">
													<a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
												</div>
												<div class="col-6">
													<a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
												</div>
											</div>
											<div class="text-center dont-have">Don’t have an account? <a href="{{ route('register') }}">Register</a></div>
										</form>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->

						</div>
					</div>

				</div>

			</div>
			<!-- /Page Content -->

		</div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
		<script src="{{asset('login_assets/js/jquery.min.js')}}"></script>

		<!-- Bootstrap Core JS -->
		<script src="{{asset('login_assets/js/popper.min.js')}}"></script>
		<script src="{{asset('login_assets/js/bootstrap.min.js')}}"></script>

		<!-- Custom JS -->
		<script src="{{asset('login_assets/js/script.js')}}"></script>

	</body>

</html>
@endsection
