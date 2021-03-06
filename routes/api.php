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
    Route::get('/getIe/{id}', 'PaketController@json_ie');
    Route::get('/getIten/{id}', 'PaketController@json_it');
    Route::post('paket/addIe', 'PaketController@add_ie');
    Route::post('paket/addIt', 'PaketController@add_it');
    Route::get('/pd/{id}', 'PaketController@json_pd');
    Route::get('/pp/{id}', 'PaketController@json_pp');
    Route::post('/pp/add', 'PaketController@add_pp');
    Route::delete('/pp/destroy', 'PaketController@pp_destroy');
    Route::delete('/ie/destroy', 'PaketController@ie_destroy');
    Route::delete('/it/destroy', 'PaketController@it_destroy');
    Route::get('/rek', 'BankController@json_rek');
});
