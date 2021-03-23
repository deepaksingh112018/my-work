<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Storage;

class Avatar extends Controller
{
    public function index(){
    	$file = Image::all();
    	return view('avatar',['file'=>$file]);
    }
    public function image(Request $request){
    	$image = $request->file('avatar_name');
    	$photo = $image->getClientOriginalName();
    	$path = storage_path('app/public/avatar/');
    	$status = $image->move($path,$photo);
    	Image::create(['avatar_name'=>$photo]);
    	return redirect()->back();
    }
     public function delete($id) { 
        Image::find($id)->delete();
        return redirect()->back();
    }
    public function download($file){
        return Storage::download('public/avatar/'.$file);
    }
}
