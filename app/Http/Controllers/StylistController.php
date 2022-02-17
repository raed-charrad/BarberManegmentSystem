<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        print_r($user);
        $user->update($data);
        return response()->json('Product updated!');
    }
}
