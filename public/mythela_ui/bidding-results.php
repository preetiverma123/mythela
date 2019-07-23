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
            body{background-image:url(img/bg/bg3.jpg);}
        </style>
        <style>
            body{background-color:#F5F5F5;}
			hr {
			    border:none;
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
				      <a href="bidding-active.php"><div class="back"><i class="fa fa-long-arrow-left"></i></div></a>
					  <h4> Bidding Results</h4>
				    </div>
				   </div>
				   <hr/>
				   <div class="row">
					<div class="col-xs-12">
					 <!-- item-->
				      <div class="fleet-row card row">
                        <div class="col-xs-2 fl text-center"><img class="fleet-img2" src="img/fleet/topen.jpg"></div>
                        <div class="col-xs-9 fl">
                            <span class="fleet-name">Open</span>
                            <span class="fleet-price"><i class="fa fa-inr"></i>600</span><br/>
                            <span class="fleet-tag">Nitesh Sharma UP32AB7689</span>
                        </div>
                        <div class="col-xs-1 fl"><i class="fa fa-angle-right fleet-proceed-icon"></i></div>
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