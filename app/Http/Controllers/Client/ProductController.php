<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $data = Product::all();
        return view('Client.product',compact('categories','data'));
    }


    public function getProductByType($id){

        $data = Product::all()->where('type_product_id','=',$id)->take(4);

        return view('client.product',['data'=>$data]);


    }
}
