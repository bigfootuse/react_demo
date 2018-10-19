@extends('layouts.master')
@section('title') {{$f_coin}} Profile Manage @endsection

@section('style')
@endsection
@section('content')
<?php 
$slug=Sentinel::getUser()->roles()->first()->slug;
?>
    <div class="dashboard-body">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Profile</h4>
                <!-- @if($errors->any())<div class="alert alert-danger"><ul>@foreach($errors->all() as $error)<li>{{$error}}</li>@endforeach</ul></div>@endif -->
                        @if(session()->has('error')) <div class="alert alert-danger"> {{ session()->get('error') }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  </div> @endif
                        @if(session()->has('success')) <div class="alert alert-success"> {{ session()->get('success') }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> </div> @endif
                      <!--   @if ($errors->has('old_password'))<div class="alert alert-danger">{{ $errors->first('old_password') }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  </div> @endif
                        @if ($errors->has('new_password'))<div class="alert alert-danger">{{ $errors->first('new_password') }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div> @endif
                        @if ($errors->has('confirm_password'))<div class="alert alert-danger">{{ $errors->first('confirm_password') }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div> @endif -->
                       
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a @if($slug=="user") href="{{url('dashboard')}}" @else href="{{url('dashboard')}}" @endif><i class="fa fa-home" aria-hidden="true"></i></a>
                    </li>
                    <li class="breadcrumb-item">Profile
                    </li>
                </ol>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                    @if ($errors->has('photo')) <div class="alert alert-danger">{{ $errors->first('photo') }}</div> @endif                     
                        <form  enctype="multipart/form-data" action="{{ url('profilepic')}}/{{$user->id}}" method="post" id="form-edit-post">
                            {{ csrf_field()}}
                            <input type="hidden" name="old_profile" value="{{Sentinel::getUser()->profile}}">
                            <div class="profile text-center">
                                <div class="p-relative">
                                @if(Sentinel::inRole('admin'))
                                    @if($user->profile)                                     
                                        <img src="{{ url('/assets/images/user')}}/{{Sentinel::getUser()->profile}}"  class="img-preview"/>
                                    @else
                                        <img src="{{ url('/assets/images/avtar.png')}}"/>
                                    @endif                                
                                @else
                                    @if($user->profile)                                     
                                        <img src="{{ url('/assets/images/user')}}/{{Sentinel::getUser()->profile}}"  class="img-preview"/>
                                    @else
                                        <img src="{{ url('/assets/images/avtar.png')}}"/>
                                    @endif
                                @endif
                                    <div class="image-upload">
                                        <label for="file-input">
                                            <div class="profile-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
                                        </label>
                                        <input id="file-input" class="file-upload" name="photo" type="file" accept="image/x-png,image/gif,image/jpeg" onchange="readURL(this,0)"/>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-theme mt-4" onclick="image_up();">Update Profile</button>
                                </div>
                                @if(Sentinel::inRole('admin'))
                                    <h3 class="mt-4 mb-4">{{$user->first_name." ".$user->last_name}}</h3>
                                @else
                                    <h3 class="mt-4 mb-4">{{$user->first_name." ".$user->last_name}}</h3>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-fill theme-tab">
                            <li class="nav-item">
                                <a class="nav-link @if(!session('validator')) active @endif" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                   aria-controls="profile" aria-selected="true">Profile setting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="two-fact-tab" data-toggle="tab" href="#two-fact" role="tab"
                                   aria-controls="two-fact" aria-selected="false">Two factor Auth</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(session('validator')) active @endif" id="chg-pwd-tab" data-toggle="tab" href="#chg-pwd" role="tab" aria-controls="chg-pwd" aria-selected="false">Change password</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade @if(!session('validator')) show active @endif" id="profile" role="tabpanel"
                                 aria-labelledby="profile-tab">
                                <div class="col-md-12">
                                    <form class="form-horizontal theme-form mt-5 row" action="{{ url('profile')}}/{{$user->id}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">First Name</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{$user->first_name}}" pattern="[A-Za-z ]+" style="text-transform: capitalize;">
                                            @if ($errors->has('first_name'))<div class="error text-danger">{{ $errors->first('first_name') }}</div> @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}" pattern="[A-Za-z ]+" style="text-transform: capitalize;">
                                            @if ($errors->has('last_name'))<div class="error text-danger">{{ $errors->first('last_name') }}</div> @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" disabled>
                                            @if ($errors->has('email'))<div class="error text-danger">{{ $errors->first('email') }}</div> @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputPassword1">User Name</label>
                                            <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}" disabled>
                                            @if ($errors->has('username'))<div class="error text-danger">{{ $errors->first('username') }}</div> @endif
                                        </div>
                                        <div class="form-group col-md-12 text-right">
                                            <button type="submit" class="btn btn-theme mt-4">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade mt-5" id="two-fact" role="tabpanel"
                                 aria-labelledby="two-fact-tab">
                                @if($user->google2fa_enable == 0)
                                    <div class="row two-fact">

                                        <div class="col-md-12 text-center">
                                            <h3>Enlable Google Authenticator</h3>
                                        </div>
                                        <div class="col-md-6 offset-md-3">
                                            <ul class="install-step">
                                                <li>1.Install Google Authenticator on your phone.</li>
                                                <li>2.Open the Google Authenticator app.</li>
                                                <li>3.Tab menu, then tab "Set up Account", then "Scan a barcode" or
                                                    "Enter key provided" is <strong
                                                            class="colors">3KQD7ED2B5A3CX3M</strong></li>
                                                <li>4.Your phone will now be in "scanning" mode. When you are in this
                                                    mode, scan the barcode below:
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <img src="{{$two_fa_code['imgurl']}}" class="img-fluid">
                                            {{ session()->put('2fa:user:id', Sentinel::getUser()->id) }}
                                            <h3>{{$two_fa_code['secret']}}</h3>
                                        </div>
                                        <div id="google_auth_msg"></div>
                                        <div class="col-md-6 offset-md-3 text-center">
                                            <div id="alert-msg-enable"></div>
                                            <h5>Once you have scanned the barcode, enter the 6-digit code below from
                                                application:</h5>
                                            <form class="mt-4 theme-form" action="{{'2fa/save'}}" method="post">
                                                {{csrf_field()}}
                                                <div class="row margin12" id="match-otp-2fa_enable">
                                                    <div class="form-group  col-md-12">
                                                        <input type="text" class="form-control col-md-12"
                                                               id="google_2fa_otp_enable_new"
                                                               onkeyup="checkOTPEnable()">
                                                    </div>
                                                </div>
                                                <div class="form-group  ">
                                                    <input id="enable-2fa" type="submit" class="btn btn-theme" disabled
                                                           value="Enable Google 2FA Authenticator">
                                                </div>
                                            </form>
                                        </div>


                                    </div>
                                @else
                                    <div id="google_auth_msg"></div>
                                    <div class="col-md-6 offset-md-3 text-center">

                                        <h5> enter the 6-digit code below from application:</h5>
                                        <form class="mt-4 theme-form" action="{{'2fa/disable'}}" method="post">
                                            {{ session()->put('2fa:user:id', Sentinel::getUser()->id) }}
                                            {{csrf_field()}}
                                            <div class="row margin12" id="match-otp-2fa_enable">
                                                <div class="form-group col-md-12 ">
                                                    <input type="text" class="form-control "
                                                           id="google_2fa_otp_enable_new" onkeyup="checkOTP()">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input id="enable-2fa" type="submit" class="btn btn-theme" disabled
                                                       value="Yes Disable Google 2FA Authenticator">
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane fade @if(session('validator'))  show active @endif" id="chg-pwd" role="tabpanel" aria-labelledby="chg-pwd-tab">
                                <div class="col-md-12">
                                    <form class="form-horizontal theme-form mt-5 row" action="{{ url('changePassword')}}/{{$user->id}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group col-md-12">
                                            <label>Old password</label>
                                            <input type="password" class="form-control" name="old_password" autocomplete="off" required>
                                            @if ($errors->has('old_password'))<div class="error text-danger">{{ $errors->first('old_password') }}</div> @endif
                                            @if(session()->has('error_old')) <div class="error text-danger"> {{ session()->get('error_old') }} </div> @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>New password</label>
                                            <input type="password" class="form-control" name="new_password" autocomplete="off" required>
                                            @if ($errors->has('new_password'))<div class="error text-danger">{{ $errors->first('new_password') }}</div> @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Retype password</label>
                                            <input type="password" class="form-control" name="confirm_password" autocomplete="off" required>
                                            @if ($errors->has('confirm_password'))<div class="error text-danger">{{ $errors->first('confirm_password') }}</div> @endif
                                        </div>
                                        <div class="form-group col-md-12 text-right">
                                            <button type="submit" class="btn btn-theme mt-4">Change</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')


@endsection

@section('script_bottom')

<script type="application/javascript" >

    $(document).ready(function() {
      var readURL = function(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('.img-preview').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
      $(".file-upload").on('change', function(){
        readURL(this);
      }); 
      // $(".profile-edit").on('click', function() {
      //   $(".file-upload").click();
      // });
    });

    function checkOTP()
    {
        $("#google_auth_msg").html('');
        var token = '{{csrf_token()}}';
        var code= $("#google_2fa_otp_enable_new").val();
        if(code.length == 6)
        {
            $.ajax({
                type: 'post',
                url:"{{url('2fa/validate-disabletime')}}",
                data: "totp="+code+'&_token='+token,
                success: function (responseData) {
                    if(responseData==1)
                    {
                        $("#match-otp-2fa").hide();
                        $("#google_auth_msg").html("<div class='alert alert-success'>OTP match successfully</div>");
                        $("#google_2fa_otp").val('');
                        $("#enable-2fa").prop('disabled', false);
                    }
                },
                error: function (responseData) {
                    $("#google_auth_msg").html("<div class='alert alert-danger'>Nice try but OTP not match, Please try again.</div>");
                    console.log(responseData);
                    return false;
                }
            });
        }
    }
    function checkOTPEnable()
    {
        $("#alert-msg-enable").html('');

        var code= $("#google_2fa_otp_enable_new").val();
//        alert(code);
        var token = "{{csrf_token()}}";

        if(code.length == 6)
        {
            $.ajax({
                type: 'post',
                url:"{{url('2fa/validate-enabletime')}}",
                data: "totp="+code+"&_token="+token,
                success: function (responseData) {
                    console.log(responseData);
                    if(responseData==1)
                    {
                        $("#match-otp-2fa_enable").hide();
                        $("#alert-msg-enable").html("<div class='alert alert-success'>OTP match successfully</div>");
                        $("#google_2fa_otp_enable").val('');
                        $("#enable-2fa").prop('disabled', false);
                    }
                },
                error: function (responseData) {
                    $("#alert-msg-enable").html("<div class='alert alert-danger'>Nice try but OTP not match, Please try again.</div>");
                    console.log(responseData);
                    return false;
                }
            });
        }
        else {
            $("#alert-msg-enable").html("<div class='alert alert-danger'>Enter 6 digit only, Please try again.</div>");
            console.log(responseData);
            return false;

        }
    }

    // $('#form-edit-post').submit(function(event){
    //       event.preventDefault();
    //       var formData = new FormData($(this)[0]);

    //       $.ajax({
    //           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    //           url: "/profilepic'",
    //           type: 'post',
    //           data: formData,
    //           success: function (data) {
    //               alert(data)
    //           },
    //           cache: false,
    //           processData: false
    //       });

          
    // });
</script>
@endsection