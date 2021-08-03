<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\AddCategory;
use App\Http\Requests\EditCategory;
use File;

class CategoryController extends Controller
{
    public function index(){
        $status = 0;
        $data = Category::all();
        return view('backEnd.categories.list',compact('data','status'));
    }

    public function create(){
        return view('backEnd.categories.add');
    }

    public function store(AddCategory $request){
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
                'description' => $request->description,
                'short_description' => '1',
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
            $flight->description = $request->description;
            if($image != 1){
                File::delete($flight->image);
                $flight->image = $image;
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
            File::delete($flight->image);
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
