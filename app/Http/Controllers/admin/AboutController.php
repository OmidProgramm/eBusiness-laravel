<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    
    public function index()
    {
        $about = About::paginate(5);
        return view("dashboard.about.index",compact('about'));
    }

    
    public function create()
    {
        return view("dashboard.about.create");
    }

    
    public function store(Request $request)
    {
        
    }

   
    public function show(string $id)
    {
        
    }

    
    public function edit(string $id)
    {
        
    }

    
    public function update(Request $request, string $id)
    {
        
    }

   
    public function destroy(string $id)
    {
        
    }
}
