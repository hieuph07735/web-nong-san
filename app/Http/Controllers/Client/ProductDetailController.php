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
        $inventory = Inventory::query()->where('product_id', '=', $id)->first();
        $product = Product::find($id);
        $inventories = Inventory::all();
        foreach ($inventories as $data) {
            $data_product = Product::query()->find($data->product_id);
            $data->name_product = $data_product->name ?? "";
            $data->image = $data_product->image ?? "";
        }

        return view('Client.product_detail', compact('product', 'inventory', 'inventories'));
    }
}
