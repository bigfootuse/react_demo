<div class="nice-nav">
    <div class="user-info">
        
                @if(Sentinel::getUser()->profile)
                    <img src="{{ url('/assets/images/user')}}/{{Sentinel::getUser()->profile}}"  class="img-preview"/>
                @else
                    <img src="{{ url('/assets/images/user.png')}}"/>
                @endif
            <div class="">
                <h5 class="mt-4 mb-4">{{Sentinel::getUser()->first_name." ".Sentinel::getUser()->last_name}}</h5>
            </div>
        
    </div>
    <ul>
        <li>

            @if(Sentinel::inRole('admin'))
                <a href="{{ url('admin/dashboard') }}" class="{{ Request::is('admin/dashboard')?'active':'' }}">Dashboard</a>
        <li>
            <a href="{{ url('profile') }}" class="{{ Request::is('profile')?'active':'' }}"> Profile </a>
        </li>
        <li class="child-menu">
            <a href="#"><span >Manage Users</span> <span class="fa fa-angle-right toggle-right {{{ Request::is('admin/user', 'admin/user-kyc')?'active':'' }}}"></span></a>
            <ul class="child-menu-ul {{{ Request::is('admin/user', 'admin/user-kyc')?'active':'' }}}" style="{{{ Request::is('admin/user', 'admin/user-kyc')?'display:block':'' }}}" >
                <li>
                    <a href="{{url('admin/user')}}" class="{{ Request::is('admin/user')?'active':'' }}">
                        Users
                    </a>
                </li>
                {{--<li>--}}
                    {{--<a href="{{url('admin/user-kyc')}}" class="{{ Request::is('admin/user-kyc')?'active':'' }}">--}}
                        {{--Users KYC--}}
                    {{--</a>--}}
                {{--</li>--}}
            </ul>
        </li>
        <li class="child-menu">
            <a href="#"><span>Transaction</span> <span class="fa fa-angle-right toggle-right {{{ Request::is('admin/deposit', 'admin/withdrawal', 'admin/tokens')?'active':'' }}}"></span></a>
            <ul class="child-menu-ul {{{ Request::is('admin/deposit', 'admin/withdrawal', 'admin/tokens')?'active':'' }}}" style="{{{ Request::is('admin/deposit', 'admin/withdrawal', 'admin/tokens')?'display:block':'' }}}">
                <li>
                    <a href="{{url('admin/deposit')}}" class="{{ Request::is('admin/deposit')?'active':'' }}">
                        Deposit
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/withdrawal')}}" class="{{ Request::is('admin/withdrawal')?'active':'' }}">
                        Withdrawal
                    </a>
                </li>

                <li>
                    <a href="{{ url('admin/tokens') }}" class="{{{ Request::is('admin/tokens')?'active':'' }}}">Tokens</a>
                </li>
            </ul>
        </li>
        <li>

            <a href="{{url('admin/settings')}}" class="{{ Request::is('admin/settings')?'active':'' }}">ICO Settings</a>
        </li>
        <li>
            <a href="{{url('admin/phases')}}" class="{{ Request::is('admin/phases')?'active':'' }} {{ Request::is('phases*')?'active':'' }}"> Phases Settings </a>
        </li>
         <li>
            <a href="{{ url('admin/subscribers-list') }}" class="{{ Request::is('admin/subscribers-list')?'active':'' }}">Subscribers-list</a>
        </li>

        @endif

        @if(Sentinel::inRole('user'))
            <a href="{{ url('dashboard') }}" class="{{ Request::is('dashboard')?'active':'' }}">Dashboard</a>
            <li>
                <a href="{{ url('profile') }}" class="{{ Request::is('profile')?'active':'' }}">Profile Settings</a>
            </li>
            <li>
                <a href="{{ url('wallet') }}" class="{{ Request::is('wallet')?'active':'' }}">Wallet</a>
            </li>
            <li class="child-menu">
                <a href="#"><span>ICO</span>
                    <span class="fa fa-angle-right toggle-right {{ Request::is('ico-info')?'rotate':'' }} {{ Request::is('buy-token')?'rotate':'' }}"></span>
                </a>
                <ul class="child-menu-ul"
                    style="{{ Request::is('ico-info')?'display: block;':'' }} {{ Request::is('buy-token')?'display: block;':'' }}">
                    <li>
                        <a href="{{ url('ico-info') }}" class="{{ Request::is('ico-info')?'active':'' }}">ICO
                            information</a>
                    </li>
                    <li>
                        <a href="{{ url('buy-token') }}"
                           class="{{ Request::is('buy-token')?'active':'' }}">Buy {{$s_coin}} Coin</a>
                    </li>
                </ul>
            </li>

            <li class="child-menu">
                <a href="#"><span>Transaction History</span> <span class="fa fa-angle-right toggle-right {{ Request::is('all/tokens', 'all/deposit', 'all/withdrawal' )?'rotate':'' }}"></span>
                </a>
                <ul class="child-menu-ul {{ Request::is('all/tokens', 'all/deposit', 'all/withdrawal')?'active':'' }}" style="{{ Request::is('all/tokens', 'all/deposit', 'all/withdrawal')?'display:block':'' }}">
                    <li>
                        <a href="{{url('all/tokens')}}" class="{{ Request::is('all/tokens')?'active':'' }}">
                            Token History
                        </a>
                    </li>
                    <li>
                        <a href="{{url('all/deposit')}}" class="{{ Request::is('all/deposit')?'active':'' }}">
                            Deposit History
                        </a>
                    </li>
                    <li>
                        <a href="{{url('all/withdrawal')}}" class="{{ Request::is('all/withdrawal')?'active':'' }}">
                            Withdrawal History
                        </a>
                    </li>
                </ul>
            </li>
            <li class="child-menu">
                <a href="#"><span>My Network</span> <span class="fa fa-angle-right toggle-right {{ Request::is('user-referral')?'rotate':'' }}"></span>
                </a>
                <ul class="child-menu-ul {{ Request::is('user-referral')?'active':'' }}" style="{{ Request::is('user-referral')?'display:block':'' }}">
                    <li><a href="{{ url('user-referral') }}" class="{{ (Request::is('user-referral') ? 'active ' : '') }}">Referral List</a> </li>
                </ul>
            </li>
        </li>
    </ul>
        @endif
</div>