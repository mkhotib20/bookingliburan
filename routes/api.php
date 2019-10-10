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
Route::group(['as' => 'api.'], function () {
    Route::post('/customer/tambah', 'FrontController@saveCus');
    Route::resource('/transaksi', 'TrxController');
    Route::post('/trx/save', 'FrontController@transaksi');
    Route::get('/mp', 'FrontController@meeting');
    Route::post('/trx/savedes', 'FrontController@saveTrxItem');
    Route::get('/despaket', 'AdminDestinasiController@json_despaket');
    Route::get('/destinasi', 'AdminDestinasiController@json_des');
    Route::get('/paket', 'PaketController@json_paket');
    Route::get('/paket/{id}', 'PaketController@json_paket_wh');
    Route::get('/pd/{id}', 'PaketController@json_pd');
    Route::get('/pp/{id}', 'PaketController@json_pp');
});
