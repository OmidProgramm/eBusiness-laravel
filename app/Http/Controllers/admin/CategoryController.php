<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createCategoryRequest;
use App\Http\Requests\updateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ImageController;

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

        $fileImage = $request->file('image');
        $image = $this->uploadImage($fileImage,"images/category");
        
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
        $category = Category::findOrfail($id);
        return view("dashboard.category.edit", compact('category'));
    }

   
    public function update(updateCategoryRequest $request, string $id)
    {
        $fileImage = $request->file('image');
        $category = Category::findOrFail($id);
        $oldImage = $category->images;

        $image = $this->updateImage($fileImage,"images/category",$oldImage);
       /*  $category = Category::findOrFail($id);
        $file = $request->file('image');
        $new_image = "";
        if($file){
            if($category->images && file_exists("images/category/".$category->images)){
                unlink("images/category/".$category->images);
            }
           $new_image = sha1(time()).".".$file->getClientOriginalExtension();
            $file->move("images/category/",$new_image);
            
        }else{
            $new_image = $category->image;
        } */
        
        $category->update([
            "title" => $request->title,
            "images" => $image
        ]);
        session()->flash('updatedteCategory', "Category is updated successfully");
       return redirect()->route("category.index"); 
    }

   
    public function destroy(string $id)
    {
        $categoryOld = Category::findOrfail($id)->images;
        if(file_exists("images/category/".$categoryOld)){
            unlink("images/category/".$categoryOld);
        }
        Category::destroy($id);
        session()->flash('deleteCategory', "Category is deleted successfully");
        return back();
    }
}
