<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Thela</title>
        <link rel="shortcut icon" href="img/fav.png" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include'links.php' ?>
    </head>
	<?php include'loader.php' ?>
        <style>
            body{background-image:url(img/bg/bg3.jpg);}
        </style>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-12 text-center">
                    <!-- book now-->
						<div class="row book-row">
						<div class="col-xs-3 text-left">
							<i class="fa fa-2x fa-bars" data-toggle="modal" data-target="#myModal"></i>
						</div>
						<div class="col-xs-6 text-center">
						<a href="index.php"><img src="img/giphy.gif" height="45px"></a>
						</div>
						<div class="col-xs-3 text-right">
						<!--if user is not login-->
						<!--<a class="login-link" href="login.php">LOGIN</a>-->
						<a class="login-link" href="profile.php"><i class="fa fa-user-circle-o" style="font-size:20px;"></i></a>
						</div>
						</div>
                    <!-- ends-->
					<div class="my-form">
					<div class="row frm1">
 


                                <div class="scrollmenu">
                                  <a class="incity" href="book-now.php"><span class="">INCITY</span></a>
                                  <a class="outcity" href="book-outstation.php"><span class="active-btn">OUTCITY</span></a>
                                  <a class="transport" href="book-logistics.php"><span class="">TRANSPORT</span></a>
                                  <a class="rentals" href="book-rentals.php"><span class="">RENTALS</span></a>
                                </div> 


  </div>
  <!--outstation starts-->
 <div class="outstep1">
                            <div class="row">
                              
                               
                                <div class="frm2">
                                    <h4 class="frm1-head">Your everyday travel partner</h4>
                                    AC Cabs for point to point travel
                                </div>
                            </div>
                            <div class="text-left">
                                <div class="pickup pickup-out row">
                                    <div class="pic-span col-xs-2">PICKUP</div>
                                    <div class="con-span col-xs-10"><input class="whenselect" type="text" placeholder="Enter pickup location"></div>
                                </div>
                                <div class="drop drop-out row">
                                    <div class="pic-span col-xs-2">DROP</div>
                                    <div class="con-span col-xs-10"><input class="whenselect" type="text" placeholder="Enter drop location"></div>
                                </div>
                                <div class="when row">
                                    <div class="pic-span col-xs-2">WHEN</div>
                                    <div class="con-span col-xs-10">
                                        <select class="whenselect" id="out-sch"  onclick="craateUserJsObject.ShowPrivileges();">
                                            <option>Now</option>
                                            <option value="schedule">Schedule for later</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row depart depart-out" style="display:none;">
                                    <div class="pic-span col-xs-2">DEPART</div>
                                    <div class="con-span col-xs-5">
                                        <select class="whenselect">
                                            <option>Today</option>
                                        </select>
                                    </div>
                                    <div class="con-span col-xs-5">
                                        <select class="whenselect">
                                            <option>12:00 AM</option>
                                            <option>12:15 AM</option>
                                            <option>12:30 AM</option>
                                            <option>12:45 AM</option>
                                            <option>01:00 AM</option>
                                            <option>01:15 AM</option>
                                            <option>01:30 AM</option>
                                            <option>01:45 AM</option>
                                            <option>02:00 AM</option>
                                            <option>02:15 AM</option>
                                            <option>02:30 AM</option>
                                            <option>02:45 AM</option>
                                            <option>03:00 AM</option>
                                            <option>03:15 AM</option>
                                            <option>03:30 AM</option>
                                            <option>03:45 AM</option>
                                            <option>04:00 AM</option>
                                            <option>04:15 AM</option>
                                            <option>04:30 AM</option>
                                            <option>04:45 AM</option>
                                            <option>05:00 AM</option>
                                            <option>05:15 AM</option>
                                            <option>05:30 AM</option>
                                            <option>05:45 AM</option>
                                            <option>06:00 AM</option>
                                            <option>07:15 AM</option>
                                            <option>07:30 AM</option>
                                            <option>07:45 AM</option>
                                            <option>08:00 AM</option>
                                            <option>08:15 AM</option>
                                            <option>08:30 AM</option>
                                            <option>08:45 AM</option>
                                            <option>09:00 AM</option>
                                            <option>09:15 AM</option>
                                            <option>09:30 AM</option>
                                            <option>09:45 AM</option>
                                            <option>10:00 AM</option>
                                            <option>10:15 AM</option>
                                            <option>10:30 AM</option>
                                            <option>10:45 AM</option>
                                            <option>11:00 AM</option>
                                            <option>11:15 AM</option>
                                            <option>11:30 AM</option>
                                            <option>11:45 AM</option>
                                            <option>12:00 PM</option>
                                            <option>12:15 PM</option>
                                            <option>12:30 PM</option>
                                            <option>12:45 PM</option>
                                            <option>01:00 PM</option>
                                            <option>01:15 PM</option>
                                            <option>01:30 PM</option>
                                            <option>01:45 PM</option>
                                            <option>02:00 PM</option>
                                            <option>02:15 PM</option>
                                            <option>02:30 PM</option>
                                            <option>02:45 PM</option>
                                            <option>03:00 PM</option>
                                            <option>03:15 PM</option>
                                            <option>03:30 PM</option>
                                            <option>03:45 PM</option>
                                            <option>04:00 PM</option>
                                            <option>04:15 PM</option>
                                            <option>04:30 PM</option>
                                            <option>04:45 PM</option>
                                            <option>05:00 PM</option>
                                            <option>05:15 PM</option>
                                            <option>05:30 PM</option>
                                            <option>05:45 PM</option>
                                            <option>06:00 PM</option>
                                            <option>07:15 PM</option>
                                            <option>07:30 PM</option>
                                            <option>07:45 PM</option>
                                            <option>08:00 PM</option>
                                            <option>08:15 PM</option>
                                            <option>08:30 PM</option>
                                            <option>08:45 PM</option>
                                            <option>09:00 PM</option>
                                            <option>09:15 PM</option>
                                            <option>09:30 PM</option>
                                            <option>09:45 PM</option>
                                            <option>10:00 PM</option>
                                            <option>10:15 PM</option>
                                            <option>10:30 PM</option>
                                            <option>10:45 PM</option>
                                            <option>11:00 PM</option>
                                            <option>11:15 PM</option>
                                            <option>11:30 PM</option>
                                            <option>11:45 PM</option>
                                        </select>
                                    </div>
                                </div>
                                <script>
                                    var Privileges = jQuery('#out-sch');
                                    var select = this.value;
                                    Privileges.change(function () {
                                     if ($(this).val() == 'schedule') {
                                         $('.depart-out').show();
                                     }
                                     else $('.depart-out').hide(); // hide div if value is not "custom"
                                    });
                                </script>
                                <div class="when row">
                                    <div class="pic-span col-xs-2">JOURNEY</div>
                                    <div class="con-span col-xs-10">
                                        <select class="whenselect" id="depart-out2"  onclick="craateUserJsObject.ShowPrivileges();">
                                            <option>One Way</option>
                                            <option value="schedule2">Round Trip</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="depart row depart-out2" style="display:none;">
                                    <div class="pic-span col-xs-2">RETURN</div>
                                    <div class="con-span col-xs-5">
                                        <select class="whenselect">
                                            <option>Today</option>
                                        </select>
                                    </div>
                                    <div class="con-span col-xs-5">
                                        <select class="whenselect">
                                            <option>12:00 AM</option>
                                            <option>12:15 AM</option>
                                            <option>12:30 AM</option>
                                            <option>12:45 AM</option>
                                            <option>01:00 AM</option>
                                            <option>01:15 AM</option>
                                            <option>01:30 AM</option>
                                            <option>01:45 AM</option>
                                            <option>02:00 AM</option>
                                            <option>02:15 AM</option>
                                            <option>02:30 AM</option>
                                            <option>02:45 AM</option>
                                            <option>03:00 AM</option>
                                            <option>03:15 AM</option>
                                            <option>03:30 AM</option>
                                            <option>03:45 AM</option>
                                            <option>04:00 AM</option>
                                            <option>04:15 AM</option>
                                            <option>04:30 AM</option>
                                            <option>04:45 AM</option>
                                            <option>05:00 AM</option>
                                            <option>05:15 AM</option>
                                            <option>05:30 AM</option>
                                            <option>05:45 AM</option>
                                            <option>06:00 AM</option>
                                            <option>07:15 AM</option>
                                            <option>07:30 AM</option>
                                            <option>07:45 AM</option>
                                            <option>08:00 AM</option>
                                            <option>08:15 AM</option>
                                            <option>08:30 AM</option>
                                            <option>08:45 AM</option>
                                            <option>09:00 AM</option>
                                            <option>09:15 AM</option>
                                            <option>09:30 AM</option>
                                            <option>09:45 AM</option>
                                            <option>10:00 AM</option>
                                            <option>10:15 AM</option>
                                            <option>10:30 AM</option>
                                            <option>10:45 AM</option>
                                            <option>11:00 AM</option>
                                            <option>11:15 AM</option>
                                            <option>11:30 AM</option>
                                            <option>11:45 AM</option>
                                            <option>12:00 PM</option>
                                            <option>12:15 PM</option>
                                            <option>12:30 PM</option>
                                            <option>12:45 PM</option>
                                            <option>01:00 PM</option>
                                            <option>01:15 PM</option>
                                            <option>01:30 PM</option>
                                            <option>01:45 PM</option>
                                            <option>02:00 PM</option>
                                            <option>02:15 PM</option>
                                            <option>02:30 PM</option>
                                            <option>02:45 PM</option>
                                            <option>03:00 PM</option>
                                            <option>03:15 PM</option>
                                            <option>03:30 PM</option>
                                            <option>03:45 PM</option>
                                            <option>04:00 PM</option>
                                            <option>04:15 PM</option>
                                            <option>04:30 PM</option>
                                            <option>04:45 PM</option>
                                            <option>05:00 PM</option>
                                            <option>05:15 PM</option>
                                            <option>05:30 PM</option>
                                            <option>05:45 PM</option>
                                            <option>06:00 PM</option>
                                            <option>07:15 PM</option>
                                            <option>07:30 PM</option>
                                            <option>07:45 PM</option>
                                            <option>08:00 PM</option>
                                            <option>08:15 PM</option>
                                            <option>08:30 PM</option>
                                            <option>08:45 PM</option>
                                            <option>09:00 PM</option>
                                            <option>09:15 PM</option>
                                            <option>09:30 PM</option>
                                            <option>09:45 PM</option>
                                            <option>10:00 PM</option>
                                            <option>10:15 PM</option>
                                            <option>10:30 PM</option>
                                            <option>10:45 PM</option>
                                            <option>11:00 PM</option>
                                            <option>11:15 PM</option>
                                            <option>11:30 PM</option>
                                            <option>11:45 PM</option>
                                        </select>
                                    </div>
                                </div>
                                <script>
                                    var Privileges = jQuery('#depart-out2');
                                    var select = this.value;
                                    Privileges.change(function () {
                                     if ($(this).val() == 'schedule2') {
                                         $('.depart-out2').show();
                                     }
                                     else $('.depart-out2').hide(); // hide div if value is not "custom"
                                    });
                                </script>
                            </div>
                            
							</div>
							<!-- step 1 ends -->
							<div class="outstep2" style="display:none;">
							
							
							<div class="back2 back2out"><i class="fa fa-long-arrow-left"></i></div>
							<h4 class="frm1-head">Enter Pickup Location</h4>
							<div class="inner-addon left-addon">
								<i class="glyphicon glyphicon-search"></i>
								<input type="text" id="picuploc" class="height40 form-control" placeholder="Enter picup location" />
							</div>
							
							</div>
							<!-- step 2 ends -->
							<div class="outstep3" style="display:none;">
							<div class="back2 back2out"><i class="fa fa-long-arrow-left"></i></div>
							
							<h4 class="frm1-head">Enter Drop Location</h4>
							<div class="inner-addon left-addon">
								<i class="glyphicon glyphicon-search"></i>
								<input type="text" id="droploc" class="height40 form-control" placeholder="Enter drop location"/>
							</div>
							
							</div>
							<!-- step 3 ends -->
							<!--map starts-->
							<div class="map-out" style="display:none;">
								<img src="img/map.png" height="200px" width="100%">
								<button class="btn btn-skin btn-block confirm-loc-out">Confirm Location</button>
								<div class="inner-addon left-addon current-out" style="display:none;">
									<i class="glyphicon glyphicon-screenshot"></i>
									<button onClick="getLocation();" class="height40 current" >Current Location</button>
								</div>
							</div>
                        <!--map ends-->
							<script>
								$(document).ready(function(){
									$(".pickup-out").click(function(){ 
									   $(".outstep1").css("display", "none");
									   $(".outstep2").css("display", "block");
									   $(".outstep3").css("display", "none");
									   $(".map-out").css("display", "block");
									   $(".current-out").css("display", "block");
									});
									$(".drop-out").click(function(){
									   $(".outstep1").css("display", "none");
									   $(".outstep3").css("display", "block");
									   $(".outstep2").css("display", "none");
									   $(".map-out").css("display", "block");
									   $(".current-out").css("display", "none");
									});
									$(".back2out").click(function(){
									   $(".outstep1").css("display", "block");
									   $(".outstep2").css("display", "none");
									   $(".outstep3").css("display", "none");
									   $(".map-out").css("display", "none");
									   $(".current-out").css("display", "none");
									});
									$(".current-out").click(function(){
										$(".outstep1").css("display", "block");
										$(".outstep2").css("display", "none");
										$(".outstep3").css("display", "none");
										$(".map-out").css("display", "none");
										$(".current-out").css("display", "none");
									});
									$(".confirm-loc-out").click(function(){
										$(".outstep1").css("display", "block");
										$(".outstep2").css("display", "none");
										$(".outstep3").css("display", "none");
										$(".map-out").css("display", "none");
										$(".current-out").css("display", "none");
									});
									$(".fleet-row").click(function(){
										location.href = "confirm-booking.php";
									});
								});
                            </script> 
							<!--out station ends-->
  
  </div> 
  <!-- my form ends--->

