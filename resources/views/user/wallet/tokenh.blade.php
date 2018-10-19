@extends('layouts.master')
<!-- head -->
@section('title') {{$f_coin}} | Token History @endsection
<!-- title -->
@section('head')
@endsection
@section('content')
  <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
  <div class="dashboard-body">
    <div class="row">
      <div class="col-sm-12">
          <h4 class="page-title">Dashboard</h4>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
              </li>
              <li class="breadcrumb-item">Token History</li>
          </ol>
      </div>
      <div class="col-lg-12">
        @if(session('success'))<div class="alert alert-success"><strong>Success : </strong>{{ session('success') }}</div>@endif
        @if(session('error'))<div class="alert alert-danger"><strong>Error : </strong> {{ session('error') }}</div>@endif
      </div>
      <div class="col-lg-12">
        <div class="card coin-value">
          <div class="card-header">Token History</div>
          <div class="card-body table-responsive">
            <div class="row">
              <div class="col-12">
                  <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">

                  <thead>
                  <tr>
                    <th> # </th>
                    <th>Amount</th>
                    <th>Amount (in USD)</th>
                    <th>Tokens</th>
                    <th>Type</th>
                    <th>Txid</th>
                    <th>status</th>
                    <th>Date</th>
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $count = 1;?>
                  @foreach($wallet as $wallet)
                  <tr>
                    <td>{{$count}}</td>
                    <td>{{number_format($wallet->amount,8)}}</td>
                    <td>{{number_format($wallet->amount1,8)}}</td>
                    <td>{{$wallet->tokens}}</td>
                    <td>@if($wallet->type== '1') <span class="badge badge-warning">BTC</span>  @elseif($wallet->type== '2') <span class="badge badge-info">ETH</span>@else($wallet->type== '') <span class="badge badge-success">USD</span>  @endif </td>
                    <td>{{$wallet->txid}}</td>
                    <td>@if($wallet->status= -1)<span class="badge badge-danger">Cancelled</span> @elseif($wallet->status= 100) <span class="badge badge-success">Confirm</span> @endif </td>
                    <td>{{ $wallet->created_at}}</td>
                    <td>User Tokens {{ number_format($wallet->amount,8) }} {{ $wallet->coin}}.</td>
                  </tr>
                  <?php $count++;?>
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
<!-- End content -->
@section('script')
@endsection
@section('script_bottom')
@endsection
<!-- script -->
  