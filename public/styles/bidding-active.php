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
            		hr {
			    border:none;
    margin-top:5px;
    margin-bottom:5px;
}
.fleet-row{padding-top:5px;padding-bottom:5px;}
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
                    <hr/>
                    <!--<h6> : Showing Results of Bidding :</h6>-->
                    <!--item-->
                    <div class="fleet-row card row">
                        <div class="col-xs-2 fl text-center"><img class="fleet-img2" src="img/fleet/topen.jpg"><br/><div class="fleet-time">Open</div></div>
                        <div class="col-xs-10 fl">
                                <i class="fa fa-calendar"></i> 11/11/2018 04:12 PM <br/>
                            <span class="fleet-tag">
                                <i class="fa fa-circle" style="color:#498F1F;"></i> 44/78 A sec 456 Indira nagar lucknow <br/>
					            <i class="fa fa-circle" style="color:#FF665A;"></i> A 56fbh UGF7 Nirala nagar lucknow</span>
                            
                            <span class="fleet-tag">Nitesh Sharma UP32AB7689</span>
                        </div>
                    </div>
                    <!--item-->
                    
                </div>
                <!-- main mobile column ends -->
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
                            <a href="book-now.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </div>
                        <div class="top-menu">
                            <a href="profile.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> My Account</a>
                        </div>
                        <div class="top-menu">
                            <a href="bid-results.php"><i class="fa fa-truck" aria-hidden="true"></i> Active Biddings <small>(Logistics)</small></a>
                        </div>
                        <div class="top-menu">
                            <a href="mybookings.php"><i class="fa fa-cab" aria-hidden="true"></i> My Bookings</a>
                        </div>
                        <div class="top-menu">
                            <a href="#" id="logout" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>
                        </div>
                        <div class="bottom-div">
                            <div class="row bot-row">
                                <div class="col-xs-6 text-left"><a target="_blank" href="terms-of-service.php">Terms Of Service</a></div>
                                <div class=" col-xs-6 text-right"> &copy; 2019</div>
                            </div>
                            <div class="dwnld-app"><i class="fa fa-download" aria-hidden="true"></i> Download App</div>
                        </div>
                    </div>
                </div>
                <!-- modal-content -->
            </div>
            <!-- modal-dialog -->
        </div>
        <!-- modal -->
        <?php include'logout.php'?>
       <style>
                                .map-btn{    border: 1px solid #ccc;
                                margin-top:8px;
                                }
                                .map-link{    font-weight: bold;
                                text-decoration: none !important;
                                float: right;
                                position: relative;
                                right: 10px;
                                top: 9px;
                                }
                                .current-btn{    background: transparent;
                                border: none;
                                position: relative;
                                top: 8px;}
                                .inner-addon { 
                                position: relative;     margin: 8px 0;
                                }
                                
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
        	<script>
	$(document).ready(function(){
		$(".fleet-row").click(function(){
	 window.location = "bidding-results.php";
	});
	});
	</script>
    </body>
</html>