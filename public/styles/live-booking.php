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
	<?php include 'loader.php' ?>
        <style>
            body{background-color:#F5F5F5;}
			hr {
    margin-top:5px;
    margin-bottom:5px;
}

.mob-di {
    height: 65px;
    background-color: #fff;
    box-shadow: 0 -1px 0 0 #e0e0e0;
    padding: 8px;
    width: 100%;
  position: fixed;
    bottom: 0;
}
.mob-btn {
    height: 49px;
    width: 100%;
    border-radius: 4px;
        background-color: #DF1719;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    text-align: center;
}
    
        </style>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-12 text-center">
                    <!-- profile-->
                   <div class="row rome">
					<div class="col-xs-12">
				      <a href="mybookings.php"><div class="back"><i class="fa fa-long-arrow-left"></i></div></a>
					  <h4> Prime, ETA in 5 mins</h4>
				    </div>
				   </div>
				   <hr/>
				   <div class="row">
					<div class="col-xs-12">
					 <!-- item-->
				      <div class="booking-history">
					  <img src="img/map.png" width="100%"/>
					  <div class="text-left" style="margin:10px;">
					<i class="fa fa-circle" style="color:#498F1F;"></i> 44/78 A sec 456 Indira nagar lucknow <br/>
					<i class="fa fa-circle" style="color:#FF665A;"></i> A 56fbh UGF7 Nirala nagar lucknow
					</div>
					<hr/>
					<div class="row">
				       <div class="col-xs-12">
					<div class="total-fare"><i class="fa fa-inr"></i> 450</div>
					<p class="para">Total Fare</p>
					</div>
					</div>
					<hr/>
					
					
					 <div class="row text-left">
				       <div class="col-xs-6">
				           <span><i class="fa fa-road"></i> in route </span>
						    <span style="display:none;"><i class="fa fa-map-marker"></i> Completed </span>
				       </div>
				       <div class="col-xs-6" style="border-left:1px solid #ccc;">
					     <select class="whenselect">
						 <option>Wallet : 300 /-</option>
						 <option>Cash</option>
						 </select>
			            </div>
				      </div>
				   <hr/>
				  
					<br/>
					
					
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