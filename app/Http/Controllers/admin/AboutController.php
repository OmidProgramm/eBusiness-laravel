<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createAboutRequest;
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

    
    public function store(createAboutRequest $request)
    {
        $file = $request->file('image');
        $image = "";
        if(!empty($file)){
            $image = sha1(time()).'.'.$file->getClientOriginalExtension();
            $file->move("images/about",$image);
        }
        About::create([
            "title" => $request->title,
            "description" => $request->description,
            "image" => $image
        ]);
       
        session()->flash('createAbout', "About is created successfully");
       return redirect()->route("about.create");
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
        $deleteImage = About::findOrfail($id)->image; 
        if(file_exists("images/about/".$deleteImage)){
            unlink("images/about/".$deleteImage); 
        }
        About::destroy($id);
        return back();
    }
}
