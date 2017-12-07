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





Route::group(['prefix'=>'admin'],function()
    {
        
        Route::post('savePropertyOwner',['uses'=>'AdminController@savePropertyOwner']);
        Route::post('owerchecklogin',['uses'=>'AdminController@owerchecklogin']);
        Route::post('adminchecklogin',['uses'=>'AdminController@adminchecklogin']);
        
        Route::post('approvePropertyOwner',['uses'=>'AdminController@approvePropertyOwner']);
        Route::post('disapprovePropertyOwner',['uses'=>'AdminController@disapprovePropertyOwner']);
        Route::post('setInactiveProperty',['uses'=>'AdminController@setInactiveProperty']);
        
        Route::post('approveProperty',['uses'=>'AdminController@approveProperty']);
        Route::post('disapproveProperty',['uses'=>'AdminController@disapproveProperty']);
        Route::post('updateProperty',['uses'=>'AdminController@updateProperty']);
        Route::post('removeProperyImage',['uses'=>'AdminController@removeProperyImage']);
        
        Route::post('saveProperty',['uses'=>'AdminController@saveProperty']);
        Route::post('uploadProperty',['uses'=>'AdminController@uploadProperty']);
        
        Route::get('getOwnerForApproval',['uses'=>'AdminController@getOwnerForApproval']);
        Route::get('getPropertyOwners',['uses'=>'AdminController@getPropertyOwners']);
        Route::get('getPropertiesForApproval',['uses'=>'AdminController@getPropertiesForApproval']);
        Route::get('getApprovedProperties',['uses'=>'AdminController@getApprovedProperties']);
        
        Route::get('getApprovedProperties',['uses'=>'AdminController@getApprovedProperties']);
        Route::get('getProperties',['uses'=>'AdminController@getProperties']);
        Route::get('getBookedProperties',['uses'=>'AdminController@getBookedProperties']);
        Route::get('getConfirmedProperties/{id}/{gid}',['uses'=>'AdminController@getConfirmedProperties']);
        Route::get('getCanceledProperties/{id}/{gid}',['uses'=>'AdminController@getCanceledProperties']);
        Route::get('getPropertyInfo/{id}/{gid}',['uses'=>'AdminController@getPropertyInfo']);
        Route::get('postProperty/{id}',['uses'=>'AdminController@postProperty']);
        Route::get('confirmBooking/{id}',['uses'=>'AdminController@confirmBooking']);
        Route::get('unconfirmBooking/{id}',['uses'=>'AdminController@unconfirmBooking']);
        
        Route::get('unpostProperty/{id}',['uses'=>'AdminController@unpostProperty']);
        Route::get('getPropertyImage/{filename}',['uses'=>'AdminController@getPropertyImage']);
        
        
        

        
    });

    

    Route::group(['prefix'=>'general'],function()
    {
        
        Route::get('getNationality',['uses'=>'GeneralController@getNationality']);
        Route::get('getCities/{id}',['uses'=>'GeneralController@getCities']);
        Route::get('getAllCities/{id}',['uses'=>'GeneralController@getAllCities']);
        
        Route::get('getRentalType',['uses'=>'GeneralController@getRentalType']);
        Route::get('getStudio',['uses'=>'GeneralController@getStudio']);
        Route::get('getSleeps',['uses'=>'GeneralController@getSleeps']);
    });

    Route::group(['prefix'=>'property'],function()
    {
        
        Route::get('getPropertyAvailability/{id}',['uses'=>'PropertyController@getPropertyAvailability']);
        Route::get('getFeedback/{id}',['uses'=>'PropertyController@getFeedback']);
        Route::get('getBookingDetails/{id}',['uses'=>'PropertyController@getBookingDetails']);
        
        Route::get('completeBooking/{id}',['uses'=>'PropertyController@completeBooking']);
        Route::get('searchProperty/{id}',['uses'=>'PropertyController@searchProperty']);
        Route::get('getCurrencies',['uses'=>'PropertyController@getCurrencies']);
        Route::get('getPropertyDetails/{id}/{gid}/{currency}',['uses'=>'PropertyController@getPropertyDetails']);
        Route::post('getBooking',['uses'=>'PropertyController@getBooking']);
        Route::post('savePropertyCalendar',['uses'=>'PropertyController@savePropertyCalendar']);
        Route::post('saveBooking',['uses'=>'PropertyController@saveBooking']);
        Route::post('cancelBooking',['uses'=>'PropertyController@cancelBooking']);
        Route::post('saveSignUp',['uses'=>'PropertyController@saveSignUp']);
        Route::post('clientLogin',['uses'=>'PropertyController@clientLogin']);
        Route::post('filterProperty',['uses'=>'PropertyController@filterProperty']);
        Route::post('filterPropertyAvailablity',['uses'=>'PropertyController@filterPropertyAvailablity']);
        Route::post('saveFeedback',['uses'=>'PropertyController@saveFeedback']);
        
        
    });
    
    

     Route::group(['prefix'=>'authenticate'],function()
    {
        Route::post('authenticate',['uses'=>'AuthenticateController@authenticate']);
        
        
    });

    