@extends('layouts.master')
<!-- head -->
@section('title')
    {{$f_coin}} | Buy Token
@endsection
<!-- title -->
@section('head')
    <style>
        .card-header .rating-info{
            font-size: 11px;
        }
    </style>

@endsection

@section('content')
    <div class="dashboard-body">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Buy {{$s_coin}} token</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
                    </li>
                    <li class="breadcrumb-item">BUY {{$s_coin}} token</li>
                </ol>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="card icon-timer">
                    <div class="card-header">
                        <h4 class="text-center" id="status_code"></h4>
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
                        <h4 class="text-center">Total {{$s_coin}}</h4>
                    </div>
                    <div class="card-body p-5">
                        <h2 class="counter text-center ico-font">{{number_format($setting->total_coins)}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card icon-timer">
                    <div class="card-header">
                        <h4 class="text-center">Sold {{$s_coin}}</h4>
                    </div>
                    <div class="card-body p-5">
                        <h2 class="counter text-center ico-font">{{number_format($setting->sold_coins)}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        {{--<h5>You can buy minimum {{$setting->min_buy_token}}{{$s_coin}} </h5>//--}}
                        <h5>You can buy Maximum {{$setting->max_buy_token}}{{$s_coin}} in 24 Hours </h5>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <ul class="rating-info">
                            <li ><img src="{{asset('assets/images/bitcoin.png')}}" alt="BTC"> BTC =  {{number_format(Sentinel::getUser()->total_btc_bal,8)}}</li
                            <li><img src="{{asset('assets/images/icon-eth.png')}}" alt="ETH"> ETH =  {{number_format(Sentinel::getUser()->total_eth_bal,8)}}</li>
                            <li><img src="{{asset('assets/images/coin.png')}}" alt="ETH"> {{$s_coin}} =  {{Sentinel::getUser()->total_coin_bal}}</li>
                        </ul>
                        @if(session()->has('error')) <div class="alert alert-danger"> {{ session()->get('error') }} </div>  @endif
                        @if(session()->has('success')) <div class="alert alert-success"> {{ session()->get('success') }} </div> @endif
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ url('storeico') }}">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="address">Select Coin</label>
                                <select class="form-control" onchange="check_balance()" name="coin_name" id="coin_name">
                                <option id="btc" name="BTC" value="BTC">BTC</option>
                                    <option id="eth" name="ETH" value="ETH">ETH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="address">{{$s_coin}} Amount</label>
                                <input type="text"  onkeyup="check_balance(this.value)" class="form-control" name="units" id="units" placeholder="0.000">
                                <div id="error" class="p-2"></div>

                                @if ($errors->has('units'))
                                    <div class="error">{{ $errors->first('units') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="address">Price</label>
                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <input type="text" class="form-control" id="price" name="price" placeholder="0.00" disabled="disabled" >
                                    <div class="btn-theme lbl-info" disabled="disabled"><span id="coinnames">BTC</span></div>
                                </div>
                            </div>
                            <div class="form-group " @if($setting->bonus <= 0)style="display: none"@endif>
                                <label for="address">Bonus</label>
                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <input type="text" class="form-control" name="bonus" id="bonus" placeholder="0.00" disabled="disabled" >
                                    <div class="btn-theme lbl-info" disabled="disabled">{{$s_coin}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Total</label>
                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <input type="text" class="form-control" id="total_amount" name="total_amount" placeholder="0.00" disabled="disabled" >
                                    <div class="btn-theme lbl-info" disabled="disabled">{{$s_coin}}</div>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" id="coin_submit" disabled class="btn btn-theme">Buy {{$s_coin}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>My Order</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Details</th>
                                <th scope="col">Token</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Tx_id</th>
                                {{--<th scope="col">Status</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($wallets as $key)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <th scope="row">{{date_format($key->created_at,"Y-M-d H:i")}}</th>
                                <td> Buy Token using  @if($key->type == 1)BTC @elseif($key->type == 2) ETH @endif</td>
                                <td>{{$key->tokens}}</td>
                                <td>{{$key->amount}}</td>
                                <td>{{$key->txid}}</td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
@endsection
<!-- content -->

@section('script')
@endsection

@section('script_bottom')


    <script type="text/javascript">
        var btc = 0;
        var eth = 0;
        var rate = 0;
        var buyALLBTC = 1;
        var buyALLETH = 1;

        btc = {{$setting->btc_price}};
        eth = {{$setting->eth_price}};
        rate = {{$setting->rate}};

        var btc_amount ={{Sentinel::getUser()->total_btc_bal}};
        var eth_amount ={{Sentinel::getUser()->total_eth_bal}};



        function check_balance() {
            var val = $("#units").val();

            $('#coinnames').html($("#coin_name").val());

            if(isNaN(val)){
                val = val.replace(/[^0-9\.]/g,'');
                if(val.split('.').length>2)
                    val = val.replace(/\.+$/,"");
                $("#units").val(val);
            }


            if ($("#coin_name").val() == "BTC") {

                if ($("#units").val() > 0) {

                    if (btc_amount == 0) {
                        $(".token_error").addClass('has-error');
                        $("#error").html('<div class="text-danger"><b>You don`t have sufficient BTC balance to buy !!</b></div>');
                        $("#coin_submit").prop('disabled', true);
                    }
                    if ($("#units").val() > 0) {

                        var NumberCoin= $("#units").val();
                        NumberCoin = NumberCoin * rate;
                        var btc_total = (NumberCoin / btc).toFixed(8);

                        $("#price").val(btc_total);

                        var token = $("#units").val()
                        var bonus = {{$setting->bonus}};
                        $("#bonus").val(token*bonus/100);

                        $("#total_amount").val(parseFloat(token)+parseFloat(token*bonus/100));


                        if (btc_total > btc_amount) {

                            $("#error").html('<div class="text-danger"><b>You don\'t have sufficient BTC balance to buy !!</b></div>');
                            $("#coin_submit").prop('disabled', true);
                            return false;
                        } else {
                            $("#error").html('');
                            $("#coin_submit").prop('disabled', false);
                        }
                    }
                    else {
                        $("#coin_submit").prop('disabled', true);

                    }
                }

            }
            else if($("#coin_name").val() == "ETH") {

                if ($("#units").val() > 0) {

                    if (eth_amount == 0) {
                        $(".token_error").addClass('has-error');
                        $("#error").html('<div class="text-danger"><b>You don`t have sufficient ETH balance to buy !!</b></div>');
                        $("#coin_submit").prop('disabled', true);
                    }
                    if ($("#units").val() > 0) {

                        var NumberCoin= $("#units").val();
                        NumberCoin = NumberCoin * rate;
                       var   eth_total = (NumberCoin / eth).toFixed(8);

                        $("#price").val(eth_total);

                        var token = $("#units").val()
                        var bonus = {{$setting->bonus}};
                        $("#bonus").val(token*bonus/100);

                        $("#total_amount").val(parseFloat(token)+parseFloat(token*bonus/100));


                        if (eth_total > eth_amount) {

                            $("#error").html('<div class="text-danger"><b>You don\'t have sufficient ETH balance to buy !!</b></div>');
                            $("#coin_submit").prop('disabled', true);
                            return false;
                        } else {
                            $("#error").html('');
                            $("#coin_submit").prop('disabled', false);
                        }
                    }
                    else {
                        $("#coin_submit").prop('disabled', true);

                    }
                }

            }


        }

    </script>

    @php
        $date="";
        $stratdate = strtotime($setting->ico_start_date);
        $enddate = strtotime($setting->ico_end_date);
        $currentdate = time();

        if($currentdate > $stratdate && $currentdate < $enddate )
        {
          $date = $setting->ico_end_date;
          $state = "Live now";
                  }
        else if($currentdate < $stratdate  ){
          $date = $setting->ico_start_date;
          $state ="Begin at";
        }
         else if($currentdate > $stratdate  ){
          $date = $setting->ico_end_date;
          $state ="Ended";
        }
    @endphp
<script>
    @if($state !="Live now")
         $("#units").prop('disabled', true);
    @endif
     $("#status_code").html('{{'ICO '.$state}}');
</script>

    <script type="text/javascript">

        var countDownDate = new Date("{{$date}}").getTime();
        // Update the count down every 1 second
        var countdownfunction = setInterval(function() {

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
            document.getElementById("timer").innerHTML = "<span>" + days + "<span class='timer-cal'>D</span></span> :" + "<span>" + hours + "<span class='timer-cal'>H</span></span> :"
                    + "<span>" + minutes + "<span class='timer-cal'>M</span></span> :" + "<span>" + seconds + "<span class='timer-cal'>S</span></span> ";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(countdownfunction);
                document.getElementById("timer").innerHTML = "EXPIRED";
            }
        }, 1000);

    </script>


@endsection
<!-- script -->
