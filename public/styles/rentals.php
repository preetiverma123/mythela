<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ogonn</title>
  <link rel="shortcut icon" href="img/fav.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <?php include'links.php' ?>

</head>
<body>
    <?php include'loader.php' ?>
<?php include'header.php' ?>


<div class="banner-bg4 jumbotron">
  <div class="container text-center">
  
   <div class="col-md-4">
                    <div class="row">
                        <div class="my-form">
                            <div class="col-xs-12 frm1">
                                <div class="scrollmenu">
                                  <a class="incity" href="index.php"><span>INCITY</span></a>
                                  <a class="outcity" href="outstation.php"><span>OUTCITY</span></a>
                                  <a class="transport" href="transport.php"><span>TRANSPORT</span></a>
                                  <a class="rentals" href="rentals.php"><span class="active-btn">RENTALS</span></a>
                                </div>
                            </div>
							<div class="step1">
                            <div class="row">
                                <br/>
                                <p><br/></p>
                                <div class="frm2">
                                   <h4 class="frm1-head">The Rental Express</h4>
								Many Destinations
                                </div>
                            </div>
                            <div class="text-left">
                                <div class="pickup row">
                                    <div class="pic-span col-xs-2">PICKUP</div>
                                    <div class="con-span col-xs-10"><input class="whenselect" type="text" placeholder="Enter pickup location"></div>
                                </div>
                                <!--<div class="drop row">-->
                                <!--    <div class="pic-span col-xs-2">DROP</div>-->
                                <!--    <div class="con-span col-xs-10">Nirala Nagar</div>-->
                                <!--</div>-->
                                <div class="when row">
                                    <div class="pic-span col-xs-2">WHEN</div>
                                    <div class="con-span col-xs-10">
                                        <select class="whenselect" id="privileges"  onclick="craateUserJsObject.ShowPrivileges();">
                                            <option>Now</option>
                                            <option value="schedule">Schedule for later</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="departt row depart" style="display:none;">
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
                                    var Privileges = jQuery('#privileges');
                                    var select = this.value;
                                    Privileges.change(function () {
                                     if ($(this).val() == 'schedule') {
                                         $('.depart').show();
                                     }
                                     else $('.depart').hide(); // hide div if value is not "custom"
                                    });
                                </script>
                            </div>
                            <a href="book-rentals.php" class="btn btn-skin btn-block"><i class="fa fa-search"></i> SEARCH</a>
							</div>
							<!-- step 1 ends -->
							<div class="step2" style="display:none;">
							<br/><br/>
							
							<div class="back"><i class="fa fa-long-arrow-left"></i></div>
							<h4 class="frm1-head">Enter Pickup Location</h4>
							<div class="inner-addon left-addon">
								<i class="glyphicon glyphicon-search"></i>
								<input type="text" class="height40 form-control" placeholder="Enter pickup location"/>
							</div>
							<div class="inner-addon left-addon">
								<i class="glyphicon glyphicon-screenshot"></i>
								<input type="text" class="height40 current" placeholder="Current Location"/>
							</div>
							<div class="text-center powered"><img src="img/powered-by-google-on-white.png" width="100px"></div>
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
							</div>
							<!-- step 2 ends -->
							<!--<div class="step3" style="display:none;">-->
							<!--<div class="back"><i class="fa fa-long-arrow-left"></i></div>-->
							<!--<br/><br/>-->
							<!--<h4 class="frm1-head">Enter Drop Location</h4>-->
							<!--<div class="inner-addon left-addon">-->
							<!--	<i class="glyphicon glyphicon-search"></i>-->
							<!--	<input type="text" class="form-control" />-->
							<!--</div>-->
							
							<!--<div class="text-center powered"><img src="img/powered-by-google-on-white.png" width="100px"></div>-->
							
							<!--</div>-->
							<!-- step 3 ends -->
							<script>
								$(document).ready(function(){
									$(".pickup").click(function(){ 
									   $(".step1").css("display", "none");
									   $(".step2").css("display", "block");
									   $(".step3").css("display", "none");
									});
        								$(".current").click(function(){
                                        $(".step1").css("display", "block");
                                        $(".step2").css("display", "none");
                                        $(".step3").css("display", "none");
                                   });
									$(".back").click(function(){
									    $(".step1").css("display", "block");
									   $(".step2").css("display", "none");
									   $(".step3").css("display", "none");
									});
								});
                            </script> 
							
							
                        </div>
                    </div>
                </div>
   <div class="col-md-8 hidden-xs">
   <br/><br/>
    <h1>Rentals | Book Now</h1> 
 <img src="img/ul.png" width="50%">	
    <p>Some text that represents ...</p>
   </div>
  </div>
</div>
  <br/>
<div class="container bg-3 text-center">    
  <h2>Rentals @ Ogonn</h2>

  <p class="info">The Best Way For Your Destination</p>
   <img src="img/ul.png" width="50%">
   <br/><br/>
