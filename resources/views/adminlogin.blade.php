<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('Interface/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Interface/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Interface/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Interface/vendor/animate/animate.css')}}">	
	<link rel="stylesheet" type="text/css" href="{{asset('Interface/vendor/css-hamburgers/hamburgers.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Interface/vendor/animsition/css/animsition.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Interface/vendor/select2/select2.min.css')}}">	
	<link rel="stylesheet" type="text/css" href="{{asset('Interface/vendor/daterangepicker/daterangepicker.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Interface/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Interface/css/main.css')}}">
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
						Login
					</span>
					<?php
						$message = Session::get('thongbao');
						$message10 = Session::get('thongbao10');
						if ($message or $message10 ){
							echo "<center><font color=red>$message</font></center>";
							echo "<center><font color=red>$message10</font></center>";
							Session::put('thongbao',null);
							Session::put('thongbao10',null);
						}
					?>
					<form action="{{URL::to('dashboard')}}" method="post">
						@csrf
						<div class="wrap-input100">
							<input class="input100" type="email" name="admin_email">
							<span class="focus-input100"></span>
							<span class="label-input100">Email</span>
						</div>
						
						
						<div class="wrap-input100 validate-input" data-validate="Password is required">
							<input class="input100" type="password" name="admin_password">
							<span class="focus-input100"></span>
							<span class="label-input100">Password</span>
						</div>

						<div class="flex-sb-m w-full p-t-3 p-b-32">
							<div class="contact100-form-checkbox">
								<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
								<label class="label-checkbox100" for="ckb1">
									Remember me
								</label>
							</div>

							<div>
								<a href="{{route('getFormReset')}}" class="txt1">
									Forgot Password?
								</a>
							</div>
						</div>
						<div>
							<center>
							<div class="g-recaptcha" data-sitekey="6LfJHscZAAAAAN350HaU3DFjM7fIjQLQrMFhQT51"></div>
							<br/>
							@if($errors->has('g-recaptcha-response'))
							<span class="invalid-feedback" style="display:block">
								<strong>{{$errors->first('g-recaptcha-response')}}</strong>
							</span>
							@endif
							</center>
						</div>
						<div class="container-login100-form-btn">
							<input class="login100-form-btn" type="submit" value="Submit">
						</div>
						
						<div class="text-center p-t-46 p-b-20">
							<span class="txt2">
								or sign up using
							</span>
						</div>

						<div class="login100-form-social flex-c-m">
							<a href="{{route('FACEBOOK')}}" class="login100-form-social-item flex-c-m bg1 m-r-5">
								<i class="fa fa-facebook-f" aria-hidden="true"></i>
							</a>

							<a href="{{route('GOOGLE')}}" class="login100-form-social-item flex-c-m bg3 m-r-5">
								<i class="fa fa-google" aria-hidden="true"></i>
							</a>

							<a href="{{route('GITHUB')}}" class="login100-form-social-item flex-c-m bg2 m-r-5">
								<i class="fa fa-github" aria-hidden="true"></i>
							  </a>
						</div>
					</form>
			</div>

				<div class="login100-more" style="background-image: url('Interface/images/11.png');">
				</div>
			</div>
		</div>
	</div>
	
	<script src="{{asset('Interface/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('Interface/vendor/animsition/js/animsition.min.js')}}"></script>
	<script src="{{asset('Interface/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('Interface/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('Interface/vendor/select2/select2.min.js')}}"></script>
	<script src="{{asset('Interface/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('Interface/vendor/daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{asset('Interface/vendor/countdowntime/countdowntime.js')}}"></script>
	<script src="{{asset('Interface/js/main.js')}}"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>