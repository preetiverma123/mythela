<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;
use Mail;
use App\Role;
use App\User;
use DataTables;
class DashController extends Controller
{
	protected function validator(array $data ,$action){
		if($action=="reset"){
			return Validator::make($data, [
				'password' => 'required|string|min:6|confirmed',
				'password_confirm' => 'required|string|min:6'])->validate();
		}
		if($action=="register"){
			return Validator::make($data, [
				'first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required|string|email|max:255|unique:users',
				'mobile' => 'required|unique:users',
				'city_id' => 'required'])->validate();
		}
		if($action=="commission"){
			return Validator::make($data, [
				'commission' => 'required'])->validate();
		}
		if($action=="credit"){
			return Validator::make($data, [
				'credit' => 'required'])->validate();
		}
		if($action=="insurance"){
			return Validator::make($data, [
				'insurance' => 'required'])->validate();
		}
		if($action=="trip"){
			return Validator::make($data, [
				'trip' => 'required'])->validate();
		}
		if($action=="gst"){
			return Validator::make($data, [
				'gst' => 'required'])->validate();
		}
		if($action=="stax"){
			return Validator::make($data, [
				'stax' => 'required'])->validate();
		}
		if($action=="vehicle"){
			return Validator::make($data, [
				'name' => 'required'])->validate();
		}
	}
	public function index(){
		$bookings = DB::connection('mythela_db')->select('SELECT count(*) as total FROM `bookings` WHERE created_at >= ( CURDATE() - INTERVAL 7 DAY )');
		$booking_o = DB::connection('mythela_db')->select('SELECT count(*) as total FROM `bookings` INNER JOIN `booking_confirms` ON bookings.id=booking_confirms.booking_id WHERE booking_confirms.status="ongoing"');
		$booking_c = DB::connection('mythela_db')->select('SELECT count(*) as total FROM `bookings` INNER JOIN `booking_confirms` ON bookings.id=booking_confirms.booking_id WHERE booking_confirms.status="completed"');
		$booking_cancel = DB::connection('mythela_db')->select('SELECT count(*) as total FROM `bookings` INNER JOIN `booking_confirms` ON bookings.id=booking_confirms.booking_id WHERE booking_confirms.status="cancelled"');
		return view('dash/dashboard', ['bookings'=>$bookings, 'ongoing'=>$booking_o, 'completed'=>$booking_c, 'cancelled'=>$booking_cancel]);
	}
	public function allbooking(){
		$bookings = DB::connection('mythela_db')->table('users')->join('bookings', 'users.id', '=', 'bookings.user_id')->get();
		return view('dash/booking', ['bookings'=>$bookings]);
	}
	public function ongoingbooking(){
		$bookings = DB::connection('mythela_db')->table('bookings')->join('booking_confirms', 'bookings.id', '=', 'booking_confirms.booking_id')->where('status', 'ongoing')->get();
		return view('dash/booking', ['bookings'=>$bookings]);
	}
	public function completedbooking(){
		$bookings = DB::connection('mythela_db')->table('bookings')->join('booking_confirms', 'bookings.id', '=', 'booking_confirms.booking_id')->where('status', 'completed')->get(); 
		return view('dash/booking', ['bookings'=>$bookings]);
	}
	public function cancelledbooking(){
		$bookings = DB::connection('mythela_db')->table('bookings')->join('booking_confirms', 'bookings.id', '=', 'booking_confirms.booking_id')->where('status', 'expired')->get(); 
		return view('dash/booking', ['bookings'=>$bookings]);
	}
	public function managecustomer(){
		$users = DB::connection('mythela_db')->table('users')->join('roles', 'users.role_id', '=', 'roles.id')->where('roles.slug', 'customer')->select('users.*')->get(); 
		return view('dash/manage-customers', ['users'=>$users]);
	}
	public function managepartner(){
		if(role(Auth::user()['role_id'])=="superadmin"){
			$users = DB::connection('mythela_db')->table('users')->where('driver_role_id', '2')->orWhere('vendor_role_id', '3')->get();
		}else{
			$users = DB::connection('mythela_db')->table('users')->where(['vendor_role_id'=>'2', 'city_id'=>Auth::user()['city_id']])->orWhere(['vendor_role_id'=>'3', 'city_id'=>Auth::user()['city_id']])->get();
		}
		return view('dash/manage-partners', ['users'=>$users]);
	}
	public function managevehicle(){
		if(role(Auth::user()['role_id'])=="superadmin"){
			$vehicles = DB::connection('mythela_db')->table('vehicles')->join('users', 'vehicles.vendor_id', '=', 'users.id')->select('vehicles.*')->get();
		}
		if(role(Auth::user()['role_id'])=="admin"){
			$vehicles = DB::connection('mythela_db')->table('vehicles')->join('users', 'vehicles.vendor_id', '=', 'users.id')->select('vehicles.*')->get();
		}
		return view('dash/manage-vehicles', ['vehicles'=>$vehicles]);
	}
	public function vehicle_detail(Request $request, $vehicle_id){
		$vehicle_first = DB::connection('mythela_db')->table('photos')->where('vehicle_id', decode($vehicle_id))->join('vehicles', 'photos.vehicle_id', '=', 'vehicles.id')->join('users', 'vehicles.vendor_id', '=', 'users.id')->selectRaw('users.*, vehicles.* , photos.*')->first();
		return view('dash/detail-vehicle', ['vehicle_first'=>$vehicle_first]);
	}
	public function manageadmins(Request $request, $user_id=""){
		if($request->isMethod('post')){
			$post_data=$request->input();
			$post_data['role_id']="2";
			$post_data['status']="approved";
			$passw=rand();
			$email=$request->input('email');
			$post_data['password']=Hash::make($passw);
			unset($post_data['_token']);
			if($user_id){
				unset($post_data['email']);
				unset($post_data['mobile']);
				unset($post_data['example1_length']);
				User::where('id', $user_id)->update($post_data);
				return redirect()->back()->with('msg', ['type'=>'success','text'=>'User has been updated.']);
			}else{
				$this->validator($request->input(), 'register');
				User::create($post_data);
				Mail::raw('Dear Admin Your Account has been created username='.$request->input('email').', password='.$passw, function ($message) use ($email){
					$message->to($email);
				});
				return redirect()->back()->with('msg', ['type'=>'success','text'=>'User has been created.']);
			}
		}
		$states = DB::connection('mythela_db')->table('states')->get();
		$users_first = User::where('id', decode($user_id))->first();
		$cities = DB::connection('mythela_db')->table('cities')->where('state_id', $users_first['state_id'])->get();
		$users = User::with('role')->whereHas('role', function($q){
			$q->where('slug', '=', 'admin');
		})->get(); 
		return view('dash/manage-admins', ['users'=>$users, 'users_first'=>$users_first, 'states'=>$states, 'cities'=>$cities]);
	}
	public function status(Request $request){
		if($request->input('action')=="user"){
			if($request->input('user_id') && $request->input('status')){
				DB::connection('mythela_db')->table('users')->where('id', decode($request->input('user_id')))->update(['status'=>$request->input('status')]);
				$users_firstch = User::where('id', decode($request->input('user_id')))->first();
				if($users_firstch['email']){
					$emailto=$users_firstch['email'];
					if($request->input('status')=="block"){
						$msg="Account has been block.";
					}
					if($request->input('status')=="approved"){
						$msg="Account has been approved.";
					}
					Mail::raw(@$msg, function ($message) use ($emailto){
						$message->to($emailto);
					});
				}
			}
		}
		if($request->input('action')=="driver"){
			if($request->input('user_id') && $request->input('status')){
				DB::connection('mythela_db')->table('users')->where('id', decode($request->input('user_id')))->update(['driver_status'=>$request->input('status')]);
				$users_firstch = User::where('id', decode($request->input('user_id')))->first();
				if($users_firstch['email']){
					$emailto=$users_firstch['email'];
					if($request->input('status')=="block"){
						$msg="Account has been block.";
					}
					if($request->input('status')=="approved"){
						$msg="Account has been approved.";
					}
					Mail::raw(@$msg, function ($message) use ($emailto){
						$message->to($emailto);
					});
				}
			}
		}
		if($request->input('action')=="vendor"){
			if($request->input('user_id') && $request->input('status')){
				DB::connection('mythela_db')->table('users')->where('id', decode($request->input('user_id')))->update(['vendor_status'=>$request->input('status')]);
				$users_firstch = User::where('id', decode($request->input('user_id')))->first();
				if($users_firstch['email']){
					$emailto=$users_firstch['email'];
					if($request->input('status')=="block"){
						$msg="Account has been block.";
					}
					if($request->input('status')=="approved"){
						$msg="Account has been approved.";
					}
					Mail::raw(@$msg, function ($message) use ($emailto){
						$message->to($emailto);
					});
				}
			}
		}
		if($request->input('action')=="partner"){
			if($request->input('user_id') && $request->input('status')){
				DB::connection('mythela_db')->table('users')->where('id', decode($request->input('user_id')))->update(['partner_status'=>$request->input('status')]);
			}
		}
		if($request->input('action')=="document"){
			if($request->input('docs_id') && $request->input('status')){
				DB::connection('mythela_db')->table('photos')->where('id', decode($request->input('docs_id')))->update(['status_docs'=>$request->input('status')]);
				if($request->input('status')=="rejected"){
					DB::connection('mythela_db')->table('users')->where('id', decode($request->input('user_id')))->update(['driver_status'=>'block']);
				}
				if($request->input('status')=="approved"){
					DB::connection('mythela_db')->table('users')->where('id', decode($request->input('user_id')))->update(['driver_status'=>'approved']);
				}
			}
		}
		if($request->input('action')=="partners"){
			if($request->input('user_id') && $request->input('status')){
				User::where('id', decode($request->input('user_id')))->update(['status'=>$request->input('status')]);
			}
		}
		if($request->input('action')=="vehicles"){
			if($request->input('vehicle_id') && $request->input('status')){
				$veh_list=DB::connection('mythela_db')->table('photos')->where('id', decode($request->input('vehicle_id')))->first();
				$vehicle_id=$veh_list->vehicle_id;
				DB::connection('mythela_db')->table('vehicles')->where('id', $vehicle_id)->update(['vehicle_status'=>$request->input('status')]);
				DB::connection('mythela_db')->table('photos')->where('id', decode($request->input('vehicle_id')))->update(['status_docs'=>$request->input('status')]);
			}
		}
	}
	public function view_detail(Request $request, $booking_id){
		$booking_detail = DB::connection('mythela_db')->table('users')->join('bookings', 'users.id', '=', 'bookings.user_id')->leftJoin('booking_confirms', 'bookings.id', '=', 'booking_confirms.booking_id')->leftJoin('transactions', 'booking_confirms.booking_id', '=', 'transactions.booking_id')->where('bookings.id', decode($booking_id))->first();
		return view('dash/booking-details', ['booking_detail'=>$booking_detail]);
	}
	public function manage_partner_commission(Request $request, $commission_id=""){
		if($request->isMethod('post')){
			$this->validator($request->input(), 'commission');
			DB::connection('mythela_db')->table('settings')->where('id', 1)->update(['commission'=>$request->input('commission')]);
			return redirect()->back()->with('msg', ['type'=>'success','text'=>'data has been updated.']);
		}
		if(@$commission_id){
			$clist_l=DB::connection('mythela_db')->table('settings')->where('id', decode(@$commission_id))->first();
		}
		$clist=DB::connection('mythela_db')->table('settings')->where('id', 1)->first();
		return view('dash/manage-partners-commisson', ['clists'=>$clist, 'clist_l'=>@$clist_l]);
	}
	public function manage_insurance(Request $request, $insurance_id=""){
		if($request->isMethod('post')){
			$this->validator($request->input(), 'insurance');
			DB::connection('mythela_db')->table('settings')->where('id', 1)->update(['insurance'=>$request->input('insurance')]);
			return redirect()->back()->with('msg', ['type'=>'success','text'=>'data has been updated.']);
		}
		if(@$insurance_id){
			$clist_l=DB::connection('mythela_db')->table('settings')->where('id', decode(@$insurance_id))->first();
		}
		$ilist=DB::connection('mythela_db')->table('settings')->where('id', 1)->first();
		return view('dash/manage-insurance', ['ilists'=>$ilist, 'clist_l'=>@$clist_l]);
	}
	public function addadmin(Request $request){
		if($request->isMethod('post')){
			$ulist_mo=User::where('mobile', $request->input('mobile'))->first();
			$ulist_em=User::where('email', $request->input('email'))->first();
			if($ulist_mo['mobile']=="" && $ulist_em['email']==""){
				$post_data=$request->input();
				unset($post_data['_token']);
				$post_data['role_id']='4';
				$post_data['password']=Hash::make('12345');
				$list_db=User::create($post_data);
				Userroles::create(['user_id'=>$list_db['id'], 'role_id'=>'4', 'status'=>'approved']);
			}else{
				return redirect()->back()->with('msg', ['type'=>'warning','text'=>'Mobile Number or email Duplicate.']);
			}
		}
		return view('dash/form');
	}
	public function detailpartner(Request $request,  $partner_id){
		$user_id=decode($partner_id);
		$photolist="";
		$ulist = DB::connection('mythela_db')->table('users')->where('id', $user_id)->first();
		$photolist_1 = DB::connection('mythela_db')->table('photos')->where('vendor_id', $user_id)->first();
		$photolist_2 = DB::connection('mythela_db')->table('photos')->where('driver_id', $user_id)->first();
		$vehicleInfo = DB::connection('mythela_db')->table('drivers')->join('vehicles', 'drivers.driver_id', '=', 'vehicles.driver_id')->where('drivers.driver_id', $user_id)->first();
		if($photolist_1){
			$photolist=$photolist_1;
		}
		if($photolist_2){
			$photolist=$photolist_2;
		}
		return view('dash/detail-partener', ['ulist'=>$ulist, 'photolist'=>$photolist, 'vehicleInfo'=>$vehicleInfo]);	
	}
	public function detailcustomer(Request $request,  $customer_id){
		$user_id=decode($customer_id);
		$ulist = DB::connection('mythela_db')->table('users')->where('id', $user_id)->first();
		return view('dash/detail-customer', ['ulist'=>$ulist]);	
	}
	public function manage_accounts(){
		$ulist=User::with('role')->with('role')->whereHas('role', function($q){
			$q->where('slug', '=', 'admin');
		})->get();
		$ulist = DB::connection('mythela_db')->table('users')->where('driver_role_id', 2)->orwhere('vendor_role_id', 3)->get();
		$clist = DB::connection('mythela_db')->table('cities')->get();
		$rlist = DB::connection('mythela_db')->table('roles')->where('slug', '!=', 'customer')->get();
		return view('dash/manage-accounts', ['uslists'=>$ulist, 'clist'=>$clist, 'rlist'=>$rlist]);
	}
	public function filter_accounts(Request $request){
		$cityId=@$request->input('city_id');
		$rsssId=@$request->input('role_id');
		$userId=@$request->input('user_id');
		$orderby=@$request->input('orderby');
		$wh='';
		if($cityId){
			$wh.=' where `city_id` = "'.$cityId.'"';
		}elseif($rsssId){
			$wh.=' where `driver_role_id` = "'.$rsssId.'" or `vendor_role_id` = "'.$rsssId.'"';
		}elseif($userId){
			$wh.=' where id='.$userId;
		}elseif($cityId && $rsssId){
			$wh.=' where `city_id` = "'.$cityId.'" and `driver_role_id` = "'.$rsssId.'" or `vendor_role_id` = "'.$rsssId.'"';
		}elseif($cityId && $userId){
			$wh.=' where `city_id` = "'.$cityId.'" and `id` = "'.$userId.'" ';
		}elseif($rsssId && $userId){
			$wh.=' where `id` = "'.$userId.'" and `driver_role_id` = "'.$rsssId.'" or `vendor_role_id` = "'.$rsssId.'"';
		}elseif($cityId && $rsssId && $userId){
			$wh.=' where `city_id` = "'.$cityId.'" and `driver_role_id` = "'.$rsssId.'" or `vendor_role_id` = "'.$rsssId.'" and id="'.$userId.'"';
		}else{
			$wh.=' where `vendor_role_id` != "" and `driver_role_id` != ""';	
		}
		$blist=DB::connection('mythela_db')->select('select cities.name as name, users.* from users inner join cities on users.city_id=cities.id '.$wh);
		return dataTables()->of($blist)->toJson();
	}
	public function delete(Request $request){
		$Msg['response']='false';
		$Msg['text-msg']='';
		if($request->isMethod('delete')){
			if($request->input('action')=="city"){
				DB::connection('mythela_db')->table('cities')->where('id', decode($request->input('city_id')))->delete();
				$Msg['response']='true';
				$Msg['text-msg']='success';
			}
			if($request->input('action')=="state"){
				DB::connection('mythela_db')->table('states')->where('id', decode($request->input('state_id')))->delete();
				$Msg['response']='true';
				$Msg['text-msg']='success';
			}
		}
		return $Msg;
	}
	public function state(Request $request,  $state_id=""){
		if($request->isMethod('post')){
			if($state_id){
				DB::connection('mythela_db')->table('states')->where('id', decode($state_id))->update(['name'=>$request->input('name'), 'code'=>$request->input('code')]);
				return redirect()->back()->with('msg', ['type'=>'success','text'=>'Data has been saved.']);
			}else{
				DB::connection('mythela_db')->insert('insert into states (id, name, code) values (?, ?, ?)', array(NULL, $request->input('name'), $request->input('code')));
				return redirect()->back()->with('msg', ['type'=>'success','text'=>'Data has been inserted.']);
			}
		}
		$state_f = DB::connection('mythela_db')->table('states')->where('id', decode($state_id))->first();
		$states = DB::connection('mythela_db')->table('states')->get();
		return view('dash/manage-state', ['states'=>@$states, 'state_f'=>$state_f]);
	}
	public function city(Request $request,  $city_id=""){
		if($request->isMethod('post')){
			if($city_id){
				DB::connection('mythela_db')->table('cities')->where('id', decode($city_id))->update(['name'=>$request->input('name'), 'state_id'=>$request->input('state_id')]);
				return redirect()->back()->with('msg', ['type'=>'success','text'=>'Data has been saved.']);
			}else{
				DB::connection('mythela_db')->insert('insert into cities (id, name, state_id) values (?, ?, ?)', array(NULL, $request->input('name'), $request->input('state_id')));
				return redirect()->back()->with('msg', ['type'=>'success','text'=>'Data has been inserted.']);
			}
		}
		$city_f = DB::connection('mythela_db')->table('cities')->where('id', decode($city_id))->first();
		$cities = DB::connection('mythela_db')->table('cities')->get();
		$states = DB::connection('mythela_db')->table('states')->get();
		return view('dash/manage-city', ['cities'=>@$cities, 'city_f'=>$city_f, 'states'=>$states]);
	}
	public function detail_earning(Request $request, $id){
		$ulist = DB::connection('mythela_db')->table('users')->where('id', decode($id))->first();
		$total_earning = DB::connection('mythela_db')->table('drivers')->join('booking_confirms', 'drivers.driver_id', '=', 'booking_confirms.driver_id')->join('bookings', 'booking_confirms.booking_id', '=', 'bookings.id')->join('transactions', 'booking_confirms.booking_id', '=', 'transactions.booking_id')->where(['drivers.vendor_id'=>decode($id)])->orwhere(['drivers.driver_id'=>decode($id)])->sum('booking_confirms.price');
		$btransaction= DB::connection('mythela_db')->table('drivers')->select('transactions.*')->join('booking_confirms', 'drivers.driver_id', '=', 'booking_confirms.driver_id')->join('bookings', 'booking_confirms.booking_id', '=', 'bookings.id')->join('transactions', 'booking_confirms.booking_id', '=', 'transactions.booking_id')->where(['drivers.vendor_id'=>decode($id)])->orwhere(['drivers.driver_id'=>decode($id)])->get();
		return view('dash/detail-earnings', ['first_ulist'=>$ulist, 'total_earning'=>$total_earning, 'btrans'=>$btransaction]);
	}
	public function get_city(Request $request){
		$clist = DB::connection('mythela_db')->table('cities')->where('state_id', $request->input('state_id'))->get();
		return view('dash/city-list', ['clist'=>$clist]);
	}
	public function reset_password(Request $request){
		if($request->isMethod('post')){
			$this->validator($request->input(), 'reset');
			$oned=User::where('id', Auth::user()['id'])->first();
			if(Hash::check($request->input('old_password'), $oned['password'])){
				if($request->input('password')==$request->input('password_confirm')){
					User::where('id', Auth::user()['id'])->update(['password'=>Hash::make($request->input('password_confirm'))]);
					return redirect()->back()->with('msg', ['type'=>'success','text'=>'Your password has been reset.']);
				}else{
					return redirect()->back()->with('msg', ['type'=>'warning','text'=>'Confirm password do not match']);
				}
			}else{
				return redirect()->back()->with('msg', ['type'=>'warning','text'=>'Old password do not match']);
			}
		}
		return view('dash/change-password');
	}
	public function manage_credit_limit(Request $request, $id=""){
		if($request->isMethod('post')){
			$this->validator($request->input(), 'credit');
			DB::connection('mythela_db')->table('settings')->where('id', 1)->update(['credit_limit_amount'=>$request->input('credit')]);
			return redirect()->back()->with('msg', ['type'=>'success','text'=>'data has been updated.']);
		}
		$clist=DB::connection('mythela_db')->table('settings')->where('id', 1)->first();
		return view('dash/manage-credit-limit', ['credit_amount'=>$clist]);
	}
	public function manage_gst(Request $request, $id=""){
		if($request->isMethod('post')){
			$this->validator($request->input(), 'gst');
			$p=$request->input('gst')/2;
			DB::connection('mythela_db')->table('settings')->where('id', 1)->update(['psgst'=>$p, 'pcgst'=>$p]);
			return redirect()->back()->with('msg', ['type'=>'success','text'=>'data has been updated.']);
		}
		$gst=DB::connection('mythela_db')->table('settings')->where('id', 1)->first();
		return view('dash/manage-gst', ['gst'=>$gst]);
	}
	public function manage_stax(Request $request, $id=""){
		if($request->isMethod('post')){
			$this->validator($request->input(), 'stax');
			$p=$request->input('stax')/2;
			DB::connection('mythela_db')->table('settings')->where('id', 1)->update(['sgst'=>$p, 'cgst'=>$p]);
			return redirect()->back()->with('msg', ['type'=>'success','text'=>'data has been updated.']);
		}
		$gst=DB::connection('mythela_db')->table('settings')->where('id', 1)->first();
		return view('dash/manage-service-tax', ['gst'=>$gst]);
	}
	public function manage_trip(Request $request, $id=""){
		if($request->isMethod('post')){
			$this->validator($request->input(), 'trip');
			$t=$request->input('trip');
			DB::connection('mythela_db')->table('settings')->where('id', 1)->update(['referal_trip'=>$t]);
			return redirect()->back()->with('msg', ['type'=>'success','text'=>'data has been updated.']);
		}
		$trip=DB::connection('mythela_db')->table('settings')->where('id', 1)->first();
		return view('dash/manage-trip', ['trip'=>$trip]);
	}
	public function manage_vehicle_list(Request $request, $id=""){
		if($request->isMethod('post')){
			$this->validator($request->input(), 'vehicle');
			if($id){
				DB::connection('mythela_db')->table('vehicle_lists')->where('id', decode(@$id))->update(['name'=>$request->input('name'), 'description'=>$request->input('description')]);
			}else{
				DB::connection('mythela_db')->insert('insert into vehicle_lists (id, name, description) values (?, ?, ?)', array(NULL, $request->input('name'), $request->input('description')));
			}
		}
		$vfst=DB::connection('mythela_db')->table('vehicle_lists')->where('id', decode(@$id))->first();
		$vlist=DB::connection('mythela_db')->table('vehicle_lists')->get();
		return view('dash/manage-vehicle-list', ['vfst'=>$vfst, 'vlist'=>$vlist]);
	}
	public function manage_surround(Request $request, $id=""){
		if($request->isMethod('post')){
			$flm=DB::connection('mythela_db')->table('vehicle_surround_areas')->where('city_id', $request->input('city_id'))->first();
			print_r($flm);
			if(@$flm->id){
				DB::connection('mythela_db')->table('vehicle_surround_areas')->where('city_id', $request->input('city_id'))->update(['range_area'=>$request->input('range_area')]);
				return redirect()->back()->with('msg', ['type'=>'success','text'=>'data has been created.']);
			}else{
				DB::connection('mythela_db')->insert('insert into vehicle_surround_areas (id, city_id, range_area) values (?, ?, ?)', array(NULL, $request->input('city_id'), $request->input('range_area')));
				return redirect()->back()->with('msg', ['type'=>'success','text'=>'data has been updated.']);
			}
		}
		$frole=Role::where('id', Auth::user()['role_id'])->first();
		if($frole['slug']=="superadmin"){
			$clist=DB::connection('mythela_db')->table('cities')->get();
			$sround_area=DB::connection('mythela_db')->table('vehicle_surround_areas')->get();
		}else{
			$clist=DB::connection('mythela_db')->table('cities')->where('id', Auth::user()['city_id'])->get();
			$sround_area=DB::connection('mythela_db')->table('vehicle_surround_areas')->where('city_id', Auth::user()['city_id'])->get();
		}
		return view('dash/manage-surround-area', ['clist'=>$clist, 'frole'=>$frole, 'sround_area'=>$sround_area]);
	}
	public function get_km(Request $request){
		return DB::connection('mythela_db')->table('vehicle_surround_areas')->where('city_id', $request->input('city_id'))->pluck('range_area');
	}
	public function manage_exp_licence(Request $request){
		if($request->isMethod('post')){
			DB::connection('mythela_db')->table('settings')->where('id', 1)->update(['alert_licence_by'=>$request->input('alert_licence_by')]);
		}
		$slist=DB::connection('mythela_db')->table('settings')->where('id', 1)->first();
		return view('dash/manage-exp-licence', ['slist'=>$slist]);
	}
	public function manage_exp_fitness(Request $request){
		if($request->isMethod('post')){
			DB::connection('mythela_db')->table('settings')->where('id', 1)->update(['alert_fitness_by'=>$request->input('alert_fitness_by')]);
		}
		$slist=DB::connection('mythela_db')->table('settings')->where('id', 1)->first();
		return view('dash/manage-exp-fitness', ['slist'=>$slist]);
	}
	public function manage_insurance_email(Request $request){
		if($request->isMethod('post')){
			DB::connection('mythela_db')->table('settings')->where('id', 1)->update(['insurance_email'=>$request->input('insurance_email')]);
		}
		$slist=DB::connection('mythela_db')->table('settings')->where('id', 1)->first();
		return view('dash/manage-insurance-email', ['slist'=>$slist]);
	}
}