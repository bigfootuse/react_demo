@extends('layouts.master')
<!-- head -->
@section('title') {{$f_coin}} | Subscribers List @endsection
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
              <li class="breadcrumb-item">Subscribers List</li>
          </ol>
      </div>
      <div class="col-lg-12">
        @if(session('success'))<div class="alert alert-success"><strong>Success : </strong>{{ session('success') }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>@endif
        @if(session('error'))<div class="alert alert-danger"><strong>Error : </strong> {{ session('error') }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>@endif
      </div>
      <div class="col-lg-12">
        <div class="card coin-value">
            <div class="card-body table-responsive">
              <div class="row">
                <div class="col-12">
                  <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th> # </th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $count = 1;?>
                      @foreach($subscribe as $key)
                      <tr>
                        <td>{{$count}}</td>
                        <td>{{$key->email}}</td>
                        <td>{{$key->created_at}}</td>
                        <td><a href="#" data-toggle="modal" data-target="#myDelete{{$key->id}}"><i class="fa fa-trash-o" style="font-size:24px;color:red"></i></a></td>
                      </tr>
                      <?php $count++;?>
                      <div class="modal fade" id="myDelete{{$key->id}}">
                        <form id="formDelete{{$key->id}}" action="{{url('admin/subcriber-delete',$key->id)}}" method="get">
                        {{ csrf_field() }}
                          <div class="modal-dialog">
                              <div class="modal-content"> 
                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                      <h4 class="modal-title">{{$key->email}}</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>
                                  <!-- Modal body -->
                                  <div class="modal-body">
                                      <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
                                      <div class="row">
                                          <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group ">
                                                    <label class="control-label " for="name">Are You Sure to Subscriber Delete. </label>
                                                </div>
                                          </div>
                                      </div>
                                  </div>
                                        <!-- Modal footer -->
                                  <div class="modal-footer">
                                      <button form="formDelete{{$key->id}}" type="submit" class="btn btn-success" >Delete</button>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
<!-- End content -->
@section('script')
@endsection
@section('script_bottom')
@endsection
<!-- script -->
  