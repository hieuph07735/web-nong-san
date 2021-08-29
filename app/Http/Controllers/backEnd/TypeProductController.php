<?php


namespace App\Http\Controllers\backEnd;


use App\Http\Controllers\Controller;
use App\Http\Requests\AddTypeProduct;
use App\Http\Requests\EditTypeProduct;
use App\Models\TypeProduct;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Unit;
use File;

class TypeProductController extends Controller
{
    public function index()
    {
        $status = 0;
        $datas = TypeProduct::all();
        foreach ($datas as $data) {
            $category = Category::query()->find($data->category_id);
            $data->name_caterogy = $category->name ?? "";
        }
        //dd($datas);
        return view('backEnd.type_products.list', compact('datas', 'status'));
    }
    public function product_create(){
        $type_product = TypeProduct::where('status',1)->get();
        $unit_product = Unit::where('status',1)->get();

        return view('backEnd.products.add',compact('type_product','unit_product'));
    }


    public function create()
    {
        $category = Category::all();
        return view('backEnd.type_products.add')->with(compact('category'));
    }

    public function store(AddTypeProduct $request)

    {
        try {
            if ($request->hasFile('image')) {
                $extension = $request->image->extension();
                $filename = uniqid() . "." . $extension;
                $path = $request->image->storeAs(
                    'type_product_image', $filename, 'public'
                );
                $image = "storage/" . $path;
            }
            TypeProduct::insert([
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'image' => $image,
                'status' => $request->status,
            ]);
            $status = 1;
        } catch (Exception $e) {
            $status = 2;
        }
        $datas = TypeProduct::all();
        return route('type_product.index', compact('datas', 'status'));
    }

    public function edit(Request $request, $id)
    {
        $data = TypeProduct::find($id);
        $category = Category::query()->find($data->category_id);
        $data->name_caterogy = $category->name ?? "";
        $data_category = Category::all();
        return view('backEnd.type_products.edit', compact('data', 'data_category'));
    }

    public function update(EditTypeProduct $request, $id)
    {
        try {
            $image = 1;
            if($request->hasFile('image')){
                $extension = $request->image->extension();
                $filename =  uniqid(). "." . $extension;
                $path = $request->image->storeAs(
                    'type_product_image', $filename, 'public'
                );
                $image = "storage/".$path;
            }

            $flight = TypeProduct::find($request->id);
            $flight->name = $request->name;
            $flight->description = $request->description;
            $flight->category_id = $request->category_id;
            if($image != 1){
                File::delete($flight->image);
                $flight->image = $image;
            }
            $flight->status = $request->status;
            $flight->save();
            $status = 3;
        }
        catch (Exception $e)
        {
            $status = 4;
        }
        $datas = Category::all();
        foreach ($datas as $data) {
            $category = Category::query()->find($data->category_id);
            $data->name_caterogy = $category->name ?? "";
        }
        return redirect()->route('type_product.index',compact('datas','status'));
    }

    public function status(Request $request)
    {
        try {
            $flight = TypeProduct::find($request->id);
            if($flight->status == 1){
                $status = 2;
            }else{
                $status = 1;
            }
            $flight->status = $status;
            $flight->save();
            $status = 1;
        }
        catch (Exception $e)
        {
            $status = 2;
        }
        return response()->json(['status' => $status]);
    }

    public function delete(Request $request)
    {
        try {
            $flight = TypeProduct::find($request->id);
            File::delete($flight->image);
            $flight->delete();
            $status = 1;
        }
        catch (Exception $e)
        {
            $status = 2;
        }
        return response()->json(['status' => $status]);
    }
}
