@extends('layouts.master')
@section('title') {{$f_coin}} - Withdrawal @endsection
@section('style')
<style type="text/css">
button.btn.btn-danger.btn-sm , button.btn.btn-success.btn-sm {
    width: 25%;
}
.badge-warning {
color: #fff !important;
}
</style>
@endsection
@section('content')
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
<div class="dashboard-body">

  <div class="row">
    <div class="col-sm-12">
      <h4 class="page-title">Withdrawals</h4>
      <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="{{ URL('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
       </li>
       <li class="breadcrumb-item"><a href="{{ URL('wallet')}}">wallet</a>
         <li class="breadcrumb-item">Withdrawals
         </li>
       </ol>
    </div>
      <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                  <h4>Balance</h4>
              </div>
              <div class="card-body coin-value">
                  <div class="row">
                      <div class="col-lg-4">
                          <div class="media">
                              <img class="mr-3" src="{{ url('assets/images/bitcoin.png') }}" alt="bitcoin">
                              <div class="media-body">
                                  <h5 class="mt-2">
                                      BTC</h5>
                                  <h4 class="blue-font mt-0 ">
                                      {{number_format(Sentinel::getUser()->total_btc_bal,8)}}

                                  </h4>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="media">
                              <img class="mr-3" src="{{ url('assets/images/icon-eth.png') }}" alt="ETH">
                              <div class="media-body">
                                  <h5 class="mt-2">
                                      ETH</h5>
                                  <h4 class="blue-font mt-0 ">
                                      {{number_format(Sentinel::getUser()->total_eth_bal,8)}}
                                  </h4>
                              </div>
                          </div>
                      </div>

                      <div class="col-lg-4">
                          <div class="media">
                              <img class="mr-3" src="{{ url('assets/images/coin.png') }}" alt="{{$s_coin}}">
                              <div class="media-body">
                                  <h5 class="mt-2">
                                      {{$s_coin}}</h5>
                                  <h4 class="blue-font mt-0">
                                      {{number_format(Sentinel::getUser()->total_coin_bal,8)}}
                                  </h4>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="col-md-6">
          <div class="card">
              <div class="card-header">
                  <h4>Withdrawal
                      (@if($coin == $s_coin){{number_format(Sentinel::getUser()->total_coin_bal,8)}} @elseif($coin=='ETH')  {{number_format(Sentinel::getUser()->total_eth_bal,8)}} @elseif($coin=='BTC')   {{number_format(Sentinel::getUser()->total_btc_bal,8)}}@endif {{$coin}}
                      )</h4>
              </div>
              <div class="card-body coin-value">


                  <form class="form-horizontal theme-form" action="{{url('withdraw')}}" method="post" onsubmit="return check2fa()" id="user_withdraw">
                      {{csrf_field()}}
                      @if(session('error'))<br>
                      <div class="alert alert-danger">{{ session('error') }}</div><br>@endif
                      @if(session('success'))<br>
                      <div class="alert alert-success">{{ session('success') }}</div><br>@endif
                      <div id="alert-msg"></div>
                      {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                      <input type="hidden" name="coin_name" value="{{$coin}}">
                      <div class="form-group">
                          <label for="address">wallet Address</label>
                          <input type="text" class="form-control" id="address" value="" name="address_withdraw">

                          @if ($errors->has('address_withdraw'))
                              <div class="error">{{ $errors->first('address_withdraw') }}</div>
                          @endif
                      </div>
                      <div class="form-group">
                          <label for="Quantity-wisdom coin">Quantity Coin</label>
                          <input type="number" class="form-control" id="amount-withdraw" placeholder=""
                                 name="amount_withdraw" step="any" onkeyup="checkBalance()">

                          @if ($errors->has('amount_withdraw'))
                              <div class="error">{{ $errors->first('amount_withdraw') }}</div>
                          @endif
                      </div>
                      <div class="form-group text-right">
                          <button type="submit" class="btn btn-theme" id="Withdraw-btn">Withdraw</button>
                          <input type="hidden" name="key2fa" id="2fakey" value="">
                      </div>

                  </form>
              </div>
          </div>
      </div>


      <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>List Withdrawal</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
            <thead class="thead-dark">
              <tr>
                 <th scope="col">Id</th>
                 <th scope="col">Date</th>
                 <th scope="col">Address</th>
                 <th scope="col">Txid</th>
                 <th scope="col">Status</th>
                 <th scope="col">Amount</th>
                 <th scope="col">Coin Type</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=1; ?>
            @foreach($withdraws as $withdraw)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{ date_format($withdraw->created_at,'Y-m-d H:i') }}</td>
                    <td>{{$withdraw->address}}</td>
                    <td>{{$withdraw->txid}}</td>
                    <td>@if($withdraw->admin_status == 0)
                            <span class="badge badge-danger"> Pending </span>
                        @elseif($withdraw->admin_status == 1)
                            <span class="badge badge-success"> Approved </span>
                        @elseif($withdraw->admin_status == 2)
                            <span class="badge badge-danger"> Cancel </span>
                        @endif </td>
                    <td>{{number_format($withdraw->amount,8)}}</td>
                    <td>@if($withdraw->coin == 'BTC')
                            <span class="badge badge-warning"> BTC </span>
                        @elseif($withdraw->coin == 'ETH')
                            <span class="badge badge-info"> ETH  </span>
                        @elseif($withdraw->coin == $s_coin)
                            <span class="badge badge-info"> {{$s_coin}} </span>
                        @endif
                    </td>

                </tr>

             <?php $i++; ?>
             @endforeach

            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>
  </div>

    <!--2fa enable disable popup-->
    <div id="qrmatch" class="modal modal-styled fade in modals-body">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-center w-100"> Google 2FA</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <form id="gauth-form" class=" theme-form" inspfaactive="true" action="{{url('2fa/disable') }}"  method="get">
                    <div class="modal-body">
                        <div id="google_auth_msg"></div>
                        <input type="hidden" id="token_dis" name="_token" value="{{csrf_token()}}">
                        <div class="row" id="match-otp-2fa">
                            <div class="col-12">
                                <div class="form-group text-center">
                                    <label >Enter OTP  </label>
                                    <input type="number" name="google_2fa_otp" id="google_2fa_otp" class="form-control" onkeyup="checkOTP()" placeholder="Enter OTP that you get in your mobile" row="100" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer text-center">
                        <button type="button" class="btn button-close btn-theme" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    </div>

