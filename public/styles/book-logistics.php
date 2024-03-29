<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Thela</title>
        <link rel="shortcut icon" href="img/fav.png" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include'links.php' ?>
    </head>
    <body onload="activatePlacesSearch();">
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
                            <a href="index.php"><img src="img/logo.gif" height="45px"></a>
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
                                <a class="incity" href=""><span class="">INCITY</span></a>
                                <a class="outcity" href=""><span class="">OUTCITY</span></a>
                                <a class="transport" href=""><span class="active-btn">TRANSPORT</span></a>
                                <a class="rentals" href=""><span class="">RENTALS</span></a>
                            </div>
                        </div>
                        
                        <!--logistics starts-->
                        
                        
                        <div class="step1logistic">
                            <div class="row">
                                <div class="frm2">
                                    <h4 class="frm1-head">Your logistics partner</h4>
                                    Bidding at lowest price
                                </div>
                            </div>
                            <div class="text-left">
                                <div class="pickup pickup-logistic row">
                                    <div class="pic-span col-xs-2">PICKUP</div>
                                    <div class="con-span col-xs-10"><input class="whenselect" type="text" placeholder="Enter Pickup Location"></div>
                                </div>
                                <div class="drop drop-logistic row">
                                    <div class="pic-span col-xs-2">DROP</div>
                                    <div class="con-span col-xs-10"><input class="whenselect" type="text" placeholder="Enter Drop Location"></div>
                                </div>
                                <div class="veh row">
                                    <div class="pic-span col-xs-2">VEHICLE</div>
                                    <div class="con-span col-xs-10"><input class="whenselect" type="text" placeholder="Select Vehicle"></div>
                                </div>
                                <div class="mat row">
                                    <div class="pic-span col-xs-2">GOODS</div>
                                    <div class="con-span col-xs-10"><input class="whenselect" type="text" placeholder="Select Material"></div>
                                </div>
                                <div class="weight row">
                                    <div class="pic-span col-xs-2">WEIGHT</div>
                                    <div class="con-span col-xs-5">
                                        <input class="whenselect" type="text" placeholder="Enter Weight">  
                                    </div>
                                    <div class="con-span col-xs-5">
                                        <select class="whenselect">
                                            <option>KG</option>
                                            <option>TON</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="when row">
                                    <div class="pic-span col-xs-2">WHEN</div>
                                    <div class="con-span col-xs-10">
                                        <select class="whenselect" id="logi-sch"  onclick="craateUserJsObject.ShowPrivileges();">
                                            <option>Now</option>
                                            <option value="schedule">Schedule for later</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row depart logi-sch" style="display:none;">
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
                                    var Privileges = jQuery('#logi-sch');
                                    var select = this.value;
                                    Privileges.change(function () {
                                     if ($(this).val() == 'schedule') {
                                         $('.logi-sch').show();
                                     }
                                     else $('.logi-sch').hide(); // hide div if value is not "custom"
                                    });
                                </script>
                                <a href="bid-results.php"><button class="btn btn-block btn-skin">Put For Bidding</button></a>
                            </div>
                        </div>
                        <!-- step 1 ends -->
                        <div class="step2logistic" style="display:none;">
                            <div class="back2logistic back2"><i class="fa fa-long-arrow-left"></i></div>
                            <h4 class="frm1-head">Enter Pickup Location</h4>
                            <div class="inner-addon left-addon">
                                <i class="glyphicon glyphicon-search"></i>
                                <input type="text" id="picuploc" class="height40 form-control" placeholder="Enter picup location" />
                            </div>
                            
                        </div>
                        <!-- step 2 ends -->
                        <div class="step3logistic" style="display:none;">
                            <div class="back2logistic back2"><i class="fa fa-long-arrow-left"></i></div>
                            <h4 class="frm1-head">Enter Drop Location</h4>
                            <div class="inner-addon left-addon">
                                <i class="glyphicon glyphicon-search"></i>
                                <input type="text" id="droploc" class="height40 form-control" placeholder="Enter drop location"/>
                            </div>
                            
                        </div>
                        <!-- step 3 ends -->
                        <!--map starts-->
                        <div class="map-logis" style="display:none;">
                            <img src="img/map.png" height="200px" width="100%">
                            <button class="btn btn-skin btn-block confirm-loc-logistic">Confirm Location</button>
                            <div class="inner-addon left-addon current-loc" style="display:none;">
                                <i class="glyphicon glyphicon-screenshot"></i>
                                <button onClick="getLocation();" class="height40 current current-logi" >Current Location</button>
                            </div>
                        </div>
                        <!--map ends-->
                        <!--step4logistic begins-->
                        <div class="step4logistic" style="display:none;">
                            <div class="back2logistic back2"><i class="fa fa-long-arrow-left"></i></div>
                            <h4 class="frm1-head">Choose Vehicle</h4>
                            <br/>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="fleet-img3"><img class="img-responsive" src="img/fleet/topen.jpg">Open</div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="fleet-img3"><img class="img-responsive" src="img/fleet/tcontainer.png">Container</div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="fleet-img3"><img class="img-responsive" src="img/fleet/ttrailer.jpg">Trailer</div>
                                </div>
                            </div>
                        </div>
                        <!--step4logistic ends-->
                        <div class="step5logistic" style="display:none;">
                            <div class="back2logistic back2"><i class="fa fa-long-arrow-left"></i></div>
                            <h4 class="frm1-head">Select Material</h4>
                            <ul class="material-ul list-unstyled list-inline">
                                <li><img src="img/mat/box.png" class="img-responsive" width="90px">Packaged/Boxes</li>
                                <li><img src="img/mat/food.jpg" class="img-responsive" width="90px">Food/Farming</li>
                                <li><img src="img/mat/machine.jpg" class="img-responsive" width="90px">Machine/Parts</li>
                                <li><img src="img/mat/elect.jpg" class="img-responsive" width="90px">Electronic</li>
                                <li><img src="img/mat/chemical.png" class="img-responsive" width="90px">Chemical/Powder</li>
                                <li><img src="img/mat/scrap.png" class="img-responsive" width="90px">Scrap</li>
                                <li><img src="img/mat/construction.jpg" class="img-responsive" width="90px">Construction</li>
                                <li><img src="img/mat/paint.jpg" class="img-responsive" width="90px">Petrolium/Paint</li>
                                <li><img src="img/mat/tyre.jpg" class="img-responsive" width="90px">Tyre</li>
                                <li><img src="img/mat/battery.png" class="img-responsive" width="90px">Battery</li>
                                <li><img src="img/mat/cylinder.png" class="img-responsive" width="90px">Cylinders</li>
                                <li><img src="img/mat/alcohol.jpg" class="img-responsive" width="90px">Alcoholic Drinks</li>
                            </ul>
                        </div>
                        <!--step5logistic ends-->
                        <script>
                            $(document).ready(function(){
                                $(".mat").click(function(){ 
                            	   $(".step1logistic").css("display", "none");
                            	   $(".step2logistic").css("display", "none");
                            	   $(".step3logistic").css("display", "none");
                            	   $(".step4logistic").css("display", "none");
                            	   $(".step5logistic").css("display", "block");
                            	   $(".map-logis").css("display", "none");
                            	   $(".current-loc").css("display", "none");
                            	});
                                $(".veh").click(function(){ 
                            	   $(".step1logistic").css("display", "none");
                            	   $(".step2logistic").css("display", "none");
                            	   $(".step3logistic").css("display", "none");
                            	   $(".step4logistic").css("display", "block");
                            	   $(".step5logistic").css("display", "none");
                            	   $(".map-logis").css("display", "none");
                            	   $(".current-loc").css("display", "none");
                            	});
                            	$(".pickup-logistic").click(function(){ 
                            	   $(".step1logistic").css("display", "none");
                            	   $(".step2logistic").css("display", "block");
                            	   $(".map-logis").css("display", "block");
                            	   $(".current-loc").css("display", "block");
                            	   $(".step3logistic").css("display", "none");
                            	   $(".step4logistic").css("display", "none");
                            	   $(".step5logistic").css("display", "none");
                            	});
                            	$(".drop-logistic").click(function(){
                            	   $(".step1logistic").css("display", "none");
                            	   $(".step3logistic").css("display", "block");
                            	   $(".map-logis").css("display", "block");
                            	   $(".step2logistic").css("display", "none");
                            	   $(".step4logistic").css("display", "none");
                            	   $(".current-loc").css("display", "none");
                            	});
                            	$(".back2logistic").click(function(){
                            	   $(".step1logistic").css("display", "block");
                            	   $(".step2logistic").css("display", "none");
                            	   $(".step3logistic").css("display", "none");
                            	   $(".step4logistic").css("display", "none");
                            	   $(".step5logistic").css("display", "none");
                            	   $(".current-loc").css("display", "none");
                            	   $(".map-logis").css("display", "none");
                            	});
                            	$(".current-logi").click(function(){
                                    $(".step1logistic").css("display", "block");
                                    $(".step2logistic").css("display", "none");
                                    $(".step3logistic").css("display", "none");
                                    $(".step4logistic").css("display", "none");
                                    $(".step5logistic").css("display", "none");
                                    $(".current-loc").css("display", "none");
                                    $(".map-logis").css("display", "none");
                                    });
                            	$(".confirm-loc-logistic").click(function(){
                                    $(".step1logistic").css("display", "block");
                                    $(".step2logistic").css("display", "none");
                                    $(".step3logistic").css("display", "none");
                                    $(".step4logistic").css("display", "none");
                                    $(".step5logistic").css("display", "none");
                                    $(".current-loc").css("display", "none");
                                    $(".map-logis").css("display", "none");
                            	});
								$(".fleet-row").click(function(){
									location.href = "confirm-booking.php";
								});
                            });               
                        </script> 
                        
                        
                        
                        <!--logistics ends-->
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                    <!-- my form ends--->
                    <h6> : Wait for 10 mins till Bidding Completion :</h6>
                    <!--<h6> : Showing Results of Bidding :</h6>-->
                    <!--item-->
                    <div class="fleet-row card row">
                        <div class="col-xs-2 fl text-center"><img class="fleet-img2" src="img/fleet/topen.jpg"></div>
                        <div class="col-xs-9 fl">
                            <span class="fleet-name">Open</span>
                            <span class="fleet-price"><i class="fa fa-inr"></i>600</span><br/>
                            <span class="fleet-tag">Nitesh Sharma UP32AB7689</span>
                        </div>
                        <div class="col-xs-1 fl"><i class="fa fa-angle-right fleet-proceed-icon"></i></div>
                    </div>
                    <!--item-->
                    <div class="fleet-row card row">
                        <div class="col-xs-2 fl text-center"><img class="fleet-img2" src="img/fleet/ttrailer.jpg"></div>
                        <div class="col-xs-9 fl">
                            <span class="fleet-name">Trailer</span>
                            <span class="fleet-price"><i class="fa fa-inr"></i>650</span><br/>
                            <span class="fleet-tag">Nitesh Sharma UP32AB7689</span>
                        </div>
                        <div class="col-xs-1 fl"><i class="fa fa-angle-right fleet-proceed-icon"></i></div>
                    </div>
                    <!--item-->
                    <div class="fleet-row card row">
                        <div class="col-xs-2 fl text-center"><img class="fleet-img2" src="img/fleet/tcontainer.png"></div>
                        <div class="col-xs-9 fl">
                            <span class="fleet-name">Container</span>
                            <span class="fleet-price"><i class="fa fa-inr"></i>800</span><br/>
                            <span class="fleet-tag">Nitesh Sharma UP32AB7689</span>
                        </div>
                        <div class="col-xs-1 fl"><i class="fa fa-angle-right fleet-proceed-icon"></i></div>
                    </div>
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
                            <a href="bidding-active.php"><i class="fa fa-truck" aria-hidden="true"></i> Active Biddings <small>(Logistics)</small></a>
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
    </body>
</html>