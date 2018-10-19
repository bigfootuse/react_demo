
@extends('layouts.master')
<!-- head -->
@section('title') {{$f_coin}} | Users Manage @endsection
<!-- title -->
@section('head')
@endsection
@section('content')
  <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
  <div class="dashboard-body">
    <div class="row">
      <div class="col-sm-12">
          <h4 class="page-title">Manage Users</h4>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
              </li>
              <li class="breadcrumb-item">Manage Users</li>
          </ol>
      </div>
      <div class="col-lg-12">
        @if(session('success'))<div class="alert alert-success"><strong>Success : </strong><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('success') }}</div>@endif
        @if(session('error'))<div class="alert alert-danger"><strong>Error : </strong><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('error') }}</div>@endif
      </div>
      <div class="col-lg-12">
        <div class="card coin-value">
          <div class="card-header">Users List</div>
          <div class="card-body table-responsive">
            <div class="row">
              <div class="col-12">
                  <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">

                  <thead>
                  <tr>
                    <th> # </th>
                    <th>Email</th>
                    <th>User Name</th>
                    <th>Profile Picture</th>
                    <th>BTC Balance</th>
                    <th>ETH Balance</th>
                    <th>{{$s_coin}} Balance</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $count = 1;?>
                  @foreach($user as $key)
                  <tr>
                    <td>{{$count}}</td>
                    <td>{{$key->email}}</td>
                    <td>{{$key->first_name.' '.$key->last_name}}</td>
                    <td align="center"> <img src="{{ url('/assets/images/user',$key->profile)}}" class="img-preview" alt="" /></td>
                    <td>{{$key->total_btc_bal}}</td>
                    <td>{{$key->total_eth_bal}}</td>
                    <td>{{$key->total_coin_bal}}</td>
                    
                    <td>
                      @if($key->status == 0)
                        <h4><span class="badge badge-danger">Block</span></h4>
                      @elseif($key->status == 1)
                        <h4><span class="badge badge-success">Active</span></h4>
                      @else
                        <h4><span class="badge badge-warning">Cancel</span></h4>
                      @endif
                    </td>
                    <td>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#myDelete{{$key->id}}">Delete</button> @if($key->status == 1)
                        <button class="btn btn-dark" data-toggle="modal" data-target="#myBlock{{$key->id}}">Block</button> @elseif($key->status == 0)
                        <button class="btn btn-success" data-toggle="modal" data-target="#myActive{{$key->id}}">Active</button> @endif 
                    </td>
                  </tr>
                  <?php $count++;?>
                  <div class="modal fade" id="myDelete{{$key->id}}">
                      <form id="formDelete{{$key->id}}" action="{{url('admin/user', $key->id)}}" method="get">
                      {{ csrf_field() }}
                        <div class="modal-dialog">
                            <div class="modal-content"> 
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">{{$key->first_name.' '.$key->last_name}}</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                              <div class="form-group ">
                                                  <label class="control-label " for="name">Are You Sure to Delete. </label>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                                      <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button form="formDelete{{$key->id}}" type="submit" class="btn btn-success" >Delete</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                      </form>
                  </div>
                  <div class="modal fade" id="myActive{{$key->id}}">
                      <form id="formActive{{$key->id}}" action="{{url('user-status/0', $key->id)}}" method="get">
                      {{ csrf_field() }}
                        <div class="modal-dialog">
                            <div class="modal-content"> 
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">{{$key->first_name.' '.$key->last_name}}</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                              <div class="form-group ">
                                                  <label class="control-label " for="name">Are You Sure to Active. </label>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                                      <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button form="formActive{{$key->id}}" type="submit" class="btn btn-success" >Active</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                      </form>
                  </div>
                  <div class="modal fade" id="myBlock{{$key->id}}">
                      <form id="formblock{{$key->id}}" action="{{url('user-status/1',$key->id)}}" method="get">
                      {{ csrf_field() }}
                        <div class="modal-dialog">
                            <div class="modal-content"> 
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">{{$key->first_name.' '.$key->last_name}}</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                              <div class="form-group ">
                                                  <label class="control-label " for="name">Are You Sure to Block. </label>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                                      <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button form="formblock{{$key->id}}" type="submit" class="btn btn-success" >Block</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                      </form>
                  </div>
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
