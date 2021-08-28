<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;

class HomeController extends Controller
{

    public function index()
    {
        $categories = Category::all()->take(3);
        $inventories = Inventory::all()->take(4);
        foreach ($inventories as $inventory) {
            $product = Product::query()->find($inventory->product_id);
            $inventory->name_product = $product->name ?? "";
            $inventory->image = $product->image ?? "";
        }
        return view('Client.home', compact('categories', 'inventories'));
    }
}
