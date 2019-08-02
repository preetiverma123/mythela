@extends('layouts.app-book')
@section('content')
<!-- ends-->
    <div class="my-form">
    <div class="row frm1">
        <div class="scrollmenu book-ul">
            <a class="transport" div-act="step1logistic" href="javascript:void(0);"><span class="tra active-btn"> TRANSPORT</span></a>
            <a class="incity" div-act="step1-incity" href="javascript:void(0);"><span class="in"> MY BIKE</span></a>
            <a class="outcity" div-act="outstep1" href="javascript:void(0);"><span class="out"> MY CAR</span></a>
            <a class="rentals" div-act="rentalstep1" href="javascript:void(0);"><span class="ren"> RENTALS</span></a>
        </div>
    </div>
    <!--start lattitude and longitude-->
    <input type="hidden" id="pickup-lat" value="{{$lat!=''?$lat:@Session::get('form_booking')['picup_lat']}}">
    <input type="hidden" id="pickup-long" value="{{$long!=''?$long:@Session::get('form_booking')['picup_long']}}">
    <input type="hidden" id="drop-lat" value="{{$drop_lat!=''?$drop_lat:@Session::get('form_booking')['drop_lat']}}">
    <input type="hidden" id="drop-long" value="{{$drop_long!=''?$drop_long:@Session::get('form_booking')['drop_long']}}">
    <!--endd lattitude and longitude-->
    <div class="div-map-li step1-incity" style="display: none;">
        <div class="row">
            <div class="frm2">
                <h4 class="frm1-head">Your intracity travel partner</h4>
                AC Cabs for point to point travel
            </div>
        </div>
        <div class="text-left">
            <div class="pickup pickincity row">
                <div class="pic-span col-xs-2">PICKUP</div>
                <div class="con-span col-xs-10"><input class="whenselect" type="text" placeholder="Enter pickup location"></div>
            </div>
            <div class="drop dropincity row">
                <div class="pic-span col-xs-2">DROP</div>
                <div class="con-span col-xs-10"><input class="whenselect" type="text" placeholder="Enter drop location"></div>
            </div>
            <div class="when row">
                <div class="pic-span col-xs-2">WHEN</div>
                <div class="con-span col-xs-10">
                    <select class="whenselect" id="privileges">
                        <option>Now</option>
                        <option value="schedule">Schedule for later</option>
                    </select>
                </div>
            </div>
            <div class="row depart" style="display:none;">
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
        </div>
    </div>
    <!-- step 1 ends -->
    <div class="step2pickup-incity" style="display:none;">
        <div class="backbtn-incity back2"><i class="fa fa-long-arrow-left"></i></div>
        <h4 class="frm1-head">Enter Pickup Location</h4>
        <div class="inner-addon left-addon">
            <i class="glyphicon glyphicon-search"></i>
            <input type="text" id="picuploc" class="height40 form-control" placeholder="Enter picup location" />
        </div>
    </div>
    <!-- step 2 ends -->
    <!--step3 starts-->
    <div class="step3drop-incity" style="display:none;">
        <div class="backbtn-incity back2"><i class="fa fa-long-arrow-left"></i></div>
        <h4 class="frm1-head">Enter Drop Location</h4>
        <div class="inner-addon left-addon">
            <i class="glyphicon glyphicon-search"></i>
            <input type="text" id="droploc" class="form-control height40" placeholder="Enter drop location"/>
        </div>
    </div>
    <!-- step 3 ends -->
    <!--map starts-->
    <div class="map-incity" style="display:none;">
        <img src="img/map.png" height="200px" width="100%">
        <button class="btn btn-skin btn-block confirm-loc-incity">Confirm Location</button>
        <div class="inner-addon left-addon current-loc-incity" style="display:none;">
            <i class="glyphicon glyphicon-screenshot"></i>
            <button class="height40 current-in current" >Current Location</button>
        </div>
    </div>
    <!--map ends-->
    <!--in city ends-->
    <!--rentals starts-->
    <div class="div-map-li rentalstep1" style="display:none;">
        <div class="row">
            <div class="frm2">
                <h4 class="frm1-head">Your everyday travel partner</h4>
                AC Cabs for point to point travel
            </div>
        </div>
        <div class="text-left">
            <div class="pickup pickup-rental row">
                <div class="pic-span col-xs-2">PICKUP</div>
                <div class="con-span col-xs-10"><input class="whenselect" type="text" placeholder="Enter pickup location"></div>
            </div>
            <div class="when row">
                <div class="pic-span col-xs-2">WHEN</div>
                <div class="con-span col-xs-10">
                    <select class="whenselect" id="re-sch">
                        <option>Now</option>
                        <option value="rental-schedule">Schedule for later</option>
                    </select>
                </div>
            </div>
            <div class="row rech depart" style="display:none;">
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
                var Privileges = jQuery('#re-sch');
                var select = this.value;
                Privileges.change(function () {
                    if ($(this).val() == 'rental-schedule') {
                        $('.rech').show();
                    }
    else $('.rech').hide(); // hide div if value is not "custom"
    });
    </script>
    </div>
    </div>
