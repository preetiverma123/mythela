<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ogonn</title>
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
		
   
        </style>
       
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-12 text-center">
     <!--               <div class="row rome">-->
					<!--<div class="col-xs-12">-->
				 <!--     <a href="index.php"><div class="back"><i class="fa fa-long-arrow-left"></i></div></a>-->
					<!--  <h4>Login</h4>-->
				 <!--   </div>-->
				 <!--  </div>-->
				 <!--  <hr/>-->
                    <!-- login-->
                    <br/>
                    <form action="logincode.php" method="post" enctype="multipart/form-data">
                    <div class="left-desk login">
                        <a href="index.php"><img src="img/giphy.gif" height="50px"></a>
                        <h4>Reset Password</h4>
                        <input type="password" class="login-input2" placeholder="New Password" required style="max-width:304px;"/>
                        <input type="password" class="login-input" placeholder="Confirm Password" required style="max-width:304px;"/>
                        
                        <button type="submit" name="submit" class="btn btn-skin" style="max-width:304px;width:100%;">SUBMIT</button>
                        <br/>
                      
                    </div>
                    
                    </form>
                   
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

