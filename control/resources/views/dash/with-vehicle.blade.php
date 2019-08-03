@extends('layouts.app-dash')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
       Partners With Vehicle
      <small>With Vehicle</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="javascript:void(0);"> Partners With Vehicle</a></li>
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
                  <th>S No.</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>City</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php $lcount=1; @endphp
                @foreach($partners as $partner)
                <tr>
                  <td>{{$lcount++}}</td>
                  <td>{{$partner->name}}</td>
                  <td>{{$partner->mobile}}</td>
                  <td>{{$partner->city}}</td>
                  <td><a href="javascript:void(0);"><i class="fa fa-ckeck" aria-hidden="true"></i></a></td>
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