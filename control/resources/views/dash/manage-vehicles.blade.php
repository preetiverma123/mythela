@extends('layouts.app-dash')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage Vehicles
      <small>Vehicles</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Manage Vehicles</a></li>
      <li class="active"> Vehicles</li>
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
                  <th>Vehicle</th>
                  <th>Transport</th>
                  <th>Vehicle Number</th>
                  <th>Vehicle Unit</th>
                  <th>Vehicle Weight</th>
                  <th>Vehicle State</th>
                  <th>Vehicle City</th>
                  <th>Vehicle Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($vehicles as $vehicle)
                  @php 
                   if($vehicle->city_id){
                     $cfirst = DB::connection('ogonn_ogonn')->table('cities')->where('id', $vehicle->city_id)->first();
                   }
                   if($vehicle->state_id){
                     $sfirst = DB::connection('ogonn_ogonn')->table('states')->where('id', $vehicle->state_id)->first();
                   }
                   $vfirst = DB::connection('ogonn_ogonn')->table('vehicle_lists')->where('id', $vehicle->vehicle_type_id)->first();
                  @endphp
                  <tr>
                    <td>{{$vfirst->name}}</td>
                    <td>{{$vehicle->transport}}</td>
                    <td>{{$vehicle->vehicle_num}}</td>
                    <td>{{$vehicle->unit}}</td>
                    <td>{{$vehicle->weight}}</td>
                    <td>{{@$sfirst->name}}</td>
                    <td>{{@$cfirst->name}}</td>
                    <td>{{$vehicle->vehicle_status}}</td>
                    <td>
                      <a href="{{route('vehicle.detail', ['id'=>encode($vehicle->id)])}}" class="btn btn-xs btn-primary">
                        <i class="fa fa-eye" aria-hidden="true"></i></a>
                      </td>
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
    <script>
      $(document).on(' click', '.status-action', function(event){
        alert("hello");
          event.preventDefault();
          var act=$(this).attr('d-act');
          var user_id=$(this).attr('v-href');
          var stt=$(this).attr('d-st');
          if(stt=="block"){
               $(this).attr('d-st','approved');
          }
          if(stt=="approved"){
               $(this).attr('d-st','block');
          }
           status=$(this).attr('d-st');
          $.ajax({

            type: "put",
            url: "{{route('status')}}",
            data:{ _token:"{{csrf_token()}}", action:act, status:status, user_id:user_id},
            success: function(response){
              location.reload();
            }
          });
        });
      </script>
  </div>
  <!-- /.content-wrapper -->
  @endsection