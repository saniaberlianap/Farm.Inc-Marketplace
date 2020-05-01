@extends('layouts.form')

@section('title', 'login')


@section('form')	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset('assets3/images/img-01.png')}}" alt="IMG">
				</div>
				<form action="{{ URL::action('UserController@login') }}" method="POST" class="login100-form validate-form">
				@csrf
					<span class="login100-form-title">
						Admin Login
					</span>
					@if(Session::has('msg'))
						<b class="text-success"> {{ Session::get('msg') }}</b>
					@endif

					@if(Session::has('error'))
						<b class="text-danger"> {{ Session::get('error') }}</b>
					@endif
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" placeholder="Email">
							<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span>
							</div>
						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" >
							Login
						</button>
					</div>

					</form>

					

					<div class="text-center p-t-136">
						<a class="txt2" href="{{ route('register') }}">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection