<!-- dashboard start -->
<div class="dashboard-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <a class="navbar-brand-2" href="{{url('')}}"><img src="{{asset('assets/images/logo.png')}}" /></a>
                <div class="dashboard-sidebar">
                    <a href="#" class="toggle-nav">|||</a>
                </div>
            </div>
            <div class="col-md-8 col-sm-6 lg-text-right xs-none">
                <ul class="rating-info">
                    <li ><img src="{{asset('assets/images/bitcoin.png')}}" alt="BTC">1 BTC = $ {{$c_btc}}</li>
                    <li><img src="{{asset('assets/images/icon-eth.png')}}" alt="ETH">1 ETH = $ {{$c_eth}}</li>
                    <li><img src="{{asset('assets/images/coin.png')}}" />1 {{$s_coin}} = $ {{$c_coin}}</li>
                    <li><a href="{{url('logout')}}"><i class="fa fa-sign-out dashboard-logout"></i></a></li>
                </ul>
            </div>
            <div class="col-sm-6 xs-show">
               <a href="{{url('logout')}}"><img src="{{asset('assets/images/logout.ico')}}" alt="logout"></a>
            </div>
        </div>
    </div>
</div>