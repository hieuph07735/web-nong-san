<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Model\Category;
use App\Http\Requests\AddProduct;
use App\Http\Requests\EditProduct;


class ProductController extends Controller
{
    public function index(){
        $status = 0;
        $data = Product::all();
        return view('backEnd.products.list')->with(compact('data', 'status'));
    }

    public function create(){
        $category = Category::where('status',1)->where('type',1)->get();
        return view('backEnd.products.add',compact('category'));
    }

    public function store(AddProduct $request){
        try {
            if ($request->hasFile('image')) {
                $extension = $request->image->extension();
                $filename =  uniqid(). "." . $extension;
                $path = $request->image->storeAs(
                    'category_image', $filename, 'public'
                );
                $image = "storage/".$path;
            }
            Product::insert([
                'name' => $request->name,
                'desc' => $request->desc,
                'detail' => $request->detail,
                'status' => $request->status,
            ]);
            $status = 1;
        }
        catch (Exception $e)
        {
            $status = 2;
        }
        $data = Product::all();

        return view('backEnd.products.list', compact('data', 'status'));
    }
}
