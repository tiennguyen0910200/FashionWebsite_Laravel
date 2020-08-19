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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register',"API\RegisterController@register");
Route::post('/user',"API\LoginController@login");
Route::get('/user/detail',"API\LoginController@profile");

Route::get('/product','API\ProductController@product');
Route::get('/category','API\ProductController@category');
Route::get('/product/{id}','API\ProductController@detail');

Route::post('/detail',"API\DetailController@store");

Route::post('/register',"API\RegisterController@register");
Route::get('/cart','API\CartController@index');
Route::post('/addtocart/{id}','API\CartController@store');
Route::delete('/cart/{id}','API\CartController@destroy');
Route::get('/total','API\CartController@total');
Route::patch('/increase/{id}','API\CartController@increase');
Route::patch('/reduction/{id}','API\CartController@reduction');
