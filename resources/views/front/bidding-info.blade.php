@extends('layouts.app-bidding-info')
@section('content')
@foreach($biddings as $bidding)
<div class="fleet-row card row">
  <a href="{{route('confirm.booking', ['bidding_id'=>encode($bidding['id'])])}}" style="color:#000;">
   <div class="col-xs-2 fl text-center">
    @if(@$bidding['bookingInfo']['vehicle_type']=='Open')
       <img class="fleet-img" src="{{asset('img/fleet/topen.jpg')}}"><br>
    @endif

    @if(@$bidding['bookingInfo']['vehicle_type']=='Container')
       <img class="fleet-img" src="{{asset('img/fleet/tcontainer.png')}}"><br>
    @endif

    @if(@$bidding['bookingInfo']['vehicle_type']=='Trailer')
       <img class="fleet-img" src="{{asset('img/fleet/ttrailer.jpg')}}"><br>
    @endif
   </div>
   <div class="col-xs-9 fl">
       <span class="fleet-name">{{$bidding['bookingInfo']['vehicle_type']}}</span>
       <span class="fleet-price"><i class="fa fa-inr"></i>{{$bidding['price']}}</span><br>
       <span class="fleet-tag">{{$bidding['userInfo']['fullname'].' '.$bidding['userInfo']['email']}}</span>
   </div>
   <div class="col-xs-1 fl text-center"><i class="fa fa-angle-right fleet-proceed-icon"></i></div>
 </a>
</div>
@endforeach
@endsection