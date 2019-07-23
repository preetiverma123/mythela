@extends('layouts.app-front')
@section('content')
<div class="banner-bg jumbotron">
  <div class="container text-center">
    <div class="col-md-4">
      <div class="row">
        <div class="my-form">
          <div class="col-xs-12 frm1">
            <div class="scrollmenu">
              <a class="transport" href=""><span class="active-btn">TRANSPORT</span></a>
              <a class="incity" href=""><span>INCITY</span></a>
              <a class="outcity" href=""><span>OUTCITY</span></a>
              <a class="rentals" href=""><span>RENTALS</span></a>
            </div>
          </div>
          <div class="step1">
            <form id="book-now" action="{{route('book')}}" method="get">
              <div class="row">
                <br/>
                <p><br/></p>
                <div class="frm2">
                  <h4 class="frm1-head">Transport Logistics</h4>
                  Anywhere in India 
                </div>
              </div>
              <div class="text-left">
                <div class="pickup row">
                  <div class="pic-span col-xs-2">PICKUP</div>
                  <div class="con-span col-xs-10"><input class="whenselect" name="from"  id="source_txt"  type="text" placeholder="Enter picup location"></div>
                <input type="hidden" id="default_latitude" name="lat" placeholder="Latitude"/>
                <input type="hidden" id="default_longitude" name="long" placeholder="Longitude"/>
                </div>
                <div class="drop row">
                  <div class="pic-span col-xs-2">DROP</div>
                  <div class="con-span col-xs-10"><input class="whenselect"  name="to" id="tosource_txt" type="text" placeholder="Enter drop location"></div>
                  <input type="hidden" id="default_latitude_drop" name="drop_lat" placeholder="Latitude"/>
                  <input type="hidden" id="default_longitude_drop" name="drop_long" placeholder="Longitude"/>
                </div>
                <div class="when row">
                  <div class="pic-span col-xs-2">WHEN</div>
                  <div class="con-span col-xs-10">
                    <select class="whenselect" id="privileges"  onclick="craateUserJsObject.ShowPrivileges();">
                      <option>Now</option>
                      <option value="schedule">Schedule for later</option>
                    </select>
                  </div>
                </div>
                <div class="departt row depart" style="display:none;">
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
                    </select>
                  </div>
                </div>
                <script>
                  var Privileges = jQuery('#privileges');
                  var select = this.value;
                  Privileges.change(function () {
                    if ($(this).val() == 'schedule') {
                      $('.depart').show();
                    }
else $('.depart').hide(); // hide div if value is not "custom"
});
</script>
</div>
 <button class="btn btn-skin btn-block" type="submit">Book Now</button>
