<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 1,
            'status' => 1,
        ]);

        return redirect('/');
    }

    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->route('get.home');
        } else {
            return view('auth.login');
        }
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('get.home');
        }
        return redirect()->route('get.login')->with('error', 'Bạn đã điền sai thông tin đăng nhập');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('get.login');
    }
}
