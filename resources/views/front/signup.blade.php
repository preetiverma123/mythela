<?php //echo $_GET['mobileno'];//echo $mob; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Thela</title>
        <link rel="shortcut icon" href="img/fav.png" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/mythela.css">
          <link href='https://fonts.googleapis.com/css?family=Convergence' rel='stylesheet'>
         <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <link href="https://fonts.googleapis.com/css?family=Handlee|Open+Sans:300,400,600,700,800" rel="stylesheet">
        <?php //include'links.php' ?>
    </head>
    <body>
        <style>
            body{background-color:#F5F5F5;}
		
			.signup{display:block;}
			.otp{display:none;}
        </style>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-12 text-center">
                    
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
                    <form action="signup_ins" method="post" enctype="multipart/form-data">
                      
                    <div class="left-desk signup">{{csrf_field()}}
                    <input type="hidden" class="form-controll" name="mob" value="<?php echo $mob; ?>">
                        <a href="index.php"><img src="img/logo3.png" height="50px"></a>
                        <h4>Create Your Account</h4>
                        <p class="para">Please fill the details to SignUp</p>
                        <input type="text" class="form-controll" name="name" placeholder="Enter Full Name"/>
                        <input type="text" class="login-input" name="email" placeholder="Enter Email (Optional)"/>
                        <button class="btn btn-skin btn-block">CONTINUE</button>
                    </div>
                    </form>
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