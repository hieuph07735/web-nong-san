<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Http\Requests\AddProduct;
use App\Http\Requests\EditProduct;
use App\Models\TypeProduct;
use App\Models\Unit;
use File;


class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = Product::all();
        $data['unit_product'] = Unit::where('status', '!=', 3)->get();
        return view('backend.products.index', $data);
    }

    public function create()
    {
        $data['type_product'] = TypeProduct::where('status', 1)->get();
        $data['unit_product'] = Unit::where('status', '!=', 3)->get();
        return view('backend.products.create', $data);
    }

    public function store(AddProduct $request)
    {
        $image = "";
        $pr = new Product();
        if ($request->hasFile('image')) {
            $extension = $request->image[0]->extension();
            $filename = uniqid() . "." . $extension;
            $path = $request->image[0]->storeAs('img_product',$filename,'public');
            $image = "storage/" . $path;
        }
        $pr->type_product_id = $request->type_product_id;
        $pr->unit_id = $request->unit_id;
        $pr->name = $request->name;
        $pr->price_entry = $request->price_entry;
        $pr->description = $request->description;
        $pr->image = $image;
        $pr->status = $request->status;
        $pr->code = 'TX' . time() . rand(100000, 999999);
        $pr->save();
        $status = 1;

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $type_product = TypeProduct::where('status', 1)->get();
        $unit_product = Unit::where('status', '!=', 3)->get();
        $data = Product::find($id);
        return view('backEnd.products.edit', compact('data', 'type_product', 'unit_product'));
    }

    public function update(EditProduct $request, $id)
    {
        $image = 1;
        if ($request->hasFile('image')) {
            $extension = $request->image[0]->extension();
            $filename =  uniqid() . "." . $extension;
            $path = $request->image[0]->storeAs(
                'img_product',
                $filename,
                'public'
            );
            $image = "storage/" . $path;
        }
        $pr = Product::find($id);
        $pr->type_product_id = $request->type_product_id;
        $pr->name = $request->name;
        $pr->unit_id = $request->unit_id;
        $pr->price_entry = $request->price_entry;
        $pr->description = $request->description;
        if ($image != 1) {
            File::delete($pr->image);
            $pr->image = $image;
        }
        $pr->status = $request->status;
        $pr->save();


        $status = 2;
        return redirect()->route('products.index', compact('status'));
    }

    public function status(Request $request)
    {
        // dd($request->all());
        try {
            $product = Product::find($request->id);
            $product->status = $request->status;
            $product->save();
        } catch (\Exception $e) {
        }
        return response()->json(['success' => 'Thay đổi trạng thái thành công']);
    }

    public function delete(Request $request)
    {
        try {
            $flight = Product::find($request->id);
            $flight->status = 3;
            $flight->save();
            $status = 1;
        } catch (\Exception $e) {
            $status = 2;
        }
        return response()->json(['status' => $status]);
    }
}
