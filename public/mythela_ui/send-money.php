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
.amnt-input{
    padding-left: 10px;
    margin: 6px 0px;
    height: 48px;
    border-radius: 4px;
    background-color: #fff;
    border: 1px solid #e5e5e5;
    width: 100%;
}
.promo-link{text-decoration:none !important;}
.promo-input{
	width:100%;
	 text-transform: uppercase;
	PADDING:20px;
	text-align:center;
	border: 0;
  outline: 0;
  background: transparent;}		
        </style>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-12 text-center">
                    <!-- profile-->
                   <div class="row rome" style="background-color:#fff;">
					<div class="col-xs-12">
				      <a href="profile.php"><div class="back"><i class="fa fa-long-arrow-left"></i></div></a>
					   <h4> Send Money to Wallet</h4>
				    </div>
				   </div>
				   <hr/>
				   <div class="row text-center">
					<div class="col-xs-12">
					 <br/>
				     <p class="para">Current Wallet Balance <i class="fa fa-inr"></i> 499 /-</p>
				  <input type="text" class="amnt-input" placeholder="Enter Receiver's Mobile"/>
				  <input type="text" class="amnt-input" placeholder="Enter Amount"/>
				 
				   <button class="btn btn-skin btn-block" style="margin-top:10px;"><i class="fa fa-share"></i> Send Money</button>
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
		<!-- end page -->

<style>
.thela-btn1{width:50%;float:left;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-right-radius:0px;padding: 7px 0px;
    font-size: 18px;    font-weight: 500;}
.thela-btn2{width:50%;float:right;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;padding: 7px 0px;
    font-size: 18px;}
.modal-contenttt {border-bottom-left-radius:0px;border-bottom-right-radius:0px;    margin-top: 20%;}
.modal-body {
    position: relative;
    padding: 0px;
}
</style>
    </body>
</html>