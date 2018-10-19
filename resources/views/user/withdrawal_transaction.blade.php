@extends('layouts.master')

@section('title', 'Withdraw Transaction || '.$f_coin)

@section('style')
  <link rel="stylesheet" type="text/css" href="{{ url('assets/backend/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
  <div class="dashboard-body">
    <div class="row">
      <div class="col-sm-12">
        <h4 class="page-title">Withdraw Transaction History</h4>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('user-dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
          </li>
          <li class="breadcrumb-item"><a href="#">Withdraw History</a>
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
            <!-- <table class="table table-striped data-table"> -->
            <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
              <thead class="thead-dark">
                <th scope="col">#</th> 
                <th scope="col">Amount</th>
                <th scope="col">Coin</th>
                <th scope="col"> Address</th>
                <th scope="col">Status</th>               
              </thead>
                  <tbody>
                      <?php $i=1; ?>
                        @foreach($withdraw as $key)
                          <tr>
                            <td scope="row">{{ $i++ }}</td>
                            <td>{{number_format( $key->amount,8) }} &nbsp; </td>
                            <td>{{ $key->coin }}</td>
                            <td>{{ $key->address }} </td>
                            <td>
                              @if($key->status == 0)
                                  Pending
                              @elseif($key->status == 100)
                                  Success
                              @elseif($key->status == 2)
                                  Cancel
                              @else
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