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
  #form-login{} #form-signup{display:none;} #form-verify{display:none;}.g-recaptcha{ margin-bottom:10px; }
  .text-xs-center {
    text-align: center;
  }
 
</style>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-sm-12 text-center">