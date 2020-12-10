@extends('layouts.app_master_page')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action="{{route('account.login')}}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Email Address">
                        <input type="password" name="password" placeholder="Password">
                        <span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                    <div class="socialite">
                        <div class="google"><a href="{{ url('/auth/redirect/google') }}"><img
                                    src="source/icons/google.png" alt=""></a></div>
                        <div class="google"><a href="{{ url('/facebook/auth/redirect/facebook') }}"><img
                                    src="source/icons/facebook.png" alt=""></a></div>
                    </div>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="{{route('frontend.register')}}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Name">
                        <input type="email" name="email" placeholder="Email Address">
                        <input type="password" name="password" placeholder="Password">
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>

                </div><!--/sign up form-->
            </div>
        </div>
    </div>
@endsection
