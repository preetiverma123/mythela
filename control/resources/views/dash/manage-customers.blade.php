@extends('layouts.app-dash')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage Customers
      <small>Customers</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
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
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                  <td>{{$user->fullname}}</td>
                  <td>{{$user->mobile}}</td>
                  <td>{{$user->email!=''?$user->email:'N/A'}}</td>
                  <td>{{$user->status}}</td>
                  <td>
                    <a href="{{route('detail.customer', ['user_id'=>encode($user->id)])}}" class="btn btn-xs btn-primary">
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
  </div>
  <!-- /.content-wrapper -->
  @endsection