<!-- step 1 ends -->
<div class="rentalstep2" style="display:none;">
    <div class="back2 back2rental"><i class="fa fa-long-arrow-left"></i></div>
    <h4 class="frm1-head">Enter Pickup Location</h4>
    <div class="inner-addon left-addon">
        <i class="glyphicon glyphicon-search"></i>
        <input type="text" id="picuploc" class="form-control height40" placeholder="Enter picup location" />
    </div>
</div>
<!-- step 2 ends -->
<!--map starts-->
<div class="map-rental" style="display:none;">
    <img src="img/map.png" height="200px" width="100%">
    <button class="btn btn-skin btn-block confirm-loc-rental">Confirm Location</button>
    <div class="inner-addon left-addon current-loc-rental" style="display:none;">
        <i class="glyphicon glyphicon-screenshot"></i>
        <button class="height40 current-re current" >Current Location</button>
    </div>
</div>
<!--map ends-->
<!--rentals end-->
<!--outstation starts-->
<div class="div-map-li outstep1" style="display:none;">
    <div class="row">
        <div class="frm2">
            <h4 class="frm1-head">Your intercity travel partner</h4>
            AC Cabs for point to point travel
        </div>
    </div>
    <div class="text-left">
        <div class="pickup pickup-out row">
            <div class="pic-span col-xs-2">PICKUP</div>
            <div class="con-span col-xs-10"><input class="whenselect" type="text" placeholder="Enter pickup location"></div>
        </div>
        <div class="drop drop-out row">
            <div class="pic-span col-xs-2">DROP</div>
            <div class="con-span col-xs-10"><input class="whenselect" type="text" placeholder="Enter drop location"></div>
        </div>
        <div class="when row">
            <div class="pic-span col-xs-2">WHEN</div>
            <div class="con-span col-xs-10">
                <select class="whenselect" id="out-sch">
                    <option>Now</option>
                    <option value="schedule">Schedule for later</option>
                </select>
            </div>
        </div>
        <div class="row depart depart-out" style="display:none;">
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
            var Privileges = jQuery('#out-sch');
            var select = this.value;
            Privileges.change(function () {
                if ($(this).val() == 'schedule') {
                    $('.depart-out').show();
                }
else $('.depart-out').hide(); // hide div if value is not "custom"
});
</script>
<div class="when row">
    <div class="pic-span col-xs-2">JOURNEY</div>
    <div class="con-span col-xs-10">
        <select class="whenselect" id="depart-out2">
            <option>One Way</option>
            <option value="schedule2">Round Trip</option>
        </select>
    </div>
</div>
<div class="depart row depart-out2" style="display:none;">
    <div class="pic-span col-xs-2">RETURN</div>
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
    var Privileges = jQuery('#depart-out2');
    var select = this.value;
    Privileges.change(function () {
        if ($(this).val() == 'schedule2') {
            $('.depart-out2').show();
        }
else $('.depart-out2').hide(); // hide div if value is not "custom"
});
</script>
</div>
</div>
<!-- step 1 ends -->
<div class="outstep2" style="display:none;">
    <div class="back2 back2out"><i class="fa fa-long-arrow-left"></i></div>
    <h4 class="frm1-head">Enter Pickup Location</h4>
    <div class="inner-addon left-addon">
        <i class="glyphicon glyphicon-search"></i>
        <input type="text" id="picuploc" class="height40 form-control" placeholder="Enter picup location" />
    </div>
</div>
<!-- step 2 ends -->
<div class="outstep3" style="display:none;">
    <div class="back2 back2out"><i class="fa fa-long-arrow-left"></i></div>
    <h4 class="frm1-head">Enter Drop Location</h4>
    <div class="inner-addon left-addon">
        <i class="glyphicon glyphicon-search"></i>
        <input type="text" id="droploc" class="height40 form-control" placeholder="Enter drop location"/>
    </div>
