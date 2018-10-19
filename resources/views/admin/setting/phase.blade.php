
@extends('layouts.master')
<!-- head -->
@section('title') {{$f_coin}} | Phase Setting @endsection
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
              <li class="breadcrumb-item"><a href="{{url('admin/phases')}}">Phase Setting</a></li>
          </ol>
      </div>
      <div class="col-lg-12">
        @if(session('success'))<div class="alert alert-success"><strong>Success : </strong><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('success') }}</div>@endif
        @if(session('error'))<div class="alert alert-danger"><strong>Error : </strong><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('error') }}</div>@endif
      </div>
      <div class="col-lg-12">
        <div class="card coin-value">
          <div class="card-header">Phase List</div>
          <div class="card-body table-responsive">
            <div class="row">
              <div class="col-12">
                  <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
                    <a style="margin-bottom: 12px;" href="{{ url('phase-add') }}"><button class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;ADD New Phase</button></a>
                    <p><br></p>
                  <thead>
                  <tr>
                    <th> # </th>
                    <th>Phase Name</th>
                    <th>Usd Price</th>
                    <th>Total Tokens</th>
                    <th>Sold Tokens</th>
                    <th>Bonus</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $count = 1;?>
                  @foreach($phase as $key)
                  <tr @if($key->id == $setting->rate_id ) class="bg-info" @endif>
                    <td>{{$count}}</td>
                    <td>{{$key->name}}</td>
                    <td>{{$key->usd_price}}</td>
                    <td>{{$key->sold_coins}}</td>
                    <td>{{$key->sold}}</td>
                    <td>{{$key->bonus}}%</td>
                    <td>{{$key->start_date}}</td>
                    <td>{{$key->end_date}}</td>
                    <td> 
                        @if($key->status == 0)
                          <a href="{{ url('phase-edit',$key->id) }}"><button type="button" class="btn btn-primary mb-1">Edit</button></a>
                            @if($key->id != $setting->rate_id )
                          <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#myActive{{$key->id}}">Active</button>
                          <button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#myDelete{{$key->id}}">Delete</button>
                         @endif
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$key->id}}">
                            Add sold Tokens
                          </button>
                        @endif
                    </td>
                  </tr>
                  <?php $count++;?>
                      <!-- The Modal -->
                    <div class="modal fade" id="myActive{{$key->id}}">
                      <form id="formActive{{$key->id}}" action="{{url('phaseStatus/1',$key->id)}}" method="get">
                      {{ csrf_field() }}
                        <div class="modal-dialog">
                            <div class="modal-content"> 
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">{{$key->name}}</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                              <div class="form-group ">
                                                  <label class="control-label " for="name">Are You Sure to Phase Active. </label>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                                      <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button form="formActive{{$key->id}}" type="submit" class="btn btn-success" >Active</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                      </form>
                    </div>
                    <div class="modal fade" id="myDelete{{$key->id}}">
                      <form id="formDelete{{$key->id}}" action="{{url('phase-delete',$key->id)}}" method="get">
                      {{ csrf_field() }}
                        <div class="modal-dialog">
                            <div class="modal-content"> 
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">{{$key->name}}</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                              <div class="form-group ">
                                                  <label class="control-label " for="name">Are You Sure to Phase Delete. </label>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                                      <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button form="formDelete{{$key->id}}" type="submit" class="btn btn-primery" >Delete</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                      </form>
                    </div>
                    <div class="modal fade" id="myModal{{$key->id}}">
                      <form id="formsubmit{{$key->id}}" action="{{url('addtokens')}}/{{$key->id}}" method="post">
                      {{ csrf_field() }}
                        <div class="modal-dialog">
                            <div class="modal-content"> 
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">{{$key->name}}</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                              <div class="form-group ">
                                                  <label class="control-label " for="name">Add in sold tokens </label>
                                                  <div class="row">
                                                      <div class="col-md-5 col-sm-5 col-xs-5">
                                                          <input class="form-control" id="name" name="" value="{{$key->sold}}" disabled type="text"/>
                                                      </div>
                                                      <div class="col-md-1 col-sm-1 col-xs-1 text-center">+</div>
                                                      <div class="col-md-6 col-sm-6 col-xs-6">
                                                          <input class="form-control" id="name" name="add_tokens" placeholder="add to sold Tokens " type="text"/>
                                                      </div>
                                                  </div>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                                      <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button form="formsubmit{{$key->id}}" type="submit" class="btn btn-success" >Submit</button>
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
<!-- content -->
@section('script')
@endsection
@section('script_bottom')
@endsection
<!-- script -->
