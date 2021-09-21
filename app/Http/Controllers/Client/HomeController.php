<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Slide;
use App\Models\TypeProduct;

class HomeController extends Controller
{

    public function index()
    {   
        $data['slide'] = Slide::all()->where("status","=",1);
        $data['product_type'] = TypeProduct::all()->take(4);
        $data['products'] = Product::all()->take(4);
        return view('client.home', $data);
    }
}
    