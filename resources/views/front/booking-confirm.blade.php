<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ogonn</title>
  <link rel="shortcut icon" href="{{asset('img/fav.png')}}" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link href='https://fonts.googleapis.com/css?family=Convergence' rel='stylesheet'>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Handlee|Open+Sans:300,400,600,700,800" rel="stylesheet">    
</head>
  <body>
    <div id="load"></div>
    <style>
    #load{
      width:100%;
      height:100%;
      position:fixed;
      z-index:99999;
      background:url("{{asset('img/loader.gif')}}") no-repeat center center rgba(255,255,255,0.82)
    }
  </style>
  <script>
    document.onreadystatechange = function () {
      var state = document.readyState
      if (state == 'complete') {
        setTimeout(function(){
          document.getElementById('interactive');
          document.getElementById('load').style.visibility="hidden";
        },1000);
      }
    }
    </script>        <style>
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
      <form method="post">
        {{csrf_field()}}
      <div class="col-md-4 col-sm-12 text-center">
        <!-- profile-->
        <div class="row rome">
          <div class="col-xs-12">
            <a href="{{route('bidding.results', ['booking_id'=>encode($booking['booking_id'])])}}"><div class="back"><i class="fa fa-long-arrow-left"></i></div></a>
            <h4> {{$booking['bookingInfo']['vehicle_type'].', '.$booking['bookingInfo']['weight'].$booking['bookingInfo']['weight_unit']}}</h4>
          </div>
        </div>
        <hr/>
        <div class="row">
          <div class="col-xs-12">
            <!-- item-->
            <div class="booking-history">
              <img src="{{asset('img/map.png')}}" width="100%"/>
              <div class="text-left" style="margin:10px;">
                <i class="fa fa-circle" style="color:#498F1F;"></i> {{addr_ltln($booking['bookingInfo']['picup_lat'], $booking['bookingInfo']['picup_long'])}}<br/>
                <i class="fa fa-circle" style="color:#FF665A;"></i>
                {{addr_ltln($booking['bookingInfo']['drop_lat'], $booking['bookingInfo']['drop_long'])}}
              </div>
              <hr/>
              <div class="row">
                <div class="col-xs-12">
                  <div class="total-fare"><i class="fa fa-inr"></i> {{$booking['price']}}</div>
                  <p class="para">Total Fare</p>
                </div>
              </div>
              <hr/>
              <div class="row text-left">
                <div class="col-xs-6">
                  <!--<i class="fa fa-cab"></i> 5 Seat-->
                  <i class="fa fa-truck"></i> 
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
              <div class="hidden-xs hidden-sm"><button  class="btn mob-btn">CONFIRM BOOKING</button></div>
            </div>
          </div>
        </div>
      </div>
      <div class="mob-di hidden-md hidden-lg"><button  class="btn mob-btn">CONFIRM BOOKING</button></div>
    </form>
      <!--main mobile column-->
      <div class="col-md-8 hidden-sm hidden-xs right-desk right-desk-gen">
        <div class="right-desk-content">
          <h3 class="white">We are always ready to help you.</h3>
          # Ogonn For Web
        </div>
      </div>
    </div> <!-- row ends -->
  </div><!-- container ends -->
</body>
</html>