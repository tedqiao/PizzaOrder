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
Route::get('order/{item}/{num}','Ordercontroller@addtoCart');
Route::get('rm/{item}','Ordercontroller@removeItem');

Route::post('placeOrder','Ordercontroller@placeOrder');

Route::get('cart','Ordercontroller@showCart');

Route::get('logout', 'FbloginController@logout');
Route::match(['get','post'],'login','loginController@login');
Route::match(['get'],'menu','HomeController@menu');
Route::match(['get'],'checkout',function (){
    return view('home/check_out_box');
});
Route::match(['get','post'],'additem','shipsController@additem');
//register
Route::get('register', function () {
    return view('register.register',['res'=>0]);
});


Route::get('category/{item}','shipsController@showWithCategory');





Route::post('register', 'usersController@create');


Route::get('login/fb','FbloginController@login');
Route::get('login/fb/callback', 'FbloginController@callback');