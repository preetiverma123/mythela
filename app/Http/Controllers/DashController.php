<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Photo;
use App\User;
use App\Booking;
use App\Userroles;
class DashController extends Controller
{
	public function index(){
		return view('dash/dashboard');
	}
	public function allbooking(){
		$bookings = Booking::with('userInfo')->get(); 
		return view('dash/booking', ['bookings'=>$bookings]);
	}
	public function ongoingbooking(){
		$bookings = Booking::with('userInfo')->with('booking_cnf')->whereHas('booking_cnf', function($q){
			$q->where('status', '=', 'ongoing');
		})->get(); 
		return view('dash/booking', ['bookings'=>$bookings]);
	}
	public function completedbooking(){
		$bookings = Booking::with('userInfo')->with('booking_cnf')->whereHas('booking_cnf', function($q){
			$q->where('status', '=', 'completed');
		})->get(); 
		return view('dash/booking', ['bookings'=>$bookings]);
	}
	public function cancelledbooking(){
		$bookings = Booking::with('userInfo')->with('booking_cnf')->whereHas('booking_cnf', function($q){
			$q->where('status', '=', 'expired');
		})->get(); 
		return view('dash/booking', ['bookings'=>$bookings]);
	}
	public function managecustomer(){
		$users = User::with('role')->whereHas('role', function($q){
			$q->where('slug', '=', 'customer');
		})->get(); 
		return view('dash/manage-customers', ['users'=>$users]);
	}
	public function managepartner(){
		$users = User::with('role')->whereHas('role', function($q){
			$q->where('slug', '=', 'vendor');
		})->get(); 
		return view('dash/manage-partners', ['users'=>$users]);
	}
	public function manageadmins(){
		$users = User::with('role')->whereHas('role', function($q){
			$q->where('slug', '=', 'admin');
		})->get(); 
		return view('dash/manage-admins', ['users'=>$users]);
	}
	public function status(Request $request){
		if($request->input('action')=="user"){
			if($request->input('user_id')!="" && $request->input('status')){
				Userroles::where('user_id', decode($request->input('user_id')))->update(['status'=>$request->input('status')]);
			}
		}
	}
	public function view_detail(Request $request, $booking_id){
		$booking_detail = Booking::with(['userInfo', 'transactons'])->with('booking_cnf')->where('id', decode($booking_id))->first(); 
		return view('dash/booking-details', ['booking_detail'=>$booking_detail]);
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
		$ulist=User::where('id', $user_id)->first();
		$photolist=Photo::where('vendor_id', $user_id)->orwhere('driver_id', $user_id)->orwhere('vehicle_id', $user_id)->first();
		return view('dash/detail-partener', ['ulist'=>$ulist, 'photolist'=>$photolist]);	
	}
}