</div>
<div class="container bg-3 text-center">    
  <div class="row">
    
    <div class="col-sm-3"> 
	<div class="thela-item">
      <img src="img/6.jpg" class="img-responsive" style="width:100%" alt="Image">
	  <div class="item-head">Cashless Rides</div>
      </div>
    </div>
    <div class="col-sm-3"> 
	<div class="thela-item">
      <img src="img/7.jpg" class="img-responsive" style="width:100%" alt="Image">
	  <div class="item-head">Secure & Safe</div>

      </div>
    </div>
    <div class="col-sm-3">
	<div class="thela-item">
      <img src="img/8.jpg" class="img-responsive" style="width:100%" alt="Image">
	  <div class="item-head">Vehicle Options</div>
     
      </div>
    </div>
	<div class="col-sm-3">
	<div class="thela-item">
      <img src="img/5.jpg" class="img-responsive" style="width:100%" alt="Image">
	  <div class="item-head">Pocket Friendly</div>
  
      </div>
    </div>
  </div>
</div><br><hr/>
<div class="container bg-3 text-center">    
  <h2>For Every Occasion</h2>

  <p class="info">We offer city taxis, inter-city cabs, and logistic transportation</p>
   <img src="img/ul.png" width="50%">
   <br/><br/>
</div>
<div class="container bg-3">    
  <div class="row">
    <div class="col-md-4">

	<div class="thela-item2">
<img class="rib" src="img/rib.png">
		<img src="img/city1.png" width="100%">
		<h4 class="h44 text-center">CITY TAXI</h4>
		<div class="info-cont">
		
		<p class="text-justify para"> book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now</p>
		<br/>
		<div class="row text-center">
		<div class="col-xs-6"><i class="fa fa-snowflake-o tt" aria-hidden="true"></i> AC Cabs</div>
		<div class="col-xs-6"><i class="fa fa-thumbs-o-up tt" aria-hidden="true"></i> Pocket Friendly</div>
		</div>
		<img src="img/ul.png" width="100%">
		</div>
	</div>
	</div>
	<div class="col-md-4">

	<div class="thela-item2">
<img class="rib" src="img/rib.png">
		<img src="img/city2.jpg" width="100%">
		<h4 class="h44 text-center">OUTSTATION</h4>
		<div class="info-cont">
		
		<p class="text-justify para"> book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now</p>
		<br/>
		<div class="row text-center">
		<div class="col-xs-7"><i class="fa fa-car tt" aria-hidden="true"></i> Advance Booking</div>
		<div class="col-xs-5"><i class="fa fa-map-marker tt" aria-hidden="true"></i> Oneway Trips</div>
		</div>
		<img src="img/ul.png" width="100%">
		</div>
	</div>
	</div>
	<div class="col-md-4">

	<div class="thela-item2">
<img class="rib" src="img/rib.png">
		<img src="img/city3.jpg" width="100%">
		<h4 class="h44 text-center">TRANSPORT</h4>
		<div class="info-cont">
		
		<p class="text-justify para"> book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now book a city taxi now</p>
		<br/>
		<div class="row text-center">
		<div class="col-xs-6"><i class="fa fa-plane tt" aria-hidden="true"></i> Express</div>
		<div class="col-xs-6"><i class="fa fa-shield tt" aria-hidden="true"></i> Secure</div>
		</div>
		<img src="img/ul.png" width="100%">
		</div>
	</div>
	</div>


</div></div>
<hr/>
<div class="container bg-3">    
  <div class="row">
    <div class="col-md-8">
	<img src="img/logistic.jpg" width="100%">
 </div>
     <div class="col-md-4">
		 <div class="htt"><strong>FASTEST GROWING COMPANY<strong></div><br/>
		 <div class="heading2">BY BUSINESS OUTLOOK</div>
		 <div class="heading3">India is a country where a lot of disruption takes place and you cannot depend on a particular vertical or region to grow.</div>
		 <br/>
		 <a class="read-more" href="#">READ MORE</a>
    </div>
  </div>
</div><br><hr/>


<div class="container">
	<br/>
	<div class="row">
         
              <div class="col-sm-7">
               
				<div class="hidden-sm hidden-xs"><br/><br/><br/></div>
                  <h2>Book a <strong>Cab</strong> from the <strong>App</strong></h2>
                  <p>Download the app for exclusive deals and ease of booking
                  </p>
				  <div class="hidden-sm hidden-xs"><br/><br/><br/></div>
				  <img src="img/playstore.png" class="store">
                  <img src="img/appstore.png" class="store">
				  
            
              </div>
			  <div class="col-sm-5 hidden-xs">
			  <img src="img/thela-booking.png" width="100%">
              </div>
            </div>
</div>
	<div class="container-fluid thela-features">
        <div class="container">
		<div class="row text-center">
            <div class="col-md-4">
             
                <div class="feature-content">
				<i class="fa fa-tty fa-4x"></i>
                    <h3>24/7 Customer Support</h2>
                    <p class="para">
                        A dedicated 24x7 customer<br>
                        support team always at your<br>
                        service to help solve any problem
                    </p>
                </div>
            </div>
            <div class="col-md-4">
             
                <div class="feature-content">
				<i class="fa fa-shield fa-4x"></i>
                    <h3>Your Safety First</h2>
                    <p class="para">
                        Keep your loved ones informed<br>
                        about your travel routes or call<br>
                        emergency services when in need
                    </p>
                </div>
            </div>
            <div class="col-md-4">
            
                <div class="feature-content">
				<i class="fa fa-cab fa-4x"></i>
                    <h3>Top Rated Drivers</h2>
                    <p class="para">
                        All our driver-partners are<br>
                        background verified and trained to<br>
                        deliver only the best experience
                    </p>
                </div>
            </div>
        </div> </div>
    </div>

<?php include'footer.php' ?>

</body>
</html>