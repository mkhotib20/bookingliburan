<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Mitra Bookingliburan</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('public/front/logo-transparan.png')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/login')}}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/login')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/login')}}/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/login')}}/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{url('public/login')}}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/login')}}/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/login')}}/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{url('public/login')}}/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/login')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{url('public/login')}}/css/main.css">
    <link rel="stylesheet" href="{{asset('public/izi')}}/iziToast.min.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				
				<form method="POST" class="login100-form validate-form" action="{{ route('admin.auth.loginAdmin') }}">
						@csrf
					<span class="login100-form-title p-b-26">
						Selamat datang 
					</span>
					<center>
						<img src="{{asset('public/front/logo-transparan.png')}}" width="100px" alt=""></center>
					{{-- <div style="margin-top: 50px" class="wrap-input100 validate-input" data-validate = "Enter Username">
						<input id="username" type="text" class="input100 @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus >
						<span class="focus-input100" data-placeholder="username"></span>
					</div> --}}
					<div style="margin-top: 50px" class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input autofocus class="input100" value="{{ old('email') }}" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					{{-- <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100 @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="current-password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div> --}}
					@error('password')
					<strong>{{ $message }}</strong>
					@enderror
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
{{-- 
					<div class="text-center p-t-115">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a class="txt2" href="#">
							Sign Up
						</a>
					</div> --}}
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{url('public/login')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('public/login')}}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('public/login')}}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{url('public/login')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{asset('public/izi/iziToast.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{url('public/login')}}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('public/login')}}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{url('public/login')}}/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{url('public/login')}}/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="{{url('public/login')}}/js/main.js"></script>
@if (Session::get('msg'))
<script>
    msg = "{{Session::get('msg')}}"
    
    iziToast.error({
            title: 'Failed',
            message: msg,
            position: 'topRight',
        });
	// alert(msg)
</script>
@endif


</body>
</html>