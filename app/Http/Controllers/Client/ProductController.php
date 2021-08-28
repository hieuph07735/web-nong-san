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
        $inventories = Inventory::all();
        foreach ($inventories as $inventory) {
            $product = Product::query()->find($inventory->product_id);
            $inventory->name_product = $product->name ?? "";
            $inventory->image = $product->image ?? "";
        }
        return view('Client.product',compact('inventories', 'categories'));
    }
}
