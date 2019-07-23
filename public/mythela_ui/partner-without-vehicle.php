<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Partner : My Thela</title>
        <link rel="shortcut icon" href="img/fav.png" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include'links.php' ?>
    </head>
    <body>
      <?php include'loader.php' ?>
        <?php include'header.php' ?>
        <div class="banner-bg6 jumbotron">
            <div class="container text-center">
                <div class="col-md-4">
                    <div class="row">
                        <div class="my-form">
                         
							<div class="step1">
                            <div class="row">
                              
                                <div class="frm2">
                                    <h4 class="frm1-head">Drive towards a better living</h4>
                                   Enter your details below.<br/> Our team will contact you in the next 24 hours.
                                </div>
                            </div>
                            <div class="text-left">
                                <div class="pickup row">
                                    <div class="pic-span col-xs-2">NAME</div>
                                    <div class="con-span col-xs-10" ><input class="whenselect" type="text" placeholder="Enter Your Name"></div>
                                </div>
                                <div class="drop row">
                                    <div class="pic-span col-xs-2">MOBILE</div>
                                    <div class="con-span col-xs-10"><input class="whenselect" type="text" placeholder="Enter Your Mobile"></div>
                                </div>
                                <div class="when row">
                                    <div class="pic-span col-xs-2">CITY</div>
                                    <div class="con-span col-xs-10">
                                        <select class="whenselect">
                                            <option>Select Your City</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-skin btn-block">SUBMIT</button>
							</div>
							  
                        </div>
                    </div>
                </div>
                <div class="col-md-8 hidden-xs">
                    <br/><br/>
                    <h1>Lease a Car </h1>
                    <img src="img/ul.png" width="50%">	
                    <p>Drive towards a better living</p>
                </div>
            </div>
        </div>
        <br/>
        <div class="container bg-3 text-center">
            <h2>Get a car on lease!</h2>
            <p class="info">Why our partners love us</p>
            <img src="img/ul.png" width="50%">
            <br/><br/>
        </div>
        <div class="container bg-3 text-center">
            <div class="row">
                <div class="col-sm-3">
                    <div class="thela-item">
                        <br/>
                    <i class="fa fa-4x fa-cab" aria-hidden="true"></i>
                    <h4>Get a car<br/>at zero-risk</h4>
                    <br/></div>
                </div>
                <div class="col-sm-3">
                    <div class="thela-item">
                        <br/>
                        <i class="fa fa-4x fa-hand-pointer-o" aria-hidden="true"></i>
                  <h4>Drive a new car<br/>of your choice</h4>
                   <br/></div>
                </div>
                <div class="col-sm-3">
                    <div class="thela-item">
                        <br/>
                    <i class="fa fa-tty fa-4x" aria-hidden="true"></i>
                   <h4>24/7 helpline for<br/> your support</h4>
                    <br/></div>
                </div>
                <div class="col-sm-3">
                    <div class="thela-item">
                        <br/>
                    <i class="fa fa-4x fa-cogs" aria-hidden="true"></i>
                   <h4>Zero maintenance<br/>cost</h4>
                    <br/></div>
                </div>
            </div>
        </div>
        <br/>
        <hr/>
        <div class="container bg-3 text-center">
            <h2>Documents Required</h2>
            <p class="info">for becoming a partner with My Thela</p>
            <img src="img/ul.png" width="50%">
            <br/><br/>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- accordionn starts-->
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        Driver Documents
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                   <ol>
                  
<li>Valid Commercial Driver's License (Yellow Badge)</li>
<li>PAN Card</li>
<li>Aadhaar Card</li>
<li>Current & Permanent Address Proofs</li>
<li>Four References (With Addresses & Phone Numbers)</li>
<li>Bank Details (Passbook OR Cancelled Cheque)</li>
                   </ol>
                </div>
            </div>
        </div>

    </div><!-- panel-group -->
    <style>
           .panel-group .panel {
        border-radius: 0;
        box-shadow: none;
        border-color: #EEEEEE;
    }

    .panel-default > .panel-heading {
        padding: 0;
        border-radius: 0;
        color: #212121;
        background-color: #FAFAFA;
        border-color: #EEEEEE;
    }

    .panel-title {
        font-size: 14px;
    }

    .panel-title > a {
        display: block;
        padding: 15px;
        text-decoration: none;
    }

    .more-less {
        float: right;
        color: #212121;
    }

    .panel-default > .panel-heading + .panel-collapse > .panel-body {
        border-top-color: #EEEEEE;
    }

/* ----- v CAN BE DELETED v ----- */
    </style>
    <script>
        function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);
    </script>
                     

                    <!--ends-->
                </div>
                <div class="col-md-6"><img src="img/car-img.e209ac4.png" width="100%"></div>
            </div>
        </div>
        <br>
        
        <br/>
        
        
        <?php include'footer.php' ?>
 
   </body>
</html>