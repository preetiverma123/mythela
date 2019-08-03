<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Redirect;
use Validator;
use App\User;
use App\State;
use App\City;
use App\Wallet;
use App\Vehicle_list;
use App\Booking;
use App\Partner_fleet;
use App\Transaction;
use Razorpay\Api\Api;
use App\Booking_confirm;
use Validations\Validate as Validations;

class BookController extends Controller
{
  public function index(Request $request){
    $from=@$request->input('from');
    $to=@$request->input('to');
    $lat=@$request->input('lat');
    $long=@$request->input('long');
    $drop_lat=@$request->input('drop_lat');
    $drop_long=@$request->input('drop_long');
    $vlist=Vehicle_list::get();
    return view('front/book', compact('from', 'to', 'lat', 'long', 'drop_lat', 'drop_long', 'vlist'));
  }
  public function booking(Request $request){
    $Msg['response']='';
    $Msg['action']='';
    $Msg['data']='';
    $Msg['created_at']='';
    if($request->isMethod('post')){
      $post_data=$request->input();
      if($request->input('picup_lat') && $request->input('picup_long')){
        $locat=locatnbyltln($post_data['picup_lat'], $post_data['picup_long']);
        $stet_li=State::where('name', 'like', '%'.@$locat['state'].'%')->orwhere('code', 'like', '%'.@$locat['state'].'%')->first();
        $post_data['state_id']=$stet_li['id'];
        $city_li=City::where('name', 'like', '%'.@$locat['city'].'%')->first();
        $post_data['city_id']=$city_li['id'];
      }
      unset($post_data['_token']);
      $post_data['user_id']=Auth::user()['id'];
      if($request->input('when')=="now"){
        $post_data['depart_date']=date('Y-m-d');
        $post_data['depart_time']=date('H:i:s');
      }
      if($request->input('when')=="schedule_for_later"){
        $post_data['depart_date']=date('Y-m-d', strtotime($request->input('depart_date')));
        $post_data['depart_time']=date('H:i:s', strtotime($request->input('depart_time')));
      }
      $request->session()->put('form_booking', $post_data);
      unset($post_data['pickup_from'], $post_data['drop_to']);
      if(Auth::check()){
        $Msg['action']='auth';
        $booking = Booking::create($post_data); 
        $listdata=Booking::where('id', $booking['id'])->first();
        $Msg['data']=$listdata;
        $Msg['created_at']=date('F d, Y h:i:s', strtotime($listdata['created_at']));
        $request->session()->forget('form_booking');
        _pusher_('success');
      }else{
        $Msg['action']='notauth';
      }
    }
    return $Msg;
  }
  public function bookingfind(Request $request, $booking_id){
    $listdata=Booking_confirm::where('booking_id',$booking_id)->with(['booking_bidd','userInfo'])->orderBy('id', 'desc')->first();
    return view('front/bidding-info', compact('listdata'));
  }
  public function get_booking(Request $request){
    $list_id=Booking::where('user_id', Auth::user()['id'])->pluck('id')->toArray();
    $ulist_id=Booking_confirm::whereIn('booking_id', $list_id)->where('statuss', 'ongoing')->pluck('booking_id')->toArray();
    $listdata=Booking::whereNotIn('id', $ulist_id)->where('user_id', Auth::user()['id'])->with(['userInfo','driverInfo'])->get();
    return view('front/bidding-result', ['bookings'=>$listdata]);
  }
  public function get_bidding(Request $request, $booking_id){
    $list=Booking_confirm::where(['booking_id'=>decode($booking_id), 'statuss'=>'pending'])->with(['userInfo', 'bookingInfo'])->orderBy('id', 'desc')->get();
    return view('front/bidding-info', ['biddings'=>$list]);
  }
  
  public function confirm_booking(Request $request, $bidding_id){
    if($request->isMethod('post')){
      $list_getb=Booking_confirm::where('id', decode($bidding_id))->first();
      Booking_confirm::where('booking_id', $list_getb['id'])->update(['statuss'=>'expired']);
      $booking=Booking_confirm::where('id', decode($bidding_id))->update(['statuss'=>'ongoing']);
      _pusher_('success');
      return redirect()->route('my.booking');
    }
    $booking=Booking_confirm::where('id', decode($bidding_id))->with('bookingInfo')->first();
    return view('front/booking-confirm', ['booking'=>$booking]);
  }
  public function my_booking(){
    $bookings=Booking_confirm::whereIn('statuss', ['ongoing', 'completed', 'running'])->with('bookingInfo')->whereHas('bookingInfo', function($q){
      $q->where('user_id', '=', Auth::user()['id']);
    })->with(['vehicleInfo'])->get();
    return view('front/my-booking', ['bookings'=>$bookings]);
  }
  public function wallet_history(){
    $u_id=Auth::user()['id'];
    $transactions=Transaction::where('user_id', $u_id)->orderBy('id', 'asc')->get();
    // $ulist=User::where('id', Auth::user()['id'])->with('wallet')->first();
    // dd($ulist);
    return view('front/wallet-history', ['transactions'=>$transactions]);
  }