</form>
</div>
<!-- step 1 ends -->
<div class="step2" style="display:none;">
  <br/><br/>
  <div class="back"><i class="fa fa-long-arrow-left"></i></div>
  <h4 class="frm1-head">Enter Pickup Location</h4>
  <div class="inner-addon left-addon">
    <i class="glyphicon glyphicon-search"></i>
    <input type="text" id="autopickup_addr" class="height40 form-control" placeholder="Enter pickup location"/>
  </div>
  <div class="inner-addon left-addon">
    <i class="glyphicon glyphicon-screenshot"></i>
    <!--<input type="text" class="height40" placeholder="Current Location" onclick="getLocation()"/>-->
    <button id="cur_loc" class="height40 current" >Current Location</button>
  </div>
  <div class="text-center powered"><img src="{{asset('img/powered-by-google-on-white.png')}}" width="100px"></div>
  <style>
  .inner-addon { 
    position: relative; margin: 8px 0;
  }
  .powered{background-color:rgba(255,255,255,0.7);padding:10px;    border-radius: 4px;}
  /* style icon */
  .inner-addon .glyphicon{
    position: absolute;
    padding: 11px;
    font-size: 17px;
    pointer-events: none;
    color:#000;
  }
  /* align icon */
  .left-addon .glyphicon{ left:  0px;}
  .right-addon .glyphicon{ right: 0px;}
  /* add padding  */
  .left-addon input  { padding-left:  35px; }
  .right-addon input { padding-right: 30px; }
  .height40{height:40px; background-color:rgba(255,255,255,0.7);width:100%;color:#000;}
</style>
</div>
<!-- step 2 ends -->
<div class="step3" style="display:none;">
  <div class="back"><i class="fa fa-long-arrow-left"></i></div>
  <br/><br/>
  <h4 class="frm1-head">Enter Drop Location</h4>
  <div class="inner-addon left-addon">
    <i class="glyphicon glyphicon-search"></i>
    <input type="text" id="autodrop_pickup_addr" class="height40 form-control" placeholder="Enter Drop Location" />
  </div>
  <div class="text-center powered"><img src="{{asset('img/powered-by-google-on-white.png')}}" width="100px"></div>
</div>
<!-- step 3 ends -->
<script>
  $(document).ready(function(){
    $(".pickup").click(function(){ 
      $(".step1").css("display", "none");
      $(".step2").css("display", "block");
      $(".step3").css("display", "none");
    });
    $(".drop").click(function(){
      $(".step1").css("display", "none");
      $(".step3").css("display", "block");
      $(".step2").css("display", "none");
    });
    $(".back").click(function(){
      $(".step1").css("display", "block");
      $(".step2").css("display", "none");
      $(".step3").css("display", "none");
    });
    $(".current").click(function(){
      $(".step1").css("display", "block");
      $(".step2").css("display", "none");
      $(".step3").css("display", "none");
    });
  });
</script> 
</div>
</div>
</div>
<div class="col-md-8 hidden-xs">
  <br/><br/>
  <h1>My Thela | Book Now</h1> 
  <img src="{{asset('img/ul.png')}}" width="50%">	
  <p>Bidding Process for Minimum Fares</p>
</div>
</div>
</div>
<br/>
<div class="container bg-3 text-center">    
  <h2>Logistics @ My Thela</h2>
  <p class="info">We have started the bidding process in logistics services, So that every user will choose the minimum price for their transportation. All drivers will quote minimum price for your booking, So that you can choose any of the driver you wish to confirm their bid. This is the best way you can use our services at minimum price.</p>
  <img src="{{asset('img/ul.png')}}" width="50%">
  <br/><br/>
</div>
<div class="container bg-3 text-center">    
  <div class="row">
    <div class="col-sm-4"> 
      <div class="thela-item">
        <img src="{{asset('img/3.jpg')}}" class="img-responsive" style="width:100%" alt="Image">
        <div class="item-head">Integrated Logistics</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="thela-item">
        <img src="{{asset('img/2.jpg')}}" class="img-responsive" style="width:100%" alt="Image">
        <div class="item-head">Express</div>
      </div>
    </div>
    <!--<div class="col-sm-3">
      <div class="thela-item">
        <img src="{{asset('img/4.jpg')}}" class="img-responsive" style="width:100%" alt="Image">
        <div class="item-head">Supply Chain Solutions</div>
      </div>
    </div>-->
    <div class="col-sm-4">
      <div class="thela-item">
        <img src="{{asset('img/1.jpg')}}" class="img-responsive" style="width:100%" alt="Image">
        <div class="item-head">F&B Trading</div>
      </div>
    </div>
  </div>
</div><br><hr/>
<div class="container bg-3 text-center">    
  <h2>For Every Occasion</h2>
  <p class="info">We offer city taxis, inter-city cabs, and logistic transportation</p>
  <img src="{{asset('img/ul.png')}}" width="50%">
  <br/><br/>
</div>
<div class="container bg-3">    
  <div class="row">
    <div class="col-md-3">
      <div class="thela-item2">
        <img class="rib" src="{{asset('img/rib.png')}}">
        <img src="{{asset('img/city1.jpg')}}" width="100%">
        <h4 class="h44 text-center">CITY TAXI</h4>
        <div class="info-cont">
          <p class="text-justify para"> The perfect way to get through your everyday travel needs. City taxis are available 24/7 and you can book and travel in an instant.  You can choose from a wide range of options.</p>
          <br/>
          <div class="row text-center">
            <div class="col-xs-6 dtt"><i class="fa fa-snowflake-o tt" aria-hidden="true"></i> AC Cabs</div>
            <div class="col-xs-6 dtt"><i class="fa fa-thumbs-o-up tt" aria-hidden="true"></i> Pocket Friendly</div>
          </div>
          <img src="{{asset('img/ul.png')}}" width="100%">
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="thela-item2">
        <img class="rib" src="{{asset('img/rib.png')}}">
        <img src="{{asset('img/city2.jpg')}}" width="100%">
        <h4 class="h44 text-center">OUTSTATION</h4>
        <div class="info-cont">
          <p class="text-justify para"> Ride out of town at affordable one-way and round-trip fares with MyThela’s intercity travel service. Choose from a range of AC cabs driven by top partners, you can book upto 7 days in advance.</p>
          <br/>
          <div class="row text-center">
            <div class="col-xs-12 dtt"><i class="fa fa-car tt" aria-hidden="true"></i> Advance Bookings</div>
          </div>
          <img src="{{asset('img/ul.png')}}" width="100%">
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="thela-item2">
        <img class="rib" src="{{asset('img/rib.png')}}">
        <img src="{{asset('img/city3.jpg')}}" width="100%">
        <h4 class="h44 text-center">TRANSPORT</h4>
        <div class="info-cont">
          <p class="text-justify para"> Once you opt for our services, our expert professionals will take the utmost care to ensure that your freight forwarding and logistics requirements are fulfilled in an entirely hassle-free manner.</p>
          <br/>
          <div class="row text-center">
            <div class="col-xs-6 dtt"><i class="fa fa-plane tt" aria-hidden="true"></i> Express</div>
            <div class="col-xs-6 dtt"><i class="fa fa-shield tt" aria-hidden="true"></i> Secure</div>
          </div>
          <img src="{{asset('img/ul.png')}}" width="100%">
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="thela-item2">
        <img class="rib" src="{{asset('img/rib.png')}}">
        <img src="{{asset('img/city4.jpg')}}" width="100%">
        <h4 class="h44 text-center">RENTALS</h4>
        <div class="info-cont">
          <p class="text-justify para"> With MyThela Rentals you get a cab at your disposal. So be it a  day long business meeting, a shopping trip or any place with your friends or just a day out in a new city, we have you covered. </p>
          <br/>
          <div class="row text-center">
            <div class="col-xs-12 dtt"><i class="fa fa-map-marker tt" aria-hidden="true"></i> Multiple Destinations</div>
          </div>
          <img src="{{asset('img/ul.png')}}" width="100%">
        </div>
      </div>
    </div>
  </div></div>
  <hr/>
  <div class="container bg-3">    
    <div class="row">
      <div class="col-md-8">
        <img src="{{asset('img/logistic.jpg')}}" width="100%">
      </div>
      <div class="col-md-4">
        <div class="htt"><strong>RJM Enterprises<strong></div><br/>
          <div class="heading2">OUR VISION</div>
          <div class="heading3">Our vision is to be globally recognized by manufacturer and supplier as a leading provider of specialized transport logistics management services in India. This we achieve through understanding the complexities associated with trading in Africa and having the right people, systems and strategic partnerships to enable us to continuously exceed our clients’ expectations.</div>
          <!--<br/>-->
          <!--<a class="read-more" href="#">READ MORE</a>-->
        </div>
      </div>
    </div><br><hr/>
    <div class="container">
      <br/>
      <div class="row">
        <div class="col-sm-7">
          <div class="hidden-sm hidden-xs"><br/><br/><br/></div>
          <h2>Book a <strong>Cab</strong> from the <strong>App</strong></h2>
          <p>Download the app for exclusive deals and ease of booking
          </p>
          <div class="hidden-sm hidden-xs"><br/><br/><br/></div>
          <img src="{{asset('img/playstore.png')}}" class="store">
          <img src="{{asset('img/appstore.png')}}" class="store">
        </div>
        <div class="col-sm-5 hidden-xs">
          <img src="{{asset('img/thela-booking.png')}}" width="100%">
        </div>
      </div>
    </div>
    <div class="container-fluid thela-features">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-4">
            <div class="feature-content">
              <i class="fa fa-tty fa-4x"></i>
              <h3>24/7 Customer Support</h2>
                <p class="para">
                  A dedicated 24x7 customer<br>
                  support team always at your<br>
                  service to help solve any problem
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="feature-content">
                <i class="fa fa-shield fa-4x"></i>
                <h3>Your Safety First</h2>
                  <p class="para">
                    Keep your loved ones informed<br>
                    about your travel routes or call<br>
                    emergency services when in need
                  </p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="feature-content">
                  <i class="fa fa-cab fa-4x"></i>
                  <h3>Top Rated Drivers</h2>
                    <p class="para">
                      All our driver-partners are<br>
                      background verified and trained to<br>
                      deliver only the best experience
                    </p>
               </div>
           </div>
       </div> 
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyA-OBGAXvwI7wTNLbNT1l57Kjno8B8PK6Q&sensor=false&callback=initMap"></script>
  <script>
    google.maps.event.addDomListener(window, 'load', function(){
      var places_1 = new google.maps.places.Autocomplete(document.getElementById('autopickup_addr'));
      google.maps.event.addListener(places_1, 'place_changed', function (){
        var place_1 = places_1.getPlace();
        var address = place_1.formatted_address;
        var latitude = place_1.geometry.location.lat();
        var longitude = place_1.geometry.location.lng();
        $("#default_latitude").val(latitude);
        $("#default_longitude").val(longitude);
        $("#source_txt").val(address);
        $(".step1").css("display", "block");
        $(".step2").css("display", "none");
        $(".step3").css("display", "none");
      });

     var places_2 = new google.maps.places.Autocomplete(document.getElementById('autodrop_pickup_addr'));
      google.maps.event.addListener(places_2, 'place_changed', function(){
        var place_2 = places_2.getPlace();
        var address = place_2.formatted_address;
        var latitude = place_2.geometry.location.lat();
        var longitude = place_2.geometry.location.lng();
        $("#default_latitude_drop").val(latitude);
        $("#default_longitude_drop").val(longitude);
        $("#tosource_txt").val(address);
        $(".step1").css("display", "block");
        $(".step2").css("display", "none");
        $(".step3").css("display", "none");
      });
    });
  </script>
  <script>
    $(document).on("click", "#cur_loc", function(){
      if(navigator.geolocation){
         navigator.geolocation.getCurrentPosition(function(p){
         var geocoder = new google.maps.Geocoder();
         var latLng = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);
          geocoder.geocode({'latLng': latLng}, function(results, status){
           if(status == google.maps.GeocoderStatus.OK) {
             $('#source_txt').val(results[0].formatted_address);
             $('#default_latitude').val(p.coords.latitude);
             $('#default_longitude').val(p.coords.longitude);
           }else{}
          });
      });
      }else{
       alert('Geo Location feature is not supported in this browser.');
     } 
   });
 </script>
</div>
@endsection