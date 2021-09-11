<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Introduct;

class IntroductsController extends Controller
{
    public function index(){
        $status = 0;
        $datas = Introduct::all();
        return view('backEnd.introducts.list',compact('datas','status'));
    }

    public function create(){
        return view('backEnd.introducts.add');
    }

    public function store(Request $request){
        try {
            if($request->hasFile('image')){
                $extension = $request->image->extension();
                $filename =  uniqid(). "." . $extension;
                $path = $request->image->storeAs(
                    'introduct_img', $filename, 'public'
                );
                $image = "storage/".$path;
            }
          Introduct::insert([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $image,
            ]);
           
            $status = 0;
        }catch(Exception $e){
            $status = 1;
        }
        $datas = Introduct::all();
        return redirect()->route('introduct.index',compact('status'));
    }
    public function edit(Request $request ,$id){
        $data = Introduct::find($id);
        return view('backEnd.introduct.edit',compact('data'));
    }

    public function update(Request $request ,$id){
        try {
            $image = 1;
            if($request->hasFile('image')){
                $extension = $request->image->extension();
                $filename =  uniqid(). "." . $extension;
                $path = $request->image->storeAs(
                    'introduct_img', $filename, 'public'
                );
                $image = "storage/".$path;
            }

            $flight = Introduct::find($request->id);
            $flight->title = $request->title;
            $flight->content = $request->content;
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
        $datas = Introduct::all();
        return redirect()->route('introduct.index',compact('status'));
    }

//     public function destroy(Request $request){
// dd(1);
//         // try {
//             $flight = Introduct::find($request->id);
//             File::delete($flight->image);
//             $flight->delete();
//             $status = 0;
//         // }
//         // catch (Exception $e)
//         // {
//         //     $status =1;
//         // }
//         // return response()->json(['status' => $status]);
//     }
}