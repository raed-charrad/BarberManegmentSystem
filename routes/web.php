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
    $services = DB::table('services')->select('id','title','image')->get();
    $stylists = DB::table('users')
    ->join('role_user', 'users.id', '=', 'role_user.user_id')
    ->select('id','name','image')
    ->where('role_user.role_id', '=', '2')
    ->where('users.image','!=','user.png')
    ->get();
    return view('welcome',['services'=>$services,'stylists'=>$stylists]);
})->name('home');
Route::get('/about', function () {
    $services = DB::table('services')->select('id','title')->get();
    $stylists = DB::table('users')
    ->join('role_user', 'users.id', '=', 'role_user.user_id')
    ->select('id','name','image')
    ->where('role_user.role_id', '=', '2')
    ->where('users.image','!=','user.png')
    ->get();
    return view('about',['services'=>$services,'stylists'=>$stylists]);
});
Route::get('/contact', function () {
    $services = DB::table('services')->select('id','title')->get();
    $stylists = DB::table('users')
    ->join('role_user', 'users.id', '=', 'role_user.user_id')
    ->select('id','name')
    ->where('role_user.role_id', '=', '2')
    ->get();
    return view('contact',['services'=>$services,'stylists'=>$stylists]);
});
Route::post('/contactsend', 'App\Http\Controllers\ContactUsFormController@ContactUsForm')->name('contact.store');
Route::post('/appointmentSend', 'App\Http\Controllers\AppointmentControler@appointmentForm')->name('appointment.store');
Route::get('/api/appointmentsStylist', 'App\Http\Controllers\AppointmentControler@showAppointments');
Route::get('/api/commisionStylist', 'App\Http\Controllers\AppointmentControler@commition');
Route::post('/api/stylist/show', 'App\Http\Controllers\StylistController@show');
Route::post('/api/stylist/dashboard', 'App\Http\Controllers\StylistController@data');
Route::post('/api/user/show', 'App\Http\Controllers\userController@show');



Route::get('/hairstyle', function () {
    $services = DB::table('services')->select('id','title','image')->get();
    $stylists = DB::table('users')
    ->join('role_user', 'users.id', '=', 'role_user.user_id')
    ->select('id','name')
    ->where('role_user.role_id', '=', '2')
    ->where('users.image','!=','user.png')
    ->get();

    return view('hairstyle',['services'=>$services,'stylists'=>$stylists]);
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
