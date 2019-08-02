<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ogonn</title>
  <link rel="shortcut icon" href="img/fav.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link href='https://fonts.googleapis.com/css?family=Convergence' rel='stylesheet'>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Handlee|Open+Sans:300,400,600,700,800" rel="stylesheet">    </head>
  <body>
    <div id="load"></div>
    <style>
    #load{
      width:100%;
      height:100%;
      position:fixed;
      z-index:99999;
      background:url("img/loader.gif") no-repeat center center rgba(255,255,255,0.82)
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
    .add{color:green;}
    .sub{color:red;}
    .booking-price{font-size:22px;}
  </style>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 col-sm-12 text-center">
        <!-- profile-->
        <div class="row rome">
          <div class="col-xs-12">
            <a href="{{route('profile')}}"><div class="back"><i class="fa fa-long-arrow-left"></i></div></a>
            <h4> Wallet History</h4>
          </div>
        </div>
        <hr/>
        <div class="row">
          <div class="col-xs-12">
            @foreach($transactions as $transaction)
             <!-- item-->
             @if($transaction['wallet_id']!=null && $transaction['wallet_id_to']==null && $transaction['order_id']!=null && $transaction['booking_id']==null && $transaction['payment_method']=="online" && $transaction['status']=="paid")
             <div class="booking-history">
              <div class="booking-date">{{date('d-m-Y h:i a', strtotime($transaction['created_at']))}} <br/><span class="vehicle-name">Money debited from account</span><span class="username"> To <b>{{$transaction->User->fullname}}</b></span></div>
              <div class="booking-price sub">-<i class="fa fa-inr"></i> {{$transaction['amount']}}</div>
              <br/><br/>
            </div>
             @endif

             @if($transaction['wallet_id']!=null && $transaction['wallet_id_to']==null && $transaction['order_id']!=null && $transaction['booking_id']==null && $transaction['payment_method']=="online" && $transaction['status']=="received")
             <div class="booking-history">
              <div class="booking-date">{{date('d-m-Y h:i a', strtotime($transaction['created_at']))}} <br/><span class="vehicle-name">Money Added to wallet</span><span class="username"> To <b>{{$transaction->User->fullname}}</b></span></div>
              <div class="booking-price add">+<i class="fa fa-inr"></i> {{$transaction['amount']}}</div>
              <br/><br/>
            </div>
             @endif

             @if($transaction['wallet_id']!=null && $transaction['wallet_id_to']!=null && $transaction['order_id']!=null && $transaction['booking_id']==null && $transaction['payment_method']=="wallet" && $transaction['status']=="paid")
             <div class="booking-history">
              <div class="booking-date">{{date('d-m-Y h:i a', strtotime($transaction['created_at']))}} <br/><span class="vehicle-name">Wallet to wallet transfer</span><span class="username"> To <b>{{$transaction->User->fullname}}</b></span></div>
              <div class="booking-price sub">-<i class="fa fa-inr"></i> {{$transaction['amount']}}</div>
              <br/><br/>
            </div>
             @endif

             @if($transaction['wallet_id']==null && $transaction['wallet_id_to']!=null && $transaction['order_id']!=null && $transaction['booking_id']==null && $transaction['payment_method']=="wallet" && $transaction['status']=="received")
             <div class="booking-history">
              <div class="booking-date">{{date('d-m-Y h:i a', strtotime($transaction['created_at']))}} <br/><span class="vehicle-name">Money Received from wallet</span><span class="username"> To <b>{{$transaction->User->fullname}}</b></span></div>
              <div class="booking-price add">+<i class="fa fa-inr"></i> {{$transaction['amount']}}</div>
              <br/><br/>
            </div>
             @endif

             @if($transaction['wallet_id']!=null && $transaction['wallet_id_to']==null && $transaction['order_id']!=null && $transaction['booking_id']!=null && $transaction['payment_method']=="wallet" && $transaction['status']=="paid")
             <div class="booking-history">
              <div class="booking-date">{{date('d-m-Y h:i a', strtotime($transaction['created_at']))}} <br/><span class="vehicle-name">Wallet paid for booking</span><span class="username"> To <b>{{$transaction->User->fullname}}</b></span></div>
              <div class="booking-price sub">-<i class="fa fa-inr"></i> {{$transaction['amount']}}</div>
              <br/><br/>
            </div>
             @endif

             @if($transaction['wallet_id']==null && $transaction['wallet_id_to']==null && $transaction['order_id']==null && $transaction['booking_id']!=null && $transaction['payment_method']=="online" && $transaction['status']=="paid")
             <div class="booking-history">
              <div class="booking-date">{{date('d-m-Y h:i a', strtotime($transaction['created_at']))}} <br/><span class="vehicle-name">Online paid for booking</span><span class="username"> To <b>{{$transaction->User->fullname}}</b></span></div>
              <div class="booking-price sub">-<i class="fa fa-inr"></i> {{$transaction['amount']}}</div>
              <br/><br/>
            </div>
             @endif

             @if($transaction['wallet_id']==null && $transaction['wallet_id_to']==null && $transaction['order_id']!=null && $transaction['booking_id']!=null && $transaction['payment_method']=="cash" && $transaction['status']=="paid")
             <div class="booking-history">
              <div class="booking-date">{{date('d-m-Y h:i a', strtotime($transaction['created_at']))}} <br/><span class="vehicle-name">Cash paid for booking</span><span class="username"> To <b>{{$transaction->User->fullname}}</b></span></div>
              <div class="booking-price sub">-<i class="fa fa-inr"></i> {{$transaction['amount']}}</div>
              <br/><br/>
            </div>
             @endif
            @endforeach
          </div>
        </div>
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