<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createCategoryRequest;
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

   
    public function store(createCategoryRequest $request)
    {
        $file = $request->file('images');
        $image = "";
        if(!empty($file)){
            $image = sha1(time()).".".$file->getClientOriginalExtension();
            $file->move("images/category",$image);
        }
        Category::create([
            "title" => $request->title,
            "images" => $image
        ]);

        session()->flash('createCategory', "Category is created successfully");
       return redirect()->route("category.create");
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
