<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$f_coin}} Coin">
    <meta name="keywords" content="{{$f_coin}} Coin">
    <meta name="author" content="{{$f_coin}} Coin">
    <title> @yield('title')  </title>

  @include('layouts.head')
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">
</head>

<body>
@include('layouts.top-menu')
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="dashboard-wrapper">
  @include('layouts.sidebar-menu')

  @yield('content')
</div>
@include('layouts.footer')
</body>
</html>
