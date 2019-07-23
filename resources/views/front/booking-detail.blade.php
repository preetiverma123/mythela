<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Thela</title>
	<link rel="shortcut icon" href="{{asset('img/fav.png')}}" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('css/mythela.css')}}">
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
			background:url("{{asset('img/loader.gif')}}") no-repeat center center rgba(255,255,255,0.82)
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
						<a href="{{route('my.booking')}}"><div class="back"><i class="fa fa-long-arrow-left"></i></div></a>
						<h4> Prime SUV</h4>
					</div>
				</div>
				<hr/>
				<div class="row">
					<div class="col-xs-12">
						<!-- item-->
						<div class="booking-history">
							<div class="total-fare para">{{date('d-m-Y', strtotime($booking['bookingInfo']['depart_date']))}} <small>{{date('h:i A', strtotime($booking['bookingInfo']['depart_time']))}} </small> </div>
							<img src="{{asset('img/map.png')}}" width="100%"/>
							<div class="text-left" style="margin:10px;">
								<i class="fa fa-circle" style="color:#498F1F;"></i> {{addr_ltln($booking['bookingInfo']['picup_lat'], $booking['bookingInfo']['picup_long'])}} <br/>
								<i class="fa fa-circle" style="color:#FF665A;"></i> {{addr_ltln($booking['bookingInfo']['drop_lat'], $booking['bookingInfo']['drop_long'])}}
							</div>
							<hr/>
							<div class="row">
								<div class="col-xs-6">
									<div class="total-fare"><i class="fa fa-inr"></i> {{$booking['price']}}</div>
									<p class="para">Total Fare</p>
								</div>
								<div class="col-xs-6">
									<a href="#"><i class="fa fa-file-pdf-o" style="color:red;"></i> Invoice</a>
								</div>
							</div>
							<hr/>
							<div class="row text-left">
								<div class="col-xs-2">
									<img class="driver-dp img-circle" src="http://www.bittoo.in/wp-content/uploads/2015/03/User-Default.jpg">
								</div>
								<div class="col-xs-8">
									<div class="total-fare">{{$booking['driverInfo']['fullname']}}</div>
									@php 
									  $vh=\App\Vehicle::where('id', $booking['vehicle_type_id'])->first();
									  print_r($vh);
                                      $vehicle_l=\App\Vehicle_list::where('id', $booking['vehicle_type_id'])->first();
									@endphp
									<p class="vehicle-name">{{@$vehicle_l['name']}} {{strtoupper(@$vh['vehicle_num'])}}</p>
								</div>
								<div class="col-xs-2 text-center">
			                <a  href="tel:8765530555"><i class="fa fa-2x fa-phone" style="color:#00BC22;position:relative;top:10px;"></i></a>
			                </div>
							</div>
							<hr/>
							<span class="vehicle-rating">Rated : <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
							
							<hr/>
							<div class="row">
								<div class="col-xs-12">
									<h5>Please Rate the overall service</h5>
									<form action="">
										<div class="stars">
											<input class="star star-5" id="star-5" type="radio" name="star"/>
											<label class="star star-5" for="star-5"></label>
											<input class="star star-4" id="star-4" type="radio" name="star"/>
											<label class="star star-4" for="star-4"></label>
											<input class="star star-3" id="star-3" type="radio" name="star"/>
											<label class="star star-3" for="star-3"></label>
											<input class="star star-2" id="star-2" type="radio" name="star"/>
											<label class="star star-2" for="star-2"></label>
											<input class="star star-1" id="star-1" type="radio" name="star"/>
											<label class="star star-1" for="star-1"></label>
										</div>
										<input class="feedback" type="text" placeholder="Give your feedack (optional)"/>
										<button class="btn btn-skin3">SUBMIT</button>
									</form>
									<style>
									div.stars {
										width: 270px;
										display: inline-block;
									}
									input.star { display: none; }
									label.star {
										float: right;
										padding: 10px;
										font-size: 30px;
										color: #444;
										transition: all .2s;
									}
									input.star:checked ~ label.star:before {
										content: '\f005';
										color: orange;
										transition: all .25s;
									}
									input.star-5:checked ~ label.star:before {
										color: orange;                                             
										/*text-shadow: 0 0 20px #952;*/
									}
									input.star-1:checked ~ label.star:before { color: #F62; }
									label.star:hover { transform: rotate(-15deg) scale(1.3); }
									label.star:before {
										content: '\f006';
										font-family: FontAwesome;
									}
								</style>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--main mobile column-->
		<div class="col-md-8 hidden-sm hidden-xs right-desk right-desk-gen">
			<div class="right-desk-content">
				<h3 class="white">We are always ready to help you.</h3>
				# My Thela For Web
			</div>
		</div>
	</div> <!-- row ends -->
</div><!-- container ends -->
</body>
</html>