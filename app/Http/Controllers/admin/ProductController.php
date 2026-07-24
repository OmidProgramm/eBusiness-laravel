<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ImageController;
   
    public function index()
    {
        $product = Product::with('category')->paginate(5);
        
        return view("dashboard.product.index", compact('product'));
    }

   
    public function create()
    {
        $category = Category::pluck('title','id');
        return view("dashboard.product.create",compact('category'));
    }

    
    public function store(createProductRequest $request)
    {
        $fileImage = $request->file('image');
        $path = "images/product";
        $image = $this->uploadImage($fileImage,$path);
        Product::create([
            "title" => $request->title,
            "content" => $request->content,
            "image" => $image,
            "category_id" => $request ->category_id
        ]);
        session()->flash('createProduct', "Slider is created successfully");
       return redirect()->route("product.create");
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
