<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/signup', 'MobileController@signup');
Route::post('/user-valid', 'MobileController@uservalid');
Route::post('/booking', 'MobileController@booking');
Route::post('/profile', 'MobileController@profile');
Route::post('/login', 'MobileController@login');
Route::post('/recieved-booking', 'MobileController@recieved_booking');
Route::post('/request-bidding', 'MobileController@request_bidding');
Route::post('/gett-bidding', 'MobileController@gett_bidding');
Route::post('/reply-bidding', 'MobileController@reply_bidding');
Route::post('/confirm-bidding', 'MobileController@confirm_bidding');
Route::post('/my-confirm-booking', 'MobileController@confirm_booking');
Route::post('/bystatus-booking', 'MobileController@bystatus_booking');
Route::post('/upload-docs', 'MobileController@document_upload_info');
Route::post('/create-vehicle', 'MobileController@create_vehicle');
Route::post('/create-driver', 'MobileController@create_driver');
Route::post('/wallet-recharge', 'MobileController@wallet_recharge');
Route::post('/wallet', 'MobileController@wallet');
Route::post('/wallet-to-wallet', 'MobileController@wallet_to_wallet');
Route::post('/transaction', 'MobileController@transaction_history');
Route::post('/forgotpass', 'MobileController@forgotpass');
Route::post('/update-users', 'MobileController@update_users');
Route::post('/upload-file', 'MobileController@uploadfile');
Route::post('/login-as', 'MobileController@login_as');
Route::post('/vehicle-list', 'MobileController@vehicle_list');
Route::post('/driver-list', 'MobileController@driver_list');
Route::post('/myall-booking', 'MobileController@Myallbooking');
Route::post('/completed-booking', 'MobileController@completed_booking');
Route::post('/current-latlong', 'MobileController@current_latlong');
Route::post('/assign-driver', 'MobileController@assigndriver');
Route::post('/my-trans-earning', 'MobileController@mytrans_earning');
Route::post('/partner-status', 'MobileController@partner_status');
Route::get('/get-current-ltln', 'MobileController@get_current_ltln');
Route::post('/get-uinfo', 'MobileController@get_uinfo');
Route::post('/detail-partner', 'MobileController@detail_partner');
Route::post('/cancelled-booking', 'MobileController@cancelled_booking');
Route::post('/insurance-p', 'MobileController@insurance_p');
Route::post('/driver-vehicle', 'MobileController@driver_vehicle');
Route::post('/vendor-vehicle', 'MobileController@vendor_vehicle');
Route::post('/get-vehicle', 'MobileController@get_vehicle');
Route::post('/after-otp-login-user', 'MobileController@after_otp_login_user');
Route::get('/invoice-booking-user/{booking_id}', 'MobileController@invoice_booking_user');
Route::get('/invoice_booking-driver/{booking_id}', 'MobileController@invoice_booking_driver');
Route::post('/get-state', 'MobileController@get_state');
Route::post('/get-city', 'MobileController@get_city');
Route::post('/get-credit-limit', 'MobileController@get_credit_limit');
Route::post('/recent-transaction', 'MobileController@recent_transaction');
Route::post('/wheelar', 'MobileController@wheelar');
Route::post('/switch', 'MobileController@switch');
Route::post('/complet-destination', 'MobileController@completd_destination');
Route::post('/get-time', 'MobileController@gettime');