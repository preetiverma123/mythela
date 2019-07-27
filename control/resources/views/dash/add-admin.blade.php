@extends('layouts.app-dash')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage Admins
      <small>Add New Admin</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Manage Admins</a></li>
      <li class="active"> Add New Admin</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      @if(Session::get('msg'))
      <div class="alert alert-{{Session::get('msg')['type']}} alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{Session::get('msg')['text']}}</strong>
      </div>
      @endif
      <div class="col-xs-12">
        <div class="box">
          <form method="post">
            {{csrf_field()}}
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Fullname</label>
                    <input type="text" class="form-control"  name="fullname" placeholder="Enter Fullname" required="">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter email" required="">
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" class="form-control" name="mobile" placeholder="Enter mobile" required="">
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <br/>
              <div class="row">
                <div class="col-md-12 text-center">
                  <button class="btn btn-success">SUBMIT</button>
                </div>
              </div>
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