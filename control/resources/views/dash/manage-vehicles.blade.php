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