@extends('layouts.master')
<!-- head -->
@section('title') {{$f_coin}} | Deposit @endsection
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
              <li class="breadcrumb-item">Deposit History</li>
          </ol>
      </div>
      <div class="col-lg-12">
        @if(session('success'))<div class="alert alert-success"><strong>Success : </strong>{{ session('success') }}</div>@endif
        @if(session('error'))<div class="alert alert-danger"><strong>Error : </strong> {{ session('error') }}</div>@endif
      </div>
      <div class="col-lg-12">
        <div class="card coin-value">
          <div class="card-header">Deposit List</div>
          <div class="card-body table-responsive">
            <div class="row">
              <div class="col-12">
                  <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">

                  <thead>
                  <tr>
                    <th> # </th>
                    <th>Coin</th>
                    <th>Amount</th>
                    <th>Tx Id</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $count = 1;?>
                  @foreach($deposit as $deposit)
                  <tr>
                    <td>{{$count}}</td>
                    <td>{{$deposit->coin}}</td>
                    <td>{{number_format($deposit->amount,8)}}</td>
                    <td>{{$deposit->txid}}</td>
                    <td>@if($deposit->status= -1)<span class="badge badge-danger">Cancelled</span> @elseif($deposit->status= 100) <span class="badge badge-success">Confirm</span> @endif </td>
                    <td>{{$deposit->created_at}}</td>
                    <td>User deposited {{ number_format($deposit->amount,8) }} {{ $deposit->coin}}.</td>
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
<!-- content -->

@section('script')

@endsection

@section('script_bottom')
@endsection
<!-- script -->
