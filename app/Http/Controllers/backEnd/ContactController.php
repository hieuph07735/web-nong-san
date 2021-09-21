<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        
        $datas = Feedback::OrderBy('id', 'DESC')->get();
        return view('backEnd.contacts.list', compact('datas'));
    }
   
    public function Unactive_contact($id)
    {
        
        $obj = Feedback::find($id);
        $obj->status = 2;
        $obj->save();
        return redirect()->route('manage-contact.index');
    }

    public function Active_contact($id)
    {
        $obj = Feedback::find($id);
        $obj->status = 1;
        $obj->save();
        return redirect()->route('manage-contact.index');
    }
}
