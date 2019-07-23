<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PDF;
use App\User;
use App\City;
use App\State;
use App\Photo;
use App\Setting;
use App\Driver;
use App\Wallet;
use App\Booking;
use App\Transaction;
use App\Vehicle;
use App\Vehicle_list;
use App\Booking_confirm;
use App\Vehicle_surround_area;
class MobileController extends Controller
{
	public function uservalid(Request $request){
		$Msg['response']='false';
		$Msg['user_id']='';
		$Msg['wallet']['id']='';
		$Msg['action']='';
		$Msg['otp']='';
		if($request->input('mobile')){
			$otp=sent_otp($request->input('mobile'));
			$Msg['otp']=$otp;
			$oned=User::where('mobile', $request->input('mobile'))->with('wallet')->first();
			if($oned['mobile']!=""){
				$Msg['response']='true';
				$Msg['user_id']=$oned['id'];
				$Msg['wallet']['id']=$oned['wallet']['id'];
				$Msg['action']='verify';
			}
			if($oned['mobile']==""){
				$Msg['response']='true';
				$Msg['action']='signup';
			}
		}
		return $Msg;
	} 
	public function after_otp_login_user(Request $request){
		$Msg['response']='false';
		if($request->input('mobile')){
			$oned=User::where('mobile', $request->input('mobile'))->update(['role_id'=>1]);
			$Msg['response']="true";
		}
		return $Msg;
	}
	public function login(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		$Msg['otp']='';
		$Msg['userinfo']='';
		if($request->input('login_as')=="vendor"){
			$oned=User::where(['mobile'=>$request->input('mobile'), 'vendor_role_id'=>3])->with('wallet')->first();
			if($oned['vendor_status']=="approved"){
				if(Hash::check($request->input('password'), $oned['password'])){
					if($oned['id']){
						$otp=sent_otp($request->input('mobile'));
						$Msg['response']='true';
						$Msg['userinfo']=array($oned);
						$Msg['otp']=$otp;
						$Msg['msg']='success';
					}
				}else{
					$Msg['msg']='Mobile Or password number invalid.';
				}
			}elseif($oned['vendor_status']=="pending"){
				$Msg['msg']='User not approved';
			}elseif($oned['vendor_status']=="block"){
				$Msg['msg']='User are blocked';
			}
		}
		if($request->input('login_as')=="driver"){
			$oned=User::where(['mobile'=>$request->input('mobile'), 'driver_role_id'=>2])->with('wallet')->first();
			if($oned['driver_status']=="approved"){
				if($oned['id']){
					$otp=sent_otp($request->input('mobile'));
					$Msg['response']='true';
					$Msg['userinfo']=array($oned);
					$Msg['otp']=$otp;
					$Msg['msg']='success';
				}else{
					$Msg['msg']='Mobile number invalid.';
				}
			}elseif($oned['driver_status']=="pending"){
				$Msg['msg']='User not approved';
			}elseif($oned['driver_status']=="block"){
				$Msg['msg']='User are blocked';
			}
		}
		return $Msg;
	}
	public function signup(Request $request){
		$Msg['response']='false';
		$Msg['user_id']='';
		$Msg['wallet']['id']='';
		$Msg['msg']='unsuccess';
		if(@$request->input('email')){
			$post_data['email']=@$request->input('email');
		}
		if($request->input('mobile')){
			$post_data['mobile']=$request->input('mobile');
		}
		if($request->input('state')){
			$stet_li=State::where('name', 'like', '%'.$request->input('state').'%')->first();
			$post_data['state_id']=$stet_li['id'];
		}
		if($request->input('city')){
			$city_li=City::where('name', 'like', '%'.$request->input('city').'%')->first();
			$post_data['city_id']=$city_li['id'];
		}
		if($request->input('invite')){
			$post_data['invite']=$request->input('invite');
		}
		if($request->input('fullname')){
			$post_data['fullname']=$request->input('fullname');
		}
		if(@$request->input('password')==""){
			$post_data['password']=Hash::make(rand());
		}else{
			$post_data['password']=Hash::make($request->input('password'));	
		}
		if(@$request->input('role_id')){
			$oned_m=User::where(['mobile'=>$request->input('mobile'), 'role_id'=>1])->with('wallet')->first();
			$oned_e=User::where(['email'=>$request->input('email'), 'role_id'=>1])->with('wallet')->first();
			if($oned_m['mobile']){
				$Msg['response']='false';
				$Msg['msg']='unsuccess';
				$Msg['msg']='User already registered';
				return $Msg;
			}
			if($oned_e['email']){
				$Msg['response']='false';
				$Msg['msg']='unsuccess';
				$Msg['msg']='User already registered';
				return $Msg;
			}
			$oned_rfrl=User::where('refral_code', $request->input('invite'))->with('wallet')->first();
			if($oned_rfrl['refral_code']!=$request->input('invite')){
				$Msg['response']='false';
				$Msg['msg']='unsuccess';
				$Msg['msg']='referal do not match';
				return $Msg;
			}
			if($oned_rfrl['refral_code']!=$request->input('invite')){
				$Msg['response']='false';
				$Msg['msg']='unsuccess';
				$Msg['msg']='referal do not match';
				return $Msg;
			}
			$post_data['role_id']='1';
			$post_data['refral_code']=rand();
			$ulist=User::create($post_data);
			$order_id_u=unique_order_id();
			if($request->input('invite')){
				$post_tran['user_id']=$ulist['id'];
				$post_tran['order_id']=$order_id_u;
				$post_tran['payment_method']='referal';  
				$post_tran['status']='received';
				$post_tran['amount']=50;
				Transaction::create($post_tran);
				$post_tran['user_id']=$oned_rfrl['id'];
				Transaction::create($post_tran);
				Wallet::where('id', $oned_rfrl['wallet']['id'])->update(['amount'=>$post_tran['amount']+@$oned_rfrl['wallet']['amount']]);
				unset($post_tran['order_id']);
				unset($post_tran['payment_method']);
				unset($post_tran['status']);
				$post_tran['user_id']=$ulist['id'];
				$wallte_retrn=Wallet::create($post_tran);
				$Msg['response']='true';
				$Msg['user_id']=$ulist['id'];
				$Msg['wallet']['id']=$wallte_retrn['id'];
				$Msg['msg']='success';
			}else{
				$post_tran['user_id']=$ulist['id'];
				$post_tran['amount']=0.00;
				$wallte_retrn=Wallet::create($post_tran);
				$Msg['response']='true';
				$Msg['user_id']=$ulist['id'];
				$Msg['wallet']['id']=$wallte_retrn['id'];
				$Msg['msg']='success';
			}
			return $Msg;
		}elseif($request->input('vendor_role_id')){
//$post_data['role_id']='1';
			$post_data['vendor_role_id']=$request->input('vendor_role_id');
			$oned=User::where('mobile', $request->input('mobile'))->with('wallet')->first();
			$oned_m=User::where(['mobile'=>$request->input('mobile'), 'vendor_role_id'=>3])->with('wallet')->first();
			$oned_e=User::where(['email'=>$request->input('email'), 'vendor_role_id'=>3])->with('wallet')->first();
			if($oned_m['mobile']){
				$Msg['response']='false';
				$Msg['user_id']='';
				$Msg['wallet']['id']='';
				$Msg['msg']='unsuccess';
				$Msg['msg']='User already registered';
				return $Msg;
			}
			if($oned_e['email']){
				$Msg['response']='false';
				$Msg['user_id']='';
				$Msg['wallet']['id']='';
				$Msg['msg']='unsuccess';
				$Msg['msg']='User already registered';
				return $Msg;
			}
			$oned_rfrl=User::where('refral_code', $request->input('invite'))->with('wallet')->first();
			if($oned_rfrl['refral_code']!=$request->input('invite')){
				$Msg['response']='false';
				$Msg['msg']='unsuccess';
				$Msg['msg']='referal do not match';
				return $Msg;
			}
			if($oned_rfrl['refral_code']!=$request->input('invite')){
				$Msg['response']='false';
				$Msg['msg']='unsuccess';
				$Msg['msg']='referal do not match';
				return $Msg;
			}
			if($oned['id']){
				if($oned['role_id']==1 && $oned['driver_role_id']==2 && $oned['vendor_role_id']==3){
					$Msg['msg']='User already registered';
				}elseif($oned['role_id']==1 && $oned['driver_role_id']==2){
//unset($post_data['email']);
					unset($post_data['mobile']);
					User::where('mobile', $request->input('mobile'))->update($post_data);
					$Msg['response']='true';
					$Msg['user_id']=$oned['id'];
					$Msg['wallet']['id']=$oned['wallet']['id'];
					$Msg['msg']='success';
				}elseif($oned['role_id']==1 && $oned['driver_role_id']==3){
					$Msg['msg']='User already registered';
				}elseif($oned['role_id']==2 && $oned['driver_role_id']==3){
					$Msg['msg']='User already registered';
				}elseif($oned['role_id']==1){
//unset($post_data['email']);
					unset($post_data['mobile']);
					User::where('mobile', $request->input('mobile'))->update($post_data);
					$Msg['response']='true';
					$Msg['user_id']=$oned['id'];
					$Msg['wallet']['id']=$oned['wallet']['id'];
					$Msg['msg']='success';
				}elseif($oned['role_id']==2){
//unset($post_data['email']);
					unset($post_data['mobile']);
					User::where('mobile', $request->input('mobile'))->update($post_data);
					$Msg['response']='true';
					$Msg['user_id']=$oned['id'];
					$Msg['wallet']['id']=$oned['wallet']['id'];
					$Msg['msg']='success';
				}elseif($oned['role_id']==3){
					$Msg['msg']='User already registered';
				}
			}else{
				$post_data['refral_code']=rand();
				$ulist=User::create($post_data);
				$order_id_u=unique_order_id();
				if($request->input('invite')){
					$post_tran['user_id']=$ulist['id'];
					$post_tran['order_id']=$order_id_u;
					$post_tran['payment_method']='referal';  
					$post_tran['status']='received';
					$post_tran['amount']=50;
					Transaction::create($post_tran);
					$post_tran['user_id']=$oned_rfrl['id'];
					Transaction::create($post_tran);
					Wallet::where('id', $oned_rfrl['wallet']['id'])->update(['amount'=>$post_tran['amount']+@$oned_rfrl['wallet']['amount']]);
					unset($post_tran['order_id']);
					unset($post_tran['payment_method']);
					unset($post_tran['status']);
					$post_tran['user_id']=$ulist['id'];
					$wallte_retrn=Wallet::create($post_tran);
					$Msg['response']='true';
					$Msg['user_id']=$ulist['id'];
					$Msg['wallet']['id']=$wallte_retrn['id'];
					$Msg['msg']='success';
				}else{
					$post_tran['user_id']=$ulist['id'];
					$post_tran['amount']=0.00;
					$wallte_retrn=Wallet::create($post_tran);
					$Msg['response']='true';
					$Msg['user_id']=$ulist['id'];
					$Msg['wallet']['id']=$wallte_retrn['id'];
					$Msg['msg']='success';
				}
			}
		}
		return $Msg;
	} 
	public function booking(Request $request){
		$Msg['response']='false';
		$Msg['booking_id']='';
		$Msg['msg']='unsuccess';
		$post_data=$request->input();
		$vl=Vehicle_list::where('name', 'like', '%'.$request->input('vehicle').'%')->first();
		$post_data['vehicle_type_id']=$vl['id'];
		unset($post_data['vehicle']);
		$ulist=Booking::create($post_data);
		if($ulist['id']){
			$Msg['response']='true';
			$Msg['booking_id']=$ulist['id'];
			$Msg['msg']='success';
			_pusher_('gotbooking');
		}
		return $Msg;
	}
	public function profile(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		$Msg['userinfo']='';
		$post_data=$request->input();
		$oned=User::where('id', $request->input('user_id'))->first();
		if($oned['id']){
			$Msg['response']='true';
			$Msg['userinfo']=$oned;
			$Msg['msg']='success';
		}
		return $Msg;
	}
	public function recieved_booking(Request $request){
		$Msg['response']='false';
		$ulist='';
		$Msg['booking']='';
		$Msg['msg']='unsuccess';
		if($request->input('action')=="user" && $request->input('user_id')){
			$llist_id=Booking::where('user_id', $request->input('user_id'))->pluck('id')->toArray();
			$llist_id_1=Booking_confirm::whereIn('booking_id', $llist_id)->whereIn('status', ['ongoing', 'running', 'cancelled', 'expired', 'completed'])->pluck('booking_id')->toArray();
			$llist_id_1=array_diff($llist_id, $llist_id_1);
			$ulist=Booking::whereIn('id', $llist_id_1)->get();
			$Msg['response']='true';
			$Msg['booking']=@$ulist;
			$Msg['msg']='success';
		}elseif($request->input('action')=="driver" && $request->input('driver_id')){
			$idlist=array();
			$list_id=Booking_confirm::where('driver_id', $request->input('driver_id'))->pluck('booking_id')->toArray();
			$phots=Photo::where('driver_id', $request->input('driver_id'))->first();
			if($phots['status_docs']=="pending"){
				$Msg['msg']='Someone documents pending.';
			}
			if($phots['status_docs']=="rejected"){
				$Msg['msg']='Someone documents rejected.';
			}
			if($phots['status_docs']=="approved"){
				$ulists=Booking::whereNotIn('id' ,$list_id)->with(['userInfo', 'bookedInfo', 'vehiclelist'])->get();
				foreach($ulists as $ulist){
				 $dfs=Driver::where('id' ,$request->input('driver_id'))->first();
				 $clt=User::where('id', $request->input('driver_id'))->first();
				 $cfisrt=Vehicle_surround_area::where('city_id', $clt['city_id'])->first();
			     if($dfs['current_lat']!="" && $dfs['current_long']!=""){
			     	$km=calc_distance($ulist['picup_lat'], $ulist['picup_long'], $dfs['current_lat'], $dfs['current_long']);
			        $km=filter_var($km, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
			        $km=$km*1000;
	                  if($km<=$cfisrt['range_area']*1000){
	                     $ulist=Booking::where('id' ,$ulist['id'])->with(['userInfo', 'bookedInfo', 'vehiclelist'])->first();
	                     $idlist[]=@$ulist['id'];
	                  }
	              }
				}
				$ulist=Booking::whereIn('id' ,@$idlist)->with(['userInfo', 'bookedInfo', 'vehiclelist'])->get();
				$Msg['response']='true';
				$Msg['booking']=@$ulist;
				$Msg['msg']='success';
			}
		}elseif($request->input('action')=="vendor" && $request->input('vendor_id')){
			$phots=Photo::where('vendor_id', $request->input('vendor_id'))->first();
			if($phots['status_docs']=="pending"){
				$Msg['msg']='Someone documents pending.';
			}
			if($phots['status_docs']=="rejected"){
				$Msg['msg']='Someone documents rejected.';
			}
			if($phots['status_docs']=="approved"){
				$ulist=Booking::with('userInfo')->get();
				$Msg['response']='true';
				$Msg['booking']=@$ulist;
				$Msg['msg']='success';
			}
		}else{
			$ulist=Booking::with('userInfo')->get();
			$Msg['response']='true';
			$Msg['booking']=@$ulist;
			$Msg['msg']='success';
		}
		return $Msg;
	}
	public function request_bidding(Request $request){
		$Msg['response']='false';
		$Msg['booking']='';
		$Msg['msg']='unsuccess';
		$post_data=$request->input();
		$post_data['status']='pending';
		if($request->input('driver_id')){
			$flistb=Booking_confirm::where(['driver_id'=>$request->input('driver_id'), 'status'=>'ongoing'])->first();
			if($flistb['id']){
				$Msg['msg']='already_booked';
				return $Msg;
			}
		}
		if($request->input('booking_id') && $request->input('driver_id') && $request->input('price')){
			$commission_p=Setting::where('id', 1)->first();
			$post_data['commission_charge']=$commission_p['commission'];
			$post_data['pafter_sgst_price']=($post_data['price']*$commission_p['psgst'])/100;
			$post_data['psgst']=$commission_p['psgst'];
			$post_data['pafter_sgst_price']=number_format($post_data['pafter_sgst_price'], 2);
			$post_data['pafter_cgst_price']=($post_data['price']*$commission_p['pcgst'])/100;
			$post_data['pcgst']=$commission_p['pcgst'];
			$post_data['pafter_cgst_price']=number_format($post_data['pafter_cgst_price'], 2);
			$post_data['after_commission_price']=($post_data['price']*$commission_p['commission'])/100;
			$post_data['after_commission_price']=number_format($post_data['after_commission_price'], 2);
			$post_data['after_sgst_price']=($post_data['after_commission_price']*$commission_p['sgst'])/100;
			$post_data['sgst']=$commission_p['sgst'];
			$post_data['after_sgst_price']=number_format($post_data['after_sgst_price'], 2);
			$post_data['after_cgst_price']=(($post_data['after_commission_price']*$commission_p['cgst'])/100);
			$post_data['cgst']=$commission_p['cgst'];
			$post_data['after_cgst_price']=number_format($post_data['after_cgst_price'], 2);
			$ulist=Booking_confirm::create($post_data);
			$Msg['response']='true';
			$Msg['booking']=$ulist;
			$Msg['msg']='success';
			_pusher_('gotresponse');
		}else{
			$Msg['msg']='missing somthing';
		}
		return $Msg;
	}
	public function reply_bidding(Request $request){
		$Msg['response']='false';
		$Msg['booking']='';
		$Msg['msg']='unsuccess';
		$post_data=$request->input();
		if($request->input('booking_id') && $request->input('driver_id') && $request->input('status')){
			$ulist=Booking_confirm::update($post_data);
			$Msg['response']='true';
			$Msg['booking']=$ulist;
			$Msg['msg']='success';
		}else{
			$Msg['msg']='missing somthing';
		}
		return $Msg;
	}
	public function gett_bidding(Request $request){
		$Msg['response']='false';
		$Msg['booking']='';
		$Msg['vttlist']='';
		$Msg['msg']='unsuccess';
		if($request->input('booking_id')){
			$list=Booking_confirm::where('booking_id', $request->input('booking_id'))->with(['userInfo', 'bookingInfo', 'vehicleInfo'])->orderBy('id', 'desc')->get();
			$Msg['response']='true';
			$Msg['booking']=$list;
			$Msg['msg']='success';
		}else{
			$Msg['msg']='missing somthing';
		}
		return $Msg;
	}
	public function document_upload_info(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		$Msg['userinfo']='';
		$post_data=$request->input();
		if($request->input('action')=="vendor"){
			if($request->input('address_prof_front') && $request->input('address_prof_back')){
				$image_1 = base64_decode($request->input('address_prof_front'));
				$image_name_1= uniqid().'.png';
				$path_1 = public_path() . "/img/document-info/" . $image_name_1;
				file_put_contents($path_1, $image_1);
				$post_data_v['address_prof_front']=$image_name_1;
				$image_2 = base64_decode($request->input('address_prof_back'));
				$image_name_2= uniqid().'.png';
				$path_2 = public_path() . "/img/document-info/" . $image_name_2;
				file_put_contents($path_2, $image_2);
				$post_data_v['address_prof_back']=$image_name_2;
				$user_docs=Photo::where('vendor_id', $request->input('user_id'))->first();
				if($user_docs['vendor_id']){
					Photo::where('vendor_id', $request->input('user_id'))->update($post_data_v);
					$Msg['response']='true';
					$Msg['msg']='success';
				}else{
					$post_data_v['vendor_id']=$request->input('user_id');
					Photo::create($post_data_v);
					$Msg['response']='true';
					$Msg['msg']='success';
				}
			}
			if(@$request->input('profile_pic')){
				$image = base64_decode($request->input('profile_pic'));
				$image_name= uniqid().'.png';
				$path = public_path() . "/img/users-pic/" . $image_name;
				file_put_contents($path, $image);
				$oned=User::where('id', $request->input('user_id'))->update(['profile_pic'=>$image_name]);
				$oned=User::where('id', $request->input('user_id'))->first();
				$Msg['response']='true';
				$Msg['msg']='success';
				$Msg['userinfo']=asset('/img/users-pic/'.$oned['profile_pic']);
			}
			if(@$request->input('address_prof_type')){
				$oned=User::where('id', $request->input('user_id'))->update(['address_prof_type'=>$request->input('address_prof_type')]);
				$Msg['response']='true';
				$Msg['msg']='success';
				$Msg['userinfo']=$oned;
			}
		}
		if($request->input('action')=="driver"){
			if(@$request->input('address_prof_front')){
				$image = base64_decode($request->input('address_prof_front'));
				$image_name= uniqid().'.png';
				$path = public_path() . "/img/document-info/" . $image_name;
				file_put_contents($path, $image);
				$post_data_d['address_prof_front']=$image_name;
			}
			if(@$request->input('address_prof_back')){
				$image = base64_decode($request->input('address_prof_back'));
				$image_name= uniqid().'.png';
				$path = public_path() . "/img/document-info/" . $image_name;
				file_put_contents($path, $image);
				$post_data_d['address_prof_back']=$image_name;
			}
			if(@$request->input('profile_pic')){
				$image = base64_decode($request->input('profile_pic'));
				$image_name= uniqid().'.png';
				$path = public_path() . "/img/users-pic/" . $image_name;
				file_put_contents($path, $image);
				$oned=User::where('id', $request->input('user_id'))->update(['profile_pic'=>$image_name]);
				$Msg['response']='true';
				$Msg['msg']='success';
				$Msg['userinfo']=asset('/img/users-pic/'.$image_name);
			}
			if(@$request->input('address_prof_type')){
				$oned=User::where('id', $request->input('user_id'))->update(['address_prof_type'=>$request->input('address_prof_type')]);
				$Msg['response']='true';
				$Msg['msg']='success';
			}
			$user_docs=Photo::where('driver_id', $request->input('user_id'))->first();
			if($user_docs['driver_id'] && @$post_data_d){
				Photo::where('driver_id', $request->input('user_id'))->update($post_data_d);
				$Msg['response']='true';
				$Msg['msg']='success';
			}elseif(@$post_data_d){
				$post_data_d['driver_id']=$request->input('user_id');
				Photo::create($post_data_d);
				$Msg['response']='true';
				$Msg['msg']='success';
			}
		}
		return $Msg;
	}
	public function confirm_bidding(Request $request){
		$Msg['response']='false';
		$Msg['trns_time']='';
		$Msg['order_id']='';
		$Msg['msg']='unsuccess';
		if($request->input('bidding_id') && $request->input('user_id')){
			$booked=Booking_confirm::where('id', $request->input('bidding_id'))->first();
			Booking_confirm::where(['booking_id'=>$booked['booking_id'], 'status'=>'pending'])->update(['status'=>'expired']);
			Booking_confirm::where(['driver_id'=>$booked['driver_id'], 'status'=>'pending'])->update(['status'=>'booked']);
			Booking_confirm::where('id', $request->input('bidding_id'))->update(['status'=>'ongoing']);  
			if($request->input('wallet_id')){
				$data_post['wallet_id']=$request->input('wallet_id'); 
			}
			$data_post['user_id']=$request->input('user_id'); 
			$data_post['order_id']=$request->input('order_id');   
			$data_post['booking_id']=$booked['booking_id'];
			if($request->input('payment_method')=="cash"){
				$data_post['order_id']=unique_order_id();
			}
			$data_post['payment_method']=$request->input('payment_method');  
			$data_post['amount']=$request->input('amount');
			$data_post['status']='paid';
			if($request->input('wallet_id')){
				$data_post['order_id']=unique_order_id();
				$wallet_d=Wallet::where('id', $request->input('wallet_id'))->first();
				$wallet_tamnt=$wallet_d['amount']-$request->input('amount');
				$wallet_d=Wallet::where('id', $wallet_d['id'])->update(['amount'=>$wallet_tamnt]);
			}
			$cnf_trns=Transaction::create($data_post);
			$Msg['trns_time']=$cnf_trns;
			$Msg['response']='true';
			$Msg['msg']='success';
		}else{
			$Msg['msg']='missing somthing';
		}
		return $Msg;
	}
	public function confirm_booking(Request $request){
		$Msg['response']='false';
		$Msg['booking']=''; 
		$Msg['msg']='unsuccess';
		$u_id=$request->input('user_id');
		if($request->input('user_id')){
			$ulist=Booking_confirm::whereIn('status', ['ongoing', 'running' ,'completed', 'cancelled'])->with(['bookingInfo', 'vehicleInfo'])->whereHas('bookingInfo', function($q) use($u_id) {
				$q->where('user_id', '=', $u_id);
			})->get();
			$Msg['response']='true';
			$Msg['booking']=$ulist;
			$Msg['msg']='success';
		}elseif($request->input('booking_id')){
			$ulist=Booking_confirm::where('booking_id', $request->input('booking_id'))->with('driverInfo')->with('bookingInfo')->first();
			$Msg['response']='true';
			$Msg['booking']=$ulist;
			$Msg['msg']='success';
		}else{
			$Msg['msg']='missing somthing';
		}
		return $Msg;
	}
	public function bystatus_booking(Request $request){
		$Msg['response']='false';
		$Msg['booking']=''; 
		$Msg['msg']='unsuccess';
		$u_id=$request->input('driver_id');
		if($request->input('driver_id')){
			if($request->input('status')){
				$dw['driver_id']=$request->input('driver_id');
				$dw['status']=$request->input('status');
//$ulist=Booking_confirm::where(['driver_id'=>$u_id, 'status'=>$request->input('status')])->with('bookingInfo')->get();
				$ulist=Booking::with('booking_cnf')->whereHas('booking_cnf', function($q) use($dw){
					$q->where('driver_id', $dw['driver_id']);
					$q->whereIn('status', [$dw['status'], 'running']);
				})->with(['userInfo', 'transactons'])->get();
			}else{
				$ulist=Booking_confirm::where(['driver_id'=>$u_id])->with('bookingInfo')->get();
			}
			$Msg['response']='true';
			$Msg['booking']=$ulist;
			$Msg['msg']='success';
		}else{
			$Msg['msg']='missing somthing';
		}
		return $Msg;
	}
	public function create_vehicle(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		if(@$request->input('insurance')){
			$post_data_veh_doc['insurance']=$request->input('insurance');
		}
		if(@$request->input('rc_detail')){
			$post_data_veh_doc['rc_detail']=$request->input('rc_detail');
		}
		if(@$request->input('permit')){
			$post_data_veh_doc['permit']=$request->input('permit');
		}
		if(@$request->input('fitness_certificate_exp_date')){
			$post_data_veh_doc['fitness_certificate_exp_date']=$request->input('fitness_certificate_exp_date');
		}
		if(@$request->input('fitness_certificate')){
			$post_data_veh_doc['fitness_certificate']=$request->input('fitness_certificate');
		}
		if(@$request->input('noc')){
			$post_data_veh_doc['noc']=$request->input('noc');
		}
		if(@$request->input('loan_emi_detail')){
			$post_data_veh_doc['loan_emi_detail']=$request->input('loan_emi_detail');
		}
		if(@$request->input('road_tax_reciept')){
			$post_data_veh_doc['road_tax_reciept']=$request->input('road_tax_reciept');
		}
		if(@$request->input('state')){
			$stet_li=State::where('name', 'like', '%'.$request->input('state').'%')->first();
			$post_data_veh['state_id']=$stet_li['id'];
		}
		if(@$request->input('city')){
			$city_li=City::where('name', 'like', '%'.$request->input('city').'%')->first();
			$post_data_veh['city_id']=$city_li['id'];
		}
		if(@$request->input('unit')){
			$post_data_veh['unit']=$request->input('unit');
		}
		if(@$request->input('weight')){
			$post_data_veh['weight']=$request->input('weight');
		}
		$post_data_veh['vendor_id']=$request->input('vendor_id');
		$vl=Vehicle_list::where('name', 'like', '%'.$request->input('vehicle').'%')->first();
		$post_data_veh['vehicle_type_id']=$vl['id'];
		$post_data_veh['transport']=$request->input('transport');
		$post_data_veh['vehicle_num']=$request->input('vehicle_num');
		$veh_list=Vehicle::create($post_data_veh);
		$post_data_veh_doc['vehicle_id']=$veh_list['id'];
		Photo::create($post_data_veh_doc);
		$Msg['response']='true';
		$Msg['msg']='success';
		return $Msg;
	}
	public function uploadfile(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		$Msg['file_name']='';
		if(@$request->input('img')){
			$image = base64_decode($request->input('img'));
			$image_name= uniqid().'.png';
			$path = public_path() . "/img/document-info/" . $image_name;
			file_put_contents($path, $image);
			$Msg['file_name']=$image_name;
			$Msg['response']='true';
			$Msg['msg']='success';
			$Msg['file_name']=$image_name;
		}
		return $Msg;
	}
	public function create_driver(Request $request){
		$Msg['response']='false';
		$Msg['driver_id']='';
		$Msg['msg']='unsuccess';
		$driver_list=User::where(['mobile'=>$request->input('mobile')])->first();
##set variables
		if(@$request->input('police_verify')){
			$post_data['police_verify']='not_verified';
		}
		if(@$request->input('address_prof_type')){
			$post_data['address_prof_type']=$request->input('address_prof_type');
		}
		if(@$request->input('fullname')){
			$post_data['fullname']=$request->input('fullname');
		}
		if($request->input('state')){
			$stet_li=State::where('name', 'like', '%'.$request->input('state').'%')->first();
			$post_data['state_id']=$stet_li['id'];
		}
		if($request->input('city')){
			$city_li=City::where('name', 'like', '%'.$request->input('city').'%')->first();
			$post_data['city_id']=$city_li['id'];
		}
		if(@$request->input('mobile')){
			$post_data['mobile']=$request->input('mobile');
		}
		if(@$request->input('address_prof_num')){
			$post_data['address_prof_num']=$request->input('address_prof_num');
		}
		if(@$request->file('profile_pic')){
			$post_data['profile_pic']=$request->input('profile_pic');
		}
		$post_data['password']=Hash::make(rand());
		$post_data['driver_role_id']="2";
##set variables
		if($request->input('pancard_front')){
			$post_data_document['pancard_front']=$request->input('pancard_front');	
		}
		if($request->input('address_prof_front')){
			$post_data_document['address_prof_front']=$request->input('address_prof_front');	
		}
		if($request->input('address_prof_back')){
			$post_data_document['address_prof_back']=$request->input('address_prof_back');	
		}
		if($request->input('commercial_dl_exp_date')){
			$post_data_document['commercial_dl_exp_date']=$request->input('commercial_dl_exp_date');	
		}
		if($request->input('commercial_dl_front')){
			$post_data_document['commercial_dl_front']=$request->input('commercial_dl_front');	
		}
		if($request->input('commercial_dl_back')){
			$post_data_document['commercial_dl_back']=$request->input('commercial_dl_back');	
		}
		if($request->input('bank_passbook')){
			$post_data_document['bank_passbook']=$request->input('bank_passbook');	
		}
		if($request->input('police_verification')){
			$post_data_document['police_verification']=$request->input('police_verification');	
		}
		if($driver_list['role_id']==1 && $driver_list['driver_role_id']==2 && $driver_list['vendor_role_id']==3){
			$Msg['msg']="already registered.";
		}elseif($driver_list['role_id']==1 && $driver_list['driver_role_id']==2){
			$Msg['msg']="already registered.";
		}elseif($driver_list['role_id']==1 && $driver_list['vendor_role_id']==3){
			unset($post_data['mobile']);
			unset($post_data['password']);
			User::where('id', $driver_list['id'])->update($post_data);
			$create_driver['vendor_id']=$request->input('vendor_id');
			$create_driver['driver_id']=$driver_list['id'];
			Driver::create($create_driver);
			$post_data_document['driver_id']=$driver_list['id'];
			Photo::create($post_data_document);
			$Msg['response']='true';
			$Msg['driver_id']=$driver_list['id']; 
			$Msg['msg']='success';
		}elseif($driver_list['driver_role_id']==2 && $driver_list['vendor_role_id']==3){
			$Msg['msg']="already registered.";
		}elseif($driver_list['role_id']==1){
			unset($post_data['mobile']);
			unset($post_data['password']);
			User::where('id', $driver_list['id'])->update($post_data);
			$create_driver['vendor_id']=$request->input('vendor_id');
			$create_driver['driver_id']=$driver_list['id'];
			Driver::create($create_driver);
			$post_data_document['driver_id']=$driver_list['id'];
			Photo::create($post_data_document);
			$Msg['response']='true';
			$Msg['driver_id']=$driver_list['id']; 
			$Msg['msg']='success';
		}elseif($driver_list['vendor_role_id']==3){
			unset($post_data['mobile']);
			unset($post_data['password']);
			User::where('id', $driver_list['id'])->update($post_data);
			$create_driver['vendor_id']=$request->input('vendor_id');
			$create_driver['driver_id']=$driver_list['id'];
			Driver::create($create_driver);
			$post_data_document['driver_id']=$driver_list['id'];
			Photo::create($post_data_document);
			$Msg['response']='true';
			$Msg['driver_id']=$driver_list['id']; 
			$Msg['msg']='success';
		}elseif($driver_list['driver_role_id']==2){
			$Msg['msg']="already registered.";
		}else{
			$post_data['refral_code']=rand();
			$driver_list=User::create($post_data);
			$post_tran['amount']=0;
			$post_tran['user_id']=$driver_list['id'];
			Wallet::create($post_tran);
			$create_driver['vendor_id']=$request->input('vendor_id');
			$create_driver['driver_id']=$driver_list['id'];
			Driver::create($create_driver);
			$post_data_document['driver_id']=$driver_list['id'];
			Photo::create($post_data_document);
			$Msg['response']='true';
			$Msg['driver_id']=$driver_list['id']; 
			$Msg['msg']='success';
		}
		return $Msg;
	}
	public function wallet_recharge(Request $request){
		$Msg['response']='false';
		$Msg['trns_time']='';
		$trans_post['order_id']='';
		$Msg['msg']='unsuccess';
		$tamount=0;
		if($request->input('user_id') && $request->input('wallet_id')){
			$list_wllt=Wallet::where('id', $request->input('wallet_id'))->first();
			$wllt_id=$request->input('wallet_id');
			$tamount=$request->input('amount')+$list_wllt['amount'];
			Wallet::where('id', $wllt_id)->update(['amount'=>$tamount]);
			$trans_post['user_id']=$request->input('user_id');
			$trans_post['wallet_id']=$request->input('wallet_id');
			$trans_post['order_id']=$request->input('order_id');
			$trans_post['amount']=$request->input('amount');
			$trans_post['payment_method']=$request->input('payment_method');
			$trans_post['status']='paid';
			$tr_cnf=Transaction::create($trans_post);
			$trans_post['status']='received';
			Transaction::create($trans_post);
			$Msg['response']='true';
			$Msg['trns_time']=$tr_cnf;
			$Msg['msg']='success';
		}else{
			$Msg['msg']='missing somthing';
		}
		return $Msg;
	}
	public function wallet(Request $request){
		$Msg['response']='false';
		$Msg['amount']='';
		$Msg['msg']='unsuccess';
		if($request->input('user_id')){
			$first_wallt=Wallet::where('user_id', $request->input('user_id'))->first(['amount']); 
			$Msg['response']='true';
			$Msg['amount']=$first_wallt['amount'];
			$Msg['msg']='success'; 
		}
		return $Msg;
	}
	public function wallet_to_wallet(Request $request){
		$Msg['response']='false';
		$Msg['order_id']='';
		$Msg['trns_time']='';
		$Msg['msg']='unsuccess';
		if($request->input('user_id') && $request->input('wallet_id') && $request->input('mobile')){
			$first_wallet=Wallet::where('id', $request->input('wallet_id'))->first();
			$second_wallet=User::where('mobile', $request->input('mobile'))->with('wallet')->first();
			if($second_wallet['wallet']['id']){
				$post_wallet['user_id']=$request->input('user_id');
				$post_wallet['wallet_id']=$first_wallet['id'];
				$post_wallet['order_id']=unique_order_id();
				$post_wallet['wallet_id_to']=$second_wallet['wallet']['id'];
				$post_wallet['amount']=$request->input('amount');
				$post_wallet['payment_method']='wallet';
				$post_wallet['status']='paid';
				$tr_cnf=Transaction::create($post_wallet);
				unset($post_wallet['wallet_id']);
				unset($post_wallet['status']);
				$post_wallet['user_id']=$second_wallet['wallet']['user_id'];
				$post_wallet['status']='received';
				Transaction::create($post_wallet);
				$wallet_post['amount']=$second_wallet['wallet']['amount']+$request->input('amount');
				Wallet::where('id', $second_wallet['wallet']['id'])->update($wallet_post);
				$wallet_post['amount']=$first_wallet['amount']-$request->input('amount');
				Wallet::where('id', $request->input('wallet_id'))->update($wallet_post);
				$Msg['response']='true';
				$Msg['trns_time']=$tr_cnf;
				$Msg['order_id']=$post_wallet['order_id'];
				$Msg['msg']='Balance has been transfer success';
			}else{
				$Msg['response']='false';
				$Msg['msg']='User Not valid.';
			}
		}else{
			$Msg['response']='false';
			$Msg['msg']='Somthing wrong.';
		} 
		return $Msg;
	}
	public function transaction_history(Request $request){
		if($request->input('user_id')){
			$u_id=$request->input('user_id');
			return Transaction::where('user_id', $u_id)->get();
		}
	}
	public function forgotpass(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		$Msg['otp']='';
		if($request->input('mobile')){
			$oned=User::where('mobile', $request->input('mobile'))->first();
			if($oned['mobile']){
				$otp=sent_otp($request->input('mobile'));
				$Msg['response']='true';
				$Msg['otp']=$otp;
				$Msg['msg']='success';
			}else{
				$Msg['msg']='Mobile not register';
			}
		}
		return $Msg;
	}
	public function update_users(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		if($request->input('mobile') && $request->input('password')){
			$oned=User::where('mobile', $request->input('mobile'))->update(['password'=>Hash::make($request->input('password'))]);
			$Msg['response']='true';
			$Msg['msg']='success';
		}
		return $Msg;
	}
	public function vehicle_list(Request $request){
		$Msg['response']='false';
		$Msg['vlist']='';
		$Msg['msg']='unsuccess';
		if($request->input('vendor_id')){
			$vlist=Vehicle::where('vendor_id', $request->input('vendor_id'))->with(['driver_info', 'vehicle_type'])->get();
			$Msg['response']='true';
			$Msg['vlist']=$vlist;
			$Msg['msg']='success';
		}
		return $Msg;
	}
	public function driver_list(Request $request){
		$Msg['response']='false';
		$Msg['vlist']='';
		$Msg['msg']='unsuccess';
		if($request->input('vendor_id')){
			$vlist_ide=Driver::where('vendor_id', $request->input('vendor_id'))->get(['driver_id'])->toArray();
			$vlist=User::whereIn('id', $vlist_ide)->get();
			$Msg['response']='true';
			$Msg['vlist']=$vlist;
			$Msg['msg']='success';
		}
		return $Msg;
	}
	public function assigndriver(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		if($request->input('vehicle_id') && $request->input('driver_id')){
			$vehiclelist=Vehicle::where(['driver_id'=>$request->input('driver_id')])->first();
			if($vehiclelist['id']){
				$Msg['msg']='Driver already assigned';
			}else{
				Vehicle::where(['id'=>$request->input('vehicle_id')])->update(['driver_id'=>$request->input('driver_id')]);
				$Msg['response']='true';
				$Msg['msg']='success';
			}
		}else{
			$Msg['msg']='somthing is missing';
		}
		return $Msg;
	}
	public function Myallbooking(Request $request){
		$Msg['response']='false';
		$Msg['vlist']='';
		$Msg['msg']='unsuccess';
		if($request->input('vendor_id')){
			$vlist_ide=Driver::where('vendor_id', $request->input('vendor_id'))->get(['driver_id'])->toArray();
			$vlist=Booking_confirm::with('bookingInfo')->with('userInfo')->whereIn('driver_id', $vlist_ide)->get();
			$Msg['response']='true';
			$Msg['vlist']=$vlist;
			$Msg['msg']='success';
		}
		return $Msg;
	}
	public function completed_booking(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		if($request->input('booking_id') && $request->input('driver_id') && $request->input('status')){
			Booking_confirm::where(['booking_id'=>$request->input('booking_id'), 'driver_id'=>$request->input('driver_id')])->update(['status'=>$request->input('status')]);
			$bfst=Booking_confirm::where(['booking_id'=>$request->input('booking_id'), 'driver_id'=>$request->input('driver_id')])->with(['wallet', 'transaction'])->first();
			if($bfst['transaction']['payment_method']=="wallet" && $bfst['transaction']['payment_method']=="online"){
				Wallet::where('id', $bfst['wallet']['id'])->update(['amount'=>$bfst['wallet']['amount']+$bfst['price']]);
			}
			$Msg['response']='true';
			$Msg['msg']='success';
		}else{
			$Msg['msg']='somthing is going wrong.';
		}
		return $Msg;
	}
	public function current_latlong(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		if($request->input('action')=="runningride"){
			if($request->input('booking_id') && $request->input('driver_id') && $request->input('current_book_lat') && $request->input('current_book_long')){
				Booking_confirm::where(['booking_id'=>$request->input('booking_id'), 'driver_id'=>$request->input('driver_id')])->update(['current_book_lat'=>$request->input('current_book_lat'), 'current_book_long'=>$request->input('current_book_long'), 'status'=>'running']);
				$Msg['response']='true';
				$Msg['msg']='success';
				_pusher_('livetrack');
			}else{
				$Msg['msg']='somthing is going wrong.';
			}
		}elseif($request->input('action')=="driverlocation"){
			if($request->input('driver_id') && $request->input('current_book_lat') && $request->input('current_book_long')){
				Driver::where('driver_id', $request->input('driver_id'))->update(['current_lat'=>$request->input('current_book_lat'), 'current_long'=>$request->input('current_book_long')]);
				$Msg['response']='true';
		        $Msg['msg']='success';
			}else{
				$Msg['msg']='somthing is going wrong.';
			}
		}else{
			$Msg['msg']='somthing is going wrong.';
		}
		return $Msg;
	}
	public function get_current_ltln(Request $request){
		$Msg['response']='false';
		$Msg['bfirst']='';
		$Msg['msg']='unsuccess';
		if($request->input('booking_id') && $request->input('driver_id')){
			$bfirst=Booking_confirm::where(['booking_id'=>$request->input('booking_id'), 'driver_id'=>$request->input('driver_id'), 'status'=>'ongoing'])->with(['bookingInfo', 'driverInfo', 'driverExtInfo'])->first();
			$Msg['response']='true';
			$Msg['bfirst']=$bfirst;
			$Msg['msg']='success';
		}
		return $Msg;
	}
	public function mytrans_earning(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		$Msg['trlist']='';
		if($request->input('action')=="vendor"){
			if($request->input('user_id')){
				$v_id=$request->input('user_id');
				$dlist=Driver::where('vendor_id', $v_id)->pluck('driver_id');
				$trlist=Transaction::where(['user_id'=>$v_id, 'payment_method'=>'referal'])->with('relatedtrans')->orwhereHas('relatedtrans', function($q) use($dlist) {
					$q->whereIn('driver_id', $dlist);
					$q->where('status', 'completed');
				})->get();
				$Msg['response']='true';
				$Msg['msg']='success';
				$Msg['trlist']=$trlist;
			}
		}
		if($request->input('action')=="driver"){
			if($request->input('user_id')){
				$d_id=$request->input('user_id');
				$trlist=Transaction::where(['user_id'=>$d_id, 'payment_method'=>'referal'])->with('relatedtrans')->orwhereHas('relatedtrans', function($q) use($d_id){
					$q->where('driver_id', '=', $d_id);
					$q->where('status', 'completed');
				})->get();
				$Msg['response']='true';
				$Msg['msg']='success';
				$Msg['trlist']=$trlist;
			}
		}
		return $Msg;
	}
	public function partner_status(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		$Msg['prlist']='';
		if($request->input('action')=="vendor"){
			$phlist=Photo::where('vendor_id', $request->input('user_id'))->first();
			if($phlist['id']){
				$Msg['response']='false';
				$Msg['msg']='success';
				$Msg['prlist']=$phlist['status_docs'];
			}
		}
		if($request->input('action')=="driver"){
			$phlist=Photo::where('driver_id', $request->input('user_id'))->first();
			if($phlist['id']){
				$Msg['response']='true';
				$Msg['msg']='success';
				$Msg['prlist']=$phlist['status_docs'];
			}
		}
		return $Msg;
	}
	public function get_uinfo(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		$Msg['ulist']='';
		if($request->input('user_id')){
			$ulist=User::where('id', $request->input('user_id'))->first();
			$ulist['profile_pic']=asset('/img/users-pic/'.$ulist['profile_pic']);
			if(@$ulist['id']){
				$Msg['response']='true';
				$Msg['msg']='success';
				$Msg['ulist']=$ulist;
			}
		}
		return $Msg;
	}
	public function detail_partner(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		$Msg['dlist']='';
		$Msg['state']='';
		$Msg['city']='';
		if($request->input('driver_id')){
			$ulist=Photo::where('driver_id', $request->input('driver_id'))->with('driverInfo')->first();
			$ulocat=User::where('id', $request->input('driver_id'))->with(['state', 'city'])->first();
			$Msg['dlist']=$ulist;
			$Msg['state']=$ulocat['state']['name'];
			$Msg['city']=$ulocat['city']['name'];
			$Msg['response']='true';
			$Msg['msg']='success';
		}
		return $Msg;
	}
	public function cancelled_booking(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		if($request->input('bidding_id') && $request->input('booking_id') && $request->input('status')){
			Booking_confirm::where(['id'=>$request->input('bidding_id'), 'booking_id'=>$request->input('booking_id')])->update(['status'=>'cancelled']);
			$Msg['response']='true';
			$Msg['msg']='success';
		}
		if($request->input('bidding_id') && $request->input('booking_id') && $request->input('driver_id') && $request->input('status')){
			Booking_confirm::where(['id'=>$request->input('bidding_id'), 'driver_id'=>$request->input('driver_id'), 'booking_id'=>$request->input('booking_id')])->update(['status'=>'cancelled']);
			$Msg['response']='true';
			$Msg['msg']='success';
		}
		return $Msg;
	}
	public function insurance_p(Request $request){
		$Msg['response']='false';
		$Msg['insurance']='';
		$Msg['msg']='unsuccess';
		$insurance=Setting::where('id', 1)->first();
		if($insurance){
			$Msg['response']='true';
			$Msg['insurance']=$insurance['insurance'];
			$Msg['msg']='success';
		}
		return $Msg;
	}
	public function driver_vehicle(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		$Msg['text-msg']='not assigned';
		$veh=Vehicle::with('driver_info')->where('driver_id', $request->input('driver_id'))->first();
		if($veh['id']){
			$Msg['response']='true';
			$Msg['msg']='success';
			$Msg['text-msg']="assigned";
		}
		return $Msg;
	}
	public function vendor_vehicle(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		$Msg['vlist']='';
		$veh=Vehicle::where('vendor_id', $request->input('vendor_id'))->with('vehicle_docs')->get();
		if($veh){
			$Msg['response']='true';
			$Msg['msg']='success';
			$Msg['vlist']=$veh;
		}
		return $Msg;
	}
	public function get_vehicle(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		$Msg['vlist']='';
		$veh=Vehicle::where('id', $request->input('vehicle_id'))->with(['vehicle_docs', 'state', 'city', 'vehicle_type'])->first();
		if($veh){
			$Msg['response']='true';
			$Msg['msg']='success';
			$Msg['vlist']=$veh;
		}
		return $Msg;
	}
	public function invoice_booking_user(Request $request, $booking_id){
		$blist=Booking_confirm::where(['booking_id'=>$booking_id, 'status'=>'completed'])->with(['bookingInfo', 'driverInfo', 'vehicleInfo', 'vehicledetail'])->first();
		$culist=Booking::where('id', $blist['booking_id'])->with('userInfo')->first();
		$datal=array('blist'=>$blist, 'culist'=>$culist);
        return view('front/invoices/complete-invoice', $datal);
		//$pdf = PDF::loadView('front/invoices/complete-invoice', $datal);
		return $pdf->download('customer-invoice'.$request->input('booking_id').'.pdf');
	}
	public function invoice_booking_driver(Request $request, $booking_id){
		$blist=Booking_confirm::where('booking_id', $request->input('booking_id'))->with('bookingInfo')->get();
		$pdf = PDF::loadView('front/invoices/driver-invoice', $blist);
		return $pdf->download('driver-invoice_'.$request->input('booking_id').'.pdf');
	}
	public function get_state(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		$Msg['slist']='';
		$slist=State::get();
		if($slist){
			$Msg['response']='true';
			$Msg['msg']='success';
			$Msg['slist']=$slist;
		}
		return $Msg;
	}
	public function get_city(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		$Msg['slist']='';
		if($request->input('state_id')){
			$st_li=State::where('name', 'like', '%'.$request->input('state_id').'%')->first();
			$slist=City::where('state_id', $st_li['id'])->get();
			$Msg['response']='true';
			$Msg['msg']='success';
			$Msg['slist']=$slist;
		}
		return $Msg;
	}
	public function get_credit_limit(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		$Msg['climit']='';
		$slist=Setting::where('id', 1)->first();
		if($slist){
			$Msg['response']='true';
			$Msg['msg']='success';
			$Msg['climit']=$slist['credit_limit_amount'];
		}
		return $Msg;
	}
	public function recent_transaction(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		$Msg['transactions']='';
		if($request->input('driver_id')){
			$transaction=Booking_confirm::where(['driver_id'=>$request->input('driver_id'), 'status'=>'completed'])->with(['transaction', 'bookingInfo'])->get();
			$Msg['response']='true';
			$Msg['msg']='success';
			$Msg['transactions']=$transaction;
		}
		return $Msg;
	}
	public function wheelar(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		$Msg['wheelar']='';
		if($request->input('id')){
			$wheelar=Vehicle_list::where('id', $request->input('id'))->first();
		}else{
			$wheelar=Vehicle_list::get();
		}
		if($wheelar){
			$Msg['response']='true';
			$Msg['msg']='success';
			$Msg['wheelar']=$wheelar;
		}
		return $Msg;
	}
	public function switch(Request $request){
		$Msg['response']='false';
		$Msg['msg']='unsuccess';
		if($request->input('driver_id') && $request->input('status')){
			if($request->input('status')=="on"){
               $status="off";
			}
			if($request->input('status')=="off"){
               $status="on";
			}
         Driver::where('driver_id', $request->input('driver_id'))->update(['status'=>$status]);
         $Msg['response']='true';
		 $Msg['msg']='success';
       }
       return $Msg;
	}
	public function completd_destination(Request $request){
        $Msg['response']='false';
		$Msg['msg']='unsuccess';
		if($request->input('driver_id') && $request->input('booking_id')){
			$sf=Booking_confirm::where(['booking_id'=>$request->input('booking_id'), 'driver_id'=>$request->input('driver_id')])->update(['destination_status'=>'reached']);
			if($sf['id']){
				 $Msg['response']='true';
		         $Msg['msg']='success';
			}
		}
		return $Msg;
	}
	public function gettime(){
			date_default_timezone_set('GMT');
			$start = '2014-06-01 14:00:00';
			echo date('Y-m-d H:i',strtotime('+1 hour +20 minutes',strtotime($start)));
	}
}