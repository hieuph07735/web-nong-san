<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Http\Requests\AddProduct;
use App\Http\Requests\EditProduct;




class ProductController extends Controller
{
    public function list(){
        return view('backEnd.products.list');
    }

    public function add(){
        $category = Category::where('status',1)->where('type',1)->get();
        return view('backEnd.products.add',compact('category'));
    }

    public function save(Request $request){
        dd($request->all());
        return view('backEnd.products.add',compact('category'));
    }
}
