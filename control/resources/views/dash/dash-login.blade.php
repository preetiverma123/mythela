<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ogonn</title>
  <link rel="shortcut icon" href="img/fav.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <script src="https://www.google.com/recaptcha/api.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
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
  </script>
  <style>
  body{background-color:#F5F5F5;}
  hr {
    margin-top:5px;
    margin-bottom:5px;
  }
  .over{   width:100%; background-color: rgba(255,255,255,0.9);
    position: absolute;
    top: 20px;    height: 392px; }
    .cont{position: relative;
      top: 50%;
      transform: translateY(-50%);text-align:center;}
    </style>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-sm-12 text-center">
          <!-- login-->
          <br/>
          <form method="post">
            {{csrf_field()}}
            <div class="left-desk login">
              <a href="{{route('home')}}"><img src="img/giphy.png" height="50px"></a>
              <h4>Admin Login</h4>
              @if(Session::get('msg'))
              <div class="alert alert-{{Session::get('msg')['type']}} alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{Session::get('msg')['text']}}</strong>
              </div>
              @endif
              <input type="email" name="email" class="login-input2" placeholder="Email" required style="max-width:304px;"/>
              {{ $errors->first('email') }}
              <input type="password" name="password" class="login-input" placeholder="Password" required style="max-width:304px;"/>
              {{ $errors->first('password') }}
              <button type="submit" name="submit" class="btn btn-skin" style="max-width:304px;width:100%;">LOGIN</button>
              <br/>
              <a href="#">Forgot Password ?</a>
            </div>
          </form>
          @if(Auth::check())
          <div class="row over">
            <div class="col-xs-12 cont">
              <h4>Your Session is not Expired</h4>
              <a href="{{route('dash.logout')}}" class="btn btn-danger"><i class="fa fa-power-off"></i> Logout</a>
            </div>
          </div>
          @endif
        </div>
        <div class="col-md-8 hidden-sm hidden-xs right-desk4 right-desk-gen">
          <div class="right-desk-content2">
            <h2 class="white">Admin Login</h2>
            # Ogonn Admin
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>