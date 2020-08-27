<?php

use Illuminate\Support\Facades\Route;

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
Route::view('/login', "login");
Route::view('/register', "register");
Route::get('/', function () {
    return view('welcome');
});
Route::post('/store', "UserController@store");
Route::post('/logs', "UserController@logs");
Route::get('/success', "UserController@dashboard");
Route::view('/dashboard', "dashboard");
Route::post('/weather_info', "UserController@weather");

