@extends('layouts.app-dash')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage Accounts 
      <small>Earnings</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Manage Accounts</a></li>
      <li class="active">Earnings</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
             <form id="apply-filter" method="post">
              <div class="col-md-3">
                <select class="form-control" id="select-city">
                  <option value="">Select City</option>
                  @foreach($clist as $clist_l)
                  <option value="{{$clist_l->id}}">{{$clist_l->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-3">
                <select class="form-control" id="select-role">
                  <option value="">Select Vendor</option>
                  @foreach($rlist as $rlist_l)
                  <option value="{{$rlist_l->id}}">{{$rlist_l->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-3">
                <select class="form-control">
                  <option>Order by</option>
                  <option>Daily</option>
                  <option>Weekly</option>
                  <option>Monthly</option>
                </select>
              </div>
              <div class="col-md-3">
              <button type="submit" class="btn btn-success">Apply Filter</button>
              </div>
             </form>
            </div><br/>
            <table id="manage-account" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sn.</th>
                  <th>City</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Action</th>
                </tr>
              </thead>
            </table>
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