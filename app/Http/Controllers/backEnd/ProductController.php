<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\AddProduct;
use App\Http\Requests\EditProduct;
use App\Models\TypeProduct;
use http\Env\Request;

class ProductController extends Controller
{
    public function index(){
        $status = 0;
        $datas = Product::all();
        foreach ($datas as $data) {
            $category = TypeProduct::query()->find($data->category_id);
            $data->name_caterogy = $category->name ?? "";
        }
        return view('backEnd.products.list')->with(compact('datas', 'status'));
    }

    public function create(){
        $type_product = TypeProduct::where('status',1)->get();
        return view('backEnd.products.add',compact('type_product'));
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
