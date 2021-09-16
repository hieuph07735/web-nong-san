<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        return view('Client.cart');
    }

    public function addOneCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['amount']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "amount" => 1,
                "price" => $product->price_entry,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return view('Client.cart');
    }

    public function addCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['amount']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "amount" => 1,
                "price" => $product->price_entry,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm thành công');
    }

    public function updateCart(Request $request)
    {
        if($request->id && $request->amount){
            $cart = session()->get('cart');
            $cart[$request->id]["amount"] = $request->amount;
            session()->put('cart', $cart);
            session()->flash('success', 'Sản phẩm đã được cập nhật');
        }
    }

    public function removeCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Xóa bỏ sản phẩm thành công');
        }
    }

}
