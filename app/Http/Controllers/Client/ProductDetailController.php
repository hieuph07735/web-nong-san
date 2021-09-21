<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Inventory;

class ProductDetailController extends Controller
{
    public function index($id)
    {
        $data['product'] = Product::find($id);
        $data['featured_products'] = Product::orderBy('created_at','DESC')->take('4')->get();

        // dd($data['featured_products']);
        return view('Client.product_detail', $data);
    }
}
