<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('kategorije', 'App\Http\Controllers\KategorijaController@getAll');
Route::get('kategorije/{id}', 'App\Http\Controllers\KategorijaController@getById');
Route::get('restoran', 'App\Http\Controllers\RestoranController@getAll');
Route::get('restoran/{id}', 'App\Http\Controllers\RestoranController@getById');
Route::post('kategorije', 'App\Http\Controllers\KategorijaController@save');
Route::post('restoran', 'App\Http\Controllers\RestoranController@save');
Route::delete('kategorije/{id}', 'App\Http\Controllers\KategorijaController@delete');
Route::delete('restoran/{id}', 'App\Http\Controllers\RestoranController@delete');
