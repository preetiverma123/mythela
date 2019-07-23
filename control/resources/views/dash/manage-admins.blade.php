@extends('layouts.app-dash')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage Admins
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Manage Admins</a></li>
      <li class="active"> Admins</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        @if(Session::get('msg'))
        <div class="alert alert-{{Session::get('msg')['type']}} alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{Session::get('msg')['text']}}</strong>
        </div>
        @endif
        <div class="box">
          <form method="post">
            {{csrf_field()}}
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>First name</label>
                    <input type="text" class="form-control"  name="first_name" placeholder="Enter first name" value="{{$users_first['first_name']!=""?$users_first['first_name']:old('first_name')}}">
                    {{ $errors->first('first_name') }}
                  </div>
                  <div class="form-group">
                    <label>Last name</label>
                    <input type="text" class="form-control"  name="last_name" placeholder="Enter last name" value="{{$users_first['last_name']!=""?$users_first['last_name']:old('last_name')}}">
                    {{ $errors->first('last_name') }}
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter email" value="{{$users_first['email']!=""?$users_first['email']:old('email')}}">
                    {{ $errors->first('email') }}
                  </div>
                  <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" class="form-control" name="mobile" placeholder="Enter mobile" value="{{$users_first['mobile']!=""?$users_first['mobile']:old('mobile')}}">
                    {{ $errors->first('mobile') }}
                  </div>
                  <div class="form-group">
                    <label>State</label>
                    <select class="form-control" id="stateId" name="state_id"> 
                     <option value="">Select</option>
                    @foreach($states as $state)
                     <option value="{{$state->id}}" {{$users_first['state_id']==$state->id?'selected':old('state_id')}}>{{$state->name}}</option>
                    @endforeach
                    </select>
                    {{ $errors->first('city_id') }}
                  </div>
                  <div class="form-group">
                    <label>City</label>
                    <select class="form-control" id="city_lts" name="city_id"> 
                      <option value="">Select</option>
                    @foreach($cities as $cities)
                     <option value="{{$cities->id}}" {{$users_first['city_id']==$cities->id?'selected':old('city_id')}}>{{$cities->name}}</option>
                    @endforeach
                    </select>
                    {{ $errors->first('city_id') }}
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-md-6">
                  <button class="btn btn-success" type="submit">SUBMIT</button>
                </div>
              </div>
            </form>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if($users)
                  @foreach($users as $user)
                  <tr>
                    @php 
                     $statefirst = DB::connection('mythela_db')->table('states')->where('id', $user['state_id'])->first();
                     $citisfirst = DB::connection('mythela_db')->table('cities')->where('id', $user['city_id'])->first();
                    @endphp
                    <td>{{$user['first_name']}}</td>
                    <td>{{$user['last_name']}}</td>
                    <td>{{$user['mobile']}}</td>
                    <td>{{$user['email']!=''?$user['email']:'N/A'}}</td>
                    <td>{{@$statefirst->name}}</td>
                    <td>{{@$citisfirst->name}}</td>
                     <td>{{$user['status']}}</td>
                    <td>
                      <a lid="{{encode($user['id'])}}" status="{{@$user['status']}}" class="btn btn-xs status-action {{$user['status']=='approved'?'btn-success':'btn-danger'}}">
                        <i class="fa fa-{{$user['status']=='approved'?'unlock':'lock'}}" aria-hidden="true"></i>
                      </a>
                       <a href="{{route('manage.admins', ['id'=>encode($user['id'])])}}" class="btn btn-xs btn-primary">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                  @endif
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
  <script>
    $(document).on(' click', '.status-action', function(event){
      event.preventDefault();
      var user_id=$(this).attr('lid');
      var status=$(this).attr('status');
      if(status=='pending'){
        status=$(this).attr('status','approved');
      }
      if(status=='pending' || status=='approved'){
        status=$(this).attr('status','block');
      }
      if(status=='block'){
        status=$(this).attr('status','approved');
      }
      status=$(this).attr('status');
      $.ajax({
        type:"put",
        url:"{{route('status')}}",
        data:{_token:"{{csrf_token()}}", action:'partners', status:status, user_id:user_id},
        success: function(response){
          location.reload();
        }
      });
    });

     $(document).on('change', '#stateId', function(event){
      event.preventDefault();
      $.ajax({
        type:"post",
        url:"{{route('get.city')}}",
        data:{_token:"{{csrf_token()}}", state_id:$(this).val()},
        success: function(response){
          $("#city_lts").html(response);
        }
      });
    });
  </script>
  <!-- /.content-wrapper -->
  @endsection