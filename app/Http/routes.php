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
Route::get('cart','Ordercontroller@showCart');
Route::get('login/fb','FbloginController@login');
Route::get('logout', 'FbloginController@logout');
Route::match(['get','post'],'login','loginController@login');


//register
Route::get('register', function () {
    return view('register.register',['res'=>0]);
});

Route::post('register', 'usersController@create');



Route::get('login/fb/callback', 'FbloginController@callback');