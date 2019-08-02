<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Role;
use App\Wallet;
class AuthController extends Controller
{
  protected function validator(array $data ,$action)
  {
    if($action=="login"){
      return Validator::make($data, [
        'email' => 'required',
        'password' => 'required'
      ],['email.required'=>'The email field is required.', 'password.required'=>'The password field is required.'])->validate();
    }
    if($action=="register"){
      return Validator::make($data, [
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'password_confirmation' => 'required'])->validate();
    }
  }
  public function login(Request $request){
    return view('front/auth');
  } 
  public function uvalidate(Request $request){
    $Msg['msg']='';
    $Msg['action']='';
    $Msg['otp']='';
    if($request->isMethod('post')){
      $oned=User::where('mobile', $request->input('mobile'))->first();
      if(role($oned['role_id'])!='superadmin' && role($oned['role_id'])!='admin' &&  role($oned['role_id'])!='vendor' &&  role($oned['role_id'])!='driver'){
        if($oned['mobile']!=""){
          $otp=sent_otp($request->input('mobile'));
          $Msg['msg']='Enter the OTP sent to '.$request->input('mobile');
          $Msg['action']='verify';
          $Msg['otp']=$otp;
        }
        if($oned['mobile']==""){
          $Msg['action']='notexist';
        }
      }else{
        $Msg['msg']='You are not a user';
        $Msg['action']='notuser';
      }
    }
    return $Msg;
  } 
  public function sent_otpfn(Request $request){
    $Msg['msg']='';
    $Msg['action']='';
    $Msg['otp']='';
    if($request->isMethod('post')){
      $otp=sent_otp($request->input('mobile'));
      $Msg['msg']='Enter the OTP sent to '.$request->input('mobile');
      $Msg['action']='verify';
      $Msg['otp']=$otp;
    }
    return $Msg;
  } 
  public function loginajx(Request $request){
    $Msg['msg']='';
    $Msg['response']='';
    if($request->isMethod('post')){
      $oned=User::where('mobile', $request->input('mobile'))->first();
      if(Auth::loginUsingId($oned['id'])){
        $Msg['msg']='You are logged in';
        $Msg['response']='success';
      }else{
        $Msg['response']='notsuccess';
      }
    }
    return $Msg;
  }
  public function signupajx(Request $request){
    $Msg['msg']='';
    $Msg['response']='';
    if($request->isMethod('post')){
      $post_data=$request->input();
      unset($post_data['_token']);
      $post_data['role_id']="1";
      $post_data['password']=Hash::make('12345');
      $ulist=User::create($post_data);
      unset($post_data['password']);
      unset($post_data['role_id']);
      $post_data['user_id']=$ulist['id'];
      $post_data['amount']="0.00";
      Wallet::create($post_data);
      if(Auth::loginUsingId($ulist['id'])){
        $Msg['msg']='You are successfully signed';
        $Msg['response']='success';
      }
    }
    return $Msg;
  }
  public function logout(){
    Auth::logout();
    return redirect()->route('login');
  }
}
