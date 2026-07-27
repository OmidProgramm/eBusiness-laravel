<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    
    public function index()
    {
        $social = Social::all();
        return view("dashboard.social.index", compact("social"));
    }

   
    public function create()
    {
        return view("dashboard.social.create");
    }

   
    public function store(Request $request)
    {
        Social::create([
            "description" => $request->description,
            "facebook" => $request->facebook,
            "instagram" => $request->instagram,
            "twitter" => $request->twitter,
            "linkedin" => $request->linkedin,
        ]);
        session()->flash("createSocial", "Social is created successfully");
        return redirect()->route("social.index");
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

   
    public function destroy(string $id)
    {
        Social::destroy($id);
        session()->flash("deleteSocial", "Social is deleted successfully");
        return back();
    }
}
