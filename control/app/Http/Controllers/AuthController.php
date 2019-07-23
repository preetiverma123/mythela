<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
class AuthController extends Controller
{
  use AuthenticatesUsers;
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }
  public function login(Request $request){
    if($request->isMethod('post')){
      $post_data=$request->input();
      unset($post_data['_token']);
      $oned=User::where('email', $request->input('email'))->first();
      if($oned['email']){
        if($oned['status']=="pending"){
          return redirect()->back()->with('msg', ['type'=>'warning','text'=>'User not approved.']);
        }elseif($oned['status']=="block"){
          return redirect()->back()->with('msg', ['type'=>'warning','text'=>'User blocked.']);
        }elseif($oned['status']=="approved"){
          if(Auth::attempt($post_data)){
            return redirect()->action('AuthController@login');
          }else{
            return redirect()->back()->with('msg', ['type'=>'warning','text'=>'Email or password incorrect.']);
          } 
        }
      }else{
        return redirect()->back()->with('msg', ['type'=>'warning','text'=>'User Not Valid']);
      }
    }
    return view('auth/login');
  } 
}
