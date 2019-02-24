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

/**
 * View
 */

Route::group(['middleware' => 'auth'], function () {
//     Route::auth();

    Route::get('/', function () {
        return view('layouts.index');
    });

    Route::get('/gallery', function () {
        return view('layouts.gallery');
    });
    Route::get('/menu', function () {
        return view('layouts.menu');
    });  
    Route::get('/auth',['uses' =>  function () {
        return view('layouts.auth');
    }])->name('authentic');

    Route::get('/dashboard', function () {
        return view('layouts.dashboard');
    })->name('dash');

});



Route::get('dashboard/menu', function () {
    return view('layouts.foodmenu');
});



/**
 * 
 * API CALL
 */

// Menu
Route::get('/API/menu/','MenuController@test_filter_data');

//Login
Route::post('/auth/login',['uses' => 'Auth\LoginController@login']);
//Login

//register
Route::post('/auth/register',['uses' => 'Auth\RegisterController@register']);
Route::post('/auth/ver/email',['uses' => 'Auth\authdataController@verify_email']);
Route::post('/auth/ver/phonenumber',['uses' => 'Auth\authdataController@verify_phnum']);
//regsiter

//logout
Route::get('/logout',['uses' => 'Auth\LoginController@logout']);
//logout

//Booking
Route::group(['middleware' => 'auth'], function () {
    Route::post('/booking/{id}',['uses' => 'Auth\BookingController@create']);
    Route::patch('/booking/{id}',['uses' => 'Auth\BookingController@update']);
    Route::delete('/booking/{id}',['uses' => 'Auth\BookingController@delete']);
});
//Booking