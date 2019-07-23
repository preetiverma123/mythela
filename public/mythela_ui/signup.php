<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Thela</title>
        <link rel="shortcut icon" href="img/fav.png" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?php include'links.php' ?>
    </head>
    <body>
        <style>
            body{background-color:#F5F5F5;}
			.login{display:none;}
			.signup{}
			.otp{display:none;}
        </style>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-12 text-center">
                    <!-- login-->
                    <div class="left-desk login">
                        <a href="index.php"><img src="img/logo3.png" height="50px"></a>
                        <h4>Enter Your Mobile Number</h4>
                        <p class="para">OTP will be sent for verification</p>
                        <input type="text" class="login-input" placeholder="+91 Enter Your Number"/>
                        <img src="img/recaptcha.png" width="100%" style="margin-bottom:10px;"/>
                        <button class="btn btn-skin btn-block">LOGIN</button>
                    </div>
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