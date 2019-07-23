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
        </style>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-12 text-center">
                    <!-- profile-->
                   <div class="row rome">
					<div class="col-xs-12">
				      <a href="mybookings.php"><div class="back"><i class="fa fa-long-arrow-left"></i></div></a>
					  <h4> Prime SUV</h4>
				    </div>
				   </div>
				   <hr/>
				   <div class="row">
					<div class="col-xs-12">
					 <!-- item-->
				      <div class="booking-history">
				          
				          <div class="total-fare para">11/11/2018 <small>04:12 PM </small> </div>
					 
					<img src="img/map.png" width="100%"/>
					<div class="text-left" style="margin:10px;">
					<i class="fa fa-circle" style="color:#498F1F;"></i> 44/78 A sec 456 Indira nagar lucknow <br/>
					<i class="fa fa-circle" style="color:#FF665A;"></i> A 56fbh UGF7 Nirala nagar lucknow
					</div>
					<hr/>
					<div class="row">
						<div class="col-xs-6">
							<div class="total-fare"><i class="fa fa-inr"></i> 450</div>
							<p class="para">Total Fare</p>
						</div>
						<div class="col-xs-6">
							<a href="#"><i class="fa fa-file-pdf-o" style="color:red;"></i> Invoice</a>
						</div>
					</div>
					<hr/>
					
					
					 <div class="row text-left">
				       <div class="col-xs-2">
				           <img class="driver-dp img-circle" src="img/1.jpg">
				       </div>
				       <div class="col-xs-8">
					   <div class="total-fare">Mohan Kumar</div>
					    <p class="vehicle-name">Honda Accord UP23HA6754</p>
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