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
})->name('faq');
Route::get('/perusahaan/{id}', 'FrontController@identitas');

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
Route::prefix('mitra')->group(function () {
    Route::resource('/', 'PaketController')->middleware('auth:admin');
    Route::resource('destinasi', 'AdminDestinasiController')->middleware('auth:admin');
    Route::resource('article', 'ArticleController')->middleware('auth:admin');
    Route::resource('kota', 'KotaController')->middleware('auth:admin',['only' => 'index','edit']);
    Route::get('paket/list-harga/{id}', 'PaketController@listHarga')->middleware('auth:admin');
    Route::get('paket/list-destinasi/{id}', 'PaketController@listDestinasi')->middleware('auth:admin');
    Route::get('paket/delDp/{id}', 'PaketController@delDp')->middleware('auth:admin');
    Route::post('paket/tambah-pd', 'PaketController@tPd')->middleware('auth:admin');
    Route::resource('paket', 'PaketController')->middleware('auth:admin');
    Route::resource('rekening', 'BankController')->middleware('auth:admin');
});

Route::prefix('user')->group(function () {
    Auth::routes();
});

Route::prefix('v1/admin/rbac/auth')->group(function () {
    // Route::get('/', 'AdminController@index')->name('admin.dashboard');
    // Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('register', 'AdminController@create')->name('admin.register');
    Route::post('register', 'AdminController@store')->name('admin.register.store');
    Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');
    Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');
    Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');
  });
// Route::get('/home', 'HomeController@index')->name('home');
