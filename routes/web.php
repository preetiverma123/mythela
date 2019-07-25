<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
/* user Auth */
Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile', 'BookController@profile')->name('profile');
    Route::get('/active-booking', 'BookController@get_booking')->name('active.booking');
    Route::get('/bidding-results/{booking_id}', 'BookController@get_bidding')->name('bidding.results');
    Route::get('/booking-confirm/{bidding_id}', 'BookController@confirm_booking')->name('confirm.booking');
    Route::post('/booking-confirm/{bidding_id}', 'BookController@confirm_booking')->name('confirm.booking');
    Route::get('/my-booking', 'BookController@my_booking')->name('my.booking');
    Route::get('/wallet-history', 'BookController@wallet_history')->name('wallet.history');
    Route::get('/add-money', 'BookController@add_money')->name('add.money');
    Route::post('/add-money', 'BookController@add_money')->name('add.money');
    Route::get('/booking-detail/{booking_id}', 'BookController@booking_detail')->name('booking.detail');
    Route::get('/send-money', 'BookController@send_money')->name('send.money');
    Route::post('/send-money', 'BookController@send_money')->name('send.money');
    Route::get('/payment/{id}', 'BookController@payment')->name('payment');
});
/* user Auth */
Route::get('/', function(){ return view('front/home');})->name('home');
Route::get('/book', 'BookController@index')->name('book');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/uvalidate', 'AuthController@uvalidate')->name('u.validate');
Route::post('/otp', 'AuthController@sent_otpfn')->name('sent.otp.fn');
Route::post('/login_ajx', 'AuthController@loginajx')->name('login.ajx');
Route::post('/signup_ajx', 'AuthController@signupajx')->name('signup.ajx');
Route::post('/logout', 'AuthController@logout')->name('logout');
Route::post('/booking', 'BookController@booking')->name('booking');
Route::get('/booking-confirm/{booking_id}', 'BookController@bookingconfirm')->name('booking.confirm');
Route::post('/booking-find/{booking_id}', 'BookController@bookingfind')->name('booking.find');
Route::get('/maps', 'BookController@maptracking')->name('maps');
Route::get('/maps-apk/{booking_id}', 'BookController@maps_apk')->name('maps.apk');
Route::get('/partner-fleet', function(){ return view('front/partner-fleet');})->name('partner.fleet');

Route::get('/contact-us', function(){ return view('front/contact-us');})->name('contact.us');
Route::get('/about-us', function(){ return view('front/about-us');})->name('about.us');
Route::get('/terms-condition', function(){ return view('front/terms-condition');})->name('terms.condition');
Route::get('/privacy-policy', function(){ return view('front/privacy-policy');})->name('privacy.policy');
Route::get('/our-fleet', function(){ return view('front/our-fleet');})->name('our.fleet');
Route::get('/become-partner', function(){ return view('front/become-partner');})->name('become.partner');