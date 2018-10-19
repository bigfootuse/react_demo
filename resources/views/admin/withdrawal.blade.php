
@extends('layouts.master')
<!-- head -->
@section('title') {{$f_coin}} | Withdrawal History @endsection
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
              <li class="breadcrumb-item">Withdraw</li>
          </ol>
      </div>
      <div class="col-lg-12">
        @if(session('success'))<div class="alert alert-success"><strong>Success : </strong>{{ session('success') }}</div>@endif
        @if(session('error'))<div class="alert alert-danger"><strong>Error : </strong> {{ session('error') }}</div>@endif
      </div>
      <div class="col-lg-12">
        <div class="card coin-value">
          <div class="card-header">Withdraw List</div>
          <div class="card-body table-responsive">
            <div class="row">
              <div class="col-12">
                  <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">

                  <thead>
                  <tr>
                    <th> # </th>
                    <th>Name </th>
                    <th>User Name</th>
                    <th>Address</th>
                    <th>Coin</th>
                    <th>Amount</th>
                    <th>Tx Id</th>  
                    <th>Status</th>
                    <th>Admin Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $count = 1;?>
                  {{dd($Withdraw)}}
                  @foreach($Withdraw as $Withdraw)
                  <tr>
                    <td>{{$count}}</td>
                    <td>{{$Withdraw->user->first_name.' '.$Withdraw->user->last_name}}</td>
                    <td>{{$Withdraw->user->username}}</td>
                    <td>{{$Withdraw->address}}</td>
                    <td>{{$Withdraw->coin}}</td>
                    <td>{{number_format($Withdraw->amount,8)}}</td>
                    <td>{{$Withdraw->txid}}</td>
                    <td>
                      @if($Withdraw->admin_status == 0)
                        <h4><span class="badge badge-warning">Pending</span></h4>
                      @elseif($Withdraw->admin_status == 1)
                        <h4><span class="badge badge-success">Confirm</span></h4>
                      @else
                        <h4><span class="badge badge-danger">Cancel</span></h4>

                      @endif
                    </td>

                    <td>
                      @if($Withdraw->admin_status == 0)
                        <button onclick="confirmStatus('{{$Withdraw->id}}','1')"  class="btn btn-success btn-sm"> Confirm </button>
                        <button onclick="rejectStatus('{{$Withdraw->id}}','2')"  class="btn btn-danger btn-sm"> Reject </button>
                      @else
                        -
                      @endif

                    </td>
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
  <script>

    function confirmStatus(arg1,arg2)
    {
      var url = '{{ url("confirmStatus") }}';
      var _token=$("#_token").val();

      swal({
                title: "Are you sure To Confirm?",
                text: "You Really Sure Of Confirm !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Confirm it!",
                closeOnConfirm: false
              },
              function(){
                $.ajax({
                  url: url,
                  method:'post',
                  data: { '_token' : _token,  'wid':arg1,'status':arg2 },
                  success:function(result)
                  {
                    if(result==0)
                    {
                      swal("Confirmed", "User Withdrawal Request is Confirmed.", "success");
                      window.location.reload();
                    }
                    else if(result == 1)
                    {

                      swal("Failed", "Insuficient balance.", "danger");


                    }
                  }
                });
              });
    }


    //reject

    function rejectStatus(arg1,arg2)
    {
      var url = '{{ url("rejectStatus") }}';
      var _token = $("#_token").val();

      swal({
                title: "Are you sure To Reject?",
                text: "You Really Sure Of Reject !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Reject it!",
                closeOnConfirm: false
              },
              function(){
                $.ajax({
                  url: url,
                  method:'post',
                  data: { '_token' : _token,  'wid':arg1, 'status':arg2},
                  success:function(result)
                  {
                    if(result==0)
                    {
                      swal("Rejected", "User Withdrawal Request is Rejected.", "success");
                      window.location.reload();
                    }
                    else
                    {    $('#inner_msg').html('<strong>User Status Can not verify.</strong>');    }
                  }
                });
              });
    }
  </script>

@endsection
<!-- script -->
