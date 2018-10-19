<!DOCTYPE html>
<html lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="{{$f_coin}}">
    <meta name="keywords" content="{{$f_coin}}">
    <meta name="author" content="{{$f_coin}}">
    <title>{{$f_coin}}</title>
    <link rel="apple-touch-icon" href="{{asset('assets/')}}/images/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/')}}/images/favicon.png">

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,700" rel="stylesheet">
    <!--Font icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/')}}/fonts/themify/style.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/')}}/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/')}}/vendors/animate/animate.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/')}}/vendors/flipclock/flipclock.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/')}}/vendors/swiper/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/')}}/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/')}}/css/magnific-popup.css">


    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/')}}/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert.min.css')}}">
    <!-- END VENDOR CSS-->
    <!-- END {{$f_coin}} CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/')}}/css/template-intro-video.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/')}}/css/style.css">
    <!-- END Custom CSS-->
    <!-- style custome -->
    <style>
    .problems-img{
        width: 50%;
    }    
    .solutions-img{
        width: 70%;
    }
    .img-fluid{
        max-width: 75%;
    }
    </style>
</head>
<body class=" 1-column    template-intro-video" data-menu-open="hover" data-menu="">
<!-- Preloader | Comment below code if you don't want preloader-->



<?php
$is = "";
$ico_date = "";
$ico_strat_date = strtotime($rate->start_date); $ico_end_date = strtotime($rate->end_date);
if ($ico_strat_date < time() && $ico_end_date > time()) {
    $ico_date = $ico_end_date;
    $ico_status = 'start';
    $date = date('m/d/Y H:i', $ico_end_date);
    $is = " Ends at";
} elseif ($ico_strat_date > time()) {
    $ico_status = 'pending';
    $date = "";
    $ico_date = $ico_strat_date;
    $ico_status = 'start';
    $date = date('m/d/Y H:i', $ico_strat_date);
    $is = " Starts in ";
} elseif ($ico_end_date < time()) {
    $ico_status = 'ended';
    $is = 'ended ';
    $date = "";
} else {
    $date = "";
}
?>

<div id="loader-wrapper">
    <svg viewbox=" 0 0 512 512" id="loader">
        <linearGradient id="loaderLinearColors" x1="0" y1="0" x2="1" y2="1">
            <stop offset="5%" stop-color="#28bcfd"></stop>
            <stop offset="100%" stop-color="#1d78ff"></stop>
        </linearGradient>
        <g>
            <circle cx="256" cy="256" r="150" fill="none" stroke="url(#loaderLinearColors)" />
        </g>
        <g>
            <circle cx="256" cy="256" r="125" fill="none" stroke="url(#loaderLinearColors)" />
        </g>
        <g>
            <circle cx="256" cy="256" r="100" fill="none" stroke="url(#loaderLinearColors)" />
        </g>
        <g>
            <circle cx="256" cy="256" r="75" fill="none" stroke="url(#loaderLinearColors)" />
        </g>
        <circle cx="256" cy="256" r="60" fill="url(#loaderImage)" stroke="none" stroke-width="0" />

        <!-- Change the preloader logo here -->
        <defs>
            <pattern id="loaderImage" height="100%" width="100%" patternContentUnits="objectBoundingBox">
                <image href="{{asset('assets/')}}/images/coin.png" preserveAspectRatio="none" width="1" height="1"></image>
            </pattern>
        </defs>
    </svg>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!--/ Preloader --><nav class="vertical-social">
    <ul>
        <li><a href="#"><i class="fa fa-telegram" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-medium" aria-hidden="true"></i></a></li>
        <li><a href="#"> <i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-github" aria-hidden="true"></i></a></li>
    </ul>
</nav>
<!-- /////////////////////////////////// HEADER /////////////////////////////////////-->

<!-- Header Start-->
<header class="page-header">
    <!-- Horizontal Menu Start-->
    <nav class="main-menu static-top navbar-dark navbar navbar-expand-lg fixed-top mb-1"><div class="container">
            <a  class="navbar-brand animated" data-animation="fadeInDown" data-animation-delay="1s" href="#head-area"><img src="{{asset('assets/')}}/images/logo_white.png" class="navbar-brand-logo" alt="Crypto Logo"/><img src="{{asset('assets/')}}/images/logo.png" class="navbar-brand-logo-dark d-none" alt="Crypto Logo"/><span class="brand-text"><span class="font-weight-bold"></span> </span></a>            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div id="navigation" class="navbar-nav ml-auto">
                    <ul class="navbar-nav mt-1">
                        <li class="nav-item animated" data-animation="fadeInDown" data-animation-delay="1.1s">
                            <a class="nav-link" href="#about">What is ICO</a>
                        </li>
                        <li class="nav-item animated" data-animation="fadeInDown" data-animation-delay="1.2s">
                            <a class="nav-link" href="#problem-solution">Solutions</a>
                        </li>
                        <li class="nav-item animated" data-animation="fadeInDown" data-animation-delay="1.3s">
                            <a class="nav-link" href="#token-sale">Token Sale</a>
                        </li>
                        <li class="nav-item animated" data-animation="fadeInDown" data-animation-delay="1.4s">
                            <a class="nav-link" href="#whitepaper">Whitepaper</a>
                        </li>
                        <li class="nav-item animated" data-animation="fadeInDown" data-animation-delay="1.5s">
                            <a class="nav-link" href="#roadmap">Roadmap</a>
                        </li>
                        <li class="dropdown show mr-2 px-2 animated" data-animation="fadeInDown" data-animation-delay="1.6s">
                            <a class="dropdown-toggle white" href="#" role="button" id="more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
                            <div class="dropdown-menu" aria-labelledby="more">
                                <a class="dropdown-item" href="#team">Team</a>
                                <a class="dropdown-item" href="#faq">FAQ</a>
                                <a class="dropdown-item" href="#news">News</a>
                                <a class="dropdown-item" href="#contact">Contact</a>
                            </div>
                        </li>
                        <li class="dropdown show mr-4 animated" data-animation="fadeInDown" data-animation-delay="1.7s">
                            <a class="dropdown-toggle" href="#" role="button" id="language" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-us"></span> EN</a>
                            <div class="dropdown-menu" aria-labelledby="language">
                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-de"></span> DE</a>
                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-es"></span> SP</a>
                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-mq"></span> MQ</a>
                            </div>
                        </li>
                    </ul>
                    <span id="slide-line"></span>
                    <form class="form-inline mt-2 mt-md-0">     
                         @if($user = Sentinel::check())

                            <a class="btn btn-sm btn-light btn-glow btn-round btn-sign-in my-2 my-sm-0 animated" data-animation="fadeInDown" data-animation-delay="1.8s" href="{{url('dashboard')}}">Dashbaoard</a>

                         @else
                            <a class="btn btn-sm btn-light btn-glow btn-round btn-sign-in my-2 my-sm-0 animated" data-animation="fadeInDown" data-animation-delay="1.8s" href="{{url('login')}}">Sign in</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <!-- /Horizontal Menu End-->
</header>
<!-- /Header End-->

