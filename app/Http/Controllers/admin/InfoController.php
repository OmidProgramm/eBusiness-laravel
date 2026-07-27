<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    
    public function index()
    {
        $info = Information::all();
        return view("dashboard.info.index", compact('info'));
    }

    public function create()
    {
        return view("dashboard.info.create");
    }

    public function store(Request $request)
    {
        Information::create([
            "info" => $request->info,
            "phone" => $request->phone,
            "email" => $request->email,
            "work" => $request->work
        ]);
        session()->flash("createInfo", "Info is created successfully");
        return redirect()->route("info.index");
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy($id)
    {
        Information::destroy($id);
        return back();
    }
}
