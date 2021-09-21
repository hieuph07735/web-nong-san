<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Slide;
class HomeController extends Controller
{

    public function index()
    {   
        $data['slide'] = Slide::all()->where("status","=",1);
        $data['categories'] = Category::all()->take(3);
        $data['products'] = Product::all()->take(4);
        return view('client.home', $data);
    }
}
    