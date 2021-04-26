@extends('welcome')
@section('content')

<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-sm-offset-1">
				@if(session()->has('message'))
				<div class="alert alert-success">
					{!! session()->get('message') !!}
				</div>
				@elseif(session()->has('error'))
				<div class="alert alert-danger">
					{!! session()->get('error') !!}
				</div>
				@endif
				<div class="login-form"><!--login form-->
					@php 
						$token = $_GET['token'];
						$email = $_GET['email'];
					@endphp
					<h2>New Password</h2>
					<form action="{{url('/reset-new-pass')}}" method="POST">
						@csrf
						<input type="hidden" name="email" value="{{$email}}"/>
						<input type="hidden"name="token" value="{{$token}}"/>
						<input type="password" name="password_account" placeholder="New Password..." />
						<button type="submit" class="btn btn-default">Confirm</button>
					</form>
				</div><!--/login form-->
			</div>
			
		</div>
	</div>
</section><!--/form-->

@endsection