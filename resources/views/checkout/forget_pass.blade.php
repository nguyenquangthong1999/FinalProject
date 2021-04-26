@extends('welcome')
@section('content')

<section id="form">
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
				<div class="login-form">
					<h2>Enter your email to retrieve your password!</h2>
					<form action="{{url('/recover-pass')}}" method="POST">
						@csrf
						<input type="text" name="email_account" placeholder="Your email..." />
						<button type="submit" class="btn btn-default">Send Email</button>
					</form>
				</div><!--/login form-->
			</div>
			
		</div>
	</div>
</section><!--/form-->

@endsection