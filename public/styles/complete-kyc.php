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
                    <!-- profile-->
                    <div class="row rome" style="background-color:#fff;">
                        <div class="col-xs-12">
                            <a href="profile.php">
                                <div class="back"><i class="fa fa-long-arrow-left"></i></div>
                            </a>
                            <h4><i class="fa fa-address-card-o" aria-hidden="true"></i> Complete KYC</h4>
                        </div>
                    </div>
                    <hr/>
                    <div class="row text-center">
                        <div class="col-xs-12">
                            <br/>
                            <select  class="login-input2">
                                <option>Select ID Type</option>
                                <option>Aadhar</option>
                                <option>Voter ID</option>
                                <option>Driving License</option>
                                <option>PAN</option>
                            </select>
                            <input type="tel" maxlength="14" class="login-input" placeholder="Enter ID No." />
                           
                            <!--file -->
<!--                           <label for="file-upload" class="custom-file-upload">-->
<!--    <i class="fa fa-cloud-upload"></i> Upload Image-->
<!--  </label>-->
<!--  <input id="file-upload" name='upload_cont_img' type="file" style="display:none;">-->
<!--  <script>-->
<!--  $('#file-upload').change(function() {-->
<!--  var i = $(this).prev('label').clone();-->
<!--  var file = $('#file-upload')[0].files[0].name;-->
<!--  $(this).prev('label').text(file);-->
<!--});-->
<!--</script>-->
<!--<style>-->
<!--.custom-file-upload {-->
<!--    margin-bottom:15px;-->
<!--  border: 1px solid #ccc;-->
<!--  display: inline-block;-->
<!--  padding: 6px 12px;-->
<!--  cursor: pointer;-->
<!--}-->
<!--</style>-->
                            <!--file-->
                            <button class="btn btn-skin btn-block">SUBMIT</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 hidden-sm hidden-xs right-desk right-desk-gen">
                    <div class="right-desk-content">
                        <h3 class="white">KYC will be verified very soon by the admin.</h3>
                        # My Thela For Web
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>