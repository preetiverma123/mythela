<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Thela</title>
  <link rel="shortcut icon" href="{{asset('img/fav.png')}}" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('css/mythela.css')}}">
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
    </script>	<style>
    body{background-image:url({{asset('img/bg/bg3.jpg')}});}
  </style>
  <style>
  body{background-color:#F5F5F5;}
  hr {
    border:none;
    margin-top:5px;
    margin-bottom:5px;
  }
</style>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-sm-12 text-center">
      <!-- profile-->
      <div class="row rome">
        <div class="col-xs-12">
          <a href="{{route('active.booking')}}"><div class="back"><i class="fa fa-long-arrow-left"></i></div></a>
          <h4> Bidding Results</h4>
        </div>
      </div>
      <hr/>