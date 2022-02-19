<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StylistController extends Controller
{
    public function index(Request $request){
        $search=$request->input('search');
        $Stylist=DB::table('users')
        ->join('role_user','users.id','=','role_user.user_id')
        ->where('role_id','=',2)
        ->where('users.name','like','%'.$search.'%')
        ->orderBy('updated_at','DESC')
        ->paginate(3);
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
    public function show(){
        $stylist=User::find(Auth::user()->id)->where('id','=',Auth::user()->id)->firstOrFail();
        return response()->json( $stylist,200);
    }
    public function updateStylist(Request $request){
        $id=$request->input('id');
        $data =array(
            'avatar' => $request->input('avatar'),
            'image' => $request->input('image'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'adress' => $request->input('adress'),
        );
        $file = $request->file('avatar');
        if(!empty($file)){
        $name = '/avatars/' . uniqid() . '.' . $file->extension();
        $file->storePubliclyAs('public', $name);
        $data['image'] = $name;
    }
        $user = User::find($id);
        $user->update($data);
        return response()->json('Product updated!');
    }
    public function data(){
        $users=DB::table('users')->get();
        $commition=DB::table('appointments')
        ->join('users', 'appointments.idClient', '=', 'users.id')
        ->join('services','appointments.idServices','=','services.id')
        ->where('appointments.idStylist','=',Auth::user()->id)
        ->where('appointments.status','=',1)
        ->get();
        $orders=DB::table('appointments')->get();
        return response()->json(['users'=>$users, 'orders'=>$orders,'commition'=>$commition],200);
    }

}
