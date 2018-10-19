@extends('layouts.master')
<!-- head -->
@section('title')
    Referral List | {{$f_coin}} 
@endsection
<!-- title -->
@section('head')
    <style type="text/css">
        button.btn.btn-danger.btn-sm , button.btn.btn-success.btn-sm {
            width: 25%;
        }
        .badge-warning {
        color: #fff !important;
        }
        .heading {
          font-weight: 400;
          text-align: center;
          background: #293538;
          margin: 0;
          color: white;
          padding: 10px 0;
        }

        .file-browser {
          color: #364346;
          padding: 20px 10px;
        }

        .file {
          color: #364346;
          display: block;
          list-style: none;
          margin: 10px 0;
        }

        .folder {
          list-style: none;
          cursor: pointer;
          margin: 4px 0;
        }
        .folder > ul {
          display: none;
        }
        .folder:before {
          padding: 5px;
          height: 20px;
          width: 20px;
          text-align: center;
          line-height: 10px;
          border-radius: 1px;
          display: inline-block;
          content: '+';
          color: #fff;
          background: #152e4a;
        }
        .folder.folder-open > ul {
          display: block;
          padding-left: 15px;
          margin-left: 9px;
          border-left: 2px solid #152e4a;
        }
        .folder.folder-open:before {
          content: '-';
        }
        .default.default-badge {
            background: #152e4a;
            color: #ffffff;
        }
    </style>
@endsection

@section('content')
    <div class="dashboard-body">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Referral List</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
                    </li>
                    <li class="breadcrumb-item">Referral List 
                    </li>
                </ol>
                <div class="card">
                  <div class="box box-setting">
                    <div class="file-browser">
                        <ul>
                           <h4> <li class="folder folder-open">
                                {{Sentinel::getUser()->first_name." ".Sentinel::getUser()->last_name}}
                                <span class="badge badge-dark"> {{number_format(Sentinel::getUser()->total_ref_bal,0)}} {{$s_coin}} </span>
                                <ul>
                                    @foreach($users as $user)
                                        @php
                                            $earning = $user->given_ref_bal;
                                        @endphp
                                        <h4><li class="file">{{$loop->iteration}}.  {{$user->first_name}}  {{$user->last_name}} <span class="badge badge-dark"> {{number_format($earning,0)}} {{$s_coin}} </span> </li>
                                    @endforeach
                                </ul>
                            </li></h4>
                        </ul>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
        $('.folder').on('click', function(e) {
            $(this).toggleClass('folder-open');
            e.stopPropagation();
        });
        
        $('.file').on('click', function(e) {
           e.stopPropagation(); 
        });
    })
</script>
@endsection
@section('script_bottom')
@endsection
<!-- script -->
