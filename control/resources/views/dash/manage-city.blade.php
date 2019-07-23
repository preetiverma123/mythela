@extends('layouts.app-dash')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage City
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Manage City</a></li>
      <li class="active"> City</li>
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
                    <label>State</label>
                    <select class="form-control" name="state_id"> 
                      <option value="">Select</option>
                      @foreach($states as $state)
                      <option {{@$city_f->id==$state->id?'selected=selected':''}} value="{{$state->id}}">{{@$state->name}}</option>
                      @endforeach
                    </select>
                    {{ $errors->first('state_id') }}
                  </div>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control"  name="name" placeholder="Enter name" value="{{old('name')}} {{@$city_f->name}}">
                    {{ $errors->first('name') }}
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-md-6">
                  <button class="btn btn-success">SUBMIT</button>
                </div>
              </div>
            </form>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>State</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cities as $cities)
                  @php 
                   $statefr=DB::connection('mythela_db')->table('states')->where('id', $cities->state_id)->first();
                  @endphp
                  <tr class="city_{{encode($cities->id)}}">
                    <td>{{$cities->name}}</td>
                    <td>{{@$statefr->name}}</td>
                    <td>
                    <a class="btn btn-primary" href="{{route('city', ['id'=>encode($cities->id)])}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a class="btn btn-danger delete-action" v-href="{{encode($cities->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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
      $(document).on(' click', '.delete-action', function(event){
          event.preventDefault();
          var act=$(this).attr('d-act');
          var city_id=$(this).attr('v-href');
          $.ajax({
            type:"delete",
            url:"{{route('delete')}}",
            data:{_token:"{{csrf_token()}}", action:'city', city_id:city_id},
            success: function(response){
               location.reload();
            }
          });
        });
      </script>
  </div>
  <!-- /.content-wrapper -->
  @endsection