<h6> : AVAILABLE RIDES :</h6>


 <div class="fleet-row card row">
	<div class="col-xs-2 fl text-center"><img class="fleet-img" src="img/fleet/auto.png"><br/><div class="fleet-time">5 mins</div></div>
	<div class="col-xs-9 fl">
		<span class="fleet-name">Auto</span>
		<span class="fleet-price"><i class="fa fa-inr"></i>600 - <i class="fa fa-inr"></i>660 </span><br/>
	    <span class="fleet-tag">Get an Auto at your doorstep</span>
	</div>
	<div class="col-xs-1 fl"><i class="fa fa-angle-right fleet-proceed-icon"></i></div>
 </div>
 
  <div class="fleet-row card row">
	<div class="col-xs-2 fl text-center"><img class="fleet-img" src="img/fleet/bike.png"><br/><div class="fleet-time">5 mins</div></div>
	<div class="col-xs-9 fl">
		<span class="fleet-name">Bike</span>
		<span class="fleet-price"><i class="fa fa-inr"></i>60 - <i class="fa fa-inr"></i>70 </span><br/>
	    <span class="fleet-tag">Beat the traffic with bike</span>
	</div>
	<div class="col-xs-1 fl"><i class="fa fa-angle-right fleet-proceed-icon"></i></div>
 </div>
 
   <div class="fleet-row card row">
	<div class="col-xs-2 fl text-center"><img class="fleet-img" src="img/fleet/micro.png"><br/><div class="fleet-time">5 mins</div></div>
	<div class="col-xs-9 fl">
		<span class="fleet-name">Micro</span>
		<span class="fleet-price"><i class="fa fa-inr"></i>600 - <i class="fa fa-inr"></i>660 </span><br/>
	    <span class="fleet-tag">Small fares for short rides</span>
	</div>
	<div class="col-xs-1 fl"><i class="fa fa-angle-right fleet-proceed-icon"></i></div>
 </div>
  
   <div class="fleet-row card row">
	<div class="col-xs-2 fl text-center"><img class="fleet-img" src="img/fleet/mini.png"><br/><div class="fleet-time">5 mins</div></div>
	<div class="col-xs-9 fl">
		<span class="fleet-name">Mini</span>
		<span class="fleet-price"><i class="fa fa-inr"></i>600 - <i class="fa fa-inr"></i>660 </span><br/>
	    <span class="fleet-tag">Get an Auto at your doorstep</span>
	</div>
	<div class="col-xs-1 fl"><i class="fa fa-angle-right fleet-proceed-icon"></i></div>
 </div>
  <!--item-->
   <div class="fleet-row card row">
	<div class="col-xs-2 fl text-center"><img class="fleet-img" src="img/fleet/prime.png"><br/><div class="fleet-time">5 mins</div></div>
	<div class="col-xs-9 fl">
		<span class="fleet-name">Prime</span>
		<span class="fleet-price"><i class="fa fa-inr"></i>600 - <i class="fa fa-inr"></i>660 </span><br/>
	    <span class="fleet-tag">Get an Auto at your doorstep</span>
	</div>
	<div class="col-xs-1 fl"><i class="fa fa-angle-right fleet-proceed-icon"></i></div>
 </div>
  <!--item-->
   <div class="fleet-row card row">
	<div class="col-xs-2 fl text-center"><img class="fleet-img" src="img/fleet/prime-play.png"><br/><div class="fleet-time">5 mins</div></div>
	<div class="col-xs-9 fl">
		<span class="fleet-name">Prime Play</span>
		<span class="fleet-price"><i class="fa fa-inr"></i>800 - <i class="fa fa-inr"></i>960 </span><br/>
	    <span class="fleet-tag">Get an Auto at your doorstep</span>
	</div>
	<div class="col-xs-1 fl"><i class="fa fa-angle-right fleet-proceed-icon"></i></div>
 </div>
  <!--item-->
   <div class="fleet-row card row">
	<div class="col-xs-2 fl text-center"><img class="fleet-img" src="img/fleet/share.png"><br/><div class="fleet-time">5 mins</div></div>
	<div class="col-xs-9 fl">
		<span class="fleet-name">Share</span>
		<span class="fleet-price"><i class="fa fa-inr"></i>600 - <i class="fa fa-inr"></i>660 </span><br/>
	    <span class="fleet-tag">Get an Auto at your doorstep</span>
	</div>
	<div class="col-xs-1 fl"><i class="fa fa-angle-right fleet-proceed-icon"></i></div>
 </div>
  <!--item-->
   <div class="fleet-row card row">
	<div class="col-xs-2 fl text-center"><img class="fleet-img" src="img/fleet/suv.jpg"><br/><div class="fleet-time">5 mins</div></div>
	<div class="col-xs-9 fl">
		<span class="fleet-name">Prime SUV</span>
		<span class="fleet-price"><i class="fa fa-inr"></i>600 - <i class="fa fa-inr"></i>660 </span><br/>
	    <span class="fleet-tag">Get an Auto at your doorstep</span>
	</div>
	<div class="col-xs-1 fl"><i class="fa fa-angle-right fleet-proceed-icon"></i></div>
 </div>
  <!--item-->
   <div class="fleet-row card row">
	<div class="col-xs-2 fl text-center"><img class="fleet-img" src="img/fleet/lux.png"><br/><div class="fleet-time">5 mins</div></div>
	<div class="col-xs-9 fl">
		<span class="fleet-name">LUX</span>
		<span class="fleet-price"><i class="fa fa-inr"></i>600 - <i class="fa fa-inr"></i>660 </span><br/>
	    <span class="fleet-tag">Get an Auto at your doorstep</span>
	</div>
	<div class="col-xs-1 fl"><i class="fa fa-angle-right fleet-proceed-icon"></i></div>
 </div>
  <!--item-->
   <div class="fleet-row card row">
	<div class="col-xs-2 fl text-center"><img class="fleet-img" src="img/fleet/erick.jpg"><br/><div class="fleet-time">5 mins</div></div>
	<div class="col-xs-9 fl">
		<span class="fleet-name">eRick</span>
		<span class="fleet-price"><i class="fa fa-inr"></i>600 - <i class="fa fa-inr"></i>660 </span><br/>
	    <span class="fleet-tag">Get an Auto at your doorstep</span>
	</div>
	<div class="col-xs-1 fl"><i class="fa fa-angle-right fleet-proceed-icon"></i></div>
 </div>

 
  </div><!-- main mobile column ends -->
					
					
					
               
                <div class="col-md-8 hidden-sm hidden-xs right-desk2 right-desk-gen">
                    <div class="right-desk-content">
                        <h3 class="white">We are always ready to help you.</h3>
                        # My Thela For Web
                    </div>
                </div>
            </div>
        </div>
		
		
		
		<!-- Modal -->
	<div class="modal left fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<br/><br/>
					<div class="top-menu">
					<a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
					</div>
					<div class="top-menu">
					<a href="profile.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> My Account</a>
					</div>
                        <div class="top-menu">
                            <a href="bid-results.php"><i class="fa fa-truck" aria-hidden="true"></i> Bid Results <small>(Logistics)</small></a>
                        </div>
					<div class="top-menu">
					<a href="mybookings.php"><i class="fa fa-cab" aria-hidden="true"></i> My Bookings</a>
					</div>
					<div class="top-menu">
					<a href="#" id="logout" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>
					
					</div>
				
					
					<div class="bottom-div">
					<div class="row bot-row"><div class="col-xs-6 text-left"><a target="_blank" href="terms-of-service.php">Terms Of Service</a></div><div class=" col-xs-6 text-right"> &copy; 2019</div></div>
					
					<div class="dwnld-app"><i class="fa fa-download" aria-hidden="true"></i> Download App</div></div>
					
				</div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
	<?php include'logout.php'?>
	<script>
	$(document).ready(function(){
		$("#logout").click(function(){
	$('#myModal').modal('hide');
	});
	});
	</script>
	
