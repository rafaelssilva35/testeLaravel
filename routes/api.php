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

$this->group(['prefix' => 'v1'], function() {
	$this->post('vps/reinicia/{int_vps_id}', 'VpsController@postReinicia');
	$this->post('vps/snapshot/{int_vps_id}', 'VpsController@postSnapshot');
	$this->post('vps/change-os/{int_vps_id}/{os}', 'VpsController@postChangeOs');
	$this->post('compra/', 'CompraController@postCompra');
});