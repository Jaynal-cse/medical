@extends('layouts.frontend')

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

  							<!-- Register Content -->
  							<div class="account-content">
  								<div class="row align-items-center justify-content-center">
  									<div class="col-md-7 col-lg-6 login-left">
  										<img src="{{asset('login_assets/img/login-banner.png')}}" class="img-fluid" alt=" Register">
  									</div>
  									<div class="col-md-12 col-lg-6 login-right">
  										<div class="login-header">
  											<h3>Doctor Register <a href="{{ route('register') }}">Are you a Patient?</a></h3>
  										</div>

  										<!-- Register Form -->
  										<form method="POST" action="{{ route('register') }}">
                        @csrf
  											<div class="form-group form-focus">
                          <input id="status" type="hidden" class="form-control floating @error('status') is-invalid @enderror" name="status" value="Doctor" required autocomplete="status" autofocus>
                          <input id="name" type="text" class="form-control floating @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
  												<label class="focus-label">Name</label>
  											</div>
  											<div class="form-group form-focus">
                          <input id="phone_number" type="number" class="form-control floating @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>

                          @error('phone_number')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror

  												<label class="focus-label">Mobile Number</label>
  											</div>
  											<div class="form-group form-focus">
                          <input id="email" type="email" class="form-control floating @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror

  												<label class="focus-label">Email</label>
  											</div>
  											<div class="form-group form-focus">

                          <input id="password" type="password" class="form-control floating @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
  												<label class="focus-label">Create Password</label>
  											</div>
  											<div class="form-group form-focus">

                          <input id="password-confirm" type="password" class="form-control floating" name="password_confirmation" required autocomplete="new-password">

  												<label class="focus-label">Confirm Password</label>
  											</div>
  											<div class="text-right">
  												<a class="forgot-link" href="{{ route('login') }}">Already have an account?</a>
  											</div>
  											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
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
  										</form>
  										<!-- /Register Form -->

  									</div>
  								</div>
  							</div>
  							<!-- /Register Content -->

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
{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