<!-- //////////////////////////////////// CONTAINER ////////////////////////////////////-->
<div class="content-wrapper">
    <div class="content-body">
        <main><!-- Header: Intro Video -->
            <section class="head-area" id="head-area" data-midnight="white">
                <div class="bg-shape"></div>
                <div class="head-content container-fluid d-flex align-items-center">
                    <div class="container">
                        <div class="banner-wrapper">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-12">
                                    <div class="banner-content">
                                        <h1 class="best-template">{{$f_coin}} ICO is modern, clean and <br class="d-none d-xl-block">gradient ui ico most trending <br class="d-none d-xl-block">template of 2018</h1>
                                        <h3 class="d-block">First decentralized marketing platform that allows <br>merchants and affiliates.</h3>
                                        <div class="mt-4">
                                            <a href="#token-sale" class="btn btn-lg btn-round btn-light btn-glow">Purchase Token</a>
                                            <a target="_blank" href="{{asset('assets/VOLUME_COIN_WHITEPAPER.pdf')}}" class="btn btn-lg btn-round btn-light btn-glow ml-4">Whitepaper</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 move-first  p-0">
                                    <!--  video icon click -->
                                    <div class="slider-box crypto-video">
                                        <div class="gallery-carousel owl-carousel popup-gallery">
                                            <div class="gallery-item">
                                                <a href="{{asset('assets/frontend/images/p1.jpg')}}"  data-effect="mfp-zoom-in" title="">
                                                    <img src="{{asset('assets/frontend/images/p1.jpg')}}"> 
                                                </a>
                                            </div>
                                            
                                            <div class="gallery-item">
                                                <a href="{{asset('assets/frontend/images/p2.jpg')}}"  data-effect="mfp-zoom-in" title="">
                                                    <img src="{{asset('assets/frontend/images/p2.jpg')}}"> 
                                                </a>
                                            </div>
                                            <div class="gallery-item">
                                                <a href="{{asset('assets/frontend/images/p3.jpg')}}"  data-effect="mfp-zoom-in" title="">
                                                    <img src="{{asset('assets/frontend/images/p3.jpg')}}"> 
                                                </a>
                                            </div>
                                            
                                            <div class="gallery-item">
                                                <a href="{{asset('assets/frontend/images/p4.jpg')}}"  data-effect="mfp-zoom-in" title="">
                                                    <img src="{{asset('assets/frontend/images/p4.jpg')}}"> 
                                                </a>
                                            </div>
                                            <div class="gallery-item">
                                                <a href="{{asset('assets/frontend/images/p5.jpg')}}"  data-effect="mfp-zoom-in" title="">
                                                    <img src="{{asset('assets/frontend/images/p5.jpg')}}"> 
                                                </a>
                                            </div>
                                            
                                            <div class="gallery-item">
                                                <a href="{{asset('assets/frontend/images/p6.jpg')}}"  data-effect="mfp-zoom-in" title="">
                                                    <img src="{{asset('assets/frontend/images/p6.jpg')}}"> 
                                                </a>
                                            </div>
                                            <div class="gallery-item">
                                                <a href="{{asset('assets/frontend/images/p7.jpg')}}"  data-effect="mfp-zoom-in" title="">
                                                    <img src="{{asset('assets/frontend/images/p7.jpg')}}"> 
                                                </a>
                                            </div>
                                            <div class="gallery-item">
                                                <a href="{{asset('assets/frontend/images/p8.jpg')}}"  data-effect="mfp-zoom-in" title="">
                                                    <img src="{{asset('assets/frontend/images/p8.jpg')}}"> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                  <!--   {{--<div class="slider-box">--}}
                                            {{--<div id="home-slider" class="owl-carousel owl-theme">--}}
                                                {{--<div class="item"><img src="{{asset('assets/frontend/')}}/images/banner-graphic.png" class=""></div>--}}
                                                {{--<div class="item"><img src="{{asset('assets/frontend/')}}/images/banner-graphic.png" class=""></div>--}}
                                            {{--<div class="item"><img src="{{asset('assets/frontend/')}}/images/banner-graphic.png" class=""></div>--}}
                                             {{--<div class="item"><img src="{{asset('assets/frontend/')}}/images/banner-graphic.png" class=""></div>--}}
                                            {{--</div>--}}
                                    {{--</div>--}} -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Header: Intro Video -->

            <!-- Exchange Listing Area -->
            <section class="exchange-listing" id="exchange-listing">
                <!-- Exchange Listing Area Starts -->
                <div class="container-fluid bg-color mt-2">
                    <div class="container">
                        <div class="row listing list-unstyled">
                            <div class="col d-none d-lg-block text-center">
                                <img src="{{asset('assets/frontend/')}}/images/icon-arrow.png" alt="icon-arrow">
                                <p class="grey-accent2 mt-1">Exchange listing
                                    <br>to be announced</p>
                            </div>
                            <div class="col">
                                <h2>4.3/5</h2>
                                <img src="{{asset('assets/frontend/')}}/images/ico-track.png" alt="ico-track">
                            </div>
                            <div class="col">
                                <h2>4.8/5</h2>
                                <img src="{{asset('assets/frontend/')}}/images/ico-bench.png" alt="ico-bench">
                            </div>
                            <div class="col">
                                <h2>3.9/5</h2>
                                <img src="{{asset('assets/frontend/')}}/images/ico-ranker.png" alt="ico-ranker">
                            </div>
                            <div class="col">
                                <h2>4.1/5</h2>
                                <img src="{{asset('assets/frontend/')}}/images/ico-bazaar.png" alt="ico-bazaar">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Exchange Listing Area Ends -->
            </section>
            <!--/ Exchange Listing Area -->

            <!-- About -->
            <section class="about section-padding" id="about">
                <div class="container-fluid">
                    <div class="container">
                        <div class="heading text-center">
                            <h6 class="sub-title">What is {{$f_coin}} ICO</h6>
                            <h2 class="title">About <strong>{{$f_coin}} ICO</strong></h2>
                            <div class="separator">
                                <span class="large"></span>
                                <span class="medium"></span>
                                <span class="small"></span>
                            </div>
                            <p class="content-desc">{{$f_coin}} ICO aims to disrupt the cryptotrading industry by lowering the barrier
                                <br/>to creating algorithmic trading models.</p>
                        </div>
                        <div class="content-area">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <h4 class="title">We built a platform for <br/> The {{$f_coin}} trading Industry</h4>
                                    <h6 class="pt-4 pb-2">Cryptocurrency exchanges or digital currency exchanges (DCE) are businesses that allow customers to trade cryptocurrencies or digital currencies for other assets.</h6>
                                    <p>Cryptocurrency exchanges or digital currency exchanges (DCE) are businesses that allow customers to trade cryptocurrencies or digital currencies for other assets</p>
                                    <p>Creators of digital currencies are often independent of the DCEs that trade the currency.[6] In one type of system, digital currency providers (DCP), are businesses that keep and administer accounts.</p>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="position-relative float-xl-right what-is-crypto-img">
                                        <img class="img-fluid" src="{{asset('assets/frontend/')}}/images/CoinMockup.png" alt="What is {{$f_coin}}?">
                                        <div class="play-video text-center">
                                            <a href="#" class="play rounded-circle btn-gradient-blue btn-glow video-btn" data-toggle="modal" data-src="https://www.youtube.com/embed/UXAJu3zS4bU" data-target="#ico-modal"><i class="ti-control-play"></i></a>
                                            <span class="mt-2 d-none d-md-block">How it works</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ About -->

            <!-- Problems & Solutions -->
            <section id="problem-solution" class="problem-solution section-pro section-padding bg-color">
                <div class="container-fluid">
                    <div class="container">
                        <div class="heading text-center">
                            <h6 class="sub-title">Solutions</h6>
                            <h2 class="title">Problems &amp; <strong>Solutions</strong></h2>
                            <div class="separator">
                                <span class="large"></span>
                                <span class="medium"></span>
                                <span class="small"></span>
                            </div>
                            <p class="content-desc">More than $40 million in assets were placed under restraint pending forfeiture, and more than 30
                                <br/>Liberty Reserve exchanger domain names were seized.</p>
                        </div>
                        <div class="problems">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="heading mb-4">
                                        <h4 class="title">Problems</h4>
                                        <div class="separator">
                                            <span class="large"></span>
                                            <span class="medium"></span>
                                            <span class="small"></span>
                                        </div>
                                    </div>
                                    <p>Different pieces of the new Internet are born as building blocks, but there’s no way for them to work together.</p>

                                    <p>Even interoperating new technologies with old centralised resources can prove useful in making the paradigm shift from Web 2 to Web 3 happen. Now we own our data, we can prove that we own what we have and have created it on different platforms, but how do we put it together into a whole new cohesive framework.</p>
                                </div>
                                <div class="col-md-12 col-lg-6 text-center">
                                    <img src="{{asset('assets/frontend/')}}/images/ld1.png" class="problems-img" alt="problems-graphic">
                                </div>
                            </div>
                        </div>
                        <div class="solutions mt-5">
                            <div class="row">
                                <div class="col-md-12 col-lg-6 text-center">
                                    <img src="{{asset('assets/frontend/')}}/images/ld2.png" class="solutions-img" alt="problems-graphic">
                                </div>
                                <div class="col-md-12 col-lg-6 move-first">
                                    <div class="heading mb-4">
                                        <h4 class="title">Solutions</h4>
                                        <div class="separator">
                                            <span class="large"></span>
                                            <span class="medium"></span>
                                            <span class="small"></span>
                                        </div>
                                    </div>
                                    <p>Decentralized cryptocurrency is produced by the entire cryptocurrency system collectively, at a rate which is defined when the system is created and which is publicly known.</p>

                                    <p>In centralized banking and economic systems such as the Federal Reserve System, corporate boards or governments control the supply of currency by printing units of fiat money or demanding additions to digital banking ledgers.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Problems & Solutions -->

            <!-- Tokens Sale -->
            <section id="token-sale" class="token-sale section-padding">
                <div class="container-fluid">
                    <div class="container">
                        <div class="heading text-center">
                            <h6 class="sub-title">Token</h6>
                            <h2 class="title"><strong>Pre-Tokens Sale</strong> &amp; Values</h2>
                            <div class="separator">
                                <span class="large"></span>
                                <span class="medium"></span>
                                <span class="small"></span>
                            </div>
                            <p class="content-desc">The first token sale (also known as an ICO) was held by Mastercoin in
                                <br>July 2013. Ethereum raised money with a token sale in 2014.</p>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12 col-lg-6 col-xl-5">
                                <h5>ICO will {{$is}}</h5>
                                <div class="token-details text-center">
                                    <!-- Counter Starts-->
                                    <div class="clock-counter mb-4">
                                        <div class="clock ml-0 mt-5 justify-content-center d-flex"></div>
                                        <div class="message"></div>
                                    </div>
                                    <!-- Counter Ends -->
                                    <!-- Progressbar Starts -->
                                    <div class="loading-bar mb-2 position-relative">
                                        <div class="progres-area pb-5">
                                            <ul class="progress-top">
                                                <li></li>
                                                <li class="pre-sale">Pre-Sale</li>
                                                <li>Soft Cap</li>
                                                <li class="bonus">Bonus</li>
                                                <li></li>
                                            </ul>
                                            <ul class="progress-bars">
                                                <li></li>
                                                <li>|</li>
                                                <li>|</li>
                                                <li>|</li>
                                                <li></li>
                                            </ul>
                                            @php
                                                $pertage_sale = ($setting_data->sold_coins*100)/$setting_data->total_coins;
                                            @endphp
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-custom" role="progressbar" style="width: {{round($pertage_sale)}}%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>


                                            <div class="progress-bottom">
                                                <div class="progress-info">{{round(($pertage_sale))}}% target raised</div>
                                                @if(mt_rand(1,2)==1)
                                                <div class="progress-info">1 ETH = ${{$c_eth}} = {{round($c_coin*$c_eth)}} {{$s_coin}}</div>
                                                    @else
                                                <div class="progress-info">1 BTC = ${{$c_btc}} = {{round($c_coin*$c_btc)}} {{$s_coin}}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Progressbar Starts -->
                                    <a href="#" class="btn btn-lg btn-glow btn-round btn-gradient-blue">Purchase Token</a>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-7">
                                <div class="row ml-0 mt-5">
                                    <p class="grey-accent2"><b>We have successfully reached the soft cap! Join now and get a higher discount.
                                            <br/>Get your tokens for the best price: We fixed the Ether price at $800.</b></p>
                                    <div class="col-md-5">
                                        <ul class="token-sale-info">
                                            <li>Public PRE-{{$s_coin}} starts <strong>13 March</strong></li>
                                            <li>Public {{$s_coin}} ends <strong>25 May</strong></li>
                                            <li>Public {{$s_coin}} starts <strong>25 April</strong></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-7 pr-0">
                                        <ul class="token-sale-info">
                                            <li>Acceptable currencies <strong>ETH, BTC</strong></li>
                                            <li>Minimal transaction amount <strong>1 ETH, 1 BTC</strong></li>
                                            <li>Number of tokens for sale <strong>{{number_format($setting_data->total_coins)}} {{$s_coin}} ({{round($pertage_sale)}}%)</strong></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Tokens Sale -->

            <!-- Whitepaper -->
            <section id="whitepaper" class="whitepaper section-pro section-padding bg-color">
                <div class="container-fluid">
                    <div class="container">
                        <div class="heading text-center">
                            <h6 class="sub-title">Whitepaper</h6>
                            <h2 class="title"><strong>Documents,</strong> Terms &amp; Conditions</h2>
                            <div class="separator">
                                <span class="large"></span>
                                <span class="medium"></span>
                                <span class="small"></span>
                            </div>
                            <p class="content-desc">Terms of service are rules by which one must agree to abide in order to use a service.
                                <br/>Terms of service can also be merely a disclaimer, especially regarding the use of websites.</p>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="whitepaper-img">
                                    <img class="img-fluid" src="{{asset('assets/frontend/')}}/images/wp11.png" alt="whitepaper">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="content-area">
                                    <h4 class="title">Whitepaper</h4>
                                    <p>A white paper is an authoritative report or guide that informs readers concisely about a complex issue and presents the issuing body's philosophy on the matter. It is meant to help readers understand an issue, solve a problem, or make a decision.</p>
                                    <p>The initial British term concerning a type of government-issued document has proliferated, taking a somewhat new meaning in business. In business, a white paper is closer to a form of marketing presentation, a tool meant to persuade customers and partners and promote a product or viewpoint, White papers may be considered grey literature.</p>
                                    <p>Since the early 1990s, the term "white paper", or "whitepaper", has been applied to documents used as marketing or sales tools in business.</p>
                                    <div class="whitepaper-languages">
                                        <div class="row">
                                            <div class="col-6 col-md-3 text-center mt-4">
                                                <a href="#" title="English">
                                                    <img src="{{asset('assets/frontend/')}}/images/flag-1.png" alt="English">
                                                    <div class="lang-text">
                                                        <span class="icon ti-download mr-1"></span>
                                                        <span class="language">English</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-6 col-md-3 text-center mt-4">
                                                <a href="#" title="Japanese">
                                                    <img src="{{asset('assets/frontend/')}}/images/flag-2.png" alt="English">
                                                    <div class="lang-text">
                                                        <span class="icon ti-download mr-1"></span>
                                                        <span class="language">Japanese</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-6 col-md-3 text-center mt-4">
                                                <a href="#" title="Russian">
                                                    <img src="{{asset('assets/frontend/')}}/images/flag-3.png" alt="English">
                                                    <div class="lang-text">
                                                        <span class="icon ti-download mr-1"></span>
                                                        <span class="language">Russian</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-6 col-md-3 text-center mt-4">
                                                <a href="#" title="Chinese">
                                                    <img src="{{asset('assets/frontend/')}}/images/flag-4.png" alt="English">
                                                    <div class="lang-text">
                                                        <span class="icon ti-download mr-1"></span>
                                                        <span class="language">Chinese</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Whitepaper -->

            <!-- Roadmap -->
            <section id="roadmap" class="roadmap section-padding">
                <div class="container-fluid">
                    <div class="container">
                        <div class="heading text-center">
                            <h6 class="sub-title">Roadmap</h6>
                            <h2 class="title"><strong>Implementation </strong>Sheet</h2>
                            <div class="separator">
                                <span class="large"></span>
                                <span class="medium"></span>
                                <span class="small"></span>
                            </div>
                            <p class="content-desc">This is a list of cryptocurrencies. The number of cryptocurrencies available over
                                <br/>the internet as of 7 January 2018 is over 1384 and growing.</p>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="roadmap-container">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper timeline">
                                            <div class="swiper-slide">
                                                <div class="roadmap-info">
                                                    <div class="timestamp completed">
                                                        <span class="date">November 2017</span>
                                                    </div>
                                                    <div class="status completed">
                                                        <span>{{$f_coin}} Ico <br/>Platform idea</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="roadmap-info">
                                                    <div class="timestamp completed">
                                                        <span class="date">January 2018</span>
                                                    </div>
                                                    <div class="status completed">
                                                        <span>Technical &amp; strategy <br/>devlopment</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide active">
                                                <div class="roadmap-info">
                                                    <div class="timestamp active">
                                                        <span class="date">May 2018</span>
                                                    </div>
                                                    <div class="status active">
                                                        <span>Ico Realease</span>
                                                        <span class="live">Live Now</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="roadmap-info">
                                                    <div class="timestamp remaining">
                                                        <span class="date">August 2018</span>
                                                    </div>
                                                    <div class="status remaining">
                                                        <span>Beta version of <br/>{{$f_coin}} Ico </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="roadmap-info">
                                                    <div class="timestamp remaining">
                                                        <span class="date">November 2018</span>
                                                    </div>
                                                    <div class="status remaining">
                                                        <span>Software development kit <br>for integrations</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="roadmap-info">
                                                    <div class="timestamp remaining">
                                                        <span class="date">December 2018</span>
                                                    </div>
                                                    <div class="status remaining">
                                                        <span>Mobile apps for <br/>iOS &amp; Android</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-control">
                                        <span class="prev-slide"></span>
                                        <span class="next-slide"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Roadmap -->

            <!-- Token Distribution/Stats -->
            <section id="token-distribution" class="token-distribution section-pro section-padding bg-color">
                <div class="container-fluid">
                    <div class="container">
                        <div class="heading text-center">
                            <h6 class="sub-title">Fund Distribution</h6>
                            <h2 class="title"><strong>Token</strong> Sale Stats</h2>
                            <div class="separator">
                                <span class="large"></span>
                                <span class="medium"></span>
                                <span class="small"></span>
                            </div>
                            <p class="content-desc">The ICO usually takes place before the project is completed, and helps fund the expenses
                                <br/>undertaken by the founding team until launch. For some of the larger projects.</p>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6 col-xl-6">
                                <div class="token-img">
                                    <img class="img-fluid" src="{{asset('assets/frontend/')}}/images/fund_dist.png" alt="token-distribution">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-5 offset-xl-1">
                                <div class="content-area">
                                    <h4 class="title">Details</h4>
                                    <p class="mt-1">To calculate the number of tokens you’ll receive, you can follow the following formula. Note that this applies to public presale contributions only. If you participated through a syndicate or private presale,</p>
                                    <p>To calculate the number of tokens you’ll receive, you can follow the following formula. Note that this applies to public presale contributions only. If you participated through a syndicate or private presale,</p>
                                    <p><span>Symbol:</span> <strong class="grey-accent2">{{$s_coin}}</strong></p>
                                    <p><span>Initial Value:</span> <strong class="grey-accent2">1 ETH = {{$c_eth}}|1 BTC = {{$c_btc}}</strong></p>
                                    <p><span>Type:</span> <strong class="grey-accent2">ERC20</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Token Distribution/Stats -->


            <!-- FAQ -->
            <section id="faq" class="faq section-padding">
                <div class="container-fluid">
                    <div class="container">
                        <div class="heading text-center">
                            <h6 class="sub-title">FAQ</h6>
                            <h2 class="title">Frequently Asked <strong>Questions</strong></h2>
                            <div class="separator">
                                <span class="large"></span>
                                <span class="medium"></span>
                                <span class="small"></span>
                            </div>
                            <p class="content-desc">Originally the term "FAQ" referred to the Frequently Asked Question itself, and the
                                <br/>compilation of questions and answers was known as a "FAQ list" or some similar expression.</p>
                        </div>
                        <div class="row">
                            <div class="col">
                                <nav>
                                    <div class="nav nav-pills nav-underline mb-5" id="myTab" role="tablist">
                                        <a href="#general" class="nav-item nav-link active" id="general-tab" data-toggle="tab" aria-controls="general" aria-selected="true" role="tab">General</a>
                                        <a href="#ico" class="nav-item nav-link" id="ico-tab" data-toggle="tab" aria-controls="ico" aria-selected="false" role="tab">Pre-ICO</a>
                                        <a href="#token" class="nav-item nav-link" id="token-tab" data-toggle="tab" aria-controls="token" aria-selected="false" role="tab">Tokens</a>
                                        <a href="#client" class="nav-item nav-link" id="client-tab" data-toggle="tab" aria-controls="client" aria-selected="false" role="tab">Client</a>
                                        <a href="#legal" class="nav-item nav-link" id="legal-tab" data-toggle="tab" aria-controls="legal" aria-selected="false" role="tab">Legal</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                        <div id="general-accordion" class="collapse-icon accordion-icon-rotate">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0">
                                                        <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            <span class="icon"></span>
                                                            Can I make payments directly from an exchange?
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#general-accordion">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h5 class="mb-0">
                                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            <span class="icon"></span>
                                                            When will {{$s_coin}}ICO be listed on exchanges?
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#general-accordion">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingThree">
                                                    <h5 class="mb-0">
                                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            <span class="icon"></span>
                                                            What is the {{$s_coin}}ICO Token asmart contract address?
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#general-accordion">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="ico" role="tabpanel" aria-labelledby="ico-tab">
                                        <div id="ico-accordion" class="collapse-icon accordion-icon-rotate">
                                            <div class="card">
                                                <div class="card-header" id="icoHeadingOne">
                                                    <h5 class="mb-0">
                                                        <a class="btn btn-link" data-toggle="collapse" data-target="#icoCollapseOne" aria-expanded="true" aria-controls="icoCollapseOne">
                                                            <span class="icon"></span>
                                                            Pityful a rethoric question ran over her cheek?
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="icoCollapseOne" class="collapse show" aria-labelledby="icoHeadingOne" data-parent="#ico-accordion">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="icoHeadingTwo">
                                                    <h5 class="mb-0">
                                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#icoCollapseTwo" aria-expanded="false" aria-controls="icoCollapseTwo">
                                                            <span class="icon"></span>
                                                            Which roasted parts of sentences fly into your mouth?
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="icoCollapseTwo" class="collapse" aria-labelledby="icoHeadingTwo" data-parent="#ico-accordion">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="icoHeadingThree">
                                                    <h5 class="mb-0">
                                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#icoCollapseThree" aria-expanded="false" aria-controls="icoCollapseThree">
                                                            <span class="icon"></span>
                                                            Collapsible Group Item #3
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="icoCollapseThree" class="collapse" aria-labelledby="icoHeadingThree" data-parent="#ico-accordion">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="token" role="tabpanel" aria-labelledby="token-tab">
                                        <div id="token-accordion" class="collapse-icon accordion-icon-rotate">
                                            <div class="card">
                                                <div class="card-header" id="tokenHeadingOne">
                                                    <h5 class="mb-0">
                                                        <a class="btn btn-link" data-toggle="collapse" data-target="#tokenCollapseOne" aria-expanded="true" aria-controls="tokenCollapseOne">
                                                            <span class="icon"></span>
                                                            Collapsible Group Item #1
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="tokenCollapseOne" class="collapse show" aria-labelledby="tokenHeadingOne" data-parent="#token-accordion">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="tokenHeadingTwo">
                                                    <h5 class="mb-0">
                                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#tokenCollapseTwo" aria-expanded="false" aria-controls="tokenCollapseTwo">
                                                            <span class="icon"></span>
                                                            Collapsible Group Item #2
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="tokenCollapseTwo" class="collapse" aria-labelledby="tokenHeadingTwo" data-parent="#token-accordion">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="tokenHeadingThree">
                                                    <h5 class="mb-0">
                                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#tokenCollapseThree" aria-expanded="false" aria-controls="tokenCollapseThree">
                                                            <span class="icon"></span>
                                                            Collapsible Group Item #3
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="tokenCollapseThree" class="collapse" aria-labelledby="tokenHeadingThree" data-parent="#token-accordion">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="client" role="tabpanel" aria-labelledby="client-tab">
                                        <div id="client-accordion" class="collapse-icon accordion-icon-rotate">
                                            <div class="card">
                                                <div class="card-header" id="clientHeadingOne">
                                                    <h5 class="mb-0">
                                                        <a class="btn btn-link" data-toggle="collapse" data-target="#clientCollapseOne" aria-expanded="true" aria-controls="clientCollapseOne">
                                                            <span class="icon"></span>
                                                            Collapsible Group Item #1
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="clientCollapseOne" class="collapse show" aria-labelledby="clientHeadingOne" data-parent="#client-accordion">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="clientHeadingTwo">
                                                    <h5 class="mb-0">
                                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#clientCollapseTwo" aria-expanded="false" aria-controls="clientCollapseTwo">
                                                            <span class="icon"></span>
                                                            Collapsible Group Item #2
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="clientCollapseTwo" class="collapse" aria-labelledby="clientHeadingTwo" data-parent="#client-accordion">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="clientHeadingThree">
                                                    <h5 class="mb-0">
                                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#clientCollapseThree" aria-expanded="false" aria-controls="clientCollapseThree">
                                                            <span class="icon"></span>
                                                            Collapsible Group Item #3
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="clientCollapseThree" class="collapse" aria-labelledby="clientHeadingThree" data-parent="#client-accordion">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="legal" role="tabpanel" aria-labelledby="legal-tab">
                                        <div id="legal-accordion" class="collapse-icon accordion-icon-rotate">
                                            <div class="card">
                                                <div class="card-header" id="legalHeadingOne">
                                                    <h5 class="mb-0">
                                                        <a class="btn btn-link" data-toggle="collapse" data-target="#legalCollapseOne" aria-expanded="true" aria-controls="legalCollapseOne">
                                                            <span class="icon"></span>
                                                            Collapsible Group Item #1
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="legalCollapseOne" class="collapse show" aria-labelledby="legalHeadingOne" data-parent="#legal-accordion">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="legalHeadingTwo">
                                                    <h5 class="mb-0">
                                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#legalCollapseTwo" aria-expanded="false" aria-controls="legalCollapseTwo">
                                                            <span class="icon"></span>
                                                            Collapsible Group Item #2
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="legalCollapseTwo" class="collapse" aria-labelledby="legalHeadingTwo" data-parent="#legal-accordion">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="legalHeadingThree">
                                                    <h5 class="mb-0">
                                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#legalCollapseThree" aria-expanded="false" aria-controls="legalCollapseThree">
                                                            <span class="icon"></span>
                                                            Collapsible Group Item #3
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="legalCollapseThree" class="collapse" aria-labelledby="legalHeadingThree" data-parent="#legal-accordion">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ FAQ -->

         {{--   <!-- News -->
            <section id="news" class="news section-padding bg-color">
                <div class="container-fluid">
                    <div class="container">
                        <div class="heading text-center">
                            <h6 class="sub-title">News</h6>
                            <h2 class="title">Recent <strong>News Posts</strong></h2>
                            <div class="separator">
                                <span class="large"></span>
                                <span class="medium"></span>
                                <span class="small"></span>
                            </div>
                            <p class="content-desc">A blog is a discussion or informational website published on the World Wide
                                <br/>Web consisting of discrete, often informal diary-style text entries posts.</p>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-4 mb-sm-5  mb-xs-5">
                                <div class="card">
                                    <img class="card-img-top" src="{{asset('assets/frontend/')}}/images/news-1.png" alt="blog-image1" width="370" height="583">
                                    <div class="card-img-overlay">
                                        <div class="blog-content">
                                            <h5 class="card-title mt-3">Author Name</h5>
                                            <h2 class="mt-4">Cryptocurrency Mobile App</h2>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="#" class="read-more btn btn-round btn-glow btn-gradient-blue">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4 mb-sm-5  mb-xs-5">
                                <div class="card">
                                    <img class="card-img-top" src="{{asset('assets/frontend/')}}/images/news-2.png" alt="blog-image1" width="370" height="583">
                                    <div class="card-img-overlay">
                                        <div class="blog-content">
                                            <h5 class="card-title mt-3">Author Name</h5>
                                            <h2 class="mt-4">Cryptocurrency Mobile App</h2>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="#" class="read-more btn btn-round btn-glow btn-gradient-blue">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4 mb-sm-5  mb-xs-5">
                                <div class="card">
                                    <img class="card-img-top" src="{{asset('assets/frontend/')}}/images/news-3.png" alt="blog-image1" width="370" height="583">
                                    <div class="card-img-overlay">
                                        <div class="blog-content">
                                            <h5 class="card-title mt-3">Author Name</h5>
                                            <h2 class="mt-4">Cryptocurrency Mobile App</h2>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="#" class="read-more btn btn-round btn-glow btn-gradient-blue">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ News -->--}}

            <!-- Contact -->
            <section id="contact" class="contact section-padding">
                <div class="container-fluid">
                    <div class="container">
                        <div class="heading text-center">
                            <h6 class="sub-title">Contact</h6>
                            <h2 class="title">Contact<strong> {{$f_coin}} ICO</strong></h2>
                            <div class="separator">
                                <span class="large"></span>
                                <span class="medium"></span>
                                <span class="small"></span>
                            </div>
                            <p class="content-desc">Have questions? We’re happy to help.</p>

                            <p class="font-medium mt-5">Contact us with any questions regarding {{$f_coin}} ICO.</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 col-md-12 mx-auto">
                                <ul class="list-unstyled list-group contact-info mb-3">
                                    <li class="pt-1">
                                        <i class="ti-location-pin"></i>
                                        <span>Kelley A. Fleming 96 Woodside USA.</span>
                                    </li>
                                    <li>
                                        <i class="ti-email"></i>
                                        <span>info{{'@'.strtolower($f_coin) }}.com</span>
                                    </li>
                                    <li>
                                        <i class="ti-comment-alt"></i>
                                        <span>Join us on Telegram</span>
                                    </li>
                                    <li>
                                        <i class="ti-headphone"></i>
                                        <span>+44 0123 4567</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-7 col-md-12 mx-auto">
                                <form action="#" method="post" name="frmContact" id="frmContact" accept-charset="utf-8" class="text-center" onsubmit="return false;">
                                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Your Name">
                                    <input type="text" class="form-control" name="mail" id=mail placeholder="Your Mail">
                                    <textarea rows="4" class="form-control" name="message" id="message" placeholder="Your Massage"></textarea>
                                    <button type="submit" class="btn btn-lg btn-gradient-blue btn-glow float-right">Send Message</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <!--/ Contact -->


            <!-- ICO Video Modal -->

            <div class="modal ico-modal fade" id="ico-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body p-0">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" id="video"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dev Team Modal Pop-ups -->

            <!-- teamUser9 -->
            <div class="modal team-modal fade" id="teamUser9" tabindex="-1" role="dialog" aria-labelledby="teamUser9Title" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                            <div class="row p-4">
                                <div class="col-12 col-md-5">
                                    <img class="img-fluid rounded" src="{{asset('assets/frontend/')}}/images/user-9-lg.jpg" alt="Logan S. Perez">
                                </div>
                                <div class="col-12 col-md-7 mt-sm-3">
                                    <h5 id="teamUser9Title">Logan S. Perez</h5>
                                    <small class="text-muted mb-0 ">CEO & CFO</small>
                                    <div class="social-profile">
                                        <a href="#" title="Linkedin" class="font-medium grey-accent2 mr-2"><i class="ti-linkedin"></i></a>
                                        <a href="#" title="Twitter" class="font-medium grey-accent2 mr-2"><i class="ti-twitter-alt"></i></a>
                                        <a href="#" title="Github" class="font-medium grey-accent2"><i class="ti-github"></i></a>
                                    </div>

                                    <div class="my-4">
                                        <p>Experienced algorithmic {{$f_coin}} trader and a machine learning evangelist.</p>
                                        <p>I’m focusing on the logic behind the combination of analysis tools, neural networks and genetic algorithms for optimization. Always wanted to have a trading bot with more features but never had the time to build a solution beyond basic python technical analysis tracker.</p>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Blockchain</small> <small class="float-right">85%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Python</small> <small class="float-right">90%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">C++</small> <small class="float-right">75%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- teamUser6 -->
            <div class="modal team-modal fade" id="teamUser6" tabindex="-1" role="dialog" aria-labelledby="teamUser6Title" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                            <div class="row p-4">
                                <div class="col-12 col-md-5">
                                    <img class="img-fluid rounded" src="{{asset('assets/frontend/')}}/images/user-6-lg.jpg" alt="Susan J. Newsom">
                                </div>
                                <div class="col-12 col-md-7 mt-sm-3">
                                    <h5 id="teamUser6Title">Susan J. Newsom</h5>
                                    <small class="text-muted mb-0 ">Graphic Designer</small>
                                    <div class="social-profile">
                                        <a href="#" title="Linkedin" class="mr-2"><i class="ti-linkedin"></i></a>
                                        <a href="#" title="Twitter" class="mr-2"><i class="ti-twitter-alt"></i></a>
                                        <a href="#" title="Github"><i class="ti-github"></i></a>
                                    </div>

                                    <div class="my-4">
                                        <p>Experienced algorithmic {{$f_coin}} trader and a machine learning evangelist.</p>
                                        <p>I’m focusing on the logic behind the combination of analysis tools, neural networks and genetic algorithms for optimization. Always wanted to have a trading bot with more features but never had the time to build a solution beyond basic python technical analysis tracker.</p>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Blockchain</small> <small class="float-right">85%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Python</small> <small class="float-right">90%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">C++</small> <small class="float-right">75%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- teamUser2 -->
            <div class="modal team-modal fade" id="teamUser2" tabindex="-1" role="dialog" aria-labelledby="teamUser2Title" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                            <div class="row p-4">
                                <div class="col-12 col-md-5">
                                    <img class="img-fluid rounded" src="{{asset('assets/frontend/')}}/images/user-2-lg.jpg" alt="Mary J. Wardle">
                                </div>
                                <div class="col-12 col-md-7 mt-sm-3">
                                    <h5 id="teamUser2Title">Mary J. Wardle</h5>
                                    <small class="text-muted mb-0 ">CPO</small>
                                    <div class="social-profile">
                                        <a href="#" title="Linkedin" class="font-medium grey-accent2 mr-2"><i class="ti-linkedin"></i></a>
                                        <a href="#" title="Twitter" class="font-medium grey-accent2 mr-2"><i class="ti-twitter-alt"></i></a>
                                        <a href="#" title="Github" class="font-medium grey-accent2"><i class="ti-github"></i></a>
                                    </div>

                                    <div class="my-4">
                                        <p>Experienced algorithmic {{$f_coin}} trader and a machine learning evangelist.</p>
                                        <p>I’m focusing on the logic behind the combination of analysis tools, neural networks and genetic algorithms for optimization. Always wanted to have a trading bot with more features but never had the time to build a solution beyond basic python technical analysis tracker.</p>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Blockchain</small> <small class="float-right">85%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Python</small> <small class="float-right">90%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">C++</small> <small class="float-right">75%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- teamUser10 -->
            <div class="modal team-modal fade" id="teamUser10" tabindex="-1" role="dialog" aria-labelledby="teamUser10Title" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                            <div class="row p-4">
                                <div class="col-12 col-md-5">
                                    <img class="img-fluid rounded" src="{{asset('assets/frontend/')}}/images/user-10-lg.jpg" alt="Nicholas M. Sharpe">
                                </div>
                                <div class="col-12 col-md-7 mt-sm-3">
                                    <h5 id="teamUser10Title">Nicholas M. Sharpe</h5>
                                    <small class="text-muted mb-0 ">UI / UX Designer</small>
                                    <div class="social-profile">
                                        <a href="#" title="Linkedin" class="font-medium grey-accent2 mr-2"><i class="ti-linkedin"></i></a>
                                        <a href="#" title="Twitter" class="font-medium grey-accent2 mr-2"><i class="ti-twitter-alt"></i></a>
                                        <a href="#" title="Github" class="font-medium grey-accent2"><i class="ti-github"></i></a>
                                    </div>

                                    <div class="my-4">
                                        <p>Experienced algorithmic {{$f_coin}} trader and a machine learning evangelist.</p>
                                        <p>I’m focusing on the logic behind the combination of analysis tools, neural networks and genetic algorithms for optimization. Always wanted to have a trading bot with more features but never had the time to build a solution beyond basic python technical analysis tracker.</p>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Blockchain</small> <small class="float-right">85%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Python</small> <small class="float-right">90%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">C++</small> <small class="float-right">75%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- teamUser4 -->
            <div class="modal team-modal fade" id="teamUser4" tabindex="-1" role="dialog" aria-labelledby="teamUser4Title" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                            <div class="row p-4">
                                <div class="col-12 col-md-5">
                                    <img class="img-fluid rounded" src="{{asset('assets/frontend/')}}/images/user-4-lg.jpg" alt="Cecelia T. Carter">
                                </div>
                                <div class="col-12 col-md-7 mt-sm-3">
                                    <h5 id="teamUser4Title">Cecelia T. Carter</h5>
                                    <small class="text-muted mb-0 ">CTO</small>
                                    <div class="social-profile">
                                        <a href="#" title="Linkedin" class="font-medium grey-accent2 mr-2"><i class="ti-linkedin"></i></a>
                                        <a href="#" title="Twitter" class="font-medium grey-accent2 mr-2"><i class="ti-twitter-alt"></i></a>
                                        <a href="#" title="Github" class="font-medium grey-accent2"><i class="ti-github"></i></a>
                                    </div>

                                    <div class="my-4">
                                        <p>Experienced algorithmic {{$f_coin}} trader and a machine learning evangelist.</p>
                                        <p>I’m focusing on the logic behind the combination of analysis tools, neural networks and genetic algorithms for optimization. Always wanted to have a trading bot with more features but never had the time to build a solution beyond basic python technical analysis tracker.</p>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Blockchain</small> <small class="float-right">85%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Python</small> <small class="float-right">90%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">C++</small> <small class="float-right">75%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- teamUser13 -->
            <div class="modal team-modal fade" id="teamUser13" tabindex="-1" role="dialog" aria-labelledby="teamUser13Title" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                            <div class="row p-4">
                                <div class="col-12 col-md-5">
                                    <img class="img-fluid rounded" src="{{asset('assets/frontend/')}}/images/user-13-lg.jpg" alt="Terry T. Robinette">
                                </div>
                                <div class="col-12 col-md-7 mt-sm-3">
                                    <h5 id="teamUser13Title">Terry T. Robinette</h5>
                                    <small class="text-muted mb-0 ">Developer</small>
                                    <div class="social-profile">
                                        <a href="#" title="Linkedin" class="font-medium grey-accent2 mr-2"><i class="ti-linkedin"></i></a>
                                        <a href="#" title="Twitter" class="font-medium grey-accent2 mr-2"><i class="ti-twitter-alt"></i></a>
                                        <a href="#" title="Github" class="font-medium grey-accent2"><i class="ti-github"></i></a>
                                    </div>

                                    <div class="my-4">
                                        <p>Experienced algorithmic {{$f_coin}} trader and a machine learning evangelist.</p>
                                        <p>I’m focusing on the logic behind the combination of analysis tools, neural networks and genetic algorithms for optimization. Always wanted to have a trading bot with more features but never had the time to build a solution beyond basic python technical analysis tracker.</p>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Blockchain</small> <small class="float-right">85%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Python</small> <small class="float-right">90%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">C++</small> <small class="float-right">75%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Advisors Team Modal Pop-ups -->

            <!-- teamUser1 -->
            <div class="modal team-modal fade" id="teamUser1" tabindex="-1" role="dialog" aria-labelledby="teamUser1Title" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                            <div class="row p-4">
                                <div class="col-12 col-md-5">
                                    <img class="img-fluid rounded" src="{{asset('assets/frontend/')}}/images/user-1-lg.jpg" alt="Nadia Sidko">
                                </div>
                                <div class="col-12 col-md-7 mt-sm-3">
                                    <h5 id="teamUser1Title">Nadia Sidko</h5>
                                    <small class="text-muted mb-0 ">Blockchain Entrepreneur</small>
                                    <div class="social-profile">
                                        <a href="#" title="Linkedin" class="font-medium grey-accent2 mr-2"><i class="ti-linkedin"></i></a>
                                        <a href="#" title="Twitter" class="font-medium grey-accent2 mr-2"><i class="ti-twitter-alt"></i></a>
                                        <a href="#" title="Github" class="font-medium grey-accent2"><i class="ti-github"></i></a>
                                    </div>

                                    <div class="my-4">
                                        <p>Experienced algorithmic {{$f_coin}} trader and a machine learning evangelist.</p>
                                        <p>I’m focusing on the logic behind the combination of analysis tools, neural networks and genetic algorithms for optimization. Always wanted to have a trading bot with more features but never had the time to build a solution beyond basic python technical analysis tracker.</p>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Blockchain</small> <small class="float-right">85%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Python</small> <small class="float-right">90%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">C++</small> <small class="float-right">75%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- teamUser8 -->
            <div class="modal team-modal fade" id="teamUser8" tabindex="-1" role="dialog" aria-labelledby="teamUser8Title" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                            <div class="row p-4">
                                <div class="col-12 col-md-5">
                                    <img class="img-fluid rounded" src="{{asset('assets/frontend/')}}/images/user-8-lg.jpg" alt="Pavel Volek">
                                </div>
                                <div class="col-12 col-md-7 mt-sm-3">
                                    <h5 id="teamUser8Title">Pavel Volek</h5>
                                    <small class="text-muted mb-0 ">Entrepreneur and Investor</small>
                                    <div class="social-profile">
                                        <a href="#" title="Linkedin" class="font-medium grey-accent2 mr-2"><i class="ti-linkedin"></i></a>
                                        <a href="#" title="Twitter" class="font-medium grey-accent2 mr-2"><i class="ti-twitter-alt"></i></a>
                                        <a href="#" title="Github" class="font-medium grey-accent2"><i class="ti-github"></i></a>
                                    </div>

                                    <div class="my-4">
                                        <p>Experienced algorithmic {{$f_coin}} trader and a machine learning evangelist.</p>
                                        <p>I’m focusing on the logic behind the combination of analysis tools, neural networks and genetic algorithms for optimization. Always wanted to have a trading bot with more features but never had the time to build a solution beyond basic python technical analysis tracker.</p>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Blockchain</small> <small class="float-right">85%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Python</small> <small class="float-right">90%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">C++</small> <small class="float-right">75%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- teamUser3 -->
            <div class="modal team-modal fade" id="teamUser3" tabindex="-1" role="dialog" aria-labelledby="teamUser3Title" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                            <div class="row p-4">
                                <div class="col-12 col-md-5">
                                    <img class="img-fluid rounded" src="{{asset('assets/frontend/')}}/images/user-3-lg.jpg" alt="Alyona Blakytna">
                                </div>
                                <div class="col-12 col-md-7 mt-sm-3">
                                    <h5 id="teamUser3Title">Alyona Blakytna</h5>
                                    <small class="text-muted mb-0 ">Fin-Tech Entrepreneur</small>
                                    <div class="social-profile">
                                        <a href="#" title="Linkedin" class="font-medium grey-accent2 mr-2"><i class="ti-linkedin"></i></a>
                                        <a href="#" title="Twitter" class="font-medium grey-accent2 mr-2"><i class="ti-twitter-alt"></i></a>
                                        <a href="#" title="Github" class="font-medium grey-accent2"><i class="ti-github"></i></a>
                                    </div>

                                    <div class="my-4">
                                        <p>Experienced algorithmic {{$f_coin}} trader and a machine learning evangelist.</p>
                                        <p>I’m focusing on the logic behind the combination of analysis tools, neural networks and genetic algorithms for optimization. Always wanted to have a trading bot with more features but never had the time to build a solution beyond basic python technical analysis tracker.</p>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Blockchain</small> <small class="float-right">85%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Python</small> <small class="float-right">90%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">C++</small> <small class="float-right">75%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- teamUser11 -->
            <div class="modal team-modal fade" id="teamUser11" tabindex="-1" role="dialog" aria-labelledby="teamUser11Title" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                            <div class="row p-4">
                                <div class="col-12 col-md-5">
                                    <img class="img-fluid rounded" src="{{asset('assets/frontend/')}}/images/user-11-lg.jpg" alt="Martin Solarik">
                                </div>
                                <div class="col-12 col-md-7 mt-sm-3">
                                    <h5 id="teamUser11Title">Martin Solarik</h5>
                                    <small class="text-muted mb-0 ">Fin-Tech Investor</small>
                                    <div class="social-profile">
                                        <a href="#" title="Linkedin" class="font-medium grey-accent2 mr-2"><i class="ti-linkedin"></i></a>
                                        <a href="#" title="Twitter" class="font-medium grey-accent2 mr-2"><i class="ti-twitter-alt"></i></a>
                                        <a href="#" title="Github" class="font-medium grey-accent2"><i class="ti-github"></i></a>
                                    </div>

                                    <div class="my-4">
                                        <p>Experienced algorithmic {{$f_coin}} trader and a machine learning evangelist.</p>
                                        <p>I’m focusing on the logic behind the combination of analysis tools, neural networks and genetic algorithms for optimization. Always wanted to have a trading bot with more features but never had the time to build a solution beyond basic python technical analysis tracker.</p>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Blockchain</small> <small class="float-right">85%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Python</small> <small class="float-right">90%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">C++</small> <small class="float-right">75%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- teamUser7 -->
            <div class="modal team-modal fade" id="teamUser7" tabindex="-1" role="dialog" aria-labelledby="teamUser7Title" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                            <div class="row p-4">
                                <div class="col-12 col-md-5">
                                    <img class="img-fluid rounded" src="{{asset('assets/frontend/')}}/images/user-7-lg.jpg" alt="Kate Fisenko">
                                </div>
                                <div class="col-12 col-md-7 mt-sm-3">
                                    <h5 id="teamUser7Title">Kate Fisenko</h5>
                                    <small class="text-muted mb-0 ">Fin-Tech Investor</small>
                                    <div class="social-profile">
                                        <a href="#" title="Linkedin" class="font-medium grey-accent2 mr-2"><i class="ti-linkedin"></i></a>
                                        <a href="#" title="Twitter" class="font-medium grey-accent2 mr-2"><i class="ti-twitter-alt"></i></a>
                                        <a href="#" title="Github" class="font-medium grey-accent2"><i class="ti-github"></i></a>
                                    </div>

                                    <div class="my-4">
                                        <p>Experienced algorithmic {{$f_coin}} trader and a machine learning evangelist.</p>
                                        <p>I’m focusing on the logic behind the combination of analysis tools, neural networks and genetic algorithms for optimization. Always wanted to have a trading bot with more features but never had the time to build a solution beyond basic python technical analysis tracker.</p>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Blockchain</small> <small class="float-right">85%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Python</small> <small class="float-right">90%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">C++</small> <small class="float-right">75%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- teamUser12 -->
            <div class="modal team-modal fade" id="teamUser12" tabindex="-1" role="dialog" aria-labelledby="teamUser12Title" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                            <div class="row p-4">
                                <div class="col-12 col-md-5">
                                    <img class="img-fluid rounded" src="{{asset('assets/frontend/')}}/images/user-12-lg.jpg" alt="Michal Krajnansky">
                                </div>
                                <div class="col-12 col-md-7 mt-sm-3">
                                    <h5 id="teamUser12Title">Michal Krajnansky</h5>
                                    <small class="text-muted mb-0 ">Blockchain Entrepreneur</small>
                                    <div class="social-profile">
                                        <a href="#" title="Linkedin" class="font-medium grey-accent2 mr-2"><i class="ti-linkedin"></i></a>
                                        <a href="#" title="Twitter" class="font-medium grey-accent2 mr-2"><i class="ti-twitter-alt"></i></a>
                                        <a href="#" title="Github" class="font-medium grey-accent2"><i class="ti-github"></i></a>
                                    </div>

                                    <div class="my-4">
                                        <p>Experienced algorithmic {{$f_coin}} trader and a machine learning evangelist.</p>
                                        <p>I’m focusing on the logic behind the combination of analysis tools, neural networks and genetic algorithms for optimization. Always wanted to have a trading bot with more features but never had the time to build a solution beyond basic python technical analysis tracker.</p>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Blockchain</small> <small class="float-right">85%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">Python</small> <small class="float-right">90%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="mb-0"><small class="text-uppercase">C++</small> <small class="float-right">75%</small></h6>
                                    <div class="progress box-shadow-1 mb-4">
                                        <div class="progress-bar progress-orange" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<!-- //////////////////////////////////// FOOTER ////////////////////////////////////-->


