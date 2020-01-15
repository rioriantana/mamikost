<?php

use Illuminate\Http\Request;

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

Route::get('kost','KostController@index');

Route::get('signup','KostController@register');

Route::post('showUser','KostController@showUser');

Route::post('loginApi','KostController@loginApi');

Route::post('createKost','KostController@create');

Route::post('detileKost','KostController@detileKost');

Route::post('updateKost','KostController@update');

Route::post('deleteKost','KostController@delete');

Route::post('checkAvailable','KostController@checkAvailableKost');
