<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(){
        return view('backEnd.products.list');
    }

    public function add(){
        return view('backEnd.products.add');
    }
}
