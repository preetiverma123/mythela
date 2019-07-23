<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ogonn</title>
	<link rel="shortcut icon" href="img/fav.png" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Convergence' rel='stylesheet'>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Handlee|Open+Sans:300,400,600,700,800" rel="stylesheet">    </head>
	<body>
		<div id="load"></div>
		<style>
		#load{
			width:100%;
			height:100%;
			position:fixed;
			z-index:99999;
			background:url("img/loader.gif") no-repeat center center rgba(255,255,255,0.82)
		}
	</style>
	<script>
		document.onreadystatechange = function () {
			var state = document.readyState
			if (state == 'complete') {
				setTimeout(function(){
					document.getElementById('interactive');
					document.getElementById('load').style.visibility="hidden";
				},1000);
			}
		}
		</script>        <style>
		body{background-color:#F5F5F5;}
		hr {
			margin-top:5px;
			margin-bottom:5px;
		}
	</style>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-sm-12 text-center">
				<!-- profile-->
				<div class="row rome">
					<div class="col-xs-12">
						<a href="{{route('book')}}"><div class="back"><i class="fa fa-long-arrow-left"></i></div></a>
						<h4> My Bookings</h4>
					</div>
				</div>
				<hr/>
				<div class="row">
					<div class="col-xs-12">
						@foreach($bookings as $booking)
						<!-- item-->
						<a href="{{route('booking.detail', ['id'=>encode($booking['booking_id'])])}}" style="color:#000">
						<div class="booking-history">
							<div class="booking-date">
								{{date('d-m-Y', strtotime($booking['bookingInfo']['depart_date'])).' '.date('H:i A', strtotime($booking['bookingInfo']['depart_time']))}} <br/>
								@php 
                                $vhfirst=\App\Vehicle_list::where('id', $booking['vehicleInfo']['vehicle_type_id'])->first();
								@endphp
								<span class="vehicle-name">{{$vhfirst['name']}} {{strtoupper($booking['vehicleInfo']['vehicle_num'])}}</span>
							</div><div class="booking-price"><i class="fa fa-inr"></i> {{$booking['price']}} <br/>
								<span class="vehicle-rating text-success">{{$booking['status']}}</span>
							</div>
							<br/><br/>
						</div>
						</a>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-md-8 hidden-sm hidden-xs right-desk right-desk-gen">
				<div class="right-desk-content">
					<h3 class="white">We are always ready to help you.</h3>
					# Ogonn For Web
				</div>
			</div>
		</div>
	</div>
</body>
</html>