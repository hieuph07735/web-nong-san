<?php


namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditInventory;
use App\Models\Inventory;
use App\Models\Product;
use App\User;
use App\Http\Requests\AddInventory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class InventoryController extends Controller
{
    public function create()
    {
        $products = Product::all();
        return view('backEnd.inventory-management.create', compact('products'));
    }

    public function store(AddInventory $request)
    {
        try {
            $inventory = new Inventory();
            $inventory->product_id = $request->product_id;
            $inventory->unit_id = 0;
            $inventory->user_id = auth()->id();
            $inventory->amount = $request->amount;
            $inventory->price = $request->price;
            if(is_null($request->price_sale) == true){
                $request->price_sale = 0;
            }
            $inventory->price_sale = $request->price_sale;
//            dd($request->date_add);
            $inventory->date_add = Carbon::createFromFormat('Y-m-d', $request->date_add);
            $inventory->expiry = $request->expiry;
            $inventory->status = $request->status;
            $inventory->save();

            $status = 1;
        }catch (Exception $e)
        {
            $status = 2;
        }
        $inventories = Inventory::all();
        foreach ($inventories as $inventory) {
            $product = Product::query()->find($inventory->product_id);
            $inventory->name_product = $product->name ?? "";
            $inventory->code_product = $product->code ?? "";
            $user = User::query()->find($inventory->user_id);
            $inventory->name_user = $user->name?? "";
            $inventory->date_add = Carbon::createFromFormat('Y-m-d', $inventory->date_add)->format('d-m-Y');
            $inventory->expiry = Carbon::createFromFormat('d-m-Y', $inventory->date_add)->addDays($inventory->expiry);
            $inventory->dayLeft = $inventory->expiry->diffInDays(Carbon::now());
            $inventory->expiry = $inventory->expiry->format('d-m-Y');
        }
        return redirect()->route('inventory.index')->with(compact('inventories', 'status'));
    }

    public function index()
    {
        $status = 0;
        $inventories = Inventory::all();
        foreach ($inventories as $inventory) {
            $product = Product::query()->find($inventory->product_id);
            $inventory->name_product = $product->name ?? "";
            $inventory->code_product = $product->code ?? "";
            $user = User::query()->find($inventory->user_id);
            $inventory->name_user = $user->name?? "";
            $inventory->date_add = Carbon::createFromFormat('Y-m-d', $inventory->date_add)->format('d-m-Y');
            $inventory->expiry = Carbon::createFromFormat('d-m-Y', $inventory->date_add)->addDays($inventory->expiry);
            $inventory->dayLeft = $inventory->expiry->diffInDays(Carbon::now());
            $inventory->expiry = $inventory->expiry->format('d-m-Y');
        }
        return view('backEnd.inventory-management.index', compact('inventories', 'status'));
    }

    public function edit($id)
    {
        $inventory = Inventory::find($id);
        $product = Product::query()->find($inventory->product_id);
        $inventory->name_caterogy = $product->name ?? "";
        $products = Product::all();
        return view('backEnd.inventory-management.edit', compact('inventory', 'products'));
    }

    public function update(EditInventory $request, $id)
    {
        try {
            $inventory = Inventory::find($id);
            $inventory->product_id = $request->product_id;
            $inventory->user_id = auth()->id();
            $inventory->amount = $request->amount;
            $inventory->price = $request->price;
            if(is_null($request->price_sale) == true){
                $request->price_sale = 0;
            }
            $inventory->price_sale = $request->price_sale;
            $inventory->date_add = Carbon::createFromFormat('Y-m-d', $request->date_add);
            $inventory->expiry = $request->expiry;
            $inventory->status = $request->status;
            $inventory->unit_id = 1;
            $inventory->save();
            $status = 3;
        }catch (Exception $e)
        {
            $status = 4;
        }
        $inventories = Inventory::all();
        foreach ($inventories as $inventory) {
            $product = Product::query()->find($inventory->product_id);
            $inventory->name_product = $product->name ?? "";
            $user = User::query()->find($inventory->user_id);
            $inventory->name_user = $user->name?? "";
            $inventory->date_add = Carbon::createFromFormat('Y-m-d', $inventory->date_add)->format('d-m-Y');
            $inventory->expiry = Carbon::createFromFormat('Y-m-d', $inventory->date_add)->addDays($inventory->expiry);
            $inventory->dayLeft = $inventory->expiry->diffInDays(Carbon::now());
            $inventory->expiry = $inventory->expiry->format('d-m-Y');
        }
        return redirect()->route('inventory.index')->with(compact('inventories', 'status'));
    }

    public function destroy(Request $request)
    {
        try {
            $inventory = Inventory::find($request->id);
            $inventory->delete();
            $status = 1;
        }
        catch (Exception $e)
        {
            $status = 2;
        }
        return response()->json(['status' => $status]);
    }
}
