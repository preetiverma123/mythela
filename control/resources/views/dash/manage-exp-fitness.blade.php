@extends('layouts.app-dash')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage Fitness
      <small>Fitness</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">  Manage Fitness</a></li>
      <li class="active"> Fitness</li>
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
                    <label>Days</label>
                    <input type="number" class="form-control"  value="{{@$slist->alert_fitness_by}}" name="alert_fitness_by" step="any">
                    {{ $errors->first('alert_fitness_by') }}
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
                    <th>Days</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                     <td>1</td>
                     <td>{{@$slist->alert_fitness_by}}</td>
                  </tr>
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