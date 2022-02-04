<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/hairstyle', function () {
    return view('hairstyle');
});

Auth::routes(['verify'=>true]);


Route::group(['middleware' => ['auth']], function() {
    /**
    * Verification Routes
    */
    Route::get('/email/verify', [App\Http\Controllers\VerificationController::class,'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\VerificationController::class,'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', [App\Http\Controllers\VerificationController::class,'resend'])->name('verification.resend');
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index' )->name('dashboard');

});
