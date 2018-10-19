<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <!-- <meta name="description" content="ERC 20"> -->
	  <!-- <meta name="keywords" content="ERC 20"> -->
	  <!-- <meta name="author" content="ERC 20"> -->
	  <title>Register</title>
	  <!-- Bootstrap css -->
	  <link rel="stylesheet" type="text/css" href="{{asset('assets/auth/bootstrap.css')}}">
	  <!-- registerpage css -->
	  <link rel="stylesheet" type="text/css" href="{{asset('assets/auth/style.css')}}">	  
	  <!-- registerpage css -->
	  <link rel="stylesheet" type="text/css" href="{{asset('assets/auth/responsive.css')}}">
	  <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">
	  <style>
        u {
    		text-decoration: underline;
		}
    </style>
	</head>
<body>
    <!-- Sign Up start -->
    <section class="my-login-page">
        <div class="container">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <img src="{{asset('assets/auth/images/coin.png')}}" alt="signin" class="img-fluid">
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                        	<!-- @if($errors->any())<div class="alert alert-danger"><ul>@foreach($errors->all() as $error)<li>{{$error}}</li>@endforeach</ul></div>@endif -->
                            @if(session()->has('error')) <div class="alert alert-danger"> {{ session()->get('error') }} </div>	@endif
		               		@if(session()->has('success')) <div class="alert alert-success"> {{ session()->get('success') }}</div> @endif
                            <!-- <h4 class="card-title">Login</h4> -->
                            <form id="register-form" class="tab-content active" action="{{url('register')}}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name" id="first_name" name="first_name" value="{{old('first_name')}}" required pattern="[A-Za-z ]+" style="text-transform: capitalize;">
									@if ($errors->has('first_name'))<div class="error text-danger">{{ $errors->first('first_name') }}</div> @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name" id="last_name" name="last_name" value="{{old('last_name')}}" required pattern="[A-Za-z ]+" style="text-transform: capitalize;">
			                  		@if ($errors->has('last_name'))<div class="error text-danger">{{ $errors->first('last_name') }}</div>@endif
                                </div>
                                <div class="form-group">
                                	<input type="text" class="form-control" placeholder="User Name" id="username" name="username" value="{{old('username')}}" required pattern="[A-Za-z ]+" style="text-transform: capitalize;">
			                  		@if ($errors->has('username'))<div class="error text-danger">{{ $errors->first('username') }}</div>@endif
                                </div>
                                <div class="form-group">
                                	<input type="hidden" class="form-control" placeholder="Sponser referral Code" id="sponser_code" name="sponser_code"
			                	value="@if(old('sponser_code')) {{old('sponser_code')}} @elseif(Session()->get('referral')) {{Session()->get('referral')}} @php /*session()->forget('referral');*/ @endphp @endif">
                                </div>
                                <div class="form-group">
                                	<input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{old('email')}}" required>
			                		@if ($errors->has('email'))<div class="error text-danger">{{ $errors->first('email') }}</div> @endif
                                </div>
                                <div class="form-group">
                                	<input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
			                		@if ($errors->has('password'))<div class="error text-danger">{{ $errors->first('password') }}</div> @endif
                                </div>
                                <div class="form-group">
                                	<input type="password" class="form-control" placeholder="Retype Password" id="confirm_password" name="confirm_password" required>
			                  		@if ($errors->has('confirm_password'))<div class="error text-danger">{{ $errors->first('confirm_password') }}</div> @endif
                                </div>
                                <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"> 
                                </div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block error text-danger">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                                <br>    
                                <div class="form-group no-margin">
                                    <button type="submit" class="btn btn-primary btn-block" id="registerbutton">Register</button>
                                </div>
                                <div class="margin-top20 text-center">
                                    Already have an {{$f_coin}} account?  <a href="{{url('login')}}" class="p-0 m-0 text-clr"><u>Sign In</u></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<!-- latest jquery-->
	<script src="{{asset('assets/auth/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
	<!-- popper js-->
	<script src="{{asset('assets/auth/popper.min.js')}}" type="text/javascript"></script>
	<!-- Bootstrap js-->
	<script src="{{asset('assets/auth/bootstrap.js')}}" type="text/javascript"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

<script>   //no need to specify the language

</script>	

</body>
</html>