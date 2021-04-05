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

Route::get("/signin","Admin\AuthController@signin");
Route::post("/signin","Admin\AuthController@actionSignin");

Route::get("/admin","Admin\HomeController@index");
Route::get("/admin/logout","Admin\HomeController@logout");