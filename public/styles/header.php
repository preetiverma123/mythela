<div class="container-fluid top-row hidden-xs hidden-sm">
<div class="row">
<div class="col-md-offset-7 col-md-5">
<ul class="list-unstyled list-inline top-ul text-right">
<li><a target="_blank" href="partner.php">Become a Partner</a></li> | 
<li>Offers</li> | 
<li><a href="contact.php">Contact Us</a></li> | 
 
<li class="icon-top"><i class="fa fa-facebook-square"></i>&nbsp;<i class="fa fa-twitter-square"></i>&nbsp;<i class="fa fa-google-plus-square"></i>&nbsp;<i class="fa fa-linkedin-square"></i></li> 

</ul>
</div>
</div>
</div>
<?php $active = basename($_SERVER['PHP_SELF'], ".php"); ?>
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><img src="img/logo.gif"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
	    <li class="<?php if($active=='index'){?>active<?php }?>"><a href="index.php">Home</a></li>
		<li class="<?php if($active=='about'){?>active<?php }?>"><a href="about.php">About Us</a></li>
        <li class="<?php if($active=='our-fleet'){?>active<?php }?>"><a href="our-fleet.php">Our Fleet</a></li>
        <li><a href="login.php">Login</a></li>
        <li class="hidden-md hidden-lg"><a href="partner.php">Become a Partner</a></li>
		<li><a class="book-now" href="book-now.php">BOOK NOW</a></li>
        <!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
      </ul>
    </div>
  </div>
</nav>