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

Route::get('/', 'App\Http\Controllers\KategorijaController@all');
Route::get('/{kategorija}', 'App\Http\Controllers\KategorijaController@view');
Route::get('/{kategorija}/{id}', 'App\Http\Controllers\RestoranController@view');
Route::post('/dodaj', 'App\Http\Controllers\RestoranController@create');
