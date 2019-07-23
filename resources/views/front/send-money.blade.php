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
              <a href="{{route('profile')}}"><div class="back"><i class="fa fa-long-arrow-left"></i></div></a>
              <h4> Send Money to Wallet</h4>
            </div>
          </div>
          <hr/>
          <div class="row text-center">
            <form method="post">
              <div class="col-xs-12">
                {{csrf_field()}}
                <br/>
                <p class="para">Current Wallet Balance <i class="fa fa-inr"></i> {{$ulist['wallet']['amount']}} /-</p>
                @if(Session::get('msg'))
                <div class="alert alert-{{Session::get('msg')['type']}} alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{Session::get('msg')['text']}}</strong>
                </div>
                @endif
                <input type="text" class="amnt-input" id="mobile_to" name="mobile" required="" pattern="^\d{10}$" title="Enter valid 10 digit mobile number" placeholder="+91 Enter Your Number">
                <input type="text" class="amnt-input" name="amount" placeholder="Enter Amount" required=""/>
                <button type="submit" class="btn btn-skin btn-block" style="margin-top:10px;"><i class="fa fa-share"></i> Send Money</button>
              </div>
            </form>
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