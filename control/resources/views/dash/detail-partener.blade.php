@extends('layouts.app-dash')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage Partners
      <small>Partners Detail</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Manage Partners</a></li>
      <li class="active"> Partners Detail</li>
    </ol>
  </section>
  <style>
  table tr th:first-child,
  table tr td:first-child {
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
          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered">
  
                  <th>Fullname</th>
                  <td>{{@$ulist->fullname}}</td>
                </tr>
                <tr>
                  <th>Partner Type</th>
                  <td>
                    @php 
                    $rolesfirst = DB::connection('mythela_db')->table('roles')->whereIn('id', [$ulist->driver_role_id, $ulist->vendor_role_id])->get();
                    @endphp
                    
                    @foreach($rolesfirst as $role)
                    {{$role->name}}
                    @endforeach
                    {{@$vehicleInfo->vehicle_num!=''?'('.@$vehicleInfo->vehicle_num.')':''}}
                  </td>
                </tr>
                <tr>
                  <th>Document-status</th>
                  <td>{{@$photolist->status_docs==''?'N/A':@$photolist->status_docs}}</td>
                </tr>
                <tr>
                  <th>Mobile</th>
                  <td>{{@$ulist->mobile}}</td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td>{{@$ulist->email}}</td>
                </tr>
                 @php 
                    $state_li = DB::connection('mythela_db')->table('states')->where('id', $ulist->state_id)->first();
                    $city_li = DB::connection('mythela_db')->table('cities')->where('id', $ulist->city_id)->first();
                @endphp
                <tr>
                  <th>State</th>
                  <td>{{@$state_li->name}}</td>
                </tr>
                <tr>
                  <th>City</th>
                  <td>{{@$city_li->name}}</td>
                </tr>
                <tr>
                  <th>Profile Pic</th>
                  <td>
                    @if(@$ulist->profile_pic)
                    <img width="100" src="{{'https://mythela.com/img/users-pic/'.@$ulist->profile_pic}}">
                    @else 
                    <img class="img-circle" width="100" src="https://vignette.wikia.nocookie.net/sote-rp/images/c/c4/User-placeholder.png">
                    @endif
                  </td>
                </tr>
                <tr>
                  <th>Address-proof type</th>
                  <td>{{@$ulist->address_prof_type!=''?@$ulist->address_prof_type:'N/A'}}</td>
                </tr>
                <tr>
                  <th>Address proof-front</th>
                  <td>
                    @if(@$photolist->address_prof_front)
                    <img  width="200px" src="{{'https://mythela.com/img/document-info/'.@$photolist->address_prof_front}}">
                    @else 
                    N/A 
                    @endif
                  </td>
                </tr>
                <tr>
                  <th>Address proof-back</th>
                  <td>
                    @if(@$photolist->address_prof_back)
                    <img  width="200px" src="{{'https://mythela.com/img/document-info/'.@$photolist->address_prof_back}}">
                    @else 
                    N/A 
                    @endif
                  </td>
                </tr>
                <tr>
                  <th>Pancard front</th>
                  <td>
                    @if(@$photolist->pancard_front)
                    <img  width="200px" src="{{'https://mythela.com/img/document-info/'.@$photolist->pancard_front}}">
                    @else 
                    N/A 
                    @endif
                  </td>
                </tr>
                <tr>
                  <th>Dl front</th>
                  <td>
                    @if(@$photolist->commercial_dl_front)
                    <img  width="200px" src="{{'https://mythela.com/img/document-info/'.@$photolist->commercial_dl_front}}">
                    @else 
                    N/A 
                    @endif
                  </td>
                </tr>
                <tr>
                  <th>Dl back</th>
                  <td>
                    @if(@$photolist->commercial_dl_back)
                    <img  width="200px" src="{{'https://mythela.com/img/document-info/'.@$photolist->commercial_dl_back}}">
                    @else 
                    N/A 
                    @endif
                  </td>
                </tr>
                <tr>
                  <th>Bank passbook</th>
                  <td>
                    @if(@$photolist->bank_passbook)
                    <img  width="200px" src="{{'https://mythela.com/img/document-info/'.@$photolist->bank_passbook}}">
                    @else 
                    N/A 
                    @endif
                  </td>
                </tr>
                <tr>
                  <th>Police verification</th>
                  <td>
                    @if(@$photolist->police_verification)
                    <img  width="200px" src="{{'https://mythela.com/img/document-info/'.@$photolist->police_verification}}">
                    @else 
                    N/A 
                  @endif</td>
                </tr>
              </table>
            </div>
            <!-- /.col -->
            <br/>
            <div class="row">
              <div class="col-xs-12 text-center">
                <button class="btn btn-success status" docs_id="{{encode(@$photolist->id)}}" u-id="{{encode(@$ulist->id)}}" val-act="document" val="approved"><i class="fa fa-check"></i> Approve</button> 
                <button class="btn btn-danger status" docs_id="{{encode(@$photolist->id)}}" u-id="{{encode(@$ulist->id)}}" val-act="document" val="rejected"><i class="fa fa-ban"></i> Rejected</button> 
              </div>
            </div>
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
      data:{ _token:"{{csrf_token()}}", 'user_id':$(this).attr('u-id'), docs_id:$(this).attr('docs_id'), action:$(this).attr('val-act'), status:$(this).attr('val')},
      success: function(response){
        location.reload();
      }
    });
  });
</script>
</div>
<!-- /.content-wrapper -->
@endsection