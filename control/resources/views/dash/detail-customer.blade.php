@extends('layouts.app-dash')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Detail Customer
      <small>Detail Detail</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Detail Partners</a></li>
      <li class="active"> Detail Detail</li>
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
                <tr>
                  <th>Fullname</th>
                  <td>{{@$ulist->fullname}}</td>
                </tr>
                <tr>
                  <th>Mobile</th>
                  <td>{{@$ulist->mobile}}</td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td>{{@$ulist->email}}</td>
                </tr>
              </table>
            </div>
            <!-- /.col -->
            <br/>
            <div class="row">
              <div class="col-xs-12 text-center">
                <button class="btn btn-danger status" user_id="{{encode(@$ulist->id)}}" val-act="user" val="block"><i class="fa fa-ban"></i> Block</button>
                <button class="btn btn-success status" user_id="{{encode(@$ulist->id)}}" val-act="user" val="approved" val-act="approved"><i class="fa fa-check"></i> Approve</button>  
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
<script>
  $(document).on(' click', '.status', function(event){
    event.preventDefault();
    $.ajax({
      type: "put",
      url: "{{route('status')}}",
      data:{ _token:"{{csrf_token()}}", user_id:$(this).attr('user_id'), action:$(this).attr('val-act'), status:$(this).attr('val')},
      success: function(response){
        window.location = "{{route('manage.customers')}}";
      }
    });
  });
</script>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection