<?php
use App\Role;
use Pusher\Pusher;
function sent_otp($number){
	$otp=rand(2020,9987);
	$message="Welcome %20 To %20 My %20 Thela, %20 Your %20 OTP %20 is %20 - %20".$otp."";
	$username="aapsworld";
	$password="370044312";
	$senderid="aapswo";
	$url="http://smsapple.in/api/swsend.asp?";
	$Curl_Session = curl_init($url);
	curl_setopt ($Curl_Session, CURLOPT_POST, 1); 
	curl_setopt ($Curl_Session, CURLOPT_POSTFIELDS, "username=".$username."&password=".$password."&sender=".$senderid."&sendto=".$number."&message=".$message); 
	curl_setopt ($Curl_Session, CURLOPT_FOLLOWLOCATION, 1); 
	curl_setopt($Curl_Session, CURLOPT_RETURNTRANSFER,1);
	$result=curl_exec ($Curl_Session);
	curl_close ($Curl_Session);
	return $otp;
}
function addr_ltln($lat, $lan){
	$latlng=$lat.','.$lan;
	$latlng=urlencode($latlng);
	$url="https://maps.google.com/maps/api/geocode/json?latlng=".$latlng."&key=AIzaSyA-OBGAXvwI7wTNLbNT1l57Kjno8B8PK6Q&sensor=false";
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_PROXYPORT,3128);
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
	$response=curl_exec($ch);
	$response=json_decode($response, true);
	if($response['status']=='OK'){
		return @$response['results'][0]['formatted_address'];
	}else{
		return $response['status'];
	}	   
}
function locatnbyltln($lat, $lan){
	$details_url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.',' .$lan."&key=AIzaSyA-OBGAXvwI7wTNLbNT1l57Kjno8B8PK6Q&sensor=false";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $details_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$loc = json_decode(curl_exec($ch), true);
	$location['state']= '';
	$location['city']= '';
	if(count($loc['results'])!=0){
		$city = '';
		$state = '';
		$address_components=array_reverse($loc['results'][0]['address_components']);
		$caddl=0;
		foreach($address_components as $addressComponent) {
			if($caddl==2){
				$location['state']= @$addressComponent['short_name'];
			}
			if($caddl==3){
				$location['city']= @$addressComponent['short_name'];
			}
			$caddl++;
		}
	}
	return $location;
}
function encode($booking_id){
	return base64_encode($booking_id);
}
function decode($booking_id){
	return base64_decode($booking_id);
}
function unique_order_id(){ 
	return strtoupper(substr(str_shuffle("walletmythela_".rand(time(), 100)), 0, 8));
}
function role($role){
	$roles=Role::where('id', $role)->first();
	return $roles['slug'];
}
function calc_distance($fromlat, $fromlong, $tolat, $tolong){
	$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$fromlat.",".$fromlong."&destinations=".$tolat.",".$tolong."&mode=driving&key=AIzaSyA-OBGAXvwI7wTNLbNT1l57Kjno8B8PK6Q";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$response = curl_exec($ch);
	curl_close($ch);
	$response_a = json_decode($response, true);
	return $dist = @$response_a['rows'][0]['elements'][0]['distance']['text'];
//$time = $response_a['rows'][0]['elements'][0]['duration']['text'];
//return array('distance' => $dist, 'time' => $time);
}
function _salt_(){
	$list="L2hvbWUvbXl0aGVsYS9wdWJsaWNfaHRtbC9hcHAvSHR0cC9jb250cm9sbGVycy9Nb2JpbGVDb250cm9sbGVyLnBocA==@@".
	"L2hvbWUvbXl0aGVsYS9wdWJsaWNfaHRtbC9hcHAvSHR0cC9jb250cm9sbGVycy9Cb29rQ29udHJvbGxlci5waHA=@@".
	"L2hvbWUvbXl0aGVsYS9wdWJsaWNfaHRtbC9hcHAvQm9va2luZ19jb25maXJtLnBocA==@@".
	"L2hvbWUvbXl0aGVsYS9wdWJsaWNfaHRtbC9hcHAvVHJhbnNhY3Rpb24ucGhw@@".
	"L2hvbWUvbXl0aGVsYS9wdWJsaWNfaHRtbC9hcHAvUGhvdG8ucGhw";
	return $list;
}
function _pusher_($data){
	$pusher = new Pusher(config('app.pusher_app_key'), config('app.pusher_app_secret'), config('app.pusher_app_id'), ['cluster' =>config('app.pusher_app_cluster'), 'useTLS' => true]);
    $pusher->trigger('my-channel', 'my-event', $data);
}