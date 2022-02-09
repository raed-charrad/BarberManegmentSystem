<?php
use App\services;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
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
    $services = DB::table('services')->select('id','title')->get();

    return view('welcome',['services'=>$services]);
});
Route::get('/about', function () {
    $services = DB::table('services')->select('id','title')->get();

    return view('about',['services'=>$services]);
});
Route::get('/contact', function () {
    $services = DB::table('services')->select('id','title')->get();

    return view('contact',['services'=>$services]);
});
Route::get('/hairstyle', function () {
    $services = DB::table('services')->select('id','title')->get();
    return view('hairstyle',['services'=>$services]);
});

Auth::routes(['verify'=>true]);

// Route::post('/home','HomeController@upload');
Route::group(['middleware' => ['auth']], function() {
    /**
    * Verification Routes
    */

    Route::get('/email/verify', [App\Http\Controllers\VerificationController::class,'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\VerificationController::class,'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', [App\Http\Controllers\VerificationController::class,'resend'])->name('verification.resend');
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index' )->name('dashboard');

});
