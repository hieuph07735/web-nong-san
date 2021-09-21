<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Http\Requests\AddUnit;
use App\Http\Requests\EditUnit;
use File;

class UnitController extends Controller
{
    public function index(){
        $status = 0;
        $datas = Unit::all();
        return view('backEnd.units.list',compact('datas','status'));
    }

    public function create(){
        return view('backEnd.units.add');
    }

    public function store(AddUnit $request){
        try {
            Unit::insert([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' =>$request->address,
                'status' => $request->status,
            ]);
            $status = 1;
        }
        catch (Exception $e)
        {
            $status = 2;
        }
        $datas = Unit::all();
        return view('backEnd.units.list',compact('datas','status'));
    }

    public function edit(Request $request ,$id){
        $data = Unit::find($id);
        return view('backEnd.units.edit',compact('data'));
    }

    public function update(Request $request ,$id){
        try {
            $flight = Unit::find($request->id);
            $flight->name = $request->name;
            $flight->phone = $request->phone;
            $flight->address = $request->address;
            $flight->status = $request->status;
            $flight->save();
            $status = 3;
        }
        catch (Exception $e)
        {
            $status = 4;
        }
        $datas = Unit::all();
        return view('backEnd.units.list',compact('datas','status'));
    }

    public function status(Request $request){

        try {
            $flight = Unit::find($request->id);
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
            $flight = Unit::find($request->id);
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
