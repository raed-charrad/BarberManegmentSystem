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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('/service')->namespace('App\Http\Controllers')->group(function(){
    Route::get('/','ServisesController@index');
    Route::post('/','ServisesController@create');
    Route::put('/{id}', 'ServisesController@update');
    Route::delete('/{id}', 'ServisesController@delete');
    Route::get('/{id}', 'ServisesController@show');
});