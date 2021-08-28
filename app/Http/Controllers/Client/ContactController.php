<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Models\Feedback;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('Client.contact');
    }
    public function post_contact(Request $request)
    {
            Feedback::insert([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'content' => $request->content,
            ]);
            return true;
    }
}
