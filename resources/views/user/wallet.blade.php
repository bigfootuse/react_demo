@extends('layouts.master')
<!-- head -->
@section('title')
    {{$f_coin}} - Wallet
@endsection
<!-- title -->
@section('head')


@endsection

@section('content')

    <div class="dashboard-body">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Deposit & Withdrawal</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>


                        </li>
                        <li class="breadcrumb-item">Wallet</li>
                    </ol>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Deposit & Withdrawal</h4>
                            <!-- <code> Estimated value of holdings 236.57 USD Deposit or withdraw anytime you want</code> -->
                        </div>

                        <?php
                          $user = Sentinel::getuser();
                        ?>
                        <div class="card-body table-responsive">
                            <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Coin</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <img style="height: 50px;" src="{{url('assets/images/bitcoin.png')}}" alt="BTC">
                                        </th>
                                        <td>BTC ({{number_format($user->total_btc_bal,8)}})</td>
                                        <td>
                                            <a href="{{ url('deposit/BTC') }}">
                                                <button type="button" class="btn btn-theme mb-1 mr-1">Deposit</button>
                                            </a>
                                            <a href="{{ url('withdraw/BTC') }}">
                                                <button type="button" class="btn btn-theme mb-1 mr-1">Withdraw</button>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row"><img style="height: 50px;" src="{{url('assets/images/icon-eth.png')}}" alt="ETH"></th>
                                        <td>ETH ({{number_format($user->total_eth_bal,8)}}) </td>
                                        <td>
                                            <a href="{{ url('deposit/ETH') }}">
                                                <button type="button" class="btn btn-theme mb-1 mr-1">Deposit</button>
                                            </a>
                                            <a href="{{ url('withdraw/ETH') }}">
                                                <button type="button" class="btn btn-theme mb-1 mr-1">Withdraw</button>
                                            </a>
                                        </td>
                                    </tr>

                                    <!--<tr>-->
                                    <!--    <th scope="row">-->
                                    <!--        <img style="height: 50px;" src="{{url('assets/images/coin.png')}}" alt="VLC">-->
                                    <!--    </th>-->
                                    <!--    <td>{{$s_coin}}({{number_format($user->total_coin_bal,8)}})</td>-->
                                    <!--    <td>-->

                                    <!--        <a href="{{ url('withdraw',$s_coin) }}">-->
                                    <!--            <button type="button" class="btn btn-theme mb-1 mr-1">Withdraw</button>-->
                                    <!--        </a>-->
                                    <!--    </td>-->
                                    <!--</tr>-->
                                </tbody>
                            </table>
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

@endsection
<!-- script -->
