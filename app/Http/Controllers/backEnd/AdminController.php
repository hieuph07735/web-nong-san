<?php


namespace App\Http\Controllers\backEnd;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function getHome()
    {
        if (Auth::check()) {
            return view('backEnd/layouts/main');
        }else {
            return redirect()->route('get.login');
        }
    }
}
