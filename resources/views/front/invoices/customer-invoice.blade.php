<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ogonn : Invoice</title>
  <meta charset="utf-8">
  <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body style=" font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
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
</style>
  <div class="container">

    <div class="row">
        <div class="col-xs-12 text-center">
			<h4 style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif;"><u>Origional Tax Invoice</u></h4>
        </div>
    </div>
	<br/>
	<table style="width:100%;">
	    <tr>
	        <td style="width:50%;">
	            <h4 style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">Transport Invoice</h4>
	            <div class="row">
				<div class="col-xs-2">

				    <img src="https://mythela.com/img/users-pic/{{ @$blist['driverInfo']['profile_pic'] }}" width="60px" height="60px">

				</div>
				<div class="col-xs-10">
					{{$blist['driverInfo']['fullname']}}<br/>
					{{$blist['vehicleInfo']['type']}}<br/>
					{{$blist['vehicleInfo']['vehicle_num']}}
				</div>
			</div>
	        </td>
	        <td style="width:50%;text-align:right;">
	            <div><b>Service Tax Category</b> : Logistics</div>
			<!-- <div>cab</div> -->
			<div><b>SAC Code</b> : N/A</div>
	            
	        </td>
	    </tr>
	    <tr><td colspan="2"><hr style="margin:4px 0px;"></td></tr>
	    <tr>
	        <td style="width:50%;">
	            <b>Invoice ID</b> : {{rand()}}
	        </td>
	        <td style="width:50%;text-align:right;">
	            <b>Invoice Date</b> : {{date('d M Y')}}
	        </td>
	    </tr>
	     <tr><td colspan="2"><hr style="margin:4px 0px;"></td></tr>
	     <tr>
	        <td style="width:50%;">
	           <b>Customer Name</b> : {{$culist['userInfo']['fullname']}}
	        </td>
	        <td style="width:50%;text-align:right;">
	            <b>Mobile Number</b> :  {{$culist['userInfo']['mobile']}}
	        </td>
	    </tr>
	    <tr><td colspan="2"><hr style="margin:4px 0px;"></td></tr>
	    <tr>
	        <td colspan="2">
	           <b>Address</b> : {{addr_ltln($culist['picup_lat'], $culist['picup_long'])}}
	        </td>
	    </tr>
	    <tr><td colspan="2"><hr style="margin:4px 0px;"></td></tr>
	    <tr>
	        <td style="width:50%;">
	          <b>Description</b>
	        </td>
	        <td style="width:50%;text-align:right;">
	            <b>Amount (INR)</b>
	        </td>
	    </tr>
	    <tr><td colspan="2"><hr style="margin:4px 0px;"></td></tr>
	    <tr>
	        <td colspan="2">
	           <b>Customer Ride Number : N/A</b>
	        </td>
	    </tr>
	   <tr><td colspan="2"><hr style="margin:4px 0px;"></td></tr>
	    <tr>
	        <td style="width:50%;">
	        Base Fare
	        </td>
	        <td style="width:50%;text-align:right;">
	           &#8377; {{number_format($blist['price']+$blist['after_commission_price'], 2)}}
	        </td>
	    </tr>
	    <tr>
	        <td style="width:50%;">
    	        CGST
	        </td>
	        <td style="width:50%;text-align:right;">
	           	&#8377; {{number_format($blist['after_cgst_price'], 2)}}
	        </td>
	    </tr>
	    <tr>
	        <td style="width:50%;">
    	        SGST
	        </td>
	        <td style="width:50%;text-align:right;">
	           	&#8377; {{number_format($blist['after_sgst_price'], 2)}}
	        </td>
	    </tr>
	    	@if($culist['insurance_price'])
	    <tr>
	        <td style="width:50%;">
    	        Insurance
	        </td>
	        <td style="width:50%;text-align:right;">
	           	&#8377; {{number_format($culist['insurance_price'], 2)}}
	        </td>
	    </tr>
	    @endif
	    <tr>
	        <td style="width:50%;">
    	      	Subtotal
	        </td>
	        <td style="width:50%;text-align:right;">
	           &#8377; {{number_format($blist['price']+$blist['after_commission_price']+$blist['after_sgst_price']+$blist['after_cgst_price']+$culist['insurance_price'], 2)}}
	        </td>
	    </tr>
	    <tr><td colspan="2"><hr style="margin:4px 0px;"></td></tr>
	     <tr>
	        <td style="width:50%;">
    	      	<b>Total</b>
	        </td>
	        <td style="width:50%;text-align:right;">
	           <b>&#8377; {{number_format($blist['price']+$blist['after_commission_price']+$blist['after_sgst_price']+$blist['after_cgst_price']+$culist['insurance_price'], 2)}}</b>
	        </td>
	    </tr>
	    <tr><td colspan="2"><hr style="margin:4px 0px;"></td></tr>
	</table>

	<!-- row-->
	<div class="row ptb10">
        <div class="col-xs-12">
			<b>Authorised Signatory</b><br/>
			<img src="http://www.mtel-kh.com/wp-content/uploads/2012/01/blue-signature.png" height="130px">
		</div>
	</div>
	<!-- row-->
	<div class="row ptb10">
        <div class="col-xs-12">
			<p style="font-size:11px;">
			Please note: 1. This invoice is issued on behalf of Transport Service Provider. RJM Enterprices Private Limited acts in the capacity of an Electronic Commerce Operator as per Section 9(5) of the Central Goods & Service Tax Act, 2017 & corresponding Section 5(5) of the State GST laws. 2. This invoice has been signed by the authorised signatory of  RJM Enterprices Private Limited only limited purposes of complying as an Electronic Commerce Operator.
			</p>
		</div>
	</div>
	<!-- row-->
	
  
  </div>
</body>
</html>