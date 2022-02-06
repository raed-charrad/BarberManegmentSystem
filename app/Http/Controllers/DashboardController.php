<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if((Auth::user()->hasRole('user'))&&(Auth::user()->hasVerifiedEmail())){
            return view('welcome');
        }elseif((Auth::user()->hasRole('stylist'))&&(Auth::user()->hasVerifiedEmail())){
            return view('stylistDash');
        }elseif(Auth::user()->hasRole('admin')){
            return view('vue');
        }
    }
}