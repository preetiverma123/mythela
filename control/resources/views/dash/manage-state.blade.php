@extends('layouts.app-dash')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage State
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Manage State</a></li>
      <li class="active"> State</li>
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
                    <label>State Name</label>
                    <input type="text" class="form-control"  name="name" placeholder="Enter state name" value="{{old('name')}} {{@$state_f->name}}">
                    {{ $errors->first('name') }}
                  </div>
                  <div class="form-group">
                    <label>State code</label>
                    <input type="text" class="form-control"  name="code" placeholder="Enter state code" value="{{old('code')}}{{@$state_f->code}}">
                    {{ $errors->first('code') }}
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
                    <th>Code</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($states as $state)
                  <tr class="state_{{encode($state->id)}}">
                    <td>{{$state->name}}</td>
                    <td>{{$state->code}}</td>
                    <td> <a class="btn btn-primary" href="{{route('state', ['id'=>encode($state->id)])}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                      <a class="btn btn-danger delete-action" v-href="{{encode($state->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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
          var state_id=$(this).attr('v-href');
          $.ajax({
            type:"delete",
            url:"{{route('delete')}}",
            data:{_token:"{{csrf_token()}}", action:'state', state_id:state_id},
            success: function(response){
              location.reload();
            }
          });
        });
      </script>
    </div>
    <!-- /.content-wrapper -->
    @endsection