  public function viewkyc(){
    return view('front/complete-kyc');
  }
   public function complete_kyc(Request $request){
    $ulist=User::where('id', Auth::user()['id'])->with('wallet')->first();
    return view('front/complete-kyc');
  }

public function add_money(Request $request){
  $ulist=User::where('id', Auth::user()['id'])->with('wallet')->first();
  return view('front/add-money', ['ulist'=>$ulist]);
}
public function payment(Request $request, $payment_id){
  if($payment_id){
  $api = new Api(config('app.razor_key'), config('app.razor_secret'));
  $payment = $api->payment->fetch($payment_id);
  $api->payment->fetch($payment_id)->capture(['amount'=>$payment['amount']]);
  $ulist=User::where('id', Auth::user()['id'])->with('wallet')->first();
  Wallet::where('id', $ulist['wallet']['id'])->update(['amount'=>$ulist['wallet']['amount']+$payment['amount']/100]);
    return redirect()->action('BookController@add_money');
  }else{
    return redirect()->action('BookController@add_money');
  }
}

public function booking_detail(Request $request, $booking_id){
  $booking=Booking_confirm::where(['booking_id'=>decode($booking_id), 'statuss'=>'ongoing'])->with(['driverInfo', 'bookingInfo'])->first();
  return view('front/booking-detail', ['booking'=>$booking]);
}
public function profile(){
  $ulist=User::where('id', Auth::user()['id'])->with('wallet')->first();
  return view('front/profile', ['ulist'=>$ulist]);
}
public function maptracking(){
  return view('front/maptracking');
}
public function partnerfleet(Request $request){
  return view('front/partner-fleet');
}
public function partnerfleetsubmit(Request $request){
        $data['name']            =!empty($request->name)?$request->name:'';
        $data['mobile']          =!empty($request->mobile)?$request->mobile:'';
        $data['city']            =!empty($request->city)?$request->city:'';
        $data['created_at']      = date('Y-m-d h:i:s');
        $data['updated_at']      = date('Y-m-d h:i:s');

        $inserId = Partner_fleet::add($data);
        
    return view('front/partner-fleet');
}
public function maps_apk(Request $request, $booking_id){
   $book=Booking::where('id', $booking_id)->first();
   return view('front/maps-apk',['books'=>$book]);
}
public function send_money(Request $request){
  if($request->isMethod('post')){
    $post_data=$request->input();
    unset($post_data['_token']);
    $first_wallet=User::where('id', Auth::user()['id'])->with('wallet')->first();
    $second_wallet=User::where('mobile', $request->input('mobile'))->with('wallet')->first();
    if($second_wallet['mobile']){
      if($first_wallet['mobile']!=$second_wallet['mobile']){
        if($second_wallet['wallet']['id']){
          if($first_wallet['wallet']['amount']>$request->input('amount')){
            $post_wallet['user_id']=Auth::user()['id'];
            $post_wallet['wallet_id']=$first_wallet['wallet']['id'];
            $post_wallet['order_id']=unique_order_id();
            $post_wallet['wallet_id_to']=$second_wallet['wallet']['id'];
            $post_wallet['amount']=$request->input('amount');
            $post_wallet['payment_method']='wallet';
            $post_wallet['status']='paid';
            Transaction::create($post_wallet);
            unset($post_wallet['wallet_id']);
            unset($post_wallet['status']);
            $post_wallet['user_id']=$second_wallet['wallet']['user_id'];
            $post_wallet['status']='received';
            Transaction::create($post_wallet);
            $wallet_post['amount']=$second_wallet['wallet']['amount']+$request->input('amount');
            Wallet::where('id', $second_wallet['wallet']['id'])->update($wallet_post);
            $wallet_post['amount']=$first_wallet['wallet']['amount']-$request->input('amount');
            Wallet::where('id', $first_wallet['wallet']['id'])->update($wallet_post);
            return redirect()->back()->with('msg', ['type'=>'success','text'=>'Money has been transfered.']);
          }else{
            return redirect()->back()->with('msg', ['type'=>'danger','text'=>"Can't be greater amount from wallet amount."]);
          }
        }
      }else{
        return redirect()->back()->with('msg', ['type'=>'warning','text'=>"User mobile can't be same."]);
      }
    }else{
      return redirect()->back()->with('msg', ['type'=>'warning','text'=>'Mobile number not valid.']);
    }
  }
  $ulist=User::where('id', Auth::user()['id'])->with('wallet')->first();
  return view('front/send-money' , ['ulist'=>$ulist]);
}
}