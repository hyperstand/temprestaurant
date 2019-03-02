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


// // Menu
// Route::get('/API/menu/','MenuController@test_filter_data');

// //Login
// Route::post('/login',['uses' => 'Auth\LoginController@login']);
// //Login

// //register
// Route::post('/register',['uses' => 'Auth\RegisterController@register']);
// Route::post('/ver/email',['uses' => 'Auth\authdataController@verify_email']);
// Route::post('/ver/phonenumber',['uses' => 'Auth\authdataController@verify_phnum']);
// //regsiter

// //logout
// Route::get('/logout',['uses' => 'Auth\LoginController@logout']);
// //logout


// //Booking
// Route::group(['middleware' => ['auth','sessions']],function (){
//     Route::post('/booking/{user_id}',['uses' => 'BookingController@create']);
//     Route::patch('/booking/{user_id}/{booking_id}',['uses' => 'BookingController@update']);
//     Route::delete('/booking/{id}/{booking_id}',['uses' => 'BookingController@delete']);
// });
