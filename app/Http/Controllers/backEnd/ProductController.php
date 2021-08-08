<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Http\Requests\AddProduct;
use App\Http\Requests\EditProduct;
use App\Models\TypeProduct;

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

            $id_product = Product::insertGetId([
                'type_product' => $request->type_product,
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
            ]);

            ProductImage::insert([
                'product_id' => $id_product,
                'path' => $image,
                'sort' => 1,
            ]);
            $status = 1;
        }
        catch (Exception $e)
        {
            $status = 2;
        }
        $datas = Product::all();

        return view('backEnd.products.list', compact('datas', 'status'));
    }
}
