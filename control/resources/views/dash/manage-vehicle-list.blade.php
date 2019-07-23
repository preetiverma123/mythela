@extends('layouts.app-dash')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage Vehicle List
      <small>Vehicle List</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">  Manage Vehicle List</a></li>
      <li class="active"> Vehicle List</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          @if(Session::get('msg'))
          <div class="alert alert-{{Session::get('msg')['type']}} alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{Session::get('msg')['text']}}</strong>
          </div>
          @endif
          <form method="post">
            {{csrf_field()}}
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control"  value="{{@$vfst->name}}" name="name">
                    {{ $errors->first('name') }}
                  </div>
                   <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description">{{@$vfst->description}}</textarea>
                    {{ $errors->first('description') }}
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
                    <th>SrNo.</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php $lcount=1; @endphp
                  @foreach($vlist as $vlistt)
                  <tr>
                     <td>{{$lcount++}}</td>
                     <td>{{$vlistt->name}}</td>
                     <td>{{$vlistt->description}}</td>
                     <td><a class="btn btn-primary" href="{{route('manage.vehicle.list', ['id'=>encode($vlistt->id)])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a><a class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>
                    </a></td>
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