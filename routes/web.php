<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\UserController@index')->name('UserIndex');
Route::get('/destinasi', 'App\Http\Controllers\UserController@destinasi')->name('UserDestinasi');
Route::get('/destinasi/{id}', 'App\Http\Controllers\UserController@show')->name('ShowDestinasi');
Route::get('/galery', 'App\Http\Controllers\UserController@galery')->name('UserGalery');
Route::get('/tentang', 'App\Http\Controllers\UserController@tentang')->name('UserTentang');
Route::get('/kontak', 'App\Http\Controllers\UserController@kontak')->name('UserKontak');
Route::post('/saran', 'App\Http\Controllers\UserController@saran')->name('UserSaran');
Route::get('/login', 'App\Http\Controllers\AuthController@index')->name('login');
Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('AksiLogin');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/admin', 'App\Http\Controllers\AdminController@beranda')->name('AdminIndex');
    Route::get('/admin/galery', 'App\Http\Controllers\AdminController@galery')->name('AdminGalery');
    Route::get('/admin/tentang', 'App\Http\Controllers\AdminController@tentang')->name('AdminTentang');
    Route::get('/admin/kontak', 'App\Http\Controllers\AdminController@kontak')->name('AdminKontak');
    Route::post('/admin/saran', 'App\Http\Controllers\AdminController@saran')->name('AdminSaran');
    Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('AdminLogout');
    Route::resource('/admin/destinasi', 'App\Http\Controllers\AdminController');
});
