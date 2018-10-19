
@extends('layouts.master')
<!-- head -->
@section('title') {{$f_coin}} | ICO Setting @endsection
<!-- title -->
@section('head')

  <link rel="stylesheet" type="text/css" href="{{ url('assets/datepicker/css/tempusdominus-bootstrap-4.css') }}"> 
@endsection

@section('content')
<div class="dashboard-body">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Dashboard</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
                </li>
                <li class="breadcrumb-item">New Phase Add</li>
            </ol>
            <div class="card">
            	<div class="card-body">
            		<!-- @if($errors->any())<div class="alert alert-danger"><ul>@foreach($errors->all() as $error)<li>{{$error}}</li>@endforeach</ul></div>@endif  -->
		               	@if(session()->has('error')) <div class="alert alert-danger"> {{ session()->get('error') }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  </div>	@endif
		               	@if(session()->has('success')) <div class="alert alert-success"> {{ session()->get('success') }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> </div> @endif

                    <form class="form-horizontal theme-form mt-5 row" action="{{ url('add-phase')}}" method="post">
                        {{csrf_field()}}   
                        <div class="form-group col-md-6"><label>Phase Name</label>                            
                            <input type="text" class="form-control" id="name" name="name" style="text-transform: capitalize;" required >
                            @if ($errors->has('name'))<div class="error text-danger">{{ $errors->first('name') }}</div> @endif
                        </div>
                        <div class="form-group col-md-6"><label>USD Price</label>                            
                            <input type="text" class="form-control" id="usd_price" name="usd_price" pattern="[0-9. ]+" required>
                            @if ($errors->has('usd_price'))<div class="error text-danger">{{ $errors->first('usd_price') }}</div> @endif
                        </div>
                        <div class="form-group col-md-6"><label>Total Tokens</label>                            
                            <input type="text" class="form-control" id="sold_coins" name="sold_coins" pattern="[0-9. ]+" required>
                            @if ($errors->has('sold_coins'))<div class="error text-danger">{{ $errors->first('sold_coins') }}</div> @endif
                        </div>
                        <div class="form-group col-md-6"><label>Sold Tokens</label>                            
                            <input type="text" class="form-control" id="sold" name="sold" pattern="[0-9. ]+" required>
                            @if ($errors->has('sold'))<div class="error text-danger">{{ $errors->first('sold') }}</div> @endif
                        </div>
                        <div class="form-group col-md-12"><label>Bonus</label>                            
                            <input type="text" class="form-control" id="bonus" name="bonus"  pattern="[0-9. ]+" required>
                            @if ($errors->has('bonus'))<div class="error text-danger">{{ $errors->first('bonus') }}</div> @endif
                        </div>
                        <div class="form-group col-md-6"><label>Start Date :</label>
                            <div class="input-group date" id="start_date" data-target-input="nearest">
                                <input type="text" class="form-control atetimepicker-input" id="start_date" name="start_date" data-target="#start_date" required>
                                <div class="input-group-addon" data-target="#start_date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            @if ($errors->has('start_date'))<div class="error text-danger">{{ $errors->first('start_date') }}</div> @endif
                        </div>
                        <div class="form-group col-md-6"><label>End Date :</label> 
                            <div class="input-group date" id="end_date" data-target-input="nearest">                           
                                <input type="text" class="form-control atetimepicker-input" id="end_date" name="end_date" data-target="#end_date" required>
                                <div class="input-group-addon" data-target="#end_date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                                @if ($errors->has('end_date'))<div class="error text-danger">{{ $errors->first('end_date') }}</div> @endif
                        </div>
                        <div class="form-group col-md-12 text-right">
                            <button type="submit" class="btn btn-theme mt-4">Submit</button>
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
  <!-- Use for datetimepicker with time in laravel..  -->
  <script src="{{ url('assets/datepicker/js/moment-with-locales.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('assets/datepicker/js/tempusdominus-bootstrap-4.js') }}" type="text/javascript"></script> 
  <!-- end script  -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#start_date').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
      });
      $('#end_date').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
      });
    });
  </script>
@endsection