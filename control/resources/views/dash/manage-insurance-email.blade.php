@extends('layouts.app-dash')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage Srround Area
      <small>Srround Area</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">  Manage Srround Area</a></li>
      <li class="active"> Srround Area</li>
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
                    <label>Insurance Email</label>
                    <input type="text" class="form-control" id="insurance_email" value="{{@$slist->insurance_email}}" name="insurance_email" required="">
                    {{ $errors->first('insurance_email') }}
                  </div>
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
                  <th>Sr No.</th>
                  <th>Insurance Email</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>{{@$slist->insurance_email}}</td>
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
  <script>
    $(document).on('change', '#city_id',function() {
         $.ajax({
            type:"post",
            url:"{{route('get.km')}}",
            data:{_token:"{{csrf_token()}}", city_id:$(this).find(":selected").val()},
            dataType:"json",
            success: function(response){
              $('#range_km').val(response);
            }
          });
    });
  </script>
</div>
<!-- /.content-wrapper -->
@endsection