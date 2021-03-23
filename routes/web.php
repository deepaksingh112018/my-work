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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/avatar','Avatar@index');
Route::post('backend','Avatar@image')->name('backend');
Route::get('/fileDelete/{id}','Avatar@delete');
Route::get('/downloadAvatar/{file}','Avatar@download');
