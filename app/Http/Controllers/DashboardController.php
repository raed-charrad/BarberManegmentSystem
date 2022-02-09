<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        if((Auth::user()->hasRole('user'))&&(Auth::user()->hasVerifiedEmail())){
            $services = DB::table('services')->select('id','title')->get();

            return view('welcome',['services'=>$services]);
        }elseif((Auth::user()->hasRole('stylist'))&&(Auth::user()->hasVerifiedEmail())&&(Auth::user()->approved==1)){
            $services = DB::table('services')->select('id','title')->get();
            return view('stylistDash',['services'=>$services]);
        }elseif((Auth::user()->hasRole('admin'))&&(Auth::user()->hasVerifiedEmail())){
            $services = DB::table('services')->select('id','title')->get();

            return view('vue',['services'=>$services]);
        }
    }
}
