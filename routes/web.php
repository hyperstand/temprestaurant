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

Route::get('/', function () {
    return view('layouts.index');
});

Route::get('/gallery', function () {
    return view('layouts.gallery');
});
Route::get('/menu', function () {
    return view('layouts.menu');
});


Route::get('/auth', function () {
    return view('layouts.auth');
});

//Login
Route::post('/auth/login',['uses' => 'Auth\LoginController@login']);
//Login

//register
Route::post('/auth/ver/email',['uses' => 'Auth\authdataController@verify_email']);
Route::post('/auth/ver/phonenumber',['uses' => 'Auth\authdataController@verify_phnum']);
//regsiter

//Booking
//Booking

Route::get('/register', function () {
    return view('layouts.register');
});


Route::get('/dashboard', function () {
    return view('layouts.dashboard');
});
Route::get('dashboard/menu', function () {
    return view('layouts.foodmenu');
});

Route::get('/dashboard/delivery', function () {
    return view('layouts.delivery');
});


//change
Route::get('/dashboard/booking', function () {
    return 1;
});


//API test

Route::get('/API/menu/','MenuController@test_filter_data');
