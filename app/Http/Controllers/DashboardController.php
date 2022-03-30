<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if((Auth::user()->hasRole('user'))){
            $services = DB::table('services')->select('id','title')->get();
            if(Auth::user()->hasVerifiedEmail()){
                return view('editProfile',['services'=>$services]);
            }else return view('verification',['services'=>$services]);
        }elseif((Auth::user()->hasRole('stylist'))){
            $services = DB::table('services')->select('id','title')->get();
            if(Auth::user()->hasVerifiedEmail()){
                if(Auth::user()->approved==1){
                    return view('stylistDash',['services'=>$services]);
                }else return view('approved',['services'=>$services]);
            }else return view('verification',['services'=>$services]);
        }elseif((Auth::user()->hasRole('admin'))&&(Auth::user()->hasVerifiedEmail())){
            $services = DB::table('services')->select('id','title')->get();
            return view('vue',['services'=>$services]);
        }
    }
}
