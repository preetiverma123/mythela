@extends('layouts.app-front')
@section('content')
        <div class="banner-bg7 jumbotron">
            <div class="container text-center">
                <div class="col-md-4">
                    <div class="row">
                        <div class="my-form">
                         
							<div class="step1">
                            <div class="row">
                              
                                <div class="frm2">
                                    <h4 class="frm1-head">Run your Fleet on Ogonn</h4>
                                   Enter your details below.<br/> Our team will contact you in the next 24 hours.
                                </div>
                            </div>
                            <form role="become-partner" method="post" >
                                {{csrf_field()}}
                                <div class="text-left">
                                    <div class="pickup row">
                                        <div class="pic-span col-xs-2">NAME</div>
                                        <div class="con-span col-xs-10" >
                                            <input class="whenselect" type="text" name="name" placeholder="Enter Your Name" required>
                                        </div>
                                    </div>
                                    <div class="drop row">
                                        <div class="pic-span col-xs-2">MOBILE</div>
                                        <div class="con-span col-xs-10"><input class="whenselect" name="mobile" type="text" placeholder="Enter Your Mobile" required></div>
                                    </div>
                                    <div class="when row">
                                        <div class="pic-span col-xs-2">CITY</div>
                                        <div class="con-span col-xs-10">
                                            <select class="whenselect" name="city" required>
                                                <option>Select Your City</option>
                                                <option>Lucknow</option>
                                                <option>Kanpur</option>
                                                <option>Prayagraj</option>
                                                <option>Varanasi</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-skin btn-block">SUBMIT</button>
                            </form>
							</div>
							  
                        </div>
                    </div>
                </div>
                <div class="col-md-8 hidden-xs">
                    <br/><br/>
                    <h1>Attach a Fleet of Vehicles </h1>
                    <img src="img/ul.png" width="50%">	
                    <p>Become a travel entrepreneur</p>
                </div>
            </div>
        </div>
        <br/>
        <div class="container bg-3 text-center">
            <h2>Track and control</h2>
            <p class="info"> your fleet of cars with one app</p>
            <img src="img/ul.png" width="50%">
            <br/><br/>
        </div>
        <div class="container bg-3 text-center">
            <div class="row">
                <div class="col-sm-3">
                    <div class="thela-item">
                        <br/>
                    <i class="fa fa-4x fa-map-marker" aria-hidden="true"></i>
                    <h4>Live tracking of all<br/>your drivers and vehicles</h4>
                    <br/></div>
                </div>
                <div class="col-sm-3">
                    <div class="thela-item">
                        <br/>
                        <i class="fa fa-4x fa-list-alt" aria-hidden="true"></i>
                  <h4>Get detailed reports<br/>of total earnings</h4>
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
                    <i class="fa fa-4x fa-star" aria-hidden="true"></i>
                   <h4>Check your fleet’s<br/>performance anytime</h4>
                    <br/></div>
                </div>
            </div>
        </div>
        <br/>
        <hr/>
        <div class="container bg-3 text-center">
            <h2>Documents Required</h2>
            <p class="info">for becoming a partner with <span class="text-style">Ogonn</span></p>
            <img src="img/ul.png" width="50%">
            <br/><br/>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                     <!-- accordionn starts-->
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        Owner Documents
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                <ol>
		       <li>PAN Card</li>
		       <li>Cancelled Cheque of Passbook</li>
		       <li>Aadhar Card</li>
		       <li>Address Proof</li>
		   </ol>
                 </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        Car Documents
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
               <ol>
                  <li>Vehicle RC</li>
                   <li>Vehicle Permit</li>
                   <li>Vehicle Insurance</li>
               </ol>
               </div>
            </div>
        </div>

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
                   <li>Driving License</li>
		       <li>Aadhar Card</li>
		       <li>Address Proof</li>
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
    <br>
@endsection