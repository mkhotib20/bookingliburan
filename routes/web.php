<?php

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
// Route::get('/{locale}', function ($locale) {
//     App::setLocale($locale);
//     echo __('messages.welcome');
// });
Route::get('/', function () {
    return redirect(app()->getLocale());
});
Route::get('/faq', function(){
    return redirect(app()->getLocale().'/faq');
});
Route::get('/cek-booking', 'FrontController@cek-booking');
Route::get('/result', 'FrontController@hasilDestinasi');
Route::get('/detail', 'FrontController@detailPaket');
Route::get('/article/{id}', 'FrontController@detailArticle');
Route::get('/trx/done/{id}', 'FrontController@done');
Route::get('/trx/print/{id}', 'FrontController@print');
Route::group([
    'prefix' => '{locale}', 
    'where' => ['locale' => '[a-zA-Z]{2}'], 
    'middleware' => 'setlocale'], function() {
        Route::get('/', 'FrontController@index');
        Route::get('/faq', 'FrontController@faq');
        Route::get('/cek-booking', 'FrontController@cek-booking');
        Route::get('/result', 'FrontController@hasilDestinasi');
        Route::get('/detail', 'FrontController@detailPaket');
        Route::get('/trx/done/{id}', 'FrontController@done');
        Route::get('/trx/print/{id}', 'FrontController@print');
    });
Route::prefix('admin')->group(function () {
    Route::resource('/', 'PaketController')->middleware('admin_auth');
    Route::resource('destinasi', 'AdminDestinasiController')->middleware('admin_auth');
    Route::resource('article', 'ArticleController')->middleware('admin_auth');
    Route::resource('kota', 'KotaController')->middleware('admin_auth');
    Route::get('paket/list-destinasi/{id}', 'PaketController@listDestinasi')->middleware('admin_auth');
    Route::get('paket/delDp/{id}', 'PaketController@delDp')->middleware('admin_auth');
    Route::post('paket/tambah-pd', 'PaketController@tPd')->middleware('admin_auth');
    Route::resource('paket', 'PaketController')->middleware('admin_auth');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
