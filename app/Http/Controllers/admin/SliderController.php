<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
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

   
    public function store(Request $request)
    {
        dd($request);
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
