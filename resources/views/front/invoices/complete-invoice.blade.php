<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ogonn : Invoice</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<style>
	.plr-1{padding:0px 1px;}
	.plr-2{padding:0px 2px;}
	.plr-3{padding:0px 3px;}
	.p5{padding:5px;}
	.p10{padding:10px;}
	.ptb10{padding:10px 0px;}
	.btb{border-top:1px solid #ccc;border-bottom:1px solid #ccc;}
	.bt{border-top:1px solid #ccc;}
	.bb{border-bottom:1px solid #ccc;}
	.page-break {page-break-after: always;}
</style>
<body>
	<div class="container">
		<br/>
		<div class="row">
			<div class="col-xs-6">
				<h4>{{date('d M Y', strtotime($blist['updated_at']))}}</h4>
			</div>
			<div class="col-xs-6 text-right">
				<img src="https://mythela.com/img/giphy.gif" height="57px" style="padding:8px;"><br/>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 text-center">
				<h1><img src="https://cdn3.iconfinder.com/data/icons/indian-rupee-symbol/800/Indian_Rupee_symbol.png" width="16">{{$blist['price']+$blist['after_commission_price']+$blist['pafter_sgst_price']+$blist['pafter_cgst_price']+$blist['after_sgst_price']+$blist['after_cgst_price']+$culist['insurance_price']}}</h1>
				<div><h4>CRN12121212</h4></div>
				<p>Thanks for travelling with us, Customer Name</p>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-xs-6">
				<div class="text-center"><h4><b>Ride Details</b></h4></div>
				<img src="https://mythela.com/img/map.png" width="100%" height="250px">
				<!-- <img src="https://maps.googleapis.com/maps/api/staticmap?markers=28.59515998371874,77.30712912976742&markers=28.585036052518227,77.31162954121828&zoom=12&size=350x300&key=AIzaSyA-OBGAXvwI7wTNLbNT1l57Kjno8B8PK6Q"> -->
			</div>
			<div class="col-xs-6">
				<div class="text-center"><h4><b>Bill Details</b></h4></div>
				<div class="row">
					<div class="col-xs-6">Your Freight</div>
					<div class="col-xs-6 text-right"><img src="https://cdn3.iconfinder.com/data/icons/indian-rupee-symbol/800/Indian_Rupee_symbol.png" width="16"> {{$blist['price']+$blist['after_commission_price']+$blist['pafter_sgst_price']+$blist['pafter_cgst_price']+$blist['after_sgst_price']+$blist['after_cgst_price']+$culist['insurance_price']}}</div>
					<div class="col-xs-6" style="margin-top:20px">
						<b class="h3">Total Bill</b><small>(rounded off)</small><br/>
					</div>
					<div class="col-xs-6 text-right" style="margin-top:20px; margin-left:60px"><b class="h3"><img src="https://cdn3.iconfinder.com/data/icons/indian-rupee-symbol/800/Indian_Rupee_symbol.png" width="16"> {{$blist['price']+$blist['after_commission_price']+$blist['pafter_sgst_price']+$blist['pafter_cgst_price']+$blist['after_sgst_price']+$blist['after_cgst_price']+$culist['insurance_price']}}</b></div>
					<div class="col-xs-12" style="margin-top:65px">
						<p>Have queries? Visit support for this ride</p>
						<p>We've fulfilled our promise to take you to destination for pre-agreed Total Fare. Modifying the drop/route can change this fare.</p>
					</div>
				</div>
			</div>
		</div>
		<!-- row-->
		<!-- row-->
		<br/>
		<div class="row">
			<div class="col-xs-6">
				<div class="row">
					<div class="col-xs-2 plr-3">
						<img class="img-circle" src="https://static.thenounproject.com/png/17241-200.png" width="90px">
					</div>
					<div class="col-xs-10 plr-3">
						<h4 style="">{{$culist['userInfo']['fullname']}}</h4>
						@php 
                         $firsth=\App\Vehicle_list::where('id', $blist['vehicleInfo']['vehicle_type_id'])->first();
						@endphp
						<img src="https://mythela.com/img/fleet/prime.png" width="50px" style="display: none;"> {{$firsth['name']}}
					</div>
				</div>
			</div>
		</div>
		<!-- row-->
		<br/>
		<div class="row">
			<div class="col-xs-6">
				<div class="row">
					<div class="col-xs-3">
						<b>{{date('d M Y h:i A', strtotime($blist['created_at']))}}</b>
					</div>
					<div class="col-xs-9">
						{{addr_ltln($culist['picup_lat'], $culist['picup_long'])}}
					</div>
				</div>
			</div>
		</div>
		<!-- row-->
		<br/>
		<div class="row">
			<div class="col-xs-6">
				<div class="row">
					<div class="col-xs-3">
						<b>{{date('d M Y h:i A', strtotime($blist['updated_at']))}}</b>
					</div>
					<div class="col-xs-9">
						{{addr_ltln($culist['drop_lat'], $culist['drop_long'])}}
					</div>
				</div>
			</div>
		</div>
		<!-- row-->
		<div class="page-break"></div>
		<div class="container">
			<br/>
			<div class="row">
				<div class="col-xs-12 text-center">
					<h3><u>Origional Tax Invoice</u></h3>
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-xs-6" style="margin-bottom:100px">
					<h4>Transport Invoice</h4>
					<div class="row">
						<div class="col-xs-12">
							<img class="img-circle p5" src="https://static.thenounproject.com/png/17241-200.png" width="50px">
							<p style="margin-top:-60px;margin-left:60px">{{$blist['driverInfo']['fullname']}}<br/>
								{{$blist['vehicleInfo']['type']}}<br/>
								{{$blist['vehicleInfo']['vehicle_num']}}<br/>
								State : {{ \App\State::where('id', $blist['driverInfo']['state_id'])->pluck('name')->first() }}
								<br/>
								City  : {{ \App\City::where('id', $blist['driverInfo']['city_id'])->pluck('name')->first() }}
							</p>
						</div>
					</div>
				</div>
				<div class="col-xs-6 text-right">
					<div><b>Service Tax Category</b> : Renting of motor</div>
					<div>cab</div>
					<div><b>SAC Code</b> : 4343434</div>
				</div>
			</div>
			<!-- row-->
			<div class="row ptb10 btb">
				<div class="col-xs-6">
					<b>Invoice ID</b> : HIOHGVB&^T*YGF
				</div>
				<div class="col-xs-6 text-right">
					<b>Invoice Date</b> : 34/34/3434
				</div>
			</div>
			<!-- row-->
			<div class="row ptb10 bb">
				<div class="col-xs-6">
					<b>Customer Name</b> : {{$culist['userInfo']['fullname']}}
				</div>
				<div class="col-xs-6 text-right">
					<b>Mobile Number</b> : {{$culist['userInfo']['mobile']}}
				</div>
			</div>
			<!-- row-->
			<div class="row ptb10 bb">
				<div class="col-xs-6">
					<b>Address</b> : {{addr_ltln($culist['drop_lat'], $culist['drop_long'])}}
				</div>
			</div>
			<!-- row-->
			<div class="row ptb10 bb">
				<div class="col-xs-6">
					<b>Description</b>
				</div>
				<div class="col-xs-6 text-right">
					<b>Amount (INR)</b>
				</div>
			</div>
			<!-- row-->
			<div class="row ptb10 bb">
				<div class="col-xs-12">
					<b>Customer Ride Number : 7c7c7c7c7c7c7c</b>
				</div>
			</div>
			<!-- row-->
			<div class="row ptb10">
				<div class="col-xs-6">
					Base Fare
				</div>
				<div class="col-xs-6 text-right">
					<img src="https://cdn3.iconfinder.com/data/icons/indian-rupee-symbol/800/Indian_Rupee_symbol.png" width="16"> {{$blist['price']}}
				</div>
			</div>
			<!-- row-->
			<div class="row ptb10">
				<div class="col-xs-6">
					CGST
				</div>
				<div class="col-xs-6 text-right">
					<img src="https://cdn3.iconfinder.com/data/icons/indian-rupee-symbol/800/Indian_Rupee_symbol.png" width="16"> {{$blist['pafter_cgst_price']}}
				</div>
			</div>
			<!-- row-->
			<div class="row ptb10">
				<div class="col-xs-6">
					SGST
				</div>
				<div class="col-xs-6 text-right">
					<img src="https://cdn3.iconfinder.com/data/icons/indian-rupee-symbol/800/Indian_Rupee_symbol.png" width="16"> {{$blist['pafter_sgst_price']}}
				</div>
			</div>
			<!-- row-->
			<div class="row ptb10 bb">
				<div class="col-xs-6">
					Subtotal
				</div>
				<div class="col-xs-6 text-right">
					<img src="https://cdn3.iconfinder.com/data/icons/indian-rupee-symbol/800/Indian_Rupee_symbol.png" width="16"> {{$blist['price']+$blist['pafter_cgst_price']+$blist['pafter_sgst_price']}}
				</div>
			</div>
			<!-- row-->
			<div class="row ptb10 bb">
				<div class="col-xs-6">
					<b>Total</b>
				</div>
				<div class="col-xs-6 text-right">
					<b><img src="https://cdn3.iconfinder.com/data/icons/indian-rupee-symbol/800/Indian_Rupee_symbol.png" width="16"> {{$blist['price']+$blist['pafter_cgst_price']+$blist['pafter_sgst_price']}}</b>
				</div>
			</div>
			<!-- row-->
		</div>
		<div class="page-break"></div>
		<div class="container">
			<br/>
			<div class="row">
				<div class="col-xs-12 text-center">
					<h3><u>Origional Tax Invoice</u></h3>
				</div>
			</div>
			<br/>
			<div class="row ptb10">
				<div class="col-xs-6">
					<img src="https://mythela.com/img/giphy.gif" height="57px" style="padding:8px;"><br/>
					<b>RJM Enterprises Pvt. Ltd.</b><br/>
					c-212 1Address 1 1 es dshvbjdshjgvbdswjhvbgfdbh f sdfsdfsd fsd f sdf dsfdsd <br/>
					121212
				</div>
				<div class="col-xs-6 text-right">
					<br/>
					<div><b>State GSTIN</b> : FGTGFGGHGFGFHG</div>
					<div><b>SAC Code</b> : 4343434</div>
					<div><b>Service Tax Category</b> : Business Auxiliary</div>
					<div>Service</div>
				</div>
			</div>
			<!-- row-->
			<div class="row ptb10 btb">
				<div class="col-xs-6">
					<b>Invoice ID</b> : HIOHGVB&^T*YGF
				</div>
				<div class="col-xs-6 text-right">
					<b>Invoice Date</b> : {{date('d M Y', strtotime($blist['updated_at']))}}
				</div>
			</div>
			<!-- row-->
			<div class="row ptb10 bb">
				<div class="col-xs-6">
					<b>Customer Name</b> : {{$culist['userInfo']['fullname']}}
				</div>
				<div class="col-xs-6 text-right">
					<b>Mobile Number</b> : +91 2342342344
				</div>
			</div>
			<!-- row-->
			<div class="row ptb10 bb">
				<div class="col-xs-6">
					<b>Address</b> : {{addr_ltln($culist['drop_lat'], $culist['drop_long'])}}
				</div>
			</div>
			<!-- row-->
			<div class="row ptb10 bb">
				<div class="col-xs-6">
					<b>Description</b>
				</div>
				<div class="col-xs-6 text-right">
					<b>Amount (INR)</b>
				</div>
			</div>
			<!-- row-->
			<div class="row ptb10 bb">
				<div class="col-xs-12">
					<b>Convenience Fee : CRN1287878878</b>
				</div>
			</div>
			<!-- row-->
			<div class="row ptb10">
				<div class="col-xs-6">
					Convenience Fee (Transportation)
				</div>
				<div class="col-xs-6 text-right">
					<img src="https://cdn3.iconfinder.com/data/icons/indian-rupee-symbol/800/Indian_Rupee_symbol.png" width="16"> {{$blist['after_commission_price']}}
				</div>
			</div>
			<!-- row-->
			<div class="row ptb10">
				<div class="col-xs-6">
					CGST
				</div>
				<div class="col-xs-6 text-right">
					<img src="https://cdn3.iconfinder.com/data/icons/indian-rupee-symbol/800/Indian_Rupee_symbol.png" width="16"> {{$blist['after_cgst_price']}}
				</div>
			</div>
			<!-- row-->
			<div class="row ptb10">
				<div class="col-xs-6">
					SGST
				</div>
				<div class="col-xs-6 text-right">
					<img src="https://cdn3.iconfinder.com/data/icons/indian-rupee-symbol/800/Indian_Rupee_symbol.png" width="16"> {{$blist['after_sgst_price']}}
				</div>
			</div>
			<!-- row-->
			<div class="row ptb10 btb">
				<div class="col-xs-6">
					<b>Total</b>
				</div>
				<div class="col-xs-6 text-right">
					<b><img src="https://cdn3.iconfinder.com/data/icons/indian-rupee-symbol/800/Indian_Rupee_symbol.png" width="16"> {{$blist['after_commission_price']+$blist['after_cgst_price']+$blist['after_sgst_price']}}</b>
				</div>
			</div>
			<!-- row-->
			<div class="row ptb10">
				<div class="col-xs-12">
					<b>Authorised Signatory</b><br/>
					<img src="https://cdn.pixabay.com/photo/2014/11/09/08/06/signature-523237__340.jpg" height="120px">
				</div>
			</div>
			<!-- row-->
		</div>
	</body>
	</html>