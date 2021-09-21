<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Http\Requests\AddSlide;
use App\Http\Requests\EditSlide;
use File;
class SlideContrller extends Controller
{
    public function index()
    {
        $data['slide'] = Slide::all();
        return view('backend.slide.index', $data);
    }

    public function create()
    {
        return view('backend.slide.create');
    }
    public function store(AddSlide $request)
    {
        $image = "";
        $pr = new Slide();
        if ($request->hasFile('image')) {
            $extension = $request->image->extension();
            $filename = uniqid() . "." . $extension;
            $path = $request->image->storeAs('img_product',$filename,'public');
            $image = "storage/" . $path;
        }
        
        $pr->name = $request->name;
        $pr->image = $image;
        $pr->status = $request->status;
        $pr->save();
        $status = 1;

        return redirect()->route('slide.index');
    }
    public function edit($id)
    {
        $data = Slide::find($id);
        return view('backEnd.slide.edit', compact('data'));
    }

    public function update(EditSlide $request, $id)
    {
        $image = 1;
        if ($request->hasFile('image')) {
            $extension = $request->image[0]->extension();
            $filename =  uniqid() . "." . $extension;
            $path = $request->image[0]->storeAs(
                'img_product',
                $filename,
                'public'
            );
            $image = "storage/" . $path;
        }
        $pr = Slide::find($id);
    
        $pr->name = $request->name;
        if ($image != 1) {
            File::delete($pr->image);
            $pr->image = $image;
        }
        $pr->status = $request->status;
        $pr->save();


        $status = 2;
        return redirect()->route('slide.index', compact('status'));
    }

    public function status(Request $request){

        try {
            $flight = Slide::find($request->id);
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
    public function delete(Request $request){

        try {
            $flight = Slide::find($request->id);
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
