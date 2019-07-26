@extends('layouts.app-login')
@section('content')
<div class="row rome">
  <div class="col-xs-12">
    <a href="{{route('book')}}"><div class="back"><i class="fa fa-long-arrow-left"></i></div></a>
    <h4>Login</h4>
  </div>
</div>
<hr/>
<!-- login-->
<form id="form-login" method="post">
  <div class="left-desk login">
    <a href="{{route('home')}}"><img src="img/logo.gif" height="50px"></a>
    <h4>Enter Your Mobile Number</h4>
    <p class="para">OTP will be sent for verification</p>
    <input type="text" class="login-input" id="mobile_no" name="mobile" required="" pattern="^\d{10}$" title="Enter valid 10 digit mobile number"  placeholder="+91 Enter Your Number" style="max-width:304px;"/>
    {{csrf_field()}}
    <div class="text-xs-center">
    </div>
    <button type="submit" name="submit" class="btn btn-skin" style="max-width:304px;width:100%;">LOGIN</button>
  </div>
</form>
<!-- verify-->
<form id="form-verify" method="post">
  <div class="left-desk otp">
    <a href="{{route('home')}}"><img src="img/logo.gif" height="50px"></a>
    <h4 class="verify_h_1">Verify & Login</h4>
    <p class="para">Enter the OTP sent to 8765530888</p>
    <p class="para-otp" style="display: none;"></p>
    <input type="hidden" value="" id="otp-hold" dir-action="">
    <input type="text" class="login-input" id="otp-enter" required="" placeholder="Enter 4 digit OTP"/>
    <button class="btn btn-skin btn-block verify_h_2">LOGIN</button>
    <a href="#">Resend OTP</a>
  </div>
</form>
<!-- signup-->
<form id="form-signup" method="post">
  <div class="left-desk signup">
    <a href="{{route('home')}}"><img src="img/logo.gif" height="50px"></a>
    <h4>Create Your Account</h4>
    <p class="para">Please fill the details to SignUp</p>
    <input type="text" class="login-input2" name="fullname" required="" placeholder="Enter Full Name"/>
    {{csrf_field()}}
    <input type="hidden" id="signup_mobile" class="form-control" name="mobile"/>
    <input type="text" class="login-input email_idd" name="email" placeholder="Enter Email (Optional)" pattern="[A-Za-z0-9._%+-]{3,}@[a-zA-Z]{3,}([.]{1}[a-zA-Z]{2,}|[.]{1}[a-zA-Z]{2,}[.]{1}[a-zA-Z]{2,})"/>
    <button class="btn btn-skin btn-block">CONTINUE</button>
  </div>
</form>
<script>
  $(document).on('submit', '#form-login', function(event){
    event.preventDefault();
      $('#form-login').hide();
      $('#otp-hold').attr('dir-action', 'loginsubmit');
      $.ajax({
        type: "post",
        url: "{{route('u.validate')}}",
        data:{ _token:"{{csrf_token()}}", mobile:$("#mobile_no").val()},
        dataType:'json',
        success: function(response){
          if(response.action=="verify"){
            $('.verify_h_1').text('Verify & Login');
            $('.verify_h_2').text('Login');
            $(".para").html(response.msg);
            $("#otp-hold").val(response.otp);
            $('#form-verify').show();
          }
          if(response.action=="notexist"){
            $("#signup_mobile").val($("#mobile_no").val());
            $('#form-signup').show();
          }
           if(response.action=="notuser"){
            $('#form-login').show();
            $(".para").html(response.msg);
            $(".para").css('color', 'red');
          }
        }
      });   
  });
</script>
<script>
  $(document).on('submit', '#form-verify', function(event){
    event.preventDefault();
    var hold_otp=$("#otp-hold").val();
    var enter_otp=$("#otp-enter").val();
    $(".para-otp").hide();
    $(".para-otp").removeClass('alert alert-danger');
    $(".para-otp").html('');
    if(hold_otp==enter_otp){
      var submit_s=$("#otp-hold").attr('dir-action');
      if(submit_s=="loginsubmit"){
        $.ajax({
          type: "post",
          url: "{{route('login.ajx')}}",
          data:$("#form-login").serialize(),
          dataType:'json',
          success: function(response){
            if(response.response=="success"){
              window.location = "{{route('book')}}";
            }
          }
        });
      }
      if(submit_s=="signupsubmit"){
        $.ajax({
          type: "post",
          url: "{{route('signup.ajx')}}",
          data:$("#form-signup").serialize(),
          dataType:'json',
          success: function(response){
            if(response.response=="success"){
              window.location = "{{route('book')}}";
            }
          }
        });
      }
    }else{
      $(".para-otp").show();
      $(".para-otp").addClass('alert alert-danger');
      $(".para-otp").html('Otp not valid.');
    }
  });
</script>
<script>
  $(document).on('submit', '#form-signup', function(event){
    event.preventDefault();
    $('#form-signup').hide();
    $('#otp-hold').attr('dir-action', 'signupsubmit');
    $.ajax({
      type: "post",
      url: "{{route('sent.otp.fn')}}",
      data:{ _token:"{{csrf_token()}}", mobile:$("#mobile_no").val()},
      dataType:'json',
      success: function(response){
        if(response.action=="verify"){
          $('.verify_h_1').text('Verify & SignUp');
          $('.verify_h_2').text('SIGNUP');
          $(".para").html(response.msg);
          $("#otp-hold").val(response.otp);
          $('#form-verify').show();
        }
      }
    });
  });
</script>
<script>
     $(document).on('keyup ,keypress', '.email_idd', function(event){
    event.preventDefault();
      $(this).prop('required', false);
        if($(this).val()!=""){
         $(this).prop('required', true);
        }
  });
</script>
<!-- ends-->
@endsection