<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $category = Category::paginate(5);
        return view("dashboard.category.index", compact('category'));
        
    }

    
    public function create()
    {
        return view("dashboard.category.create");
    }

   
    public function store(Request $request)
    {
        dd($request->all());
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
        //
    }
}
