<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post("/broadcasting/auth",function(){
	return true;
});

Route::get("/news","User\NewsController@index");
Route::post("/signup","User\AuthController@signup");

Route::post("/signin","User\AuthController@signin");
Route::post("/logout","User\AuthController@logout");
Route::get("/user","User\AuthController@me");

Route::post("/upload","User\AuthController@upload");

Route::post("/logs",'User\NewsController@logs');