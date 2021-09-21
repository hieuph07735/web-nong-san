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
        $datas = Category::all();
        return view('backEnd.categories.list',compact('datas','status'));
    }

    public function create(){
        return view('backEnd.categories.add');
    }

    public function store(AddCategory $request){
        try {
            if($request->hasFile('image')){
                $extension = $request->image[0]->extension();
                $filename =  uniqid(). "." . $extension;
                $path = $request->image[0]->storeAs(
                    'category_image', $filename, 'public'
                );
                $image = "storage/".$path;
            }
            Category::insert([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image,
                'status' => $request->status,
            ]);
            $status = 1;
        }
        catch (Exception $e)
        {
            $status = 2;
        }
        $datas = Category::OrderBy('id', 'DESC')->get();
        return view('backEnd.categories.list',compact('datas','status'));
    }

    public function edit(Request $request ,$id){
        $data = Category::find($id);
        return view('backEnd.categories.edit',compact('data'));
    }

    public function update(Request $request ,$id){
        try {
            $image = 1;
            if($request->hasFile('image')){
                $extension = $request->image[0]->extension();
                $filename =  uniqid(). "." . $extension;
                $path = $request->image[0]->storeAs(
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
        $datas = Category::all();
        return view('backEnd.categories.list',compact('datas','status'));
    }

    public function status(Request $request){
        try {
            $product = Category::find($request->id);
            $product->status = $request->status;
            $product->save();
        } catch (\Exception $e) {
        }
        return response()->json(['success' => 'Thay đổi trạng thái thành công']);
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
