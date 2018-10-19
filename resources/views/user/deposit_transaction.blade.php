@extends('layouts.master')

@section('title', 'Deposit Transaction || '.$f_coin)

@section('style')
  <link rel="stylesheet" type="text/css" href="{{ url('assets/backend/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
  <div class="dashboard-body">
    <div class="row">
      <div class="col-sm-12">
        <h4 class="page-title">Deposit Transaction History</h4>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
          </li>
          <li class="breadcrumb-item">Deposit History
          </li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
      @if(session('error'))<br><div class="alert alert-danger">{{ session('error') }}</div><br>@endif
      @if(session('success'))<br><div class="alert alert-success">{{ session('success') }}</div><br>@endif
        <div class="card">
          <div class="card-body table-responsive">
              <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
              <thead class="thead-dark">
                 <tr>
                    <th scope="row"> # </th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Type</th>
                    <th scope="col">Amount (USD)</th>
                    <th scope="col">Amount1</th>
                    <th scope="col">Txid</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date </th>
                    <th scope="col">Description</th>
                 </tr>
              </thead>
              <tbody>
                <?php $i = 1;?>
                  @foreach($deposit as $key)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$key->user_info->first_name .' '. $key->lastname}}</td>
                            <td>{{$key->address}}</td>
                            <td>@if($key->coin== 'BTC') <span class="badge badge-warning">BTC</span>  @elseif($key->coin== 'ETH') <span class="badge badge-info">ETH</span>  @endif </td>
                            <td>{{ number_format($key->amount1,2) }} </td>
                            <td>{{ number_format($key->amount,8) }} </td>
                            <td>{{$key->txid}}</td>
                            <td>@if($key->status= -1)<span class="badge badge-danger">Cancelled</span> @elseif($key->status= 100) <span class="badge badge-success">Confirm</span> @endif </td>                          
                             <td>{{$key->created_at}}</td>
                            <td>User deposited {{ number_format($key->amount,8) }} {{ $key->coin_type }}.</td>
                        </tr>
                  @endforeach
              </tbody>
            </table>  
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <!-- DataTables jquery-->
  <script src="{{ url('assets/backend/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      $('#data-table').DataTable();
    });
  </script>
@endsection