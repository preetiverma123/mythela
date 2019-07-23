@extends('layouts.app-book')
@section('content')
<hr style="margin-top: 2px;margin-bottom: 2px;"/>
@foreach($bookings as $booking)

<div class="fleet-row card row">
  <a href="{{route('bidding.results', ['booking_id'=>encode($booking['id'])])}}" style="color:#000;">
  @if(@$booking['vehicle_type']=='Open')
  <div class="col-xs-2 fl text-center"><img class="fleet-img2" src="img/fleet/topen.jpg"><br/><div class="fleet-time">Open</div></div>
  @endif
  @if(@$booking['vehicle_type']=='Container')
  <div class="col-xs-2 fl text-center"><img class="fleet-img2" src="img/fleet/tcontainer.jpg"><br/><div class="fleet-time">Container</div></div>
  @endif
  @if(@$booking['vehicle_type']=='Trailer')
  <div class="col-xs-2 fl text-center"><img class="fleet-img2" src="img/fleet/ttrailer.jpg"><br/><div class="fleet-time">Trailer</div></div>
  @endif
  <div class="col-xs-10 fl">
    <i class="fa fa-calendar"></i> <b>{{date('d-m-Y', strtotime($booking['depart_date']))}} {{date('H:i A', strtotime($booking['depart_time']))}}</b><br/>
    <span class="fleet-tag">
      <i class="fa fa-circle" style="color:#498F1F;"></i> {{addr_ltln($booking['picup_lat'], $booking['picup_long'])}}<br/>
      <i class="fa fa-circle" style="color:#FF665A;"></i> {{addr_ltln($booking['drop_lat'], $booking['drop_long'])}}</span>
    </div>
  </a>
  </div>
  @endforeach
  @endsection