</div>
<!-- step 3 ends -->
<!--map starts-->
<div class="map-out" style="display:none;">
    <img src="img/map.png" height="200px" width="100%">
    <button class="btn btn-skin btn-block confirm-loc-out">Confirm Location</button>
    <div class="inner-addon left-addon current-out" style="display:none;">
        <i class="glyphicon glyphicon-screenshot"></i>
        <button class="height40 current" >Current Location</button>
    </div>
</div>
<!--map ends-->
<!--out station ends-->
<!--logistics starts-->
<div class="div-map-li step1logistic" style="display:block;">
    <form id="logistic-form">
        <div class="row">
            <div class="frm2">
                <h4 class="frm1-head">Your logistics partner</h4>
                Bidding at lowest price
            </div>
        </div>
        {{csrf_field()}}
        <div class="text-left">
            <input type="hidden" name="type" value="3">
            <div class="pickup pickup-logistic row">
                <div class="pic-span col-xs-2">PICKUP</div>
                <div class="con-span col-xs-10"><input class="whenselect picuploc-logis" value="{{$from==''?@Session::get('form_booking')['pickup_from']:$from}}" type="text" required="" placeholder="Enter Pickup Location"></div>
            </div>
            <div class="drop drop-logistic row">
                <div class="pic-span col-xs-2">DROP</div>
                <div class="con-span col-xs-10"><input class="whenselect droploc-logis" value="{{$to==''?@Session::get('form_booking')['drop_to']:$to}}" type="text" required="" placeholder="Enter Drop Location"></div>
            </div>
            <div class="veh row">
                <div class="pic-span col-xs-2">VEHICLE</div>
                <div class="con-span col-xs-10">
                    <select class="form-control" name="vehicle_type_id" required>
                        <option value="">Select</option>
                        @foreach($vlist as $vlist_t)
                        <option value="{{$vlist_t['id']}}" {{@Session::get('form_booking')['vehicle_type_id']==@$vlist_t['id']?'selected':''}}>{{$vlist_t['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mat row">
                <div class="pic-span col-xs-2">GOODS</div>
                <div class="con-span col-xs-10"><input class="whenselect mat_type" type="text" name="material_type" value="{{@Session::get('form_booking')['material_type']}}" required="" placeholder="Select Material"></div>
            </div>
            <div class="weight row">
                <div class="pic-span col-xs-2">WEIGHT</div>
                <div class="con-span col-xs-5">
                    <input name="weight" value="{{@Session::get('form_booking')['weight']}}" required="" class="whenselect" type="text" placeholder="Enter Weight">  
                </div>
                <div class="con-span col-xs-5">
                    <select required="" name="weight_unit" class="whenselect">
                        <option {{@Session::get('form_booking')['weight_unit']=='kg'?'selected':''}} value="kg">KG</option>
                        <option {{@Session::get('form_booking')['weight_unit']=='ton'?'selected':''}} value="ton">TON</option>
                    </select>
                </div>
            </div>
            <div class="when row">
                <div class="pic-span col-xs-2">WHEN</div>
                <div class="con-span col-xs-10">
                    <select name="when" class="whenselect" id="logi-sch">
                        <option {{@Session::get('form_booking')['when']=='now'?'selected':''}} value="now">Now</option>
                        <option {{@Session::get('form_booking')['when']=='schedule_for_later'?'selected':''}} value="schedule_for_later">Schedule for later</option>
                    </select>
                </div>
            </div>
            <div class="row depart logi-sch" style="{{@Session::get('form_booking')['when']=='schedule_for_later'?'display:block':'display:none'}}">
                <div class="pic-span col-xs-2">DEPART</div>
                <div class="con-span col-xs-5">
                    <input type="date" class="depart_date whenselect" name="depart_date" {{@Session::get('form_booking')['when']=='schedule_for_later'?'required':''}} value="{{@Session::get('form_booking')['depart_date']}}">
                </div>
                <div class="con-span col-xs-5">
                    <select class="depart_time whenselect" name="depart_time">
                        <option value="12:00">12:00 AM</option>
                        <option value="12:15">12:15 AM</option>
                        <option value="12:30">12:30 AM</option>
                        <option value="12:45">12:45 AM</option>
                        <option value="01:00">01:00 AM</option>
                        <option value="01:15">01:15 AM</option>
                        <option value="01:30">01:30 AM</option>
                        <option value="01:45">01:45 AM</option>
                        <option value="02:00">02:00 AM</option>
                        <option value="02:15">02:15 AM</option>
                        <option value="02:30">02:30 AM</option>
                        <option value="02:45">02:45 AM</option>
                        <option value="03:00">03:00 AM</option>
                        <option value="03:15">03:15 AM</option>
                        <option value="03:30">03:30 AM</option>
                        <option value="03:45">03:45 AM</option>
                        <option value="04:00">04:00 AM</option>
                        <option value="04:15">04:15 AM</option>
                        <option value="04:30">04:30 AM</option>
                        <option value="04:45">04:45 AM</option>
                        <option value="05:00">05:00 AM</option>
                        <option value="05:15">05:15 AM</option>
                        <option value="05:30">05:30 AM</option>
                        <option value="05:45">05:45 AM</option>
                        <option value="06:00">06:00 AM</option>
                        <option value="07:15">07:15 AM</option>
                        <option value="07:30">07:30 AM</option>
                        <option value="07:45">07:45 AM</option>
                        <option value="08:00">08:00 AM</option>
                        <option value="08:15">08:15 AM</option>
                        <option value="08:30">08:30 AM</option>
                        <option value="08:45">08:45 AM</option>
                        <option value="09:00">09:00 AM</option>
                        <option value="09:15">09:15 AM</option>
                        <option value="09:30">09:30 AM</option>
                        <option value="09:45">09:45 AM</option>
                        <option value="10:00">10:00 AM</option>
                        <option value="10:15">10:15 AM</option>
                        <option value="10:30">10:30 AM</option>
                        <option value="10:45">10:45 AM</option>
                        <option value="11:00">11:00 AM</option>
                        <option value="11:15">11:15 AM</option>
                        <option value="11:30">11:30 AM</option>
                        <option value="11:45">11:45 AM</option>
                        <option value="12:00">12:00 PM</option>
                        <option value="12:15">12:15 PM</option>
                        <option value="12:30">12:30 PM</option>
                        <option value="12:45">12:45 PM</option>
                        <option value="01:00">01:00 PM</option>
                        <option value="01:15">01:15 PM</option>
                        <option value="01:30">01:30 PM</option>
                        <option value="01:45">01:45 PM</option>
                        <option value="02:00">02:00 PM</option>
                        <option value="12:00">02:15 PM</option>
                        <option value="12:00">02:30 PM</option>
                        <option value="12:00">02:45 PM</option>
                        <option value="12:00">03:00 PM</option>
                        <option value="12:00">03:15 PM</option>
                        <option value="03:30">03:30 PM</option>
                        <option value="03:45">03:45 PM</option>
                        <option value="04:00">04:00 PM</option>
                        <option value="04:15">04:15 PM</option>
                        <option value="04:30">04:30 PM</option>
                        <option value="04:45">04:45 PM</option>
                        <option value="05:00">05:00 PM</option>
                        <option value="05:15">05:15 PM</option>
                        <option value="05:30">05:30 PM</option>
                        <option value="05:45">05:45 PM</option>
                        <option value="06:00">06:00 PM</option>
                        <option value="07:15">07:15 PM</option>
                        <option value="07:30">07:30 PM</option>
                        <option value="07:45">07:45 PM</option>
                        <option value="08:00">08:00 PM</option>
                        <option value="08:15">08:15 PM</option>
                        <option value="08:30">08:30 PM</option>
                        <option value="08:45">08:45 PM</option>
                        <option value="09:00">09:00 PM</option>
                        <option value="09:15">09:15 PM</option>
                        <option value="09:30">09:30 PM</option>
                        <option value="09:45">09:45 PM</option>
                        <option value="10:00">10:00 PM</option>
                        <option value="10:00">10:15 PM</option>
                        <option value="10:30">10:30 PM</option>
                        <option value="10:45">10:45 PM</option>
                        <option value="11:00">11:00 PM</option>
                        <option value="11:15">11:15 PM</option>
                        <option value="11:30">11:30 PM</option>
                        <option value="11:45">11:45 PM</option>
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
<button class="btn btn-block btn-skin">Put For Bidding</button>
</div>
</form>
</div>
<!-- step 1 ends -->
<div class="step2logistic" style="display:none;">
    <div class="back2logistic back2"><i class="fa fa-long-arrow-left"></i></div>
    <h4 class="frm1-head">Enter Pickup Location</h4>
    <div class="inner-addon left-addon">
        <i class="glyphicon glyphicon-search"></i>
        <input type="text" id="picuploc-logis" class="height40 picuploc-logis form-control" value="{{$from==''?@Session::get('form_booking')['pickup_from']:$from}}" placeholder="Enter picup location" />
    </div>
</div>
<!-- step 2 ends -->
<div class="step3logistic" style="display:none;">
    <div class="back2logistic back2"><i class="fa fa-long-arrow-left"></i></div>
    <h4 class="frm1-head">Enter Drop Location</h4>
    <div class="inner-addon left-addon">
        <i class="glyphicon glyphicon-search"></i>
        <input type="text" id="droploc-logis" class="height40 droploc-logis form-control" value="{{$to==''?@Session::get('form_booking')['drop_to']:$to}}" placeholder="Enter drop location"/>
    </div>
</div>
<!-- step 3 ends -->
<!--map starts-->
<div class="map-logis" style="display:none;">
    <div id="map-logis" style="height:200px; width:100%"></div>
    <button class="btn btn-skin btn-block confirm-loc-logistic" confirm-act="">Confirm Location</button>
    <div class="inner-addon left-addon current-loc" style="display:none;">
        <i class="glyphicon glyphicon-screenshot"></i>
        <button class="height40 current current-logi" >Current Location</button>
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
</div>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyA-OBGAXvwI7wTNLbNT1l57Kjno8B8PK6Q&callback=initMap"></script>
<script>
   function initialize(lat, long){
       var mapOptions={
           zoom: 18,
           center: new google.maps.LatLng(lat, long),
           mapTypeId: google.maps.MapTypeId.ROADMAP,
           mapTypeControl: false,
           zoomControl:false,
           fullscreenControl: false,
           streetViewControl: false
       };
       map = new google.maps.Map(document.getElementById('map-logis'),mapOptions);
       google.maps.event.addListener(map,'center_changed', function(){
           var geocoder = new google.maps.Geocoder();
           var latLng = new google.maps.LatLng(map.getCenter().lat(), map.getCenter().lng());
           geocoder.geocode({ 'latLng': latLng}, function(results, status) {
               if (status == google.maps.GeocoderStatus.OK){
                   console.log(results[0].formatted_address);
                   var it_html=$('.confirm-loc-logistic').attr('confirm-act');
                   if(it_html=="picuploc-logis"){
                       $("#pickup-lat").val(map.getCenter().lat());
                       $("#pickup-long").val(map.getCenter().lng());
                   }
                   if(it_html=="droploc-logis"){
                       $("#drop-lat").val(map.getCenter().lat());
                       $("#drop-long").val(map.getCenter().lng());
                   }
                   $('#'+it_html).val(results[0].formatted_address);
               }
           });
       });
       $('<div/>').addClass('centerMarker').appendTo(map.getDiv());
   }
   google.maps.event.addDomListener(window, 'load', function(){
       var places_1 = new google.maps.places.Autocomplete(document.getElementById('picuploc-logis'));
       google.maps.event.addListener(places_1, 'place_changed', function (){
           place_1=places_1.getPlace();
           var latitude = place_1.geometry.location.lat();
           var longitude = place_1.geometry.location.lng();
           var address = place_1.formatted_address;
           $("#pickup_lts").val(address);
           $("#pickup-lat").val(latitude);
           $("#pickup-long").val(longitude);
           initialize(latitude, longitude);
       });
   });
   google.maps.event.addDomListener(window, 'load', function(){
       var places_1 = new google.maps.places.Autocomplete(document.getElementById('droploc-logis'));
       google.maps.event.addListener(places_1, 'place_changed', function (){
           place_1=places_1.getPlace();
           var latitude = place_1.geometry.location.lat();
           var longitude = place_1.geometry.location.lng();
           var address = place_1.formatted_address;
           $("#drop_lts").val(address);
           $("#drop-lat").val(latitude);
           $("#drop-long").val(longitude);
           initialize(latitude, longitude);
       });
   });
   $(document).on("click", ".current-logi", function(){
       if(navigator.geolocation){
           navigator.geolocation.getCurrentPosition(function(p){
               var geocoder = new google.maps.Geocoder();
               var latLng = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);
               geocoder.geocode({'latLng': latLng}, function(results, status){
                   if (status == google.maps.GeocoderStatus.OK){
                       $("#picuploc-logis").val(results[0].formatted_address);
                       $("#pickup-lat").val(p.coords.latitude);
                       $("#pickup-long").val(p.coords.longitude);
                       initialize(p.coords.latitude, p.coords.longitude);
                   }else{}
               });
           });
       }else{
           alert('Geo Location feature is not supported in this browser.');
       } 
   });
</script>
@endsection