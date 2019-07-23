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
            background:url("{{asset('img/loader.gif')}}") no-repeat center center rgba(255,255,255,0.82);
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

<div class="container-fluid top-row hidden-xs hidden-sm">
	<div class="row">
		<div class="col-md-offset-7 col-md-5">
			<ul class="list-unstyled list-inline top-ul text-right">
				<li><a target="_blank" href="{{route('become.partner')}}">Become a Partner</a></li> | 
				<li>Offers</li> | 
				<li><a href="{{route('contact.us')}}">Contact Us</a></li> | 
				<li class="icon-top"><i class="fa fa-facebook-square"></i>&nbsp;<i class="fa fa-twitter-square"></i>&nbsp;<i class="fa fa-google-plus-square"></i>&nbsp;<i class="fa fa-linkedin-square"></i></li> 
			</ul>
		</div>
	</div>
</div>
<nav class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			</button>
			<a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('img/logo3.png')}}"></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class=""><a href="{{route('home')}}">Home</a></li>
				<li class=""><a href="{{route('about.us')}}">About Us</a></li>
				<li class=""><a href="{{route('our.fleet')}}">Our Fleet</a></li>
				@if(!Auth::user()) 
				<li><a href="{{route('login')}}">Login</a></li>
				@endif
				<li class="hidden-md hidden-lg"><a href="{{route('become.partner')}}">Become a Partner</a></li>
				<li><a class="book-now" href="{{route('book')}}">BOOK NOW</a></li>
				<!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
			</ul>
		</div>
	</div>
</nav>
