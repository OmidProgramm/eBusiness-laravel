<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contact = Contact::all();
        return view("dashboard.contact.index", compact("contact"));
    }

     public function destroy($id)
    {
        Contact::destroy($id);
        return back();
    }
}
