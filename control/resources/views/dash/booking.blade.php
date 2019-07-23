@extends('layouts.app-dash')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage Bookings
      <small>New Bookings</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Manage Bookings</a></li>
      <li class="active"> New Bookings</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Pickup</th>
                  <th>Drop</th>
                  <th>Booking-type</th>
                  <th>Material-type</th>
                  <th>Vehical-type</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($bookings as $booking)
                <tr>
                  <td>{{addr_ltln($booking->picup_lat, $booking->picup_long)}}</td>
                  <td>{{addr_ltln($booking->drop_lat, $booking->drop_long)}}</td>
                  <td>Logistic</td>
                  <td>{{$booking->material_type}}</td>
                  @php 
                   $vehicle_info = DB::connection('mythela_db')->table('vehicle_lists')->where('id', $booking->vehicle_type_id)->first();
                  @endphp
                  <td>{{$vehicle_info->name}}</td>
                  <td><a href="{{route('view.detail', ['id'=>encode($booking->id)])}}" class="btn btn-info btn-xs">View</a></td>
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