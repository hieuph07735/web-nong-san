<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariationType;
use App\Models\ProductVariation;
use Carbon\Carbon;

class ProductVariationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data['product'] = Product::find($id)->load('variations');
        $data['var_type'] = ProductVariationType::all();
        $data['variation'] = ProductVariation::where('products_id', $id)->get()->load('variationtype');
        return view('backend.variation.common', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_id = $request->id;
        // dd($product_id);
        $var_name = $request->name;
        $var_prc = $request->price;
        $var_qty = $request->quantity;
        $vartypes_id = $request->var_type;
        $productvariation = [];
        $length = count($var_name);
        for ($i = 0; $i < $length; $i++) {
            $productvariation = new ProductVariation();
            $productvariation->products_id = $product_id;
            $productvariation->product_variation_types_id = $vartypes_id[$i];
            $productvariation->name = $var_name[$i];
            $productvariation->price = $var_prc[$i];
            $productvariation->quantity = $var_qty[$i];
            $productvariation->created_at = Carbon::now();
            $productvariation->save();
        }
        return redirect()->back();;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $var = ProductVariation::find($id);
       $var->delete();

       return redirect()->back();
    }
}
