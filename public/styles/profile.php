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
            .user-dp{font-size:70px;color:#C0C6C8;}
            .border{border:1px solid #ddd;border-radius:4px;padding:10px;background-color:#fff;margin-bottom:8px;}
            .border a{color:#000;text-decoration:none !important;font-weight:500;    font-size: 16px;}
            .panel-title a,.border a{text-decoration:none !important;}
            .logout{color:red !important;}
            .panel-default>.panel-heading {
            color: #333;
            background-color: #fff;
            border-color: #ddd;
            }
            .panel-group {
            margin-bottom: 10px;
            }
            .money{font-size:20px;}
            .kyc{font-weight:500;}
            .red{color:red !important;}
            .green{color:green !important;}
            .blue{color:#009AF7 !important;}
        </style>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-12 text-center">
                    <!-- profile-->
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="book-now.php">
                                <div class="back"><i class="fa fa-long-arrow-left"></i></div>
                            </a>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-xs-12">
                            <i class="fa fa-user-circle user-dp" aria-hidden="true"></i><br/>
                            <h3> User Name</h3>
                            <h4>+91 7878787878</h4>
                            <br/>
                            <div class=" border">
                                <a href="mybookings.php"><i class="fa fa-cab"></i> My Bookings</a>
                            </div>
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><i class="fa fa-inr"></i> My Wallet</a>
                                        </h4>
                                    </div>
                                    <div id="collapse2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="money"><i class="fa fa-inr"></i><b> 599 /- </b></div>
                                            <p class="para">Current Wallet Balance</p>
                                            <div class="row">
                                                <div class="col-xs-6"><a href="add-money.php" class="btn btn-skin2 btn-block"> <i class="fa fa-plus"></i> Add Money</a></div>
                                                <div class="col-xs-6"><a href="send-money.php" class="btn btn-skin2 btn-block"> <i class="fa fa-share"></i> Send Money</a></div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-xs-6"><a href="wallet-history.php" class="btn btn-skin2 btn-block"> <i class="fa fa-inr"></i> Wallet History</a></div>
                                                <div class="col-xs-6"><a href="payment-history.php" class="btn btn-skin2 btn-block"> <i class="fa fa-inr"></i> Payment History</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border">
                                <a class="red" href="complete-kyc.php"><i class="fa fa-address-card-o" aria-hidden="true"></i> Complete KYC</a>
                            </div>
                            <div class="border" style="display:none;">
                                <a class="blue"><i class="fa fa-address-card-o" aria-hidden="true"></i> KYC Pending <small>for approval</small> </a>
                            </div>
                            <div class="border" style="display:none;">
                                <a class="green"><i class="fa fa-check-circle-o"></i> KYC Completed</a>
                            </div>
                            <div class="border">
                                <a class="logout" href="#"  data-toggle="modal" data-target="#logoutModal"><i class="fa fa-power-off"></i> Logout</a>
                                <?php include'logout.php'?>
                            </div>
                        </div>
                    </div>
                    <!--row ends-->
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