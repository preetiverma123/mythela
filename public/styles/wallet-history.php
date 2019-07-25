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
        <style>
            body{background-color:#F5F5F5;}
			hr {
    margin-top:5px;
    margin-bottom:5px;
}
.add{color:green;}
.sub{color:red;}
.booking-price{font-size:22px;}
        </style>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-12 text-center">
                    <!-- profile-->
                   <div class="row rome">
					<div class="col-xs-12">
				      <a href="profile.php"><div class="back"><i class="fa fa-long-arrow-left"></i></div></a>
					  <h4> Wallet History</h4>
				    </div>
				   </div>
				   <hr/>
				   <div class="row">
					<div class="col-xs-12">
					 <!-- item-->
				      <div class="booking-history">
					  <div class="booking-date">11/11/2018 04:12 PM <br/><span class="vehicle-name">Money Added To Wallet</span></div>
					  <div class="booking-price add"> + <i class="fa fa-inr"></i> 500 </div>
					  <br/><br/>
					  </div>
					  <!-- item-->
				      <div class="booking-history">
					  <div class="booking-date">11/11/2018 04:12 PM <br/><span class="vehicle-name">Booking ID : MT008765</span></div>
					  <div class="booking-price sub"> - <i class="fa fa-inr"></i> 50 </div>
					  <br/><br/>
					  </div>
					  <!-- item-->
				      <div class="booking-history">
					  <div class="booking-date">11/11/2018 04:12 PM <br/><span class="vehicle-name">Booking ID : MT008765</span></div>
					  <div class="booking-price sub"> - <i class="fa fa-inr"></i> 45 </div>
					  <br/><br/>
					  </div>
					  <!-- item-->
				      <div class="booking-history">
					  <div class="booking-date">11/11/2018 04:12 PM <br/><span class="vehicle-name">Booking ID : MT008765</span></div>
					  <div class="booking-price sub"> - <i class="fa fa-inr"></i> 799 </div>
					  <br/><br/>
					  </div>
					  <!-- item-->
				      <div class="booking-history">
					  <div class="booking-date">11/11/2018 04:12 PM <br/><span class="vehicle-name">Money Added To Wallet</span></div>
					  <div class="booking-price add"> + <i class="fa fa-inr"></i> 2000 </div>
					  <br/><br/>
					  </div>
					  
					  
					  
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