</div>
@endsection
@section('script')
<script>
$(document).ready(function() {
$('#data-table').DataTable();
 $("#Withdraw-btn").prop('disabled', true);
});

function checkBalance()
{
  var coin='<?php echo $coin ?>';
       if(coin=='ETH'){ var balance= <?php echo Sentinel::getUser()->total_eth_bal ?>; }
  else if(coin=='BTC'){ var balance= <?php echo Sentinel::getUser()->total_eth_bal ?>; }
  else if(coin=='{{$s_coin}}'){ var balance= <?php echo Sentinel::getUser()->total_coin_bal ?>; }
  else{ var balance=0;}
  var amount= $("#amount-withdraw").val();

  if(amount<=balance && amount>0)
  {
     $("#Withdraw-btn").prop('disabled', false);
      $("#alert-msg").html("");
  }
  else
  {
    $("#Withdraw-btn").prop('disabled', true);
    $("#alert-msg").html("<p class='alert alert-danger'>Insuficient balance.</p>")
  }
    if(amount=="" ||amount==null || !amount)
    {
        $("#alert-msg").html("");
        $("#Withdraw-btn").prop('disabled', true);
    }
}

</script>
    <script >
       function check2fa () {
           if($('#2fakey').val()) {
               return true;
           }else{
               if('{{Sentinel::getUser()->google2fa_enable}}' == 1) {
                   "{{ session()->put('2fa:user:id', Sentinel::getUser()->id) }}"
                   $('#qrmatch').modal('show');
                       return false;
                   }else{
                       return true;
                   }
               }
            };

        function checkOTP()
        {
            $("#google_auth_msg").html('');
            var Coin = $('#_token').val();
//            console.log(token);
            var code= $("#google_2fa_otp").val();


            if(code.length == 6)
            {
                $.ajax({
                    type: 'post',
                    url:"{{url('/2fa/validateuser')}}",
                    data: "totp="+code+'&_token='+'{{csrf_token()}}',
                    success: function (responseData) {
                        if(responseData.length ==10)
                        {   $('#2fakey').val(responseData);
                            $("#user_withdraw").submit();
                            $('#qrmatch').modal('toggle');
                            console.log('responseData');
                            $("#user_withdraw").submit();
                            return true;
                        }
                    },
                    error: function (responseData) {
                        $("#google_auth_msg").html("<div class='alert alert-danger'>Nice try but OTP not match, Please try again.</div>");
                        console.log(responseData);
                        return false;
                    }
                });
            }
            else {
                $("#google_auth_msg").html("<div class='alert alert-danger'>Enter 6 digit only, Please try again.</div>");
//                console.log(responseData);
                return false;

            }
        }
        </script>
@endsection