<?php
$no=$_POST['mobileno'];
$captcha=$_POST['g-recaptcha-response'];

if($captcha==""){
           echo "<script> alert('Please check You not a robot'); 
			     window.location.href='login.php'; 
				  </script>"; 
             
}else{
echo "<script> alert('success'); 
			     
				  </script>"; 
        } 
 
// $curl=curl_init();

// curl_setopt_array($curl,[
//     CURLOPT_RETURNTRANSFER=>1,
//     CURLOPT_URL=>' https://www.google.com/recaptcha/api/siteverify',
//     CURLOPT_POST=>1,
//     CURLOPT_POSTFIELDS=>[
//         'secret'=>'6Lcl0IUUAAAAAER6HhCXLqEQQGcZNHt6WSnHwlvE',
//         'response'=>$_POST['g-recaptcha-response'],
//         ],
//     ]);
// $response=json_decode(curl_exec($curl));
?>