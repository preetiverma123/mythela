@extends('layouts.app-dash')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage Service Tax
      <small>Service Tax</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">  Manage Service Tax</a></li>
      <li class="active"> Service Tax</li>
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
                    <label>Percentage Tax</label>
                    <input type="number" class="form-control"  value="{{@$gst->sgst+@$gst->cgst}}" name="stax" step="any">
                    {{ $errors->first('stax') }}
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
                    <th>SGst(tax)</th>
                    <th>CGst(tax)</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                     <td>1</td>
                     <td>{{@$gst->sgst}}</td>
                     <td>{{@$gst->cgst}}</td>
                     <td><a href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a></td>
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