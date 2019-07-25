@extends('layouts.app-dash')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage Partners
      <small>Customers</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Manage Customers</a></li>
      <li class="active"> Customers</li>
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
                  <th>Fullname</th>
                  <th>Partner Type</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>State</th>
                  <th>City</th>
                  <th>Login (vendor status)</th>
                  <th>Login (driver status)</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                @php 
                    $state_li = DB::connection('ogonn_ogonn')->table('states')->where('id', $user->state_id)->first();
                    $city_li = DB::connection('ogonn_ogonn')->table('cities')->where('id', $user->city_id)->first();
                @endphp
                <tr>
                  <td>{{$user->fullname}}</td>
                  <td>
                    {{$user->vendor_role_id=='3'?'Vendor':''}}
                    {{$user->driver_role_id=='2'?' (driver)':''}} 
                  </td>
                  <td>{{$user->mobile}}</td>
                  <td>{{$user->email!=''?$user->email:'N/A'}}</td>
                  <td>
                    {{@$state_li->name==""?"N/A":$state_li->name}}
                  </td>
                  <td>
                    {{@$city_li->name==""?"N/A":$city_li->name}}
                  </td>
                  <td>{{$user->vendor_status}} 
                    <a v-href="{{encode($user->id)}}" d-act="vendor" d-st="{{$user->vendor_status}}" class="btn btn-xs status-action {{$user->vendor_status=='approved'?'btn-success':'btn-danger'}}">
                      <i class="fa fa-{{$user->vendor_status=='approved'?'unlock':'lock'}}" aria-hidden="true"></i>
                    </a>
                  </td>
                  <td>{{$user->driver_status}}
                    <a v-href="{{encode($user->id)}}" d-act="driver"  d-st="{{$user->driver_status}}"class="btn btn-xs status-action {{$user->driver_status=='approved'?'btn-success':'btn-danger'}}">
                      <i class="fa fa-{{$user->driver_status=='approved'?'unlock':'lock'}}" aria-hidden="true"></i>
                    </a>
                  </td>
                  <td>
                    <a href="{{route('detail.partner', ['id'=>encode($user->id)])}}" class="btn btn-xs btn-primary">
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