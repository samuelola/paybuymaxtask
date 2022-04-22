<?php


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});


Route::get('/allsavings', 'Api\SavingController@allSavings');

Route::post('/storeSaving', 'Api\SavingController@storeSaving');

Route::get('mySavings/{id}', 'Api\SavingController@mySavings');

Route::post('saveAirtime', 'Api\AirtimeController@saveAirtime');

Route::get('myAirtime/{amount}/{operator}', 'Api\AirtimeController@myAirtime');


// Route::post('/updateSaving/{id}', 'Api\SavingController@updateSaving');
