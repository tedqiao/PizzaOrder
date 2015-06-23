<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/{word}','shipsController@show');
Route::match(['get'],'/','HomeController@index');
Route::post('/','shipsController@show');
Route::get('order/{item}','Ordercontroller@addtoCart');
Route::get('rm/{item}','Ordercontroller@removeItem');
Route::get('cart','Ordercontroller@showCart');
Route::get('login/fb','FbloginController@login');
Route::get('logout', 'FbloginController@logout');


Route::get('login/fb/callback', 'FbloginController@callback');