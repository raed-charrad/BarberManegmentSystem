<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StylistController extends Controller
{
    public function index(){
        $Stylist=User::with('role')->orderBy('updated_at','DESC')->whereHas('role',function($a){$a->where('role_id',2);})->paginate(2);
        return response()->json($Stylist,200);
    }
    public function delete($id, Request $request){

            $Stylist = User::find($id);
            $Stylist->delete();
            return response()->json('Stylist deleted!');
    }
    public function verify($id){
        $stylist=User::find($id);
        $stylist->approved=1;
        $stylist->save();
    }
}
