<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Thela</title>
        <link rel="shortcut icon" href="img/fav.png" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <script src="https://www.google.com/recaptcha/api.js"></script>
        
    </head>
     <?php include'links.php' ?>
    <body>
        <?php include'loader.php' ?>
        <style>
            body{background-color:#F5F5F5;}
            			hr {
    margin-top:5px;
    margin-bottom:5px;
}
			.login{} .signup{display:none;} .otp{display:none;}.g-recaptcha{ margin-bottom:10px; }
.text-xs-center {
        text-align: center;
    }

    .g-recaptcha {
        display: inline-block;
    }
        </style>
        <script>
            $(function(){
  function rescaleCaptcha(){
    var width = $('.g-recaptcha').parent().width();
    var scale;
    if (width < 302) {
      scale = width / 302;
    } else{
      scale = 1.0; 
    }

    $('.g-recaptcha').css('transform', 'scale(' + scale + ')');
    $('.g-recaptcha').css('-webkit-transform', 'scale(' + scale + ')');
    $('.g-recaptcha').css('transform-origin', '0 0');
    $('.g-recaptcha').css('-webkit-transform-origin', '0 0');
  }

  rescaleCaptcha();
  $( window ).resize(function() { rescaleCaptcha(); });

});
        </script>
    
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-12 text-center">
                    <div class="row rome">
					<div class="col-xs-12">
				      <a href="index.php"><div class="back"><i class="fa fa-long-arrow-left"></i></div></a>
					  <h4>Login</h4>
				    </div>
				   </div>
				   <hr/>
                    <!-- login-->
                    <form action="logincode.php" method="post" enctype="multipart/form-data">
                    <div class="left-desk login">
                        <a href="index.php"><img src="img/logo3.png" height="50px"></a>
                        <h4>Enter Your Mobile Number</h4>
                        <p class="para">OTP will be sent for verification</p>
                        <input type="text" class="login-input" name="mobileno" placeholder="+91 Enter Your Number" required style="max-width:304px;"/>
                        <div class="text-xs-center"><div class="g-recaptcha" data-sitekey="6Lehh4oUAAAAADoiDbz6raxpCBQZkkV5Z2x_uTsQ"></div></div>
                        <button type="submit" name="submit" class="btn btn-skin" style="max-width:304px;width:100%;">LOGIN</button>
                    </div></form>
                    <!-- verify-->
                    <div class="left-desk otp">
                        <a href="index.php"><img src="img/logo3.png" height="50px"></a>
                        <h4>Verify & Login</h4>
                        <p class="para">Enter the OTP sent to 8765530888</p>
                        <input type="text" class="login-input" placeholder="Enter 4 digit OTP"/>
                        <button class="btn btn-skin btn-block">LOGIN</button>
                        <a href="#">Resend OTP</a>
                    </div>
                    <!-- signup-->
                    <div class="left-desk signup">
                        <a href="index.php"><img src="img/logo3.png" height="50px"></a>
                        <h4>Create Your Account</h4>
                        <p class="para">Please fill the details to SignUp</p>
                        <input type="text" class="form-controll" placeholder="Enter Full Name"/>
                        <input type="text" class="login-input" placeholder="Enter Email (Optional)"/>
                        <button class="btn btn-skin btn-block">CONTINUE</button>
                    </div>
                    <!-- ends-->
                </div>
                <div class="col-md-8 hidden-sm hidden-xs right-desk right-desk-gen">
                    <div class="right-desk-content">
                        <h3 class="white">We are always ready to help you.</h3>
                        # My Thela For Web
                    </div>
                </div>
            </div>
        </div>
            
    </body>
</html>

