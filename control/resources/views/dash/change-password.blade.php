@extends('layouts.app-dash')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Reset
      <small>Reset password</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Reset</a></li>
      <li class="active"> Reset password</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          @if(Session::get('msg'))
          <div class="alert alert-{{Session::get('msg')['type']}} alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{Session::get('msg')['text']}}</strong>
          </div>
          @endif
          <form class="form-horizontal" role="change_pwd" method="POST" action="{!! action('DashController@adminreset_password',['id' => $dash['id']]) !!}">
            {{csrf_field()}}
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputPassword1" class="col-sm-3 control-label">Old Password</label>
                    <div class="col-sm-9">
                      <input type="password" name="password" class="form-control" placeholder="Enter old password" required="">
                      <!-- {{ $errors->first('old_password') }} -->
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword2" class="col-sm-3 control-label">New Password</label>
                    <div class="col-sm-9">
                      <input type="password" name="new_password" class="form-control" placeholder="Enter New Password" required="">
                      <!-- {{ $errors->first('password') }} -->
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Confirm Password</label>
                    <div class="col-sm-9">
                      <input type="password" name="confirm_password" class="form-control" placeholder="Re-Enter New Password" required="">
                      <!-- {{ $errors->first('password_confirm') }} -->
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <div class="box-footer">
              <a href="" class="btn btn-default">Reset</a>
              <button type="submit" class="btn btn-info pull-right" data-request="ajax-submit" data-target='[role="change_pwd"]' class="btn btn-info pull-right">SUBMIT</button>
            </div>
            <!-- /.box-footer -->
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection