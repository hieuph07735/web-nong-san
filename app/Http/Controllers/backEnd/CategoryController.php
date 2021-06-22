<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Model\Category;
use App\Http\Requests\AddCategory;
use App\Http\Requests\EditCategory;

class CategoryController extends Controller
{
    public function list(){
        $status = 0; 
        $data = Category::all();
        return view('backEnd.categories.list',compact('data','status'));
        
    }
    
    public function add(){
        return view('backEnd.categories.add');
    }

    public function save(AddCategory $request){
        try {
            if($request->hasFile('image')){
                $extension = $request->image->extension();
                $filename =  uniqid(). "." . $extension;
                $path = $request->image->storeAs(
                    'category_image', $filename, 'public'
                );
                $image = "storage/".$path;  
            }
            Category::insert([
                'name' => $request->name,
                'type' => $request->type,
                'image' => $image,
                'status' => $request->status,
            ]);
            $status = 1;
        } 
        catch (Exception $e) 
        {   
            $status = 2; 
        } 
        $data = Category::all();
        return view('backEnd.categories.list',compact('data','status'));
    }

    public function edit(Request $request ,$id){
        $data = Category::find($id);
        return view('backEnd.categories.edit',compact('data'));
    }
    public function update(EditCategory $request ,$id){
        try {
            $image = 1;
            if($request->hasFile('image')){
                $extension = $request->image->extension();
                $filename =  uniqid(). "." . $extension;
                $path = $request->image->storeAs(
                    'category_image', $filename, 'public'
                );
                $image = "storage/".$path;  
            }

            $flight = Category::find($request->id);
            $flight->name = $request->name;
            $flight->type = $request->type;
            if($image != 1){
                $flight->image = $request->image;
            }
            $flight->status = $request->status;
            $flight->save();
            $status = 3;
        } 
        catch (Exception $e) 
        {   
            $status = 4; 
        } 
        $data = Category::all();
        return view('backEnd.categories.list',compact('data','status'));
    }

    public function status(Request $request){

        try {
            $flight = Category::find($request->id);
            if($flight->status == 1){
                $status = 2;
            }else{
                $status = 1;
            }
            $flight->status = $status;
            $flight->save();
            $status = 1; 
        } 
        catch (Exception $e) 
        {   
            $status = 2; 
        }
        return response()->json(['status' => $status]);
    }

    public function delete(Request $request){

        try {
            $flight = Category::find($request->id);
            $flight->delete();
            $status = 1; 
        } 
        catch (Exception $e) 
        {   
            $status = 2; 
        }
        return response()->json(['status' => $status]);
    }
}
