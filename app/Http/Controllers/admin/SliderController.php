<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createSliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class SliderController extends Controller
{
    
    public function index()
    {
        $slider = Slider::paginate(5);
        return view("dashboard.slider.index",compact("slider"));
    }

    
    public function create()
    {
        return view("dashboard.slider.create");
    }

   
    public function store(createSliderRequest $request)
    {
        $file = $request->file('image');
        $image_name = "";
        if(!empty($file)){
            $image_name = sha1(time()).".".$file->getClientOriginalExtension();
            $file->move("images/slider",$image_name);
        }
        Slider::create([
            "title" => $request->title,
            "description" => $request->description,
            "image" => $image_name
        ]);
        session()->flash('createSlider', "Slider is created successfully");
       return redirect()->route("slider.create");
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
        $deleteImage = Slider::findOrfail($id)->image; 
        if(file_exists("images/slider/".$deleteImage)){
            unlink("images/slider/".$deleteImage); 
        }
        Slider::destroy($id);
        return back();
    }
}
