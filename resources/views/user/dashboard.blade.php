@extends('layouts.master')
<!-- head -->
@section('title')
    {{$f_coin}} Dashboard
@endsection

@section('content')
    <div class="dashboard-body">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Dashboard</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
                    </li>
                    <li class="breadcrumb-item">Dashboard
                    </li>
                </ol>
            </div>

            @if(Sentinel::getUser()->roles()->first()->slug == 'user')
                <div class="col-lg-6">
                    <div class="card">
                        <form class="form-copy theme-form">
                            <div class="form-group">
                                <h5>Referral link </h5>
                                <div class="input-group">
                                    <input type="text" id="post-shortlink" class="form-control" value="{{url('ref',Sentinel::getUser()->referral_code)}}" aria-label="Search for...">

                                    <span class="input-group-btn">
                               <button class="btn btn-theme" onclick="copytext()" type="button" data-copytarget="#lets_copy">copy</button>
                               </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{--<div class="col-lg-6">
                    <div class="card">
                        <form class="form-copy theme-form">
                            <div class="form-group">
                                <h5>Token Address</h5>
                                <div class="input-group">

                                    <input type="text" class="form-control" id="post-shortlinkaddress" value="{{Sentinel::getuser()->token_address}}" aria-label="Search for...">
                                    <span class="input-group-btn">
                               <button class="btn btn-theme" type="button" onclick="post_shortlinkaddress()" data-copytarget="#lets_copy">copy</button>
                               </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>--}}
            @endif
            <div class="col-lg-12">
                <div class="card coin-value">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="media">
                                    <img class="mr-3" src="{{asset('assets/images/bitcoin.png')}}" alt="bitcoin">
                                    <div class="media-body">
                                        <h5 class="mt-2">
                                            BTC
                                        </h5>
                                        <h4 class="blue-font mt-0">
                                            <span class="counter">{{number_format($btcwal,8)}}</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="media">
                                    <img class="mr-3" src="{{asset('assets/images/icon-eth.png')}}" alt="ETH">
                                    <div class="media-body">
                                        <h5 class="mt-2">
                                            ETH
                                        </h5>
                                        <h4 class="blue-font mt-0">
                                            <span class="counter">{{number_format($ethwal,8)}}</span>
                                        </h4>
                                    </div>
                                </div>     
                            </div>               
                            <div class="col-lg-4">
                                <div class="media">
                                    <img class="mr-3" src="{{asset('assets/images/coin.png')}}" alt="{{$s_coin}}">
                                    <div class="media-body">
                                        <h5 class="mt-2">
                                            {{$s_coin}}
                                        </h5>
                                        <h4 class="blue-font mt-0">
                                            <span class="counter">{{number_format($coinbal,8)}}</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Calendar ICO</h4>

                    </div>
                    <div class="card-body table-responsive ">
                        <div id="data-table_wrapper" class="dataTables_wrapper no-footer">

                            <table id="data-table" class="table table-striped data-table dataTable no-footer"
                                   cellspacing="0" width="100%" role="grid" aria-describedby="data-table_info"
                                   style="width: 100%;">
                                <thead class="thead-dark">
                                <tr role="row">
                                    <th scope="col" class="sorting_asc" tabindex="0" aria-controls="data-table"
                                        rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Sr.: activate to sort column descending" style="width: 61px;">Sr.
                                    </th>
                                    <th scope="col" class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                        colspan="1" aria-label="Phase Name: activate to sort column ascending"
                                        style="width: 163px;">Phase Name
                                    </th>
                                    <th scope="col" class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                        colspan="1" aria-label="From Date: activate to sort column ascending"
                                        style="width: 271px;">From Date
                                    </th>
                                    <th scope="col" class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                        colspan="1" aria-label="To Date: activate to sort column ascending"
                                        style="width: 266px;">To Date
                                    </th>
                                    <th scope="col" class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                        colspan="1" aria-label="Coin: activate to sort column ascending"
                                        style="width: 117px;">Tokens
                                    </th>
                                    <th scope="col" class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                        colspan="1" aria-label="Sold: activate to sort column ascending"
                                        style="width: 87px;">Sold
                                    </th>
                                    <th scope="col" class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                        colspan="1" aria-label="Price (USD): activate to sort column ascending"
                                        style="width: 182px;">Price (USD)
                                    </th>
                                    <th scope="col" class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                        colspan="1" aria-label="Bonus : activate to sort column ascending"
                                        style="width: 116px;">Bonus
                                    </th>
                                    <th scope="col" class="sorting" tabindex="0" aria-controls="data-table" rowspan="1"
                                        colspan="1" aria-label="Status: activate to sort column ascending"
                                        style="width: 163px;">Status
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($phase as $key)
                                    <tr @if($key->id == $setting->rate_id ) class="bg-info" @endif>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$key->name}}</td>
                                        <td>{{$key->start_date}}</td>
                                        <td>{{$key->end_date}}</td>
                                        <td>{{$key->sold_coins}}</td>
                                        <td>{{$key->sold}}</td>
                                        <td>{{$key->usd_price}}</td>
                                        <td>{{$key->bonus}}%</td>
                                        <td>
                                            @php $date1=date_create($key->start_date);
                                                 $date2=date_create($key->end_date);
                                                 $diff=date_diff($date1,$date2)
                                            @endphp
                                            @if(time()>strtotime($key->start_date) && time()<strtotime($key->end_date)&& $key->id==$setting->rate_id )
                                                {{'Live now'}}

                                            @elseif(time()<=strtotime($key->end_date))
                                            {{$diff->format("%a days left")}}
                                             @else
                                            {{'ICO ended'}}
                                                @endif

                                        </td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>    
                        </div>
                    </div>
                </div>
            </div>
            @if(Sentinel::getUser()->roles()->first()->slug == 'admin')
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Users list Purchase coins in 24 Hours</h4>
                        </div>
                        <div class="card-body table-responsive ">
                            <div id="data-table_wrapper" class="dataTables_wrapper no-footer">
                                <table id="data-table" class="table table-striped data-table dataTable no-footer"
                                       cellspacing="0" width="100%" role="grid" aria-describedby="data-table_info"
                                       style="width: 100%;">
                                    <thead class="thead-dark">

                                    <tr role="row">
                                        <th> # </th>
                                        <th>Name</th>
                                        <th>Date </th>
                                        <th>Coin</th>
                                        <th>Total Buy Tokens  </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count = 1;?>
                                    @foreach($buytokens as $key)
                                        <tr role="row">
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{@$key->userInfo->username}}</td>
                                            <td>{{$key->updated_at}}</td>
                                            <td>@if($key->type == 1) BTC @elseif($key->type == 2) ETH @else @endif</td>
                                            <td>{{$key->tokens}}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
@endsection
<!-- content -->
@section('script')
@endsection

@section('script_bottom')
    <script type="text/javascript">
        function copytext() {
            var copyText = document.getElementById("post-shortlink");
            copyText.select();
            document.execCommand("Copy");
        }
    </script>

    <script type="text/javascript">
        function post_shortlinkaddress() {
            var copyText = document.getElementById("post-shortlinkaddress");
            copyText.select();
            document.execCommand("Copy");
        }
    </script>
@endsection
<!-- script -->
  