<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\services;
class ServisesController extends Controller
{
    public function index(){
        $services=services::orderBy('updated_at','DESC')->get();
        return response()->json($services,200);
    }
    public function create(Request $request){
        $title=$request->input('title');
        $image=$request->input('image');
        $price=$request->input('price');
        $description=$request->input('description');
        if( !empty($title) && !empty($image) && !empty($price) && !empty($description)){
        $data=array(
            'title'=>$title,
            'image'=>$image,
            'price'=>$price,
            'description'=>$description,
        );
        $service=services::create($data);
        if(!empty($service)){
            return response()->json($service,200);

        }}
        else{
            return response()->json('erreur',400);
        }
    }
    public function update($id, Request $request){
        $service = services::find($id);
        $service->update($request->all());
        return response()->json('Product updated!');
    }
    public function delete($id, Request $request){
        
            $service = services::find($id);
            $service->delete();
            return response()->json('Product deleted!');
        
    }
    public function show($id)
    {
        $service = services::find($id);
        return response()->json($service);
    }
}
