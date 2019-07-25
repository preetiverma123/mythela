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
    .amnt-input{
      padding-left: 10px;
      margin: 6px 0px;
      height: 48px;
      border-radius: 4px;
      background-color: #fff;
      border: 1px solid #e5e5e5;
      width: 100%;
    }
    .promo-link{text-decoration:none !important;}
    .promo-input{
      width:100%;
      text-transform: uppercase;
      PADDING:20px;
      text-align:center;
      border: 0;
      outline: 0;
      background: transparent;}		
    </style>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-sm-12 text-center">
          <!-- profile-->
          <div class="row rome" style="background-color:#fff;">
            <div class="col-xs-12">
              <a href="{{route('profile')}}"><div class="back"><i class="fa fa-long-arrow-left"></i></div></a>
              <h4> Add Money to Wallet</h4>
            </div>
          </div>
          <hr/>
          <div class="row text-center">
            <form method="post" id="add-money">
              {{csrf_field()}}
              <div class="col-xs-12">
                <br/>
                <p class="para">Current Wallet Balance <i class="fa fa-inr"></i> {{$ulist['wallet']['amount']}} /-</p>
                <input type="text" class="amnt-input" placeholder="Enter Amount" required="" />
                <a href="#" class="promo-link" data-toggle="modal" data-target="#promomodal">Apply Promocode</a>
                <button type="submit" class="btn btn-skin btn-block" style="margin-top:10px;"><i class="fa fa-plus"></i> Add Money</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-8 hidden-sm hidden-xs right-desk right-desk-gen">
          <div class="right-desk-content">
            <h3 class="white">We are always ready to help you.</h3>
            # Ogonn For Web
          </div>
        </div>
      </div>
    </div>
    <!-- end page -->
    <!-- Promocode Modal -->
    <div id="promomodal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content modal-contenttt text-center">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Have a promocode ?</h4>
          </div>
          <div class="modal-body">
            <input type="text" class="promo-input" placeholder="Enter Promocode">
            <br/>
            <button type="button" class="btn btn-default thela-btn1" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-skin thela-btn2" data-dismiss="modal">Apply</button>
          </div>
        </div>
      </div>
    </div>
    <style>
    .thela-btn1{width:50%;float:left;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-right-radius:0px;padding: 7px 0px;
      font-size: 18px;    font-weight: 500;}
      .thela-btn2{width:50%;float:right;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;padding: 7px 0px;
        font-size: 18px;}
        .modal-contenttt {border-bottom-left-radius:0px;border-bottom-right-radius:0px;    margin-top: 20%;}
        .modal-body {
          position: relative;
          padding: 0px;
        }
      </style>
      <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
      <script>
        var listraz={ "prefill":{}, "notes":{}, "theme":{} };
        listraz['key']="{{config('app.razor_key')}}";
        listraz['name']="Ogonn";
        listraz['currency']="INR";
        listraz['description']="Secure Transaction";
        listraz['image']="{{asset('img/giphy.gif')}}";
        listraz['handler']=function (response){window.location.replace('{{route("payment", ["id"=>""])}}/'+response.razorpay_payment_id);};
        listraz['prefill']['name']="{{@Auth::user()['fullname']}}";
        listraz['prefill']['contact']="{{@Auth::user()['mobile']}}";
        listraz['prefill']['email']="{{@Auth::user()['email']}}";
        listraz['notes']['address']="N/A";
        listraz['theme']['color']="#F37254";
        document.getElementById('add-money').onsubmit = function(e){
          listraz['amount']=$('.amnt-input').val()+'00';
          new Razorpay(listraz).open();
          e.preventDefault();  
        }
      </script>
    </body>
    </html>