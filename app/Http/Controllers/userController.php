<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\services;
use App\Models\appointments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function index(Request $request){
        $search=$request->input('search');
        $user=DB::table('users')
        ->join('role_user','users.id','=','role_user.user_id')
        ->where('role_id','=',3)
        ->where('users.name','like','%'.$search.'%')
        ->orderBy('updated_at','DESC')
        ->paginate(5);
        return response()->json($user,200);
    }
    public function search(Request $request){
        $search=$request->input('search');
        $user=DB::table('users')
        ->join('role_user','users.id','=','role_user.user_id')
        ->where('role_id','=',3)
        ->where('users.name','=',$search)
        ->orderBy('updated_at','DESC')
        ->get();
        return response()->json($user,200);
    }
    public function delete($id, Request $request){

            $user = User::find($id);
            $user->delete();
            return response()->json('User deleted!');
    }
    public function data(){
        $users=User::with('role')->whereHas('role',function($a){$a->where('role_id',3);})->get();
        $stylist=User::with('role')->whereHas('role',function($a){$a->where('role_id',2);})->get();
        $cuts=appointments::where('status','=',1)->get();
        $orders=appointments::get();
        $services=services::get();
        return response()->json(['users'=>$users,'stylist'=>$stylist,'cuts'=>$cuts,'orders'=>$orders,'services'=>$services],200);
    }
}
