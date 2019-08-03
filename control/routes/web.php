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
Route::get('/', function (){
    return redirect()->route('login');
});
Auth::routes();
Route::get('/home', function (){
    return redirect()->route('dashboard');
})->name('home');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@login')->name('login');
Route::group(['prefix' => 'dashboard',  'middleware' => 'auth'], function(){
    Route::get('/', 'DashController@index')->name('dashboard');
    Route::get('/all-booking', 'DashController@allbooking')->name('all.booking');
    Route::get('/ongoing-booking', 'DashController@ongoingbooking')->name('ongoing.booking');
    Route::get('/completed-booking', 'DashController@completedbooking')->name('completed.booking');
    Route::get('/cancelled-booking', 'DashController@cancelledbooking')->name('cancelled.booking');
    Route::get('/view-detail/{booking_id}', 'DashController@view_detail')->name('view.detail');
    Route::get('/manage-customers', 'DashController@managecustomer')->name('manage.customers');
    Route::get('/detail-partner/{partner_id}', 'DashController@detailpartner')->name('detail.partner');
    Route::get('/with-vehicle', 'DashController@with_vehicle')->name('with.vehicle');
    Route::get('/reset-password', 'DashController@reset_password')->name('reset.password');
    Route::post('/reset-password', 'DashController@adminreset_password')->name('reset.password');
    Route::get('/manage-partners', 'DashController@managepartner')->name('manage.partners');
    Route::get('/manage-admins', 'DashController@manageadmins')->name('manage.admins');
    Route::post('/manage-admins', 'DashController@manageadmins')->name('manage.admins');
    Route::get('/manage-admins/{id}', 'DashController@manageadmins')->name('manage.admins');
    Route::post('/manage-admins/{id}', 'DashController@manageadmins')->name('manage.admins');
    Route::get('/add-admin', 'DashController@addadmin')->name('add.admin');
    Route::post('/add-admin', 'DashController@addadmin')->name('add.admin');
    Route::put('/status', 'DashController@status')->name('status');
    Route::get('/detail-customer/{customer_id}', 'DashController@detailcustomer')->name('detail.customer');

    Route::get('/manage-partner-commission', 'DashController@manage_partner_commission')->name('manage.partner.commission');
    Route::post('/manage-partner-commission', 'DashController@manage_partner_commission')->name('manage.partner.commission');
    Route::get('/manage-partner-commission/{commission_id}', 'DashController@manage_partner_commission')->name('manage.partner.commission');
    Route::post('/manage-partner-commission/{commission_id}', 'DashController@manage_partner_commission')->name('manage.partner.commission');

    Route::get('/manage-insurance', 'DashController@manage_insurance')->name('manage.insurance');
    Route::post('/manage-insurance', 'DashController@manage_insurance')->name('manage.insurance');
    Route::get('/manage-insurance/{insurance_id}', 'DashController@manage_insurance')->name('manage.insurance');
    Route::post('/manage-insurance/{insurance_id}', 'DashController@manage_insurance')->name('manage.insurance');
    Route::get('/manage-accounts', 'DashController@manage_accounts')->name('manage.accounts');
    Route::get('/detail-earning/{id}', 'DashController@detail_earning')->name('detail.earning');
    Route::get('/manage-vehicle', 'DashController@managevehicle')->name('manage.vehicle');
    Route::get('/vehicle-detail/{vehicle_id}', 'DashController@vehicle_detail')->name('vehicle.detail');
    Route::get('/manage-location', 'DashController@manage_location')->name('manage.location');
    Route::get('/manage-location/{id}', 'DashController@manage_location')->name('manage.location');
    Route::post('/manage-location/{id}', 'DashController@manage_location')->name('manage.location');
    Route::get('/state', 'DashController@state')->name('state');
    Route::post('/state', 'DashController@state')->name('state');
    Route::get('/state/{id}', 'DashController@state')->name('state');
    Route::post('/state/{id}', 'DashController@state')->name('state');
    Route::get('/city', 'DashController@city')->name('city');
    Route::post('/city', 'DashController@city')->name('city');
    Route::get('/city/{id}', 'DashController@city')->name('city');
    Route::post('/city/{id}', 'DashController@city')->name('city');
    Route::delete('/delete', 'DashController@delete')->name('delete');
    Route::post('/filter-account', 'DashController@filter_accounts')->name('filter.account');
    Route::post('/get-city', 'DashController@get_city')->name('get.city');
    Route::get('/manage-credit-limit', 'DashController@manage_credit_limit')->name('manage.credit.limit');
    Route::get('/manage-credit-limit/{id}', 'DashController@manage_credit_limit')->name('manage.credit.limit');
    Route::post('/manage-credit-limit', 'DashController@manage_credit_limit')->name('manage.credit.limit');
    Route::post('/manage-credit-limit/{id}', 'DashController@manage_credit_limit')->name('manage.credit.limit');
    
    Route::get('/manage-gst', 'DashController@manage_gst')->name('manage.gst');
    Route::post('/manage-gst', 'DashController@manage_gst')->name('manage.gst');
    Route::get('/manage-gst/{id}', 'DashController@manage_gst')->name('manage.gst');
    Route::post('/manage-gst/{id}', 'DashController@manage_gst')->name('manage.gst');

    Route::get('/manage-service-tax', 'DashController@manage_stax')->name('manage.service.tax');
    Route::post('/manage-service-tax', 'DashController@manage_stax')->name('manage.service.tax');
    Route::get('/manage-service-tax/{id}', 'DashController@manage_stax')->name('manage.service.tax');
    Route::post('/manage-service-tax/{id}', 'DashController@manage_stax')->name('manage.service.tax');

    Route::get('/manage-trip', 'DashController@manage_trip')->name('manage.trip');
    Route::post('/manage-trip', 'DashController@manage_trip')->name('manage.trip');
    Route::get('/manage-trip/{id}', 'DashController@manage_trip')->name('manage.trip');
    Route::post('/manage-trip/{id}', 'DashController@manage_trip')->name('manage.trip');

    Route::get('/manage-vehicle-list', 'DashController@manage_vehicle_list')->name('manage.vehicle.list');
    Route::get('/manage-vehicle-list/{id}', 'DashController@manage_vehicle_list')->name('manage.vehicle.list');
    Route::post('/manage-vehicle-list', 'DashController@manage_vehicle_list')->name('manage.vehicle.list');
    Route::post('/manage-vehicle-list/{id}', 'DashController@manage_vehicle_list')->name('manage.vehicle.list');

    Route::get('/manage-surround', 'DashController@manage_surround')->name('manage.surround');
    Route::post('/manage-surround', 'DashController@manage_surround')->name('manage.surround');
    Route::get('/manage-surround/{id}', 'DashController@manage_surround')->name('manage.surround');
    Route::post('/manage-surround/{id}', 'DashController@manage_surround')->name('manage.surround');
    
    Route::post('/get-km', 'DashController@get_km')->name('get.km');

    Route::get('/manage-exp-licence', 'DashController@manage_exp_licence')->name('manage.exp.licence');
    Route::post('/manage-exp-licence', 'DashController@manage_exp_licence')->name('manage.exp.licence');

    Route::get('/manage-exp-fitness', 'DashController@manage_exp_fitness')->name('manage.exp.fitness');
    Route::post('/manage-exp-fitness', 'DashController@manage_exp_fitness')->name('manage.exp.fitness');

    Route::get('/manage-insurance-email', 'DashController@manage_insurance_email')->name('manage.insurance.email');
    Route::post('/manage-insurance-email', 'DashController@manage_insurance_email')->name('manage.insurance.email');
});