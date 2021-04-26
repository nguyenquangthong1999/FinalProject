@extends('welcome')
@section('content')

<section id="form"><!--form-->
    <center>
        @if(session()->has('message'))
    <div class="alert alert-success">
        {!! session()->get('message') !!}
    </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {!! session()->get('error') !!}
        </div>
    @endif
    </center>
    <div class="container">
        <style>
            .forgetpw1{
                margin-left: 115px;
            }
        </style>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-0">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action="{{ROUTE('LOGIN_CUSTOMER')}}" method="POST">
                        @csrf
                        <input type="email" name="customer_email" placeholder="Email Address" />
                        <input type="password" name="customer_password" placeholder="Password" />
                        <span>
                            <input type="checkbox" class="checkbox"> 
                            Keep me signed in
                            <a class="forgetpw1" href="{{url('/quen-mat-khau')}}">Forgot Password</a>
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="{{ROUTE('REGISTER_CUSTOMER')}}" method="POST">
                        @csrf
                        <input type="text" name="customer_name" placeholder="Name"/>
                        <input type="email" name="customer_email" placeholder="Email Address"/>
                        <input type="password" name="customer_password" placeholder="Password"/>
                        <input type="text" name="customer_phone" placeholder="Phone">
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection