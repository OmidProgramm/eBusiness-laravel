<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Seo;
use App\Models\Slider;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $seo = Seo::orderBy('id','desc')->first();
        $slider = Slider::all();
        $about = About::orderBy('id','desc')->first();
        return view("front.index", compact('seo',"slider","about"));
    }
}
