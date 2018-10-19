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

    <!-- diamoreum registerpage css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/auth/style.css')}}">

    <!-- diamoreum registerpage css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/auth/responsive.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">

</head>

<body>


<!-- Sign in start -->
     <div class="container-fluid login-box">
         <div class="row">
             <div class="col-md-12 col-lg-5 form-bg login-form-bg">
                 <img src="{{url('assets/auth/images/login.svg')}}" alt="signin" class="img-fluid">
             </div>
             <div class="login-form col-md-12 col-lg-7 d-flex-center">
                 <div class="col-sm-12">
                     <div class="text-center">
                         <h2 class="title">Validate Google 2FA</h2>
                         <span class="titleline"><em></em></span>
                     </div>
                     <div class="col-sm-12">
                         @if(session('error'))
                             <div class="alert alert-danger alert-dismissable">
                                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                 <strong>Error : </strong> {{ session('error') }}
                             </div>
                         @endif

                         @if(session('success'))
                             <div class="alert alert-success alert-dismissable">
                                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                 <strong>Success : </strong> {{ session('success') }}
                             </div>
                         @endif

                     </div>
                     <form action="{{ url('2fa/validate') }}" method="post" id="register-form" class="tab-content active">
                         {{ csrf_field() }}

                         <div class="form-group col-md-10 offset-md-1">
                             <input type="text" class="form-control"  placeholder="Enter One-Time Password" name="totp" />
                             <div class="error"  id="">{{ $errors->first('totp') }}</div>
                         </div>


                         <div class="text-center">
                             <button type="submit" class="btn btn-login text-center">Validate</button>
                         </div>

                     </form>
                 </div>
             </div>
         </div>
     </div>

<!-- latest jquery-->
<script src="{{asset('assets/auth/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
<!-- popper js-->
<script src="{{asset('assets/auth/popper.min.js')}}" type="text/javascript"></script>
<!-- Bootstrap js-->
<script src="{{asset('assets/auth/bootstrap.js')}}" type="text/javascript"></script>
</body>
</html>



