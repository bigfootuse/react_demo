@extends('layouts.master')
<!-- head -->
@section('title')
    ICO information || {{$f_coin}}
@endsection
<!-- title -->
@section('style')
    <style>
         .active{
            background: #ff662978;
        }
        .sold-out{
            background: rgba(30, 56, 99, 0.47);
        }
    </style>
@endsection
@section('head')
@endsection
@section('content')

        <div class="dashboard-body">
            <div class="row">

                <div class="col-sm-12">
                    <h4 class="page-title">ICO information</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
                        </li>
                        <!--<li class="breadcrumb-item"><a href="#">ICO</a-->
                            <li class="breadcrumb-item">ICO information
                            </li>
                    </ol>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="card icon-timer">
                        <div class="card-header">
                            <h4 id="status_name" class="text-center">ICO Start at</h4>
                        </div>
                        <div class="card-body">
                            <div class="timer-wrapper">
                                <p id="timer"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card icon-timer">
                        <div class="card-header">
                            <h4 class="text-center">Total {{$s_coin}} Coin</h4>
                        </div>
                        <div class="card-body p-5">
                            <h2 class="counter text-center ico-font">{{$setting->total_coins}}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card icon-timer">
                        <div class="card-header">
                            <h4 class="text-center">Sold {{$s_coin}}</h4>
                        </div>
                        <div class="card-body p-5">
                            <h2 class="counter text-center ico-font">{{$setting->sold_coins}}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                  <div class="row">

                    @foreach($phase as $phases)
                    <?php
                    $today = strtotime(date('y-m-d'));
                    $start_date = strtotime($phases->start_date);
                    $end_date = strtotime($phases->end_date);
                    $dist_to_start = $start_date - $today;
                    $dist_to_end = $end_date - $today;
                    if ($phases->id == $setting->rate_id  ) {
                        $active = 'active';
                    } else {
                        $active = '';
                    }
                    if ($dist_to_start < 0 AND $dist_to_end < 0) {
                        $sold_out = 'sold-out';
                    } else {
                        $sold_out = '';
                    }
                    ?>
                    <div class="col-lg-4 ">
                      <div class="card icon-timer">
                        <div class="card-header {{$active}} {{$sold_out}}" >
                          <h4 class="text-center text-uppercase ">{{$phases->name}} @if($active!="") (live) @endif</h4>
                        </div>


                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-4">
                              <p class="">Price: </p>
                            </div>
                            <div class="col-md-8">
                              <p class=""><b>$ {{ number_format($phases->usd_price,2)}}</b></p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <p class="">Bonus:</p>
                            </div>
                            <div class="col-md-8">
                              <p class=""><b>{{ $phases->bonus}} %</b></p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">Sold/Total Coins:</div>
                            <div class="col-md-8">
                              <b>{{ number_format($phases->sold)}}/{{ number_format($phases->sold_coins)}}</b>
                                <b>({{number_format(($phases->sold*100)/($phases->sold_coins))}})%</b>

                            </div>
                          </div>


                            <div class="row pt-3">
                                <div class="col-md-4">Date:</div>
                                <div class="col-md-8">
                                    <b></b>
                                    <b>{{date('M-d-Y H:i ',strtotime($phases->start_date))}} to {{date('M-d-Y H:i',strtotime($phases->end_date))}}</b>

                                </div>
                            </div>




                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>

            </div>
        </div>


        <?php
        $date="2010-02-26";
        $name_title="ICO Ended";
        $state =0 ;
        $today = strtotime(date('y-m-d'));
        $start_date = strtotime($phase_date->start_date);
        $end_date = strtotime($phase_date->end_date);
        $dist_to_start = $start_date-$today;
        $dist_to_end = $end_date-$today;

        if(($today >= $start_date) && ($today <= $end_date)) {
            $active = 'active' ;
            $date=$phase_date->end_date;
            $name_title="ICO is Live ";
            $state=1;
        }else{
            $active = '' ;
        }

        if(($today <= $start_date)) {
            $date=$phase_date->start_date;
            $name_title="ICO begin at";
        }else{
            $active = '' ;
        }

        if($dist_to_start < 0 AND $dist_to_end < 0) {
            $sold_out = 'sold-out' ;
        }else{
            $sold_out = '' ;
        }

        ?>

@endsection
<!-- content -->

@section('script')


@endsection



@section('script_bottom')
<script>

    $('#status_name').html('{{$name_title}}');
  // Set the date we're counting down to
  var countDownDate = new Date("{{$date}}").getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {

      // Get todays date and time
      var now = new Date().getTime();

      // Find the distance between now an the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Output the result in an element with id="timer"
      document.getElementById("timer").innerHTML = "<span>" + days + "<span class='timer-cal-timeline'>D</span></span> :" + "<span>" + hours + "<span class='timer-cal-timeline'>H</span></span> :"
          + "<span>" + minutes + "<span class='timer-cal-timeline'>M</span></span> :" + "<span>" + seconds + "<span class='timer-cal-timeline'>S</span></span> ";


      // If the count down is over, write some text
      if (distance < 0) {
          clearInterval(x);
          document.getElementById("timer").innerHTML = "EXPIRED";
      }
  }, 1000);

</script>

@endsection
<!-- script -->