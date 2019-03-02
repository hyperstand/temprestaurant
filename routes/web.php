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

    Route::get('/dashboard',['uses'=>'HomeController@dashboard'])->name('dash');
});



Route::get('dashboard/menu', function () {
    return view('layouts.foodmenu');
});


//temp


// Menu
Route::get('/API/menu/','MenuController@test_filter_data');

//Login
Route::post('/login',['uses' => 'Auth\LoginController@login']);
//Login

//register
Route::post('/register',['uses' => 'Auth\RegisterController@register']);
Route::post('/ver/email',['uses' => 'Auth\authdataController@verify_email']);
Route::post('/ver/phonenumber',['uses' => 'Auth\authdataController@verify_phnum']);
//regsiter

//logout
Route::get('/logout',['uses' => 'Auth\LoginController@logout']);
//logout


//Booking
// Route::group(['middleware' => ['auth']],function (){
    Route::post('/booking',['uses' => 'BookingController@create']);
    Route::patch('/booking/{booking_id}',['uses' => 'BookingController@update']);
    Route::delete('/booking/{booking_id}',['uses' => 'BookingController@delete']);
// });
Route::get('/ver/date',['uses' => 'BookingController@check_available_date']);
Route::get('/ver/time',['uses' => 'BookingController@check_available_time']);
//Booking

