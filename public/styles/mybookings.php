<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Thela</title>
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
        </style>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-12 text-center">
                    <!-- profile-->
                   <div class="row rome">
					<div class="col-xs-12">
				      <a href="book-now.php"><div class="back"><i class="fa fa-long-arrow-left"></i></div></a>
					  <h4> My Bookings</h4>
				    </div>
				   </div>
				   <hr/>
				   <div class="row">
					<div class="col-xs-12">
					 <!-- item-->
				      <div class="booking-history">
					  <div class="booking-date">
					  11/11/2018 04:12 PM <br/>
					  <span class="vehicle-name">Honda Accord UP23HA6754</span>
					  </div><div class="booking-price"><i class="fa fa-inr"></i> 50 <br/>
					  <span class="vehicle-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
					  </div>
					  <br/><br/>
					  </div>
					  <!-- item-->
				      <div class="booking-history">
					  <div class="booking-date">
					  11/11/2018 04:12 PM <br/>
					  <span class="vehicle-name">Honda Accord UP23HA6754</span>
					  </div><div class="booking-price"><i class="fa fa-inr"></i> 50 <br/>
					  <span class="vehicle-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
					  </div>
					  <br/><br/>
					  </div>
					  <!-- item-->
				      <div class="booking-history">
					  <div class="booking-date">
					  11/11/2018 04:12 PM <br/>
					  <span class="vehicle-name">Honda Accord UP23HA6754</span>
					  </div><div class="booking-price"><i class="fa fa-inr"></i> 50 <br/>
					  <span class="vehicle-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
					  </div>
					  <br/><br/>
					  </div>
					  <!-- item-->
				      <div class="booking-history">
					  <div class="booking-date">
					  11/11/2018 04:12 PM <br/>
					  <span class="vehicle-name">Honda Accord UP23HA6754</span>
					  </div><div class="booking-price"><i class="fa fa-inr"></i> 50 <br/>
					  <span class="vehicle-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
					  </div>
					  <br/><br/>
					  </div>
					  
					  
				    </div>
				   </div>
                    
                </div>
                <div class="col-md-8 hidden-sm hidden-xs right-desk right-desk-gen">
                    <div class="right-desk-content">
                        <h3 class="white">We are always ready to help you.</h3>
                        # My Thela For Web
                    </div>
                </div>
            </div>
        </div>
		<script>
	$(document).ready(function(){
		$(".booking-history").click(function(){
	 window.location = "booking-detail.php";
	});
	});
	</script>
    </body>
</html>