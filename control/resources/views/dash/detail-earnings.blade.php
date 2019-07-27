@extends('layouts.app-dash')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Earning Detail
      <small>Detail</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Earning Detail</a></li>
      <li class="active"> Detail</li>
    </ol>
  </section>
  <style>
  .u-detail tr th:first-child,
  .u-detail tr td:first-child {
    width:20%;
    font-weight: bold;
  }
</style>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body">
          <table class="table table-bordered u-detail">
             <tr>
              <td colspan="2"><img src="http://control.ogonn.com/public/dash-lib/dist/img/user2-160x160.jpg" height="60px" class="img-circle"></td>
            </tr>
            <tr>
              <th>Fullname</th>
              <td>{{$first_ulist->fullname}}</td>
            </tr>
            <tr>
              <th>Partner Type</th>
              <td>Driver Vendor</td>
            </tr>
             <tr>
              <th>Email</th>
              <td>{{$first_ulist->email==""?"N/A":$first_ulist->email}}</td>
            </tr>
             <tr>
              <th>Mobile</th>
              <td>{{$first_ulist->mobile}}</td>
            </tr>
             <tr>
              <th><h4>Total Earning</h4></th>
              <td><h4><b>&#8377;{{@$total_earning}}/-</b></h4></td>
            </tr>
          </table>
          <br/>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>SN.</th>
                <th>Date</th>
                <th>Order Id</th>
                <th>Payment Mode</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              @php $hvcounter=1;@endphp
              @foreach($btrans as $btran)
              <tr>
                <td>{{$hvcounter++}}</td>
                <td>{{date('d-m-Y', strtotime(@$btran->created_at))}}</td>
                <td>{{@$btran->order_id}}</td>
                <td>{{@$btran->payment_method}}</td>
                <td>{{@$btran->amount}}</td>
              </tr>
              @endforeach
            </tbody>
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