<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddUser;
use App\Http\Requests\EditUser;
use App\User;
use File;




class UserController extends Controller
{
    public function list($status){
        $data = User::where('status', '!=' , 3)->get();
        return view('backEnd.users.list',compact('data','status'));
    }

    public function add(){
        return view('backEnd.users.add');
    }

    public function save(AddUser $request){
        try {
            if($request->hasFile('avatar')){
                $extension = $request->avatar->extension();
                $filename =  uniqid(). "." . $extension;
                $path = $request->avatar->storeAs(
                    'user_avatar', $filename, 'public'
                );
                $avatar = "storage/".$path;
            }
            User::insert([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'avatar' => $avatar,
                'password' => $request->password,
                'role' => $request->role,
                'status' => $request->status,
            ]);
            $status = 1;
        }
        catch (Exception $e)
        {
            $status = 2;
        }
        $data = User::all();
        return redirect()->route('user.list',compact('status'));

    }

    public function delete(Request $request){

        try {
            $flight = User::find($request->id);
            $flight->status = 3;
            $flight->save();
            $status = 1;
        }
        catch (Exception $e)
        {
            $status = 2;
        }
        return response()->json(['status' => $status]);
    }

    public function edit($id){
        $data = User::find($id);
        return view('backEnd.users.edit',compact('data'));
    }

    public function update(EditUser $request , $id){
        try {
            $avatar = 1;
            if($request->hasFile('avatar')){
                $extension = $request->avatar->extension();
                $filename =  uniqid(). "." . $extension;
                $path = $request->avatar->storeAs(
                    'user_avatar', $filename, 'public'
                );
                $avatar = "storage/".$path;
            }

            $flight = User::find($id);
            $flight->name = $request->name;
            $flight->phone = $request->phone;
            $flight->email = $request->email;
            $flight->password = $request->password;
            $flight->role = $request->role;
            $flight->status = $request->status;
            if($avatar != 1){
                File::delete($flight->avatar);
                $flight->avatar = $avatar;
            }
            $flight->save();
            $status = 3;
        }
        catch (Exception $e)
        {
            $status = 4;
        }
        return redirect()->route('user.list',compact('status'));
    }
}