<style>
							.inner-addon { 
    position: relative;     margin: 8px 0;
}
.powered{background-color:rgba(255,255,255,0.7);padding:10px;    border-radius: 4px;}
/* style icon */
.inner-addon .glyphicon {
  position: absolute;
  padding: 11px;
    font-size: 17px;
  pointer-events: none;
  color:#000;
}

/* align icon */
.left-addon .glyphicon  { left:  0px;}
.right-addon .glyphicon { right: 0px;}

/* add padding  */
.left-addon input  { padding-left:  35px; }
.right-addon input { padding-right: 30px; }
.height40{height:40px; background-color:rgba(255,255,255,0.7);width:100%;color:#000;border-radius: 6px;border-width: 1px;}
</style>
		<style>
		.top-menu{padding:7px;margin-bottom:6px;width:100%;background-color:rgba(0,0,0,0.6);}
		.top-menu a{color:#fff;text-decoration:none !important;}
		.dwnld-app{background-color:rgba(0,0,0,0.6);color:#fff;text-align:center;padding:10px 0px;font-size:16px;}
		.bottom-div{position:fixed;bottom:0px;left:0px;width:100%;}
		.bot-row{padding:10px;}
			.modal.left .modal-dialog,
	.modal.right .modal-dialog {
		position: fixed;
		margin: auto;
		width: 300px;
		height: 100%;
		-webkit-transform: translate3d(0%, 0, 0);
		    -ms-transform: translate3d(0%, 0, 0);
		     -o-transform: translate3d(0%, 0, 0);
		        transform: translate3d(0%, 0, 0);
	}

	.modal.left .modal-content,
	.modal.right .modal-content {
		height: 100%;
		overflow-y: auto;
	}
	
	.modal.left .modal-body,
	.modal.right .modal-body {
		padding: 15px 15px 80px;
	}

/*Left*/
	.modal.left.fade .modal-dialog{
		left: -300px;
		-webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, left 0.3s ease-out;
		        transition: opacity 0.3s linear, left 0.3s ease-out;
	}
	
	.modal.left.fade.in .modal-dialog{
		left: 0;
	}
        


/* ----- MODAL STYLE ----- */
	.modal-content {
		border-radius: 0;
		border: none;
	}

</style>
		
		
		
    </body>
</html>