<footer class="footer static-bottom footer-light footer-custom-class" data-midnight=""><div class="container">
        <div class="footer-wrapper mx-auto text-center">
         @if(session()->has('error')) <div class="alert alert-danger"> {{ session()->get('error') }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  </div> @endif
         @if(session()->has('success')) <div class="alert alert-success"> {{ session()->get('success') }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> </div> @endif
         @if(session()->has('warning')) <div class="alert alert-success"> {{ session()->get('success') }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> </div> @endif
            <div class="footer-title mb-5 animated" data-animation="fadeInUpShorter" data-animation-delay="0.2s">Stay updated with us</div>
            <form action="{{url('email-subscribe')}}" method="post" id="email-subscribe-form" class="subscribe mb-3 animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s" accept-charset="utf-8">
                {{ csrf_field() }}
                <input type="text" name="email" class="subscribe-text email" id="subscribe_email" placeholder="Enter your email address" value="{{ old('email')}}">
                    @if ($errors->has('email'))<div class="error text-danger">{{ $errors->first('email') }}</div> @endif
                <button type="button"  class="btn btn-gradient-blue btn-glow rounded-circle subscribe-btn" onclick="addSubscribe()"  name="Subscribe" id="submit-email"><i class="ti-angle-right"></i></button>
            </form>
            <div class="text-center" style="margin-top:10px;">
                    <div id="success-email" class="text-success" style="display:none;">You have subscribed successfully</div>
                    <div id="error-email" class="text-danger" style="display:none;">An error occured while trying to subscribe. Please try again.</div>
                </div>
            <p class="subscribe-desc mb-4 animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s">Subscribe now and be the first to find about our latest products!</p>
            <ul class="social-buttons list-unstyled mb-5">
                <li class="animated" data-animation="fadeInUpShorter" data-animation-delay="0.5s"><a href="#" title="Facebook" class="btn btn-outline-facebook rounded-circle"><i class="ti-facebook"></i></a></li>
                <li class="animated" data-animation="fadeInUpShorter" data-animation-delay="0.6s"><a href="#" title="Twitter" class="btn btn-outline-twitter rounded-circle"><i class="ti-twitter-alt"></i></a></li>
                <li class="animated" data-animation="fadeInUpShorter" data-animation-delay="0.7s"><a href="#" title="LinkedIn" class="btn btn-outline-linkedin rounded-circle"><i class="ti-linkedin"></i></a></li>
                <li class="animated" data-animation="fadeInUpShorter" data-animation-delay="0.8s"><a href="#" title="GitHub" class="btn btn-outline-github rounded-circle"><i class="ti-github"></i></a></li>
                <li class="animated" data-animation="fadeInUpShorter" data-animation-delay="0.9s"><a href="#" title="Pintrest" class="btn btn-outline-pinterest rounded-circle"><i class="ti-pinterest"></i></a></li>
            </ul>
            <span class="copyright animated" data-animation="fadeInUpShorter" data-animation-delay="1.0s">Copyright &copy; {{date('Y')}}, {{$f_coin}} ICO. </span>
        </div>
    </div>
</footer>
<!-- BEGIN VENDOR JS-->
<script src="{{asset('assets/frontend/')}}/vendors/vendors.min.js"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('assets/frontend/')}}/vendors/flipclock/flipclock.min.js"></script>
<script src="{{asset('assets/frontend/')}}/vendors/swiper/js/swiper.min.js"></script>
<!-- END PAGE VENDOR JS-->

<!-- END {{$f_coin}} JS-->
<script src="{{asset('assets/js/sweetalert.min.js')}}" type="text/javascript"></script>

<!-- END TRIPLEVEST JS-->
<script src="{{asset('assets/frontend/')}}/js/owl.carousel.js"></script>
<script src="{{asset('assets/frontend/')}}/js/jquery.magnific-popup.min.js"></script>

<!-- BEGIN THEME JS-->
<script src="{{asset('assets/frontend/')}}/js/theme.js"></script>

<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->

{{-- flip clock js --}}
<script type="text/javascript">

    var clock;

    jQuery(document).ready(function() {
        // Grab the current date
        var currentDate = new Date();

        // Grab the date inserted by user
        var inserted_date = new Date("{{$date}}");

        // Calculate the difference in seconds between the future and current date
        var diff = inserted_date.getTime() / 1000 - currentDate.getTime() / 1000;

        // Instantiate a coutdown FlipClock
        clock = jQuery(".clock").FlipClock(diff, {
            clockFace: "DailyCounter",
            countdown: true
        });
    });
</script>
{{-- end flip clock js --}}
    <script type="text/javascript" charset="utf-8" async defer>

        function addSubscribe()
      {
           var email = $("#subscribe_email").val();
           var _token="{{csrf_token()}}";           
          if(email!='')
          {
             // alert('Yes Email');
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
            {
            $.ajax({    
                type:'post',
                data: { 'email': email, '_token':_token},
                dataType: 'json',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url:'{{url("email-subscribe")}}',
                success:function(data){
                  if(data==0)
                  {  
                     $("#subscribe_email").val('');
                    swal("Warning", "You email address was already subscribed!", "warning");
                  }
                  else if(data==1)
                  {
                    $("#subscribe_email").val('');
                    swal("Success", "Your subscribption done successfully!", "success");
                  }
                  else
                  {
                     swal("Error", "Oops! Something went wrong, Please try again.", "error");
                  }
                }

              });

           }
           else{
              swal("Warning", "Enter valid email address.", "warning");
           }
        }
        else{
          // alert('No Email');
          swal("Error", "Please enter email address first.", "warning");
        }
      }
    </script>

<script>

    $('#home-slider').owlCarousel({
    items: 1,
    loop:true,
    margin:10,
    dots : false,
    navs : false,   
})

    $(document).ready(function() {
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
    });

</script>
</body>
</html>