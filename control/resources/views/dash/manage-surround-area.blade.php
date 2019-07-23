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
                    <select class="form-control" id="city_id" name="city_id">
                      <option value="">Select</option>
                      @foreach($clist as $clist_f)
                      <option value="{{@$clist_f->id}}">{{@$clist_f->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Range km</label>
                    <input type="text" class="form-control" id="range_km" value="{{@$cfirst_lt->range_area}}" name="range_area" step="any" required="">
                    {{ $errors->first('range_area') }}
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
                  <th>City</th>
                  <th>Range</th>
                </tr>
              </thead>
              <tbody>
                @php
                $lcount=1;
                @endphp
                @foreach($sround_area as $sround_area_l)
                @php 
                   $ffirst=DB::connection('mythela_db')->table('cities')->where('id', $sround_area_l->city_id)->first();
                @endphp
                <tr>
                  <td>{{$lcount++}}</td>
                  <td>{{@$ffirst->name}}</td>
                  <td>{{@$sround_area_l->range_area}} Km</td>
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