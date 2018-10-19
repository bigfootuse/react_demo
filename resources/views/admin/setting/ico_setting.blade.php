
@extends('layouts.master')
<!-- head -->
@section('title') {{$f_coin}} | ICO Setting @endsection
<!-- title -->
@section('head')
@endsection

@section('content')
<div class="dashboard-body">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Dashboard</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
                </li>
                <li class="breadcrumb-item">Setting</li>
            </ol>
            <div class="card">
            	<div class="card-body">
            		<!-- @if($errors->any())<div class="alert alert-danger"><ul>@foreach($errors->all() as $error)<li>{{$error}}</li>@endforeach</ul></div>@endif  -->
		               	@if(session()->has('error')) <div class="alert alert-danger"> {{ session()->get('error') }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  </div>	@endif
		               	@if(session()->has('success')) <div class="alert alert-success"> {{ session()->get('success') }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> </div> @endif
                    <form class="form-horizontal theme-form mt-5 row" action="{{ url('admin-updateSetting')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="setting_id" value="{{$setting->id}}">                        

                        <div class="form-group col-md-6"><label>ICO Start Date : <b> {{ $setting->ico_start_date }} </b></label> </div> 
                        <div class="form-group col-md-6"><label>ICO End Date: <b> {{ $setting->ico_end_date}}</b></label> </div>
                        <div class="form-group col-md-6"><label>Total Coins</label>                            
                            <input type="text" class="form-control" id="total_coins" name="total_coins" value="{{ $setting->total_coins }}" pattern="[0-9. ]+">
                            @if ($errors->has('total_coins'))<div class="error text-danger">{{ $errors->first('total_coins') }}</div> @endif
                        </div>
                        <div class="form-group col-md-6"><label>Sold Coins</label>                            
                            <input type="text" class="form-control" id="sold_coins" name="sold_coins" value="{{ $setting->sold_coins }}" pattern="[0-9. ]+">
                            @if ($errors->has('sold_coins'))<div class="error text-danger">{{ $errors->first('sold_coins') }}</div> @endif
                        </div>
                        <div class="form-group col-md-6"><label>Private Key</label>                             
                            <input type="text" class="form-control" id="private_key" name="private_key" value="{{ $setting->private_key }}" pattern="[a-zA-Z0-9]+">
                            @if ($errors->has('private_key'))<div class="error text-danger">{{ $errors->first('private_key') }}</div> @endif
                        </div>  
                        <div class="form-group col-md-6"><label>Public Key</label>                            
                            <input type="text" class="form-control" id="public_key" name="public_key" value="{{ $setting->public_key }}" pattern="[a-zA-Z0-9]+">
                            @if ($errors->has('public_key'))<div class="error text-danger">{{ $errors->first('public_key') }}</div> @endif
                        </div> 
                        <div class="form-group col-md-6"><label>Rate (In {{$s_coin}}):</label>
                            <input type="text" class="form-control" id="rate" name="rate" value="{{ $setting->rate }}" pattern="[0-9.]+" disabled="">
                            @if ($errors->has('rate'))<div class="error text-danger">{{ $errors->first('rate') }}</div> @endif
                        </div>
                        <div class="form-group col-md-6"><label>BTC Price</label>                            
                            <input type="text" class="form-control" id="btc_price" name="btc_price" value="{{ $setting->btc_price }}" pattern="[0-9. ]+" disabled="">
                            @if ($errors->has('btc_price'))<div class="error text-danger">{{ $errors->first('btc_price') }}</div> @endif
                        </div>
                        <div class="form-group col-md-6"><label>ETH Price</label>                            
                            <input type="text" class="form-control" id="eth_price" name="eth_price" value="{{ $setting->eth_price }}" pattern="[0-9. ]+" disabled="">
                            @if ($errors->has('eth_price'))<div class="error text-danger">{{ $errors->first('eth_price') }}</div> @endif
                        </div>

                        <div class="form-group col-md-6"><label> Bonus</label>
                            <input type="text" class="form-control disabled" id="bonus" name="bonus" disabled value="{{ $setting->bonus }}" pattern="[0-9. ]+">
                            @if ($errors->has('bonus'))<div class="error text-danger">{{ $errors->first('bonus') }}</div> @endif
                        </div>

                        <div class="form-group col-md-6"><label>Reference Bonus</label>                            
                            <input type="text" class="form-control" id="bonus" name="ref_percentage" value="{{ $setting->ref_percentage }}" pattern="[0-9. ]+">
                            @if ($errors->has('ref_percentage'))<div class="error text-danger">{{ $errors->first('ref_percentage') }}</div> @endif
                        </div>
                        <div class="form-group col-md-6"><label>Minimum Buy Token</label>                            
                            <input type="text" class="form-control" id="min_buy_token" name="min_buy_token" value="{{ $setting->min_buy_token }}" pattern="[0-9. ]+">
                            @if ($errors->has('min_buy_token'))<div class="error text-danger">{{ $errors->first('min_buy_token') }}</div> @endif
                        </div>
                        <div class="form-group col-md-6"><label>Maximum Buy Token</label>                            
                            <input type="text" class="form-control" id="max_buy_token" name="max_buy_token" value="{{ $setting->max_buy_token }}" pattern="[0-9. ]+">
                            @if ($errors->has('max_buy_token'))<div class="error text-danger">{{ $errors->first('max_buy_token') }}</div> @endif
                        </div>
                        <div class="form-group col-md-12 text-right">
                            <button type="submit" class="btn btn-theme mt-4">Update</button>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- content -->
@section('script')
@endsection