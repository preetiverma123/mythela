@extends('layouts.app-dash')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage Vehicle
      <small>Vehicle Detail</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Manage Vehicle</a></li>
      <li class="active"> Vehicle Detail</li>
    </ol>
  </section>
  <style>
  /*table tr th:first-child,*/
  /*table tr td:first-child {*/
    /*  width:20%;*/
    /*  font-weight: bold;*/
    /*}*/
  </style>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered">
                  <tr>
                    <td colspan="4">
                      <h4>Owner Details</h4>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">
                      @if(@$vehicle_first->profile_pic)
                      <img src="{{'https://ogonn.in/img/users-pic/'.@$vehicle_first->profile_pic}}" width="150px" height="150px" class="img-circle">
                      @else
                      N/A
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Fullname</th>
                    <td colspan="3">
                      {{@$vehicle_first->fullname}}
                    </td>
                  </tr>
                  <tr>
                    <th>Mobile</th>
                    <td>
                      {{@$vehicle_first->mobile}}
                    </td>
                    <th>email</th>
                    <td>
                      {{@$vehicle_first->email}}
                    </td>
                  </tr>
                  @php 
                  if($vehicle_first->city_id){
                  $cfirst = DB::connection('ogonn_ogonn')->table('cities')->where('id', $vehicle_first->city_id)->first();
                }
                if($vehicle_first->state_id){
                $sfirst = DB::connection('ogonn_ogonn')->table('states')->where('id', $vehicle_first->state_id)->first();
              }
              @endphp
              <tr>
                <td colspan="4">
                  <h4>Vehicle Details</h4>
                </td>
              </tr>
               <tr>
                <th>Status</th>
                <td colspan="3">
                  {{@$vehicle_first->status_docs}}
                </td>
              </tr>
              <tr>
                <th>State</th>
                <td colspan="3">
                  {{@$sfirst->name}}
                </td>
              </tr>
              <tr>
                <th>City</th>
                <td colspan="3">
                   {{@$cfirst->name}}
                </td>
              </tr>
              <tr>
                <th>Insurance</th>
                <td>
                  @if(@$vehicle_first->insurance)
                  <img src="{{'https://ogonn.in/img/document-info/'.@$vehicle_first->insurance}}" width="300px">
                  @else
                  N/A
                  @endif
                </td>
                <th>Permit</th>
                <td>
                  @if(@$vehicle_first->permit)
                  <img src="{{'https://ogonn.in/img/document-info/'.@$vehicle_first->permit}}" width="300px">
                  @else
                  N/A
                  @endif
                </td>
              </tr>
              <!--<tr>-->
                <!--</tr>-->
                <tr>
                  <th>Fitness Certificate</th>
                  <td>
                    @if(@$vehicle_first->fitness_certificate)
                    <img src="{{'https://ogonn.in/img/document-info/'.@$vehicle_first->fitness_certificate}}" width="300px">
                    @else
                    N/A
                    @endif
                  </td>
                  <th>Noc</th>
                  <td>
                    @if(@$vehicle_first->noc)
                    <img src="{{'https://ogonn.in/img/document-info/'.@$vehicle_first->noc}}" width="300px">
                    @else
                    N/A
                    @endif
                  </td>
                </tr>
                <!--<tr>-->
                  <!--</tr>-->
                  <tr>
                    <th>Loan emi</th>
                    <td>
                      @if(@$vehicle_first->loan_emi_detail)
                      <img src="{{'https://ogonn.in/img/document-info/'.@$vehicle_first->loan_emi_detail}}" width="300px">
                      @else
                      N/A
                      @endif
                    </td>
                    <th>Road Tax</th>
                    <td>@if(@$vehicle_first->road_tax_reciept)
                      <img src="{{'https://ogonn.in/img/document-info/'.@$vehicle_first->road_tax_reciept}}" width="300px">
                      @else
                      N/A
                    @endif</td>
                  </tr>
                  <!--<tr>-->
                    <!--</tr>-->
                    <tr>
                      <th>RC detail</th>
                      <td colspan="3">@if(@$vehicle_first->rc_detail)
                        <img src="{{'https://ogonn.in/img/document-info/'.@$vehicle_first->rc_detail}}" width="300px">
                        @else
                        N/A
                      @endif</td>
                    </tr>
                  </table>
                </div>
                <br/>
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <button class="btn btn-success status" veh_id="{{encode(@$vehicle_first->id)}}" val-act="vehicles" val="approved"><i class="fa fa-check"></i> Approve</button> 
                    <button class="btn btn-danger status" veh_id="{{encode(@$vehicle_first->id)}}" val-act="vehicles" val="rejected"><i class="fa fa-ban"></i> Rejected</button> 
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
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
      $(document).on(' click', '.status', function(event){
        event.preventDefault();
        $.ajax({
          type: "put",
          url: "{{route('status')}}",
          data:{ _token:"{{csrf_token()}}", vehicle_id:$(this).attr('veh_id'), action:$(this).attr('val-act'), 
          status:$(this).attr('val')},
          success: function(response){
            location.reload();
          }
        });
      });
    </script>
  </div>
  <!-- /.content-wrapper -->
  @endsection