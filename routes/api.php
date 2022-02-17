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
    Route::post('/{id}', 'ServisesController@update');
    Route::delete('/{id}', 'ServisesController@delete');
    Route::get('/{id}', 'ServisesController@show');
    Route::post('client/store','ServisesController@store')->name('client.store');

});
Route::prefix('/stylist')->namespace('App\Http\Controllers')->group(function(){
    Route::get('/','StylistController@index');
    Route::delete('/{id}', 'StylistController@delete');
    Route::put('/verify/{id}', 'StylistController@verify');
});
Route::prefix('/user')->namespace('App\Http\Controllers')->group(function(){
    Route::get('/','userController@index');
    Route::delete('/{id}', 'StylistController@delete');
});
Route::prefix('/appointmentAdmin')->namespace('App\Http\Controllers')->group(function(){
    Route::get('/','AppointmentControler@index');
    Route::delete('/{id}', 'AppointmentControler@delete');
});
Route::prefix('/appointmentsStylist')->namespace('App\Http\Controllers')->group(function(){
    Route::delete('/{id}', 'AppointmentControler@delete');
    Route::put('/verify/{id}', 'AppointmentControler@verify');
    Route::put('/inVerify/{id}', 'AppointmentControler@inVerify');
});
Route::prefix('/commisionStylist')->namespace('App\Http\Controllers')->group(function(){

});
