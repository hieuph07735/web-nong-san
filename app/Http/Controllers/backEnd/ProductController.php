<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Http\Requests\AddProduct;
use App\Http\Requests\EditProduct;
use App\Models\TypeProduct;
use Illuminate\Http\Request;
use File;


class ProductController extends Controller
{
    public function index($status){
        $datas = Product::where('status','!=',3)->get();
        return view('backEnd.products.list')->with(compact('datas', 'status'));
    }

    public function create(){
        $type_product = TypeProduct::where('status',1)->get();
        return view('backEnd.products.add',compact('type_product'));
    }

    public function store(AddProduct $request){
        $pr = new Product();
        $pr->type_product_id = $request->type_product_id;
        $pr->name = $request->name;
        $pr->description = $request->description;
        $pr->status = $request->status;
        $pr->save();


         foreach($request->image as $key=>$value){
            $pr_img = new ProductImage();
            $extension = $value->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $value->storeAs(
                'img_product', $filename, 'public'
            );
            $pr_img->product_id = $pr->id;
            $pr_img->path = "storage/".$path;
            $pr_img->sort = $key;
            $pr_img->save();
         }
        $status = 1;
        return redirect()->route('product.index',compact('status'));
    }

    public function edit($id){
        $type_product = TypeProduct::where('status',1)->get();
        $data = Product::find($id);
        return view('backEnd.products.edit',compact('data','type_product'));
    }

    public function update(EditProduct $request ,$id){
       $pr = Product::find($id);
       $pr->type_product_id = $request->type_product_id;
       $pr->name = $request->name;
       $pr->description = $request->description;
       $pr->status = $request->status;
       $pr->save();

        if($request->image != null){
            $arr_img = ProductImage::where('product_id',$pr->id)->get();
            foreach($arr_img as $item){
                File::delete($item->path);
                $flight = ProductImage::find($item->id);
                $flight->delete();
            }
            foreach($request->image as $key=>$value){
                $pr_img = new ProductImage();
                $extension = $value->extension();
                $filename =  uniqid(). "." . $extension;
                $path = $value->storeAs(
                    'img_product', $filename, 'public'
                );
                $pr_img->product_id = $pr->id;
                $pr_img->path = "storage/".$path;
                $pr_img->sort = $key;
                $pr_img->save();
                }
        }
       $status = 2;
       return redirect()->route('product.index',compact('status'));
    }


    public function status(Request $request){
        try {
            $flight = Product::find($request->id);
            if($flight->status == 1){
                $flight->status = 2;
            }else{
                $flight->status = 1;
            }
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
            $flight = Product::find($request->id);
            $flight->status = 3;
            $flight->save();
            $status = 1; 
        } 
        catch (Exception $e) 
        {   
            $status = 2; 
        }
        return response()->json(['status' => $status]);
    }
    
}
