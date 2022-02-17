<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    public function index(){
        $user=User::with('role')->orderBy('updated_at','DESC')->whereHas('role',function($a){$a->where('role_id',3);})->paginate(2);
        return response()->json($user,200);
    }
    public function delete($id, Request $request){

            $user = User::find($id);
            $user->delete();
            return response()->json('User deleted!');
    }
}
