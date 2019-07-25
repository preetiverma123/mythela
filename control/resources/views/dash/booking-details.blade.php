@extends('layouts.app-dash')
@section('content')
<div class="content-wrapper" style="min-height: 271px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Booking Details
      <small>Manage Bookings</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Manage Bookings</a></li>
      <li class="active"> Booking Details</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <style>
          table tr th:first-child,
          table tr td:first-child {
            width:15%;
            font-weight: bold;
          }
        </style>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Booking Details</h3>
          </div>
          <div class="box-body">
            <table id="example1" class="table table-bordered">
              <tbody><tr>
                <td>Booking Date Time</td>
                <td>{{date('d-m-Y', strtotime(@$booking_detail->depart_date))}} {{date('h:i A', strtotime(@$booking_detail->depart_time))}}</td>
              </tr>
              <tr>
                <td>Pickup Address</td>
                <td>{{addr_ltln(@$booking_detail->picup_lat, @$booking_detail->picup_long)}}</td>
              </tr>
              <tr>
                <td>Drop Address</td>
                <td>{{addr_ltln(@$booking_detail->drop_lat, @$booking_detail->drop_long)}}</td>
              </tr>
              <tr>
                <td>Pickup Date Time</td>
                <td>{{date('h:i A', strtotime(@$booking_detail->depart_time))}}</td>
              </tr>
              <tr>
                <td>Journey Type</td>
                <td>Transport</td>
              </tr>
<!--             <tr>
<td>Return Date Time</td>
<td>For outcity bookings</td>
</tr> -->
<tr>
  <td>Distance</td>
  <td>{{calc_distance(@$booking_detail->picup_lat, @$booking_detail->picup_long, @$booking_detail->drop_lat, @$booking_detail->drop_long)}}</td>
</tr>
<tr>
  <td>Booked Vehicle</td>
  <td>{{@$booking_detail->vehicle_type}}</td>
</tr>
<tr>
  <td>Material Type</td>
  <td>{{@$booking_detail->material_type}}</td>
</tr>
<tr>
  <td>Material Weight</td>
  <td>{{@$booking_detail->weight}} {{@$booking_detail->weight_unit}}</td>
</tr>
<tr>
  <td>Total Fare</td>
  <td>{{@$booking_detail->price}}</td>
</tr>
<tr>
  <td>Payment Mode</td>
  <td>{{@$booking_detail->payment_method}}</td>
</tr>
</tbody>
</table>
</div>
<!-- /.box-body -->
</div>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Customer Details</h3>
  </div>
  <div class="box-body">
    <table id="example1" class="table table-bordered">
      <tbody><tr>
        <td>Customer Name</td>
        <td>{{@$booking_detail->fullname}}</td>
      </tr>
      <tr>
        <td>Mobile</td>
        <td>{{@$booking_detail->mobile}}</td>
      </tr>
      <tr>
        <td>Email</td>
        <td>{{@$booking_detail->email}}</td>
      </tr>
    </tbody>
  </table>
</div>
<!-- /.box-body -->
</div>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Driver Details</h3>
  </div>
  @if(@$booking_detail->driver_id)
  @php 
  $driver = DB::connection('ogonn_ogonn')->table('users')->join('drivers', 'users.id', '=', 'drivers.driver_id')->where('users.id', $booking_detail->driver_id)->first();
  $vehiclef = DB::connection('ogonn_ogonn')->table('vehicles')->where('driver_id', $booking_detail->driver_id)->first();
  $vehiclet = DB::connection('ogonn_ogonn')->table('vehicle_lists')->where('id', $vehiclef->vehicle_type_id)->first();
  @endphp
  @endif
  <div class="box-body">
    <table id="example1" class="table table-bordered">
      <tbody><tr>
        <td>Driver Name</td>
        <td>{{@$driver->fullname}}</td>
      </tr>
      <tr>
        <td>Driver Mobile</td>
        <td>{{@$driver->mobile}}</td>
      </tr>
      <tr>
        <td>Email</td>
        <td>{{@$driver->email}}</td>
      </tr>
      <tr>
        <td>Vehicle Name</td>
        <td>{{@$vehiclet->name}}</td>
      </tr>
      <tr>
        <td>Vehicle Number</td>
        <td>{{@$vehiclef->vehicle_num}}</td>
      </tr>
      <tr>
        <td>Pickup Distance</td>
        <td>{{calc_distance(@$driver->current_lat, @$driver->current_long, @$booking_detail->picup_lat, @$booking_detail->picup_long)}}</td>
      </tr>
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
@endsection