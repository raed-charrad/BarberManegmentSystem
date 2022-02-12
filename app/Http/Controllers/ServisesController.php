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
        $data = $request->validate([
            'avatar'   => ['image'],
            'image'=>['required'],
            'title'     => ['required', 'string'],
            'price'    => ['required' ],
            'description' => ['required'],
        ]);

        $file = $request->file('avatar');
        $name = '/avatars/' . uniqid() . '.' . $file->extension();
        $file->storePubliclyAs('public', $name);
        $data['image'] = $name;

        $Service = services::create($data);

    }
    public function update(Request $request,$id){

        $data =array(
            'avatar' => $request->input('avatar'),
            'image' => $request->input('image'),
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),

        );
        print_r($data);
        $file = $request->file('avatar');
        if(!empty($file)){
        $name = '/avatars/' . uniqid() . '.' . $file->extension();
        $file->storePubliclyAs('public', $name);
        $data['image'] = $name;
    }
        $service = services::find($id);
        $service->update($data);
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
    public function store(Request $request)
    {
        $input = $request->all();
        $service = services::create($input);
        if($request->hasFile('avatar') && $request->file('avatar')->isValid()){
            $service->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }
        return response()->json('avatar created!');
    }
}
