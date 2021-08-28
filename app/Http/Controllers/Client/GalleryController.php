<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\TypeProduct;
use App\Models\Product;

class GalleryController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $type_products = TypeProduct::all();
        $categories = Category::all();
        return view('Client.gallery', compact('categories', 'type_products'));
    }
}
