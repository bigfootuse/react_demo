<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="description" content="ERC 20"> -->
    <!-- <meta name="keywords" content="ERC 20"> -->
    <!-- <meta name="author" content="ERC 20"> -->
    <title>Login</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/auth/bootstrap.css')}} ">

    <!-- diamoreum registerpage css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/auth/style.css')}} ">
    <!-- diamoreum registerpage css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/auth/responsive.css')}} ">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,500' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">
    <style>
        u{
            text-decoration: underline;
        }
        .btn-primary .btn-block{
            border-color: #fff;
        }
    </style>
</head>

<body>
    <!-- Sign in start -->
    <section class="my-login-page">
        <div class="container">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <img src="{{asset('assets/auth/images/coin.png')}}" alt="signin" class="img-fluid">
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            @if(session()->has('error')) <div class="alert alert-danger"> {{ session()->get('error') }} </div>  @endif
                            @if(session()->has('success')) <div class="alert alert-success"> {{ session()->get('success') }} </div> @endif
                            <!-- <h4 class="card-title">Login</h4> -->
                            <form action="{{ url('login-post') }}" method="post" id="register-form" class="tab-content active">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                                    @if($errors->has('email'))
                                        <div class="text-danger pt-2 pl-3">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" >
                                    @if($errors->has('password'))
                                        <div class="text-danger pt-2 pl-3">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div> 
                                <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"> 
                                </div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block error text-danger">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                                <div class="form-group no-margin">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Login
                                    </button>
                                </div>
                                <div class="margin-top20 text-center">
                                    Do not have The {{$f_coin   }} account?  <a href="{{ url('register') }}" class="p-0 m-0 text-clr"><u>Sign Up</u></a>
                                </div>
                                <div class="margin-top20 text-center">
                                    <a href="{{url('forgot-password')}}"><u>Forgot your password?</u></a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- latest jquery-->
    <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
    <!-- popper js-->
    <script src="{{asset('assets/js/popper.min.js')}}" type="text/javascript"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('assets/js/bootstrap.js')}}" type="text/javascript"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    </body>
    </html>

