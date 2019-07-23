@extends('layouts.app-dash')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
    <div class="alert alert-success">
      @if(Auth::user()['role_id']==1)
      <strong>Success!</strong> Welcome To Super Admin
      @elseif(Auth::user()['role_id']==2)
      <strong>Success!</strong> Welcome To  Admin
      @endif
    </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{@$bookings[0]->total}}</h3>
            <p>New Bookings</p>
          </div>
          <div class="icon">
            <i class="fa fa-cab"></i>
          </div>
          <a href="{{route('all.booking')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{@$ongoing[0]->total}}</h3>
            <p>On Going</p>
          </div>
          <div class="icon">
            <i class="fa fa-road"></i>
          </div>
          <a href="{{route('ongoing.booking')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{@$completed[0]->total}}</h3>
            <p>Completed</p>
          </div>
          <div class="icon">
            <i class="fa fa-map-marker"></i>
          </div>
          <a href="{{route('completed.booking')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{@$cancelled[0]->total}}</h3>
            <p>Cancelled</p>
          </div>
          <div class="icon">
            <i class="fa fa-times-rectangle-o"></i>
          </div>
          <a href="{{route('cancelled.booking')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!--user information row starts-->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-orange">
          <div class="inner">
            <h3>150</h3>
            <p>Drivers with Vehicle</p>
          </div>
          <div class="icon">
            <i class="fa fa-truck"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-maroon">
          <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>
            <p>Drivers without Vehicle</p>
          </div>
          <div class="icon">
            <i class="fa fa-user-circle-o"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-fuchsia">
          <div class="inner">
            <h3>44</h3>
            <p>Fleet Opeartors</p>
          </div>
          <div class="icon">
            <i class="fa fa-user-secret"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-purple">
          <div class="inner">
            <h3>65</h3>
            <p>Registered Customers</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection