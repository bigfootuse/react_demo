<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="description" content="ERC 20"> -->
    <!-- <meta name="keywords" content="ERC 20"> -->
    <!-- <meta name="author" content="ERC 20"> -->
    <title>Forgot Password</title>
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
        .my-login-page .btn-login {
            width: 150px;
            color: white;
            font-size: 18px;
            transition: .2s;
            z-index: 1;
            border: 1px solid #ff4528;
            border-radius: 50px;
            overflow: hidden;
            margin-top: 27px;
            background: #ff6f29;
            padding: 9px;
        }
        .my-login-page .card form a {
            color: #ff6f29;
            font-weight: bold;
            transition: 0.2s;
        }
        .m-0 {
            margin: 0 !important;
        }
        .p-0 {
            padding: 0 !important;
        }    </style>
</head>

<body>
<!-- Sign in start -->
<section class="my-login-page">
    <div class="container">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <div class="brand">
                    <img src="{{asset('assets/images/coin.png')}}" alt="signin" class="img-fluid">
                </div>
               
                <div class="card fat">
                    <div class="card-body">
                        @if(session()->has('error')) <div class="alert alert-danger"> {{ session()->get('error') }}</div>  @endif
                        @if(session()->has('success')) <div class="alert alert-success"> {{ session()->get('success') }}</div> @endif
                    <h2 class="title">Forgot Password</h2>
                <span class="titleline"><em></em></span>
                        <form action="{{ url('forgot-password-post') }}" method="post" id="register-form" class="tab-content active">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" >
                                @if($errors->has('email'))
                                    <div class="text-danger pt-2 pl-3">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-login text-center">Request</button>
                            </div>
                            <div class="row mt-12">
                                <div class="col-sm-12 text-center">
                                    <br>
                                    <br>
                                    Do not have an account?  <a href="{{ url('register') }}" class="p-0 m-0"><u>Sign Up</u></a>
                                </div>
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
<!-- <script src="{{asset('assets/js/validator.js')}}" type="text/javascript"></script> -->

</